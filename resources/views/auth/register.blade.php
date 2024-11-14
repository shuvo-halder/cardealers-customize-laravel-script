@extends('layout-1')
@section('title')
    <title>{{ __('translate.Sign Up') }}</title>
@endsection

@section('body-content')


<main style="background-color: #2a2a2a; color:#fff;">
    <br><hr><br><br>
   

    <!-- contact-us-part-start -->
    <section class="login">
        <div class="container" style="max-width: 1140px; padding: 0 15px;">
            <div class="row login-bg" style="display: flex; flex-wrap: wrap; margin: 0;">
                <div class="col-lg-6" style="padding: 0 15px; flex: 0 0 50%; max-width: 50%;">
                    <div class="login-head" style="text-align: center; margin-bottom: 30px;">
                        <h3 style="font-size: 24px; font-weight: bold;">{{ __('translate.Sign Up') }}</h3>
                        <span style="font-size: 16px; color: #6c757d;">{{ __('translate.Welcome to CARBAZ') }}</span>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="login-form-item" style="margin-bottom: 20px;">
                            <div class="login-form-inner">
                                <label for="exampleFormControlInput1" class="form-label" style="font-size: 16px; font-weight: bold;">
                                    {{ __('translate.Name') }} <span style="color: red;">*</span>
                                </label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="{{ __('translate.Name') }}" name="name" value="{{ old('name') }}" style="width: 100%; padding: 10px; font-size: 16px;">
                            </div>
                        </div>

                        <div class="login-form-item three" style="margin-bottom: 20px;">
                            <div class="login-form-inner">
                                <label for="exampleFormControlInput1" class="form-label" style="font-size: 16px; font-weight: bold;">
                                    {{ __('translate.Email address') }} <span style="color: red;">*</span>
                                </label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="{{ __('translate.Email address') }}" name="email" value="{{ old('email') }}" style="width: 100%; padding: 10px; font-size: 16px;">
                            </div>
                        </div>

                        <div class="login-form-item two" style="margin-bottom: 20px;">
                            <div class="login-form-inner">
                                <label class="form-label" style="font-size: 16px; font-weight: bold;">
                                    {{ __('translate.Password') }} <span style="color: red;">*</span>
                                </label>
                                <input type="password" class="form-control" placeholder="......" name="password" id="input_password" style="width: 100%; padding: 10px; font-size: 16px;">

                                <div class="icon" id="password-field" style="position: absolute; right: 10px; top: 10px;">
                                    <span><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="login-form-item two" style="margin-bottom: 20px;">
                            <div class="login-form-inner">
                                <label class="form-label" style="font-size: 16px; font-weight: bold;">
                                    {{ __('translate.Confirm Password') }} <span style="color: red;">*</span>
                                </label>
                                <input type="password" class="form-control" placeholder="......" name="password_confirmation" id="input_password_confirm" style="width: 100%; padding: 10px; font-size: 16px;">

                                <div class="icon" id="password-field-confirm" style="position: absolute; right: 10px; top: 10px;">
                                    <span><i class="fa fa-eye-slash" aria-hidden="true"></i></span>
                                </div>
                            </div>
                        </div>

                        @if($google_recaptcha->status==1)
                            <div class="login-form-item three" style="margin-bottom: 20px;">
                                <div class="login-form-inner">
                                    <div class="g-recaptcha" data-sitekey="{{ $google_recaptcha->site_key }}" style="margin-top: 10px;"></div>
                                </div>
                            </div>
                        @endif

                        <div class="login-form-item two" style="margin-top: 20px;">
                            <button type="submit" class="thm-btn-two" style="width: 100%; padding: 12px 0; background-color: #28a745; color: #fff; font-size: 18px; border: none; border-radius: 5px;">
                                {{ __('translate.Sign Up') }}
                            </button>
                        </div>
                    </form>

                    @if ($social_login->is_gmail == 1 || $social_login->is_facebook == 1)
                        <div class="login-text" style="text-align: center; margin-top: 20px;">
                            <p>{{ __('translate.OR') }}</p>
                        </div>

                        <div class="login-btn-item" style="text-align: center;">
                            @if ($social_login->is_gmail == 1)
                                <button type="button" class="login-btn login_with_google" style="display: inline-block; padding: 10px 20px; background-color: #db4437; color: #fff; font-size: 16px; border: none; border-radius: 5px; margin-right: 10px;">
                                    {{ __('translate.Sign In with Google') }}
                                </button>
                            @endif

                            @if ($social_login->is_facebook == 1)
                                <button type="button" class="login-btn login_with_facebook" style="display: inline-block; padding: 10px 20px; background-color: #4267B2; color: #fff; font-size: 16px; border: none; border-radius: 5px;">
                                    {{ __('translate.Sign In with Facebook') }}
                                </button>
                            @endif
                        </div>
                    @endif

                    <div class="create-accoun-text" style="text-align: center; margin-top: 20px;">
                        <p>{{ __('translate.Already have an account ?') }}<span><a href="{{ route('login') }}" style="color: #007bff;"> {{ __('translate.Sign In Here') }}</a></span></p>
                    </div>

                </div>

                <div class="col-lg-6" style="padding: 0 15px; flex: 0 0 50%; max-width: 50%;">
                    <div class="login-img" style="text-align: center;">
                        <img src="{{ asset($setting->login_page_bg) }}" alt="img" style="width: 100%; height: auto; border-radius: 10px;">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-us-part-end -->
</main>


@endsection


@push('js_section')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script>
    let is_password = true;
    let is_password_confirm = true;
    (function($) {
        "use strict"
        $(document).ready(function () {
            $("#password-field").on("click",function(e){
                is_password = !is_password;
                if(is_password){
                    $("#input_password").attr('type', 'password');

                    $("#password-field").html(`<span>
                                        <i class='fa fa-eye-slash' aria-hidden='true' ></i>
                                    </span>`)

                }else{
                    $("#input_password").attr('type', 'text');
                    $("#password-field").html(`<span>
                                        <i class='fa fa-eye' aria-hidden='true' ></i>
                                    </span>`)
                }
            })

            $("#password-field-confirm").on("click",function(e){
                is_password_confirm = !is_password_confirm;
                if(is_password_confirm){
                    $("#input_password_confirm").attr('type', 'password');

                    $("#password-field-confirm").html(`<span>
                                        <i class='fa fa-eye-slash' aria-hidden='true' ></i>
                                    </span>`)

                }else{
                    $("#input_password_confirm").attr('type', 'text');
                    $("#password-field-confirm").html(`<span>
                                        <i class='fa fa-eye' aria-hidden='true' ></i>
                                    </span>`)
                }
            })



            $(".login_with_google").on("click", function(e){
                window.location = "{{ route('login-google') }}";
            })

            $(".login_with_facebook").on("click", function(e){
                window.location = "{{ route('login-facebook') }}";
            })


        });
    })(jQuery);
</script>
@endpush
