@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Mobile App') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Mobile App') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Manage Section') }} >> {{ __('translate.Mobile App') }}</p>
@endsection

@section('body-content')

    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show language_box">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <div class="row">
                                <div class="col-12 mg-top-30">
                                    <!-- Product Card -->
                                    <div class="crancy-product-card translation_main_box">

                                        <div class="crancy-customer-filter">
                                            <div class="crancy-customer-filter__single crancy-customer-filter__single--csearch">
                                                <div class="crancy-header__form crancy-header__form--customer">
                                                    <h4 class="crancy-product-card__title">{{ __('translate.Switch to language translation') }}</h4>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="translation_box">
                                            <ul >
                                                @foreach ($language_list as $language)
                                                <li><a href="{{ route('admin.mobile-app', ['lang_code' => $language->lang_code] ) }}">
                                                    @if (request()->get('lang_code') == $language->lang_code)
                                                        <i class="fas fa-eye"></i>
                                                    @else
                                                        <i class="fas fa-edit"></i>
                                                    @endif

                                                    {{ $language->lang_name }}</a></li>
                                                @endforeach
                                            </ul>

                                            <div class="alert alert-secondary" role="alert">

                                                @php
                                                    $edited_language = $language_list->where('lang_code', request()->get('lang_code'))->first();
                                                @endphp

                                            <p>{{ __('translate.Your editing mode') }} : <b>{{ $edited_language->lang_name }}</b></p>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- End Product Card -->
                                </div>
                            </div>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->

    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <form action="{{ route('admin.update-mobile-app') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                @method('PUT')

                                <input type="hidden" name="lang_code" value="{{ request()->get('lang_code') }}">
                                <input type="hidden" name="translate_id" value="{{ $translate->id }}">

                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">

                                            <div class="row">

                                                @if (admin_lang() == request()->get('lang_code'))



                                                <div class="col-12 mg-top-form-20">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="crancy__item-form--group w-100 h-100">
                                                                <label class="crancy__item-label">{{ __('translate.App Image One') }} </label>
                                                                <div class="crancy-product-card__upload crancy-product-card__upload--border">
                                                                    <input type="file" class="btn-check" name="mobile_app_image" id="input-img1" autocomplete="off" onchange="previewImage(event)">
                                                                    <label class="crancy-image-video-upload__label" for="input-img1">
                                                                        <img id="view_img" src="{{ asset($mobile_app->mobile_app_image) }}">
                                                                        <h4 class="crancy-image-video-upload__title">{{ __('translate.Click here to') }} <span class="crancy-primary-color">{{ __('translate.Choose File') }}</span> {{ __('translate.and upload') }} </h4>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Play store link') }} * </label>
                                                        <input class="crancy__item-input" type="text" name="mobile_playstore" id="mobile_playstore" value="{{ $mobile_app->mobile_playstore }}">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.App store link') }} * </label>
                                                        <input class="crancy__item-input" type="text" name="mobile_appstore" id="mobile_appstore" value="{{ $mobile_app->mobile_appstore }}">
                                                    </div>
                                                </div>

                                                @endif

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Short title') }} * </label>
                                                        <input class="crancy__item-input" type="text" name="short_title" id="short_title" value="{{ $translate->mobile_short_title }}">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Title') }} * </label>
                                                        <input class="crancy__item-input" type="text" name="mobile_title" id="mobile_title" value="{{ $translate->mobile_title }}">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Description') }} * </label>
                                                        <textarea class="crancy__item-input crancy__item-textarea summernote"  name="mobile_description" id="mobile_description">{{ $translate->mobile_description }}</textarea>
                                                    </div>
                                                </div>

                                            </div>

                                            <button class="crancy-btn mg-top-25" type="submit">{{ __('translate.Update') }}</button>

                                        </div>
                                        <!-- End Product Card -->
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- End Dashboard Inner -->
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End crancy Dashboard -->
@endsection

@push('js_section')

    <script>
        "use strict";

        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('view_img');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };

        function previewImage2(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('view_img2');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };

        function previewImage3(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('view_img3');
                output.src = reader.result;
            }

            reader.readAsDataURL(event.target.files[0]);
        };




    </script>
@endpush
