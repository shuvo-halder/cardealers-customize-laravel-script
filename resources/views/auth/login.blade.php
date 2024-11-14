@extends('layout-1')
@section('title')
    <title>{{ __('translate.Sign In') }}</title>
@endsection

@section('body-content')



<main style="background-color: #2a2a2a; color:#fff;">
    <br><hr>

    <!-- login-section -->
    <section class="login" style="padding: 50px 0; background-color: #2a2a2a;">
        <div class="container" style="max-width: 1140px; margin: 0 auto;">

            <div class="row login-bg" style="display: flex; justify-content: space-between;">
                <div class="col-lg-6" style="flex: 1;">
                    <div class="login-head" style="text-align: left; margin-bottom: 30px;">
                        <h3 style="font-size: 30px; font-weight: bold;">{{ __('translate.Sign In') }}</h3>
                        <span style="font-size: 16px; color: #6c757d;">{{ __('translate.Welcome to CARBAZ') }}</span>
                    </div>

                    <form method="POST" action="{{ route('user-login') }}">
                        @csrf

                        <div class="login-form-item" style="margin-bottom: 15px;">
                            <div class="login-form-inner">
                                <label for="exampleFormControlInput1" class="form-label" style="font-size: 16px; font-weight: normal; color: #fff;">
                                    {{ __('translate.Email address') }} <span style="color: red;">*</span>
                                </label>
                                @if(env('APP_MODE') == 'DEMO')
                                    <input type="email" class="form-control" id="exampleFormControlInput1"
                                    placeholder="{{ __('translate.Email address') }}" name="email" value="user@gmail.com" style="width: 100%; padding: 10px; font-size: 16px; border-radius: 4px; border: 1px solid #ccc;">
                                @else
                                    <input type="email" class="form-control" id="exampleFormControlInput1"
                                    placeholder="{{ __('translate.Email address') }}" name="email" value="{{ old('email') }}" style="width: 100%; padding: 10px; font-size: 16px; border-radius: 4px; border: 1px solid #fff;">
                                @endif
                            </div>
                        </div>

                        <div class="login-form-item two" style="margin-bottom: 15px;">
                            <div class="login-form-inner">
                                <label class="form-label" style="font-size: 16px; font-weight: normal; color: #fff;">
                                    {{ __('translate.Password') }} <span style="color: red;">*</span>
                                </label>
                                @if(env('APP_MODE') == 'DEMO')
                                    <input type="password" class="form-control"
                                    placeholder="......" name="password" id="input_password" value="1234" style="width: 100%; padding: 10px; font-size: 16px; border-radius: 4px; border: 1px solid #fff;">
                                @else
                                    <input type="password" class="form-control"
                                    placeholder="......" name="password" id="input_password" style="width: 100%; padding: 10px; font-size: 16px; border-radius: 4px; border: 1px solid #fff;">
                                @endif
                                
                            </div>
                        </div>

                        <div class="login-form-item two" style="margin-bottom: 15px;">
                            <div class="login-form-inner">
                                <div class="form-check" style="margin-bottom: 10px;">
                                    <input name="remember" class="form-check-input" type="checkbox" value="" id="flexCheckDefault" style="width: auto; height: auto; margin-right: 10px;">
                                    <label class="form-check-label" for="flexCheckDefault" style="font-size: 14px; color: #fff;">
                                        {{ __('translate.Remeber Me') }}
                                    </label>
                                </div>
                            </div>

                            <div class="login-form-inner">
                                <a href="{{ route('password.request') }}" class="forget-btn" style="font-size: 14px; color: #007bff;">
                                    {{ __('translate.Forget Password ?') }}
                                </a>
                            </div>
                        </div>

                        @if($google_recaptcha->status==1)
                            <div class="login-form-item three" style="margin-bottom: 15px;">
                                <div class="login-form-inner">
                                    <div class="g-recaptcha" data-sitekey="{{ $google_recaptcha->site_key }}" style="margin-bottom: 10px;"></div>
                                </div>
                            </div>
                        @endif

                        <div class="login-form-item two" style="margin-bottom: 20px;">
                            <button type="submit" class="thm-btn-two" style="width: 100%; padding: 15px; font-size: 16px; font-weight: bold; background-color: #007bff; border: none; color: white; border-radius: 4px;">
                                {{ __('translate.Sign In') }}
                            </button>
                        </div>
                    </form>

                    @if ($social_login->is_gmail == 1 || $social_login->is_facebook == 1)
                        <div class="login-text" style="text-align: center; margin-top: 20px;">
                            <p style="font-size: 16px; color: #fff;">{{ __('translate.OR') }}</p>
                        </div>

                        <div class="login-btn-item" style="text-align: center; margin-top: 10px;">
                            @if ($social_login->is_gmail == 1)
                                <button type="button" class="login-btn login_with_google" style="width: 100%; padding: 15px; background-color: #db4437; color: white; border: none; border-radius: 4px; font-size: 16px;">
                                    {{ __('translate.Sign In with Google') }}
                                </button>
                            @endif

                            @if ($social_login->is_facebook == 1)
                                <button type="button" class="login-btn login_with_facebook" style="width: 100%; padding: 15px; background-color: #3b5998; color: white; border: none; border-radius: 4px; font-size: 16px;">
                                    {{ __('translate.Sign In with Facebook') }}
                                </button>
                            @endif
                        </div>
                    @endif

                    <div class="create-accoun-text" style="text-align: center; margin-top: 20px;">
                        <p style="font-size: 16px; color: #fff;">{{ __('translate.Do not have an account ?') }}<span><a href="{{ route('register') }}" style="color: #007bff;"> {{ __('translate.Sign Up Here') }}</a></span></p>
                    </div>
                </div>

                <div class="col-lg-6" style="flex: 1;">
                    <div class="login-img">
                        <img src="{{ asset($setting->login_page_bg) }}" alt="img" style="width: 100%; height: auto; object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


@endsection


@push('js_section')

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script>

    let is_password = true;
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
