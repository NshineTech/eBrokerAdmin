@extends('layouts.main')

@section('title')
    {{ __('System Settings') }}
@endsection

@section('page-title')
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h4>@yield('title')</h4>

            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">

            </div>
        </div>
    </div>
@endsection

@section('content')
    <section class="section">
        <form class="form" id="myForm" action="{{ url('set_settings') }}" data-parsley-validate method="POST"
            id="setting_form" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="card">

                <div class="card-body">
                    <div class="divider pt-3">
                        <h6 class="divider-text">{{ __('Company Details') }}</h6>
                    </div>

                    <div class="card-body">
                        <div class="form-group mandatory row">

                            <label class="col-sm-2 form-label-mandatory">{{ __('Company Name') }}</label>
                            <div class="col-sm-4 form-group mandatory">
                                <input name="company_name" type="text" class="form-control" id="company_name"
                                    placeholder="Company Name"
                                    value="{{ system_setting('company_name') != '' ? system_setting('company_name') : '' }}"
                                    data-parsley-required="true">
                            </div>
                            <label class="col-sm-2 form-label-mandatory">{{ __('Email') }}</label>
                            <div class="col-sm-4 form-group mandatory">
                                <input name="company_email" type="email" class="form-control" placeholder="Email"
                                    value="{{ system_setting('company_email') != '' ? system_setting('company_email') : '' }}"
                                    data-parsley-required="true">
                            </div>

                        </div>

                        <div class="row form-group mandatory">
                            <label class="col-sm-2 form-label-mandatory">{{ __('Contact Number 1') }}</label>
                            <div class="col-sm-4">
                                <input name="company_tel1" type="text" class="form-control"
                                    placeholder="Contact Number 1" maxlength="10"
                                    onKeyDown="if(this.value.length==16 && event.keyCode!=8) return false;"
                                    value="{{ system_setting('company_tel1') != '' ? system_setting('company_tel1') : '' }}"
                                    data-parsley-required="true">

                            </div>
                            <label class="col-sm-2 form-label">{{ __('Contact Number 2') }}</label>
                            <div class="col-sm-4">
                                <input name="company_tel2" type="text" class="form-control"
                                    placeholder="Contact Number 2" maxlength="10"
                                    onKeyDown="if(this.value.length==16 && event.keyCode!=8) return false;"
                                    value="{{ system_setting('company_tel2') != '' ? system_setting('company_tel2') : '' }}">

                            </div>

                        </div>
                        <div class="form-group mandatory row">
                            <label class="col-sm-2 form-label-mandatory">{{ __('Company Address') }}</label>
                            <div class="col-sm-10">
                                <textarea name="company_address" class="form-control" id="" rows="3" data-parsley-required="true">{{ system_setting('company_address') != '' ? system_setting('company_address') : '' }}</textarea>

                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="card">

                <div class="card-body">
                    <div class="divider pt-3">
                        <h6 class="divider-text">{{ __('Social Media Links') }}</h6>
                    </div>

                    <div class="card-body">
                        <div class="form-group row">

                            <label class="col-sm-2 form-label">{{ __('Facebook Id') }}</label>
                            <div class="col-sm-4">
                                <input name="facebook_id" type="text" class="form-control" id="facebook_id"
                                    placeholder="Facebook Id"
                                    value="{{ system_setting('facebook_id') != '' ? system_setting('facebook_id') : '' }}">
                            </div>
                            <label class="col-sm-2 form-label">{{ __('Instagram Id') }}</label>
                            <div class="col-sm-4">
                                <input name="instagram_id" type="text" class="form-control" placeholder="Instagram Id"
                                    value="{{ system_setting('instagram_id') != '' ? system_setting('instagram_id') : '' }}">
                            </div>

                        </div>

                        <div class="row form-group">
                            <label class="col-sm-2 form-label">{{ __('Twitter Id') }}</label>
                            <div class="col-sm-4">
                                <input name="twitter_id" type="text" class="form-control" placeholder="Twitter Id"
                                    value="{{ system_setting('twitter_id') != '' ? system_setting('twitter_id') : '' }}">

                            </div>
                            <label class="col-sm-2 form-label">{{ __('Pintrest Id') }}</label>
                            <div class="col-sm-4">
                                <input name="pintrest_id" type="text" class="form-control" placeholder="Pintrest Id"
                                    value="{{ system_setting('pintrest_id') != '' ? system_setting('pintrest_id') : '' }}">

                            </div>

                        </div>

                    </div>

                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="divider pt-3">
                        <h6 class="divider-text">{{ __('Images') }}</h6>
                    </div>
                    <div class="row mt-1">
                        <div class="card-body">
                            <div class="form-group  row">
                                <label class="col-sm-2 form-label ">{{ __('Favicon Icon') }}</label>
                                <div class="col-sm-4">
                                    <input class="filepond" type="file" name="favicon_icon" id="favicon_icon">
                                    <img src="{{ url('assets/images/logo/favicon.png') }}" class="mt-2 favicon_icon"
                                        alt="image" style=" height: 31%;width: 21%;">
                                </div>
                                <label class="col-sm-2 form-label ">{{ __('Comapany Logo') }}</label>
                                <div class="col-sm-4">
                                    <input class="filepond" type="file" name="company_logo" id="company_logo">
                                    <img src="{{ url('assets/images/logo/logo.png') }}" class="mt-2 company_logo"
                                        alt="image" style="height: 31%;width: 21%;">

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row mt-1">
                        <div class="card-body">
                            <div class="form-group  row">

                                <label class="col-sm-2 form-label ">{{ __('Login Page Image') }}</label>
                                <div class="col-sm-4">
                                    <input class="filepond" type="file" name="login_image" id="login_image">
                                    <img src="{{ url('assets/images/bg/Login_BG.jpg') }}" class="mt-2 login_image"
                                        alt="image" style="height: 31%;width: 21%;">

                                </div>
                                <label class="col-sm-2 form-label ">{{ __('Web Logo') }}</label>
                                <div class="col-sm-4">
                                    <input class="filepond" type="file" name="web_logo" id="web_logo">
                                    <img src="{{ url('assets/images/logo/web_logo.png') }}" class="mt-2 web_logo"
                                        alt="image" style="height: 31%;width: 21%;">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    <div class="divider pt-3">
                        <h6 class="divider-text">{{ __('Paypal Setting') }}</h6>

                    </div>
                    <div class="form-group row mt-3">
                        <label class="col-sm-2 form-label  mt-5">{{ __('Paypal Business ID') }}</label>
                        <div class="col-sm-4 mt-5">
                            <input name="paypal_business_id" type="text" class="form-control"
                                placeholder="Paypal Business ID"
                                value="{{ system_setting('paypal_business_id') != '' ? system_setting('paypal_business_id') : '' }}">
                        </div>

                        <label class="col-sm-2 form-label  mt-5">{{ __('Paypal Webhook URL') }}</label>
                        <div class="col-sm-4 mt-5">
                            <input name="paypal_webhook_url" type="text" class="form-control"
                                placeholder="Paypal Webhook URL"
                                value="{{ system_setting('paypal_webhook_url') != '' ? system_setting('paypal_webhook_url') : url('/webhook/paypal') }}">
                        </div>

                        <br>
                        <br>

                        <br>
                        <label class="col-sm-2 form-label   mt-3 ">{{ __('Sandbox Mode') }}</label>
                        <div class="col-sm-2 col-md-4 col-xs-12   mt-3 ">
                            <div class="form-check form-switch  ">

                                <input type="hidden" name="sandbox_mode" id="sandbox_mode"
                                    value="{{ system_setting('sandbox_mode') != '' ? system_setting('sandbox_mode') : 0 }}">
                                <input class="form-check-input" type="checkbox" role="switch"
                                    {{ system_setting('sandbox_mode') == '1' ? 'checked' : '' }} id="switch_sandbox_mode">
                                <label class="form-check-label" for="switch_sandbox_mode"></label>
                            </div>
                        </div>
                        <label class="col-sm-2 form-check-label  mt-3 "
                            id='lbl_paypal'>{{ system_setting('paypal_gateway') != ''
                                ? (system_setting('paypal_gateway') == 0
                                    ? 'Disable'
                                    : 'Enable')
                                : 'Disable' }}</label>
                        <div class="col-sm-2 col-md-4 col-xs-12   mt-3 ">
                            <div class="form-check form-switch  ">

                                <input type="hidden" name="paypal_gateway" id="paypal_gateway"
                                    value="{{ system_setting('paypal_gateway') != '' ? system_setting('paypal_gateway') : 0 }}">
                                <input class="form-check-input" type="checkbox" role="switch" class="switch-input"
                                    name='op' {{ system_setting('paypal_gateway') == '1' ? 'checked' : '' }}
                                    id="switch_paypal_gateway">
                                <label class="form-check-label" for="switch_paypal_gateway"></label>
                            </div>
                        </div>

                    </div>
                    <div class="divider pt-3">
                        <h6 class="divider-text">{{ __('Razorpay Setting') }}</h6>

                    </div>
                    <div class="form-group row mt-3">

                        <label class="col-sm-2 form-label  mt-5">{{ __('Razorpay key') }}</label>
                        <div class="col-sm-4 mt-5">
                            <input name="razor_key" type="text" class="form-control" placeholder="Razorpay Key"
                                value="{{ system_setting('razor_key') != '' ? system_setting('razor_key') : '' }}">
                        </div>

                        <label class="col-sm-2 form-label  mt-5">{{ __('Razorpay Webhook URL') }}</label>
                        <div class="col-sm-4 mt-5">
                            <input name="razorpay_webhook_url" type="text" class="form-control"
                                placeholder="Razorpay Webhook URL"
                                value="{{ system_setting('razorpay_webhook_url') != '' ? system_setting('razorpay_webhook_url') : url('/webhook/razorpay') }}">
                        </div>
                        <label class="col-sm-2 form-label  mt-3">{{ __('Razorpay Secret') }}</label>
                        <div class="col-sm-4 mt-3">
                            <input name="razor_secret" type="text" class="form-control" placeholder="Razorpay Secret"
                                value="{{ system_setting('razor_secret') != '' ? system_setting('razor_secret') : '' }}">
                        </div>
                        <label class="col-sm-2 form-label  mt-3"
                            id='lbl_razorpay'>{{ system_setting('razorpay_gateway') != ''
                                ? (system_setting('razorpay_gateway') == 0
                                    ? 'Disable'
                                    : 'Enable')
                                : 'Disable' }}</label>
                        <div class="col-sm-2 col-md-4 col-xs-12  mt-3">
                            <div class="form-check form-switch">

                                <input type="hidden" name="razorpay_gateway" id="razorpay_gateway"
                                    value="{{ system_setting('razorpay_gateway') != '' ? system_setting('razorpay_gateway') : 0 }}">
                                <input class="form-check-input" type="checkbox" role="switch" class="switch-input"
                                    name='op' {{ system_setting('razorpay_gateway') == '1' ? 'checked' : '' }}
                                    id="switch_razorpay_gateway">
                                <label class="form-check-label" for="switch_razorpay_gateway"></label>
                            </div>
                        </div>

                    </div>

                    <div class="divider pt-3">
                        <h6 class="divider-text">{{ __('Paystack Setting') }}</h6>

                    </div>
                    <div class="form-group row mt-5">

                        <label class="col-sm-2 form-label  mt-3">{{ __('Paystack Secret key') }}</label>
                        <div class="col-sm-4 mt-3">
                            <input name="paystack_secret_key" type="text" class="form-control"
                                placeholder="Paystack Secret Key"
                                value="{{ system_setting('paystack_secret_key') != '' ? system_setting('paystack_secret_key') : '' }}">
                        </div>
                        <label class="col-sm-2 form-label  mt-3">{{ __('Paystack Webhook URL') }}</label>
                        <div class="col-sm-4 mt-3">
                            <input name="paystack_webhook_url" type="text" class="form-control"
                                placeholder="Paystack Webhook URL"
                                value="{{ system_setting('paystack_webhook_url') != '' ? system_setting('paystack_webhook_url') : url('/webhook/paystack') }}">
                        </div>
                        <label class="col-sm-2 form-label  mt-3">{{ __('Paystack Currency Symbol') }}</label>

                        <div class="col-sm-4 mt-3">

                            <select name="paystack_currency" id="paystack_currency"
                                class="select2 form-select form-control-sm">

                                <option value="GHS"
                                    selected="{{ system_setting('paystack_currency') == 'GHS' ? 'true' : '' }}">
                                    GHS</option>
                                <option value="NGN"
                                    selected="{{ system_setting('paystack_currency') == 'NGN' ? 'true' : '' }}">
                                    NGN</option>
                                <option value="USD"
                                    selected="{{ system_setting('paystack_currency') == 'USD' ? 'true' : '' }}">
                                    USD</option>
                                <option value="ZAR"
                                    selected="{{ system_setting('paystack_currency') == 'ZAR' ? 'true' : '' }}">
                                    ZAR</option>

                            </select>
                        </div>

                        <label class="col-sm-2 form-check-label  mt-3"
                            id='lbl_paystack'>{{ system_setting('paystack_gateway') != ''
                                ? (system_setting('paystack_gateway') == 0
                                    ? 'Disable'
                                    : 'Enable')
                                : 'Disable' }}</label>
                        <div class="col-sm-2 col-md-4 col-xs-12  mt-3">

                            <div class="form-check form-switch ">

                                <input type="hidden" name="paystack_gateway" id="paystack_gateway"
                                    value="{{ system_setting('paystack_gateway') != '' ? system_setting('paystack_gateway') : 0 }}">
                                <input class="form-check-input" type="checkbox" role="switch" class="switch-input"
                                    name='op' {{ system_setting('paystack_gateway') == '1' ? 'checked' : '' }}
                                    id="switch_paystack_gateway">

                            </div>
                        </div>
                        <label class="col-sm-2 form-label  mt-3">{{ __('Paystack Public key') }}</label>
                        <div class="col-sm-4 mt-3">
                            <input name="paystack_public_key" type="text" class="form-control"
                                placeholder="Paystack Public Key"
                                value="{{ system_setting('paystack_public_key') != '' ? system_setting('paystack_public_key') : '' }}">
                        </div>
                    </div>
                    <div class="divider pt-3">
                        <h6 class="divider-text">{{ __('Stripe Setting') }}</h6>

                    </div>
                    <div class="form-group row mt-5">
                        <label class="col-sm-2 form-label  mt-3">{{ __('Stripe publishable key') }}</label>
                        <div class="col-sm-4 mt-3">
                            <input name="stripe_publishable_key" type="text" class="form-control"
                                placeholder="Stripe publishable  Key"
                                value="{{ system_setting('stripe_publishable_key') != '' ? system_setting('stripe_publishable_key') : '' }}">
                        </div>
                        <label class="col-sm-2 form-label  mt-3">{{ __('Stripe Webhook URL') }}</label>
                        <div class="col-sm-4 mt-3">
                            <input name="stripe_webhook_url" type="text" class="form-control"
                                placeholder="Stripe Webhook URL"
                                value="{{ system_setting('stripe_webhook_url') != '' ? system_setting('stripe_webhook_url') : url('/webhook/stripe') }}">
                        </div>
                        <label class="col-sm-2 form-check-label  mt-3">{{ __('Stripe Currency Symbol') }}</label>

                        <div class="col-sm-4 mt-3">

                            <select name="stripe_currency" id="stripe_currency"
                                class="select2 form-select form-control-sm">
                                @foreach ($stripe_currencies as $value)
                                    <option value={{ $value }}
                                        {{ system_setting('stripe_currency') == $value ? 'selected' : '' }}>
                                        {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>

                        <label class="col-sm-2 form-check-label  mt-3"
                            id='lbl_stripe'>{{ system_setting('stripe_gateway') != ''
                                ? (system_setting('stripe_gateway') == 0
                                    ? 'Disable'
                                    : 'Enable')
                                : 'Disable' }}</label>
                        <div class="col-sm-2 col-md-4 col-xs-12  mt-3">

                            <div class="form-check form-switch ">

                                <input type="hidden" name="stripe_gateway" id="stripe_gateway"
                                    value="{{ system_setting('stripe_gateway') != '' ? system_setting('stripe_gateway') : 0 }}">
                                <input class="form-check-input" type="checkbox" role="switch" class="switch-input"
                                    name='op' {{ system_setting('stripe_gateway') == '1' ? 'checked' : '' }}
                                    id="switch_stripe_gateway">

                            </div>
                        </div>
                        <label class="col-sm-2 form-check-label-mandatory  mt-3">{{ __('Stripe Secret key') }}</label>
                        <div class="col-sm-4 mt-3">
                            <input name="stripe_secret_key" type="text" class="form-control"
                                placeholder="Stripe Secret Key"
                                value="{{ system_setting('stripe_secret_key') != '' ? system_setting('stripe_secret_key') : '' }}">
                        </div>
                    </div>

                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    <div class="divider pt-3">
                        <h6 class="divider-text">{{ __('More Setting') }}</h6>

                    </div>
                    <div class="form-group mandatory row mt-3">
                        <label class="col-sm-2 form-label-mandatory ">{{ __('Default Language') }}</label>
                        <div class="col-sm-2 col-md-4 col-xs-12 ">
                            <select name="default_language" id="default_language"
                                class="select2 form-select form-control-sm">

                                @foreach ($languages as $row)
                                    {{ $row }}
                                    <option value="{{ $row->code }}"
                                        {{ system_setting('default_language') == $row->code ? 'selected' : '' }}>
                                        {{ $row->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <label class="col-sm-2 form-label-mandatory ">{{ __('Currency Symbol') }}</label>
                        <div class="col-sm-4">
                            <input name="currency_symbol" type="text" class="form-control"
                                placeholder="Currency Symbol"
                                value="{{ system_setting('currency_symbol') != '' ? system_setting('currency_symbol') : '' }}"
                                data-parsley-required="true">
                        </div>

                    </div>

                    <div class="form-group mandatory row mt-3">

                        <label class="col-sm-2 form-label-mandatory ">{{ __('IOS Version') }}</label>

                        <div class="col-sm-4 form-group mandatory">
                            <input name="ios_version" type="text" class="form-control" placeholder="App Version"
                                value="{{ system_setting('ios_version') != '' ? system_setting('ios_version') : '' }}"
                                data-parsley-required="true">
                        </div>
                        <label class="col-sm-2 form-label-mandatory ">{{ __('Android Version') }}</label>

                        <div class="col-sm-4 form-group mandatory">
                            <input name="android_version" type="text" class="form-control" placeholder="App Version"
                                value="{{ system_setting('android_version') != '' ? system_setting('android_version') : '' }}"
                                data-parsley-required="true">
                        </div>
                    </div>
                    <div class="form-group mandatory row mt-3">

                        <label class="col-sm-2 form-label ">{{ __('Unsplash API Key') }}</label>

                        <div class="col-sm-4">
                            <input name="unsplash_api_key" type="text" class="form-control"
                                placeholder="Place API Key"
                                value="{{ system_setting('unsplash_api_key') != '' ? system_setting('unsplash_api_key') : '' }}">
                        </div>
                        <label class="col-sm-2 form-label ">{{ __('Place API Key') }}</label>

                        <div class="col-sm-4">
                            <input name="place_api_key" type="text" class="form-control" placeholder="Place API Key"
                                value="{{ system_setting('place_api_key') != '' ? system_setting('place_api_key') : '' }}">
                        </div>

                    </div>
                    <div class="form-group mandatory row mt-3">
                        <label class="col-sm-2 form-label ">{{ __('System Color') }}</label>

                        <div class="col-sm-4">
                            <input name="system_color" type="color" class="form-control" placeholder="System Color"
                                value="{{ system_setting('system_color') != '' ? system_setting('system_color') : '' }}"
                                id="systemColor">
                            <input type="hidden" id="hiddenRGBA" name="rgb_color">
                        </div>
                        <label class="col-sm-2 form-check-label">{{ __('Force Update') }}</label>
                        <div class="col-sm-4">

                            <div class="form-check form-switch">

                                <input type="hidden" name="force_update" id="force_update"
                                    value="{{ system_setting('force_update') != '' ? system_setting('force_update') : 0 }}">
                                <input class="form-check-input" type="checkbox" role="switch"
                                    {{ system_setting('force_update') == '1' ? 'checked' : '' }}
                                    id="switch_force_update">
                                <label class="form-check-label mandatory" for="switch_force_update"></label>
                            </div>

                        </div>

                    </div>
                    <div class="form-group mandatory row mt-3">

                        <label class="col-sm-2 form-check-label mandatory ">{{ __('Maintenance Mode') }}</label>
                        <div class="col-sm-4">
                            <div class="form-check form-switch  ">

                                <input type="hidden" name="maintenance_mode" id="maintenance_mode"
                                    value="{{ system_setting('maintenance_mode') != '' ? system_setting('maintenance_mode') : 0 }}">
                                <input class="form-check-input" type="checkbox" role="switch"
                                    {{ system_setting('maintenance_mode') == '1' ? 'checked' : '' }}
                                    id="switch_maintenance_mode">
                                <label class="form-check-label mandatory" for="switch_maintenance_mode"></label>
                            </div>

                        </div>
                        <label class="col-sm-2 form-check-label mandatory ">{{ __('Number With Suffix') }}</label>
                        <div class="col-sm-2 col-md-4 col-xs-12 ">
                            <div class="form-check form-switch  ">

                                <input type="hidden" name="number_with_suffix" id="number_with_suffix"
                                    value="{{ system_setting('number_with_suffix') != '' ? system_setting('number_with_suffix') : 0 }}">
                                <input class="form-check-input" type="checkbox" role="switch"
                                    {{ system_setting('number_with_suffix') == '1' ? 'checked' : '' }}
                                    id="switch_number_with_suffix">

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">

                    <div class="divider pt-3">
                        <h6 class="divider-text">{{ __('Notification FCM Key') }}</h6>

                    </div>

                    <div class="form-group mandatory row mt-3">

                        <label class="col-sm-2 form-label-mandatory ">{{ __('FCM Key') }}</label>
                        <div class="col-sm-10 col-md-10 col-xs-12 ">
                            <textarea name="fcm_key" class="form-control" rows="3" data-parsley-required="true" placeholder="Fcm Key">{{ system_setting('fcm_key') != '' ? system_setting('fcm_key') : '' }}</textarea>

                        </div>

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">

                    <div class="divider pt-3">
                        <h6 class="divider-text">{{ __('Iframe Link For Web') }}</h6>

                    </div>

                    <div class="form-group mandatory row mt-3">

                        <label class="col-sm-2 form-label-mandatory ">{{ __('Link') }}</label>
                        <div class="col-sm-10 col-md-10 col-xs-12">
                            <textarea id="iframe_tag" class="form-control" rows="3" data-parsley-required="true"
                                placeholder="Iframe Link">{{ system_setting('iframe_link') != '' ? system_setting('iframe_link') : '' }}</textarea>
                            <input type="hidden" name="iframe_link" id="iframe_link">

                        </div>

                    </div>
                </div>
            </div>

            <div class="col-12 d-flex justify-content-end">
                <button type="submit" name="btnAdd" value="btnAdd"
                    class="btn btn-primary me-1 mb-1">{{ __('Save') }}</button>
            </div>

        </form>

    </section>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).on('click', '#favicon_icon', function(e) {

            $('.favicon_icon').hide();

        });
        $(document).on('click', '#company_logo', function(e) {

            $('.company_logo').hide();

        });
        $(document).on('click', '#login_image', function(e) {

            $('.login_image').hide();

        });


        $(document).on('click', '#web_logo', function(e) {

            $('.web_logo').hide();

        });

        const checkboxes = document.querySelectorAll('input[type=checkbox][role=switch][name=op]', );
        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', (event) => {
                if (event.target.checked) {
                    checkboxes.forEach((checkbox) => {
                        if (checkbox !== event.target) {
                            checkbox.checked = false;

                            $("#switch_paypal_gateway").is(':checked') ? $("#paypal_gateway").val(
                                    1) : $("#paypal_gateway")
                                .val(0);

                            $("#switch_paypal_gateway").is(':checked') ? $("#lbl_paypal").text(
                                    "Enable") : $("#lbl_paypal")
                                .text("Disable");

                            $("#switch_razorpay_gateway").is(':checked') ? $("#razorpay_gateway")
                                .val(1) : $("#razorpay_gateway")
                                .val(0);
                            $("#switch_razorpay_gateway").is(':checked') ? $("#lbl_razorpay").text(
                                    "Enable") : $("#lbl_razorpay")
                                .text("Disable");

                            $("#switch_paystack_gateway").is(':checked') ? $("#lbl_paystack").text(
                                    "Enable") : $("#lbl_paystack")
                                .text("Disable");
                            $("#switch_paystack_gateway").is(':checked') ? $("#paystack_gateway")
                                .val(1) : $("#paystack_gateway")
                                .val(0);



                            $("#switch_stripe_gateway").is(':checked') ? $("#lbl_stripe").text(
                                    "Enable") : $("#lbl_stripe")
                                .text("Disable");
                            $("#switch_stripe_gateway").is(':checked') ? $("#stripe_gateway")
                                .val(1) : $("#stripe_gateway")
                                .val(0);

                        }
                    });
                }
            });
        });


        $("#switch_maintenance_mode").on('change', function() {
            $("#switch_maintenance_mode").is(':checked') ? $("#maintenance_mode").val(1) : $("#maintenance_mode")
                .val(0);
        });
        $("#switch_force_update").on('change', function() {
            $("#switch_force_update").is(':checked') ? $("#force_update").val(1) : $("#force_update")
                .val(0);
        });
        $("#switch_number_with_suffix").on('change', function() {
            $("#switch_number_with_suffix").is(':checked') ? $("#number_with_suffix").val(1) : $(
                    "#number_with_suffix")
                .val(0);
        });
        $("#switch_sandbox_mode").on('change', function() {
            $("#switch_sandbox_mode").is(':checked') ? $("#sandbox_mode").val(1) : $("#sandbox_mode")
                .val(0);
        });
        $("#switch_paypal_gateway").on('change', function() {

            $("#switch_paypal_gateway").is(':checked') ? $("#paypal_gateway").val(1) : $("#paypal_gateway")
                .val(0);

            $("#switch_paypal_gateway").is(':checked') ? $("#lbl_paypal").text("Disable") : $("#lbl_paypal")
                .text("Enable");
        });
        $("#switch_razorpay_gateway").on('change', function() {

            $("#switch_razorpay_gateway").is(':checked') ? $("#razorpay_gateway").val(1) : $("#razorpay_gateway")
                .val(0);

            $("#switch_razorpay_gateway").is(':checked') ? $("#lbl_razorpay").text("Disable") : $("#lbl_razorpay")
                .text("Enable");
        });




        $("#switch_stripe_gateway").on('change', function() {

            $("#switch_stripe_gateway").is(':checked') ? $("#stripe_gateway").val(1) : $("#stripe_gateway")
                .val(0);

            $("#switch_stripe_gateway").is(':checked') ? $("#lbl_stripe").text("Disable") : $("#lbl_stripe")
                .text("Enable");
        });


        $("#switch_paystack_gateway").on('change', function() {

            $("#switch_paystack_gateway").is(':checked') ? $("#paystack_gateway").val(1) : $("#paystack_gateway")
                .val(0);

            $("#switch_paystack_gateway").is(':checked') ? $("#lbl_paystack").text("Disable") : $("#lbl_paystack")
                .text("Enable");
        });

        function hexToRgb(hex) {
            const bigint = parseInt(hex.slice(1), 16);
            const r = (bigint >> 16) & 255;
            const g = (bigint >> 8) & 255;
            const b = bigint & 255;
            return `rgb(${r}, ${g}, ${b},0.15)`;
        }





        const colorForm = document.getElementById("setting_form");
        const systemColorInput = document.getElementById("systemColor");

        const hiddenRGBAInput = document.getElementById("hiddenRGBA");


        systemColorInput.addEventListener("change", function() {
            const selectedColor = systemColorInput.value;
            const alpha = 0.15; // You can adjust the alpha value as needed (1 for fully opaque)
            const rgba = hexToRgb(selectedColor);
            hiddenRGBAInput.value = rgba; // Update the hidden input with the new RGBA value
        });



        $(document).ready(function() {

            var companyname = $('#company_name').val();
            sessionStorage.setItem('comapanyname', $('#company_name').val());
            const newValue = `"${companyname}"`;
            const rgba = hexToRgb(systemColorInput.value);
            hiddenRGBAInput.value = rgba;


            // Get the content from the textarea



        });
        document.getElementById('myForm').addEventListener('submit', function(event) {


            const iframeContent = document.getElementById('iframe_tag').value;

            // Create a temporary element to extract the src attribute
            const tempElement = document.createElement('div');
            tempElement.innerHTML = iframeContent;

            // Get the src attribute value from the parsed HTML
            const srcValue = tempElement.querySelector('iframe').getAttribute('src');

            // Set the src value to a hidden element
            const hiddenElement = document.getElementById('iframe_link');
            hiddenElement.value = srcValue;
            console.log(srcValue);
            // If you want to set the src as an attribute
            // hiddenElement.setAttribute('src', srcValue);

        });
    </script>
@endsection

