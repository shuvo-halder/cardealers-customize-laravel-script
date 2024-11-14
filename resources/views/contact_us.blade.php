@extends('layout-1')
@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
    <meta name="title" content="{{ $seo_setting->seo_title }}">
    <meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description)) !!}">
@endsection

@section('body-content')
<main style="background-color: #2a2a2a; color:#fff;">
    <br><hr><br><br>
    <!-- contact-us-part-start -->
    <section class="contact-us" style="padding: 60px 0; background-color: #2a2a2a;">
        <div style="max-width: 1200px; margin: 0 auto;">
            <div style="display: flex; flex-wrap: wrap; justify-content: space-between;">
                <div style="flex: 1 1 48%; padding-right: 20px;">
                    <h3 style="font-size: 28px; font-weight: bold; color: #fff;">{{ $contact_us->title }}</h3>
                    <p style="font-size: 16px; color: #fff;">{{ $contact_us->description }}</p>

                    <div style="margin-top: 30px;">
                        <div style="display: flex; margin-bottom: 20px;">
                            <div style="width: 52px; height: 52px; background: #007bff; display: flex; align-items: center; justify-content: center; border-radius: 50%; margin-right: 15px;">
                                <span>
                                    <svg width="32" height="32" viewBox="0 0 52 52" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M40.1818 0H11.8182C8.68496 0.00375309 5.68114 1.25008 3.46561 3.46559C1.25008 5.6811 0.00375312 8.6849 0 11.8181V30.7271C0.00343797 33.4504 0.945668 36.0894 2.66788 38.1991C4.39009 40.3088 6.78697 41.7602 9.45455 42.3088V49.636C9.45448 50.0639 9.57059 50.4838 9.79048 50.8509C10.0104 51.218 10.3258 51.5186 10.7031 51.7204C11.0804 51.9223 11.5054 52.018 11.9329 51.9972C12.3603 51.9765 12.774 51.8401 13.13 51.6026L26.7091 42.5452H40.1818C43.315 42.5414 46.3189 41.2951 48.5344 39.0796C50.7499 36.8641 51.9962 33.8603 52 30.7271V11.8181C51.9962 8.6849 50.7499 5.6811 48.5344 3.46559C46.3189 1.25008 43.315 0.00375309 40.1818 0ZM35.4545 28.3634H16.5455C15.9186 28.3634 15.3174 28.1144 14.8741 27.6712C14.4308 27.2279 14.1818 26.6267 14.1818 25.9998C14.1818 25.373 14.4308 24.7718 14.8741 24.3285C15.3174 23.8852 15.9186 23.6362 16.5455 23.6362H35.4545C36.0814 23.6362 36.6826 23.8852 37.1259 24.3285C37.5692 24.7718 37.8182 25.373 37.8182 25.9998C37.8182 26.6267 37.5692 27.2279 37.1259 27.6712C36.6826 28.1144 36.0814 28.3634 35.4545 28.3634ZM40.1818 18.909H11.8182C11.1913 18.909 10.5901 18.6599 10.1468 18.2167C9.70357 17.7734 9.45455 17.1722 9.45455 16.5453C9.45455 15.9185 9.70357 15.3173 10.1468 14.874C10.5901 14.4307 11.1913 14.1817 11.8182 14.1817H40.1818C40.8087 14.1817 41.4099 14.4307 41.8532 14.874C42.2964 15.3173 42.5455 15.9185 42.5455 16.5453C42.5455 17.1722 42.2964 17.7734 41.8532 18.2167C41.4099 18.6599 40.8087 18.909 40.1818 18.909Z" />
                                    </svg>
                                </span>
                            </div>
                            <div>
                                <h4 style="font-size: 18px; color: #fff;">{{ __('translate.Live Chat') }}</h4>
                                <p style="font-size: 14px; color: #777;">{{ __('translate.Wait time of ~10 minutes.') }}</p>
                            </div>
                        </div>

                        <div style="display: flex; margin-bottom: 20px;">
                            <div style="width: 52px; height: 52px; background: #28a745; display: flex; align-items: center; justify-content: center; border-radius: 50%; margin-right: 15px;">
                                <span>
                                    <svg width="32" height="32" viewBox="0 0 47 42" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4 0C1.79086 0 0 1.79086 0 4V9.79351L21.5701 25.4809C22.6221 26.2459 24.0472 26.2459 25.0991 25.4809L46.6667 9.7954V4C46.6667 1.79086 44.8758 0 42.6667 0H4ZM46.6667 12.2684L26.2755 27.0983C24.5222 28.3734 22.147 28.3734 20.3938 27.0983L0 12.2665V38C0 40.2091 1.79086 42 4 42H42.6667C44.8758 42 46.6667 40.2091 46.6667 38V12.2684Z" />
                                    </svg>
                                </span>
                            </div>
                            <div>
                                <h4 style="font-size: 18px; color: #fff;">{{ __('translate.Email Us') }}</h4>
                                <p style="font-size: 14px; color: #777;">{{ $contact_us->email }}</p>
                            </div>
                        </div>
                    </div>

                    <div style="margin-top: 30px;">
                        <div style="display: flex; margin-bottom: 20px;">
                            <div style="width: 52px; height: 52px; background: #dc3545; display: flex; align-items: center; justify-content: center; border-radius: 50%; margin-right: 15px;">
                                <span>
                                    <svg width="32" height="32" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M24 0C10.745 0 0 10.745 0 24C0 37.255 10.745 48 24 48C37.255 48 48 37.255 48 24C48 10.745 37.255 0 24 0ZM24 6C25.1046 6 26 6.89543 26 8C26 9.10457 25.1046 10 24 10C22.8954 10 22 9.10457 22 8C22 6.89543 22.8954 6 24 6ZM12 12C13.1046 12 14 12.8954 14 14C14 15.1046 13.1046 16 12 16C10.8954 16 10 15.1046 10 14C10 12.8954 10.8954 12 12 12ZM24 24C25.1046 24 26 24.8954 26 26C26 27.1046 25.1046 28 24 28C22.8954 28 22 27.1046 22 26C22 24.8954 22.8954 24 24 24ZM36 12C37.1046 12 38 12.8954 38 14C38 15.1046 37.1046 16 36 16C34.8954 16 34 15.1046 34 14C34 12.8954 34.8954 12 36 12ZM36 24C37.1046 24 38 24.8954 38 26C38 27.1046 37.1046 28 36 28C34.8954 28 34 27.1046 34 26C34 24.8954 34.8954 24 36 24Z" />
                                    </svg>
                                </span>
                            </div>
                            <div>
                                <h4 style="font-size: 18px; color: #fff;">{{ __('translate.Call Us') }}</h4>
                                <p style="font-size: 14px; color: #777;">{{ $contact_us->phone_number }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div style="flex: 1 1 48%; padding-left: 20px;">
                    <form action="" method="POST" style="background: #fff; padding: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); border-radius: 8px;">
                        @csrf
                        <h4 style="font-size: 24px; font-weight: bold; color: #333;">{{ __('translate.Get in Touch') }}</h4>

                        <div style="margin-bottom: 20px;">
                            <label for="name" style="display: block; font-size: 16px; color: #333; margin-bottom: 8px;">{{ __('translate.Name') }}*</label>
                            <input type="text" id="name" name="name" class="form-control" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 4px;">
                        </div>

                        <div style="margin-bottom: 20px;">
                            <label for="email" style="display: block; font-size: 16px; color: #333; margin-bottom: 8px;">{{ __('translate.Email') }}*</label>
                            <input type="email" id="email" name="email" class="form-control" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 4px;">
                        </div>

                        <div style="margin-bottom: 20px;">
                            <label for="message" style="display: block; font-size: 16px; color: #333; margin-bottom: 8px;">{{ __('translate.Message') }}*</label>
                            <textarea id="message" name="message" rows="4" class="form-control" required style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 4px;"></textarea>
                        </div>

                        <div style="text-align: center;">
                            <button type="submit" style="background-color: #007bff; color: #fff; padding: 12px 30px; font-size: 16px; border: none; border-radius: 4px; cursor: pointer;">{{ __('translate.Send Message') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-us-part-end -->
</main>


@endsection

@push('js_section')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

@endpush
