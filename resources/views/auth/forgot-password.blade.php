@extends('layout-1')
@section('title')
    <title>{{ __('translate.Forget Password') }}</title>
@endsection

@section('body-content')

<main style="background-color: #2a2a2a; color:#fff;">
    <br><hr><br>
    <section style="padding: 60px 0; background-color: #2a2a2a;">
        <div style="width: 100%; max-width: 1200px; margin: 0 auto; padding: 0 15px;">
            <div style="display: flex; flex-wrap: wrap; gap: 30px; background: #333; padding: 30px; border-radius: 8px;">
                <div style="flex: 0 0 50%; max-width: 50%; padding-right: 15px;">
                    <div style="margin-bottom: 30px;">
                        <h3 style="font-size: 24px; color: #fff; margin-bottom: 10px;">{{ __('translate.Forget Password') }}</h3>
                        <span style="color: #666;">{{ __('translate.To get reset link please fill out the form below') }}</span>
                    </div>

                    <form method="POST" action="{{ route('forget-password') }}">
                        @csrf

                        <div style="margin-bottom: 15px;">
                            <div style="margin-bottom: 15px;">
                                <label for="exampleFormControlInput1" style="display: block; margin-bottom: 5px; color: #fff;">{{ __('translate.Email address') }}
                                    <span style="color: red;">*</span> </label>
                                <input type="email" style="width: 100%; padding: 10px; border: 1px solid #ced4da; border-radius: 4px;" id="exampleFormControlInput1" placeholder="{{ __('translate.Email address') }}" name="email" value="{{ old('email') }}">
                            </div>
                        </div>

                        @if($google_recaptcha->status==1)
                            <div style="margin-bottom: 15px;">
                                <div style="margin-bottom: 15px;">
                                    <div class="g-recaptcha" data-sitekey="{{ $google_recaptcha->site_key }}"></div>
                                </div>
                            </div>
                        @endif

                        <div style="margin-bottom: 15px;">
                            <button type="submit" style="background-color: #007bff; color: #fff; padding: 10px 20px; border: none; border-radius: 4px;">{{ __('translate.Send Mail') }}</button>
                        </div>

                    </form>

                    @if ($social_login->is_gmail == 1 || $social_login->is_facebook == 1)
                        <div style="text-align: center; margin: 20px 0;">
                            <p style="margin: 0; color: #666;">{{ __('translate.OR') }}</p>
                        </div>

                        <div style="display: flex; justify-content: center; gap: 10px; margin-bottom: 20px;">
                            @if ($social_login->is_gmail == 1)
                                <button type="button" style="background-color: #db4a39; color: #fff; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">
                                    <span></span>
                                    {{ __('translate.Sign In with Google') }}
                                </button>
                            @endif

                            @if ($social_login->is_facebook == 1)
                                <button type="button" style="background-color: #3b5998; color: #fff; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">
                                    <span></span>
                                    {{ __('translate.Sign In with Facebook') }}
                                </button>
                            @endif
                        </div>
                    @endif

                    <div style="text-align: center; margin-top: 20px;">
                        <p style="margin: 0; color: #666;">{{ __('translate.Back to sign-in page') }} <span><a href="{{ route('login') }}" style="color: #007bff; text-decoration: none;"> {{ __('translate.Click Here') }}</a></span></p>
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

    (function($) {
        "use strict"
        $(document).ready(function () {

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
