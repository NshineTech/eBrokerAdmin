@extends('layouts.main')

@section('title')
{{ __('Add Article') }}
@endsection

@section('page-title')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h4>@yield('title')</h4>

        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('article.index') }}" id="subURL">{{ __('View Article') }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Add') }}
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
@endsection


@section('content')
<section class="section">
    <div class="row">
        <div class="col-md-7 col-sm-12">
            <div class="card">
                <div class="card-header add_article_header">
                    New Article
                </div>
                <hr>
                {!! Form::open(['route' => 'article.store', 'data-parsley-validate', 'files' => true]) !!}
                <div class="card-body">

                    <div class="row">

                        <div class="col-md-12 col-sm-12 form-group mandatory">

                            {{ Form::label('title', __('Title'), ['class' => 'form-label col-12']) }}
                            {{ Form::text('title', '', ['class' => 'form-control ', 'placeholder' => 'Title',
                            'data-parsley-required' => 'true', 'id' => 'title']) }}

                        </div>


                        <div class="col-md-12 col-12 form-group mandatory">
                            {{ Form::label('category', __('Category'), ['class' => 'form-label col-12 ']) }}
                            <select name="category" class="select2 form-select form-control-sm"
                                data-parsley-minSelect='1' required>
                                <option value="0"> General </option>
                                @foreach ($category as $row)
                                <option value="{{ $row->id }}" data-parametertypes='{{ $row->parameter_types }}'>
                                    {{ $row->category }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12 col-sm-12 form-group">

                            {{ Form::label('image', __('Image'), ['class' => 'col-12 form-label']) }}

                            <input accept="image/*" name='image' type='file' class="filepond" id="edit_image" />

                        </div>

                    </div>
                    <div class="row  mt-4">

                        <div class="col-md-12 col-sm-12 form-group mandatory">
                            {{ Form::label('description', __('Description'), ['class' => 'form-label col-12']) }}


                            {{ Form::textarea('description', '', ['class' => 'form-control ', 'id' => 'tinymce_editor',
                            'data-parsley-required' => 'true']) }}

                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="col-12 d-flex justify-content-end">

                            {{ Form::submit(__('Save'), ['class' => 'btn btn-primary me-1 mb-1']) }}
                        </div>

                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

        <div class="col-md-5 col-sm-12">

            <div class="card">
                <div class="card-header add_article_header">
                    Recent Articles
                </div>
                <hr>

                <div class="card-body">

                    <div class="row">

                        @foreach ($recent_articles as $row)

                        <div class="col-md-12 d-flex recent_articles">

                            <img class="article_img"
                                src="{{ $row->image!=""?$row->image:url('assets/images/bg/Login_BG.jpg') }}" alt="">
                            <div class="article_details">
                                <div class="article_category">
                                    {{ ($row->category)?$row->category->category:'General' }}
                                </div>
                                <div class="article_title">
                                    {{ $row->title }}
                                </div>
                                <div class="article_description">
                                    @php
                                    echo Str::substr(strip_tags($row->description), 0, 180) . '...';
                                    @endphp
                                </div>
                                <div class="article_date">
                                    {{ date('d M Y', strtotime($row->created_at)) }}

                                </div>

                            </div>

                        </div>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </div>

</section>
@endsection