<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




use Google\Analytics\Data\V1beta\BetaAnalyticsDataClient;
use Google\Analytics\Data\V1beta\DateRange;
use Google\Analytics\Data\V1beta\Dimension;
use Google\Analytics\Data\V1beta\Metric;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {




        $articles = Article::all();


        return view('article.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category = Category::all();
        $recent_articles = Article::with('category')->orderBy('id', 'DESC')->limit(5)->get();
        // dd($recent_articles->toArray());


        return view('article.create', ['category' => $category, 'recent_articles' => $recent_articles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        if (!has_permissions('read', 'property')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MSG'));
        } else {
            $request->validate([

                'image.*' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            ]);

            $destinationPath = public_path('images') . config('global.ARTICLE_IMG_PATH');
            if (!is_dir($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
            $article = new Article();
            $article->title = $request->title;
            $article->description = $request->description;
            $article->category_id = isset($request->category) ? $request->category : '';


            if ($request->hasFile('image')) {

                $profile = $request->file('image');
                $imageName = microtime(true) . "." . $profile->getClientOriginalExtension();
                $profile->move($destinationPath, $imageName);
                $article->image = $imageName;
            } else {
                $article->image  = '';
            }
            $title = $request->title;
            $model = Article::class;


           
            $article->save();
            return back()->with('success', 'Successfully Added');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $search = $request->search;
        $limit = $request->limit;

        $query = Article::query();

        if (!empty($limit) && $limit != 1) {
            $query->limit($limit);
        }

        if ($search !== null) {
            $query->where('id', 'LIKE', "%$search%")
                ->orWhere('title', 'LIKE', "%$search%")
                ->orWhere('description', 'LIKE', "%$search%");
        }

        $articles = $query->get();
        // dd($articles->toArray());

        return view('article.index', ['articles' => $articles]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $list = Article::where('id', $id)->get()->first();
        $category = Category::all();
        $recent_articles = Article::with('category')->orderBy('id', 'DESC')->limit(6)->get();

        return view('article.edit', compact('list', 'category', 'id', 'recent_articles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $destinationPath = public_path('images') . config('global.ARTICLE_IMG_PATH');
        if (!is_dir($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }

        $updatearticle = Article::find($id);
        if ($request->hasFile('image')) {
            $profile = $request->file('image');
            $imageName = microtime(true) . "." . $profile->getClientOriginalExtension();
            $profile->move($destinationPath, $imageName);
            $updatearticle->image = $imageName;

            if ($updatearticle->image != '') {
                if (file_exists(public_path('images') . config('global.ARTICLE_IMG_PATH') .  $updatearticle->image)) {
                    unlink(public_path('images') . config('global.ARTICLE_IMG_PATH') . $updatearticle->image);
                }
            }
        }

        $updatearticle->title = $request->title;
        $updatearticle->description = $request->description;
        $updatearticle->category_id = isset($request->category) ? $request->category : '';




        $updatearticle->update();
        return back()->with('success', 'Successfully Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        if (!has_permissions('delete', 'property')) {
            return redirect()->back()->with('error', env('PERMISSION_ERROR_MSG'));
        } else {
            $article = Article::find($id);
            if ($article->delete()) {


                if ($article->image != '') {
                    echo "in 1 if";
                    if (file_exists(public_path('images') . config('global.ARTICLE_IMG_PATH') . $article->image)) {
                        unlink(public_path('images') . config('global.ARTICLE_IMG_PATH') . $article->image);
                    }
                }

                // Notifications::where('articles_id', $id)->delete();
                return back()->with('success', 'Article Deleted Successfully');
            } else {
                return back()->with('error', 'Something Wrong');
            }
        }
    }
}
