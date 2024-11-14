@extends('admin.master_layout')
@section('title')
    <title>{{ __('translate.Edit Country') }}</title>
@endsection

@section('body-header')
    <h3 class="crancy-header__title m-0">{{ __('translate.Edit Country') }}</h3>
    <p class="crancy-header__text">{{ __('translate.Manage Location') }} >> {{ __('translate.Edit Country') }}</p>
@endsection

@section('body-content')
    <!-- crancy Dashboard -->
    <section class="crancy-adashboard crancy-show">
        <div class="container container__bscreen">
            <div class="row">
                <div class="col-12">
                    <div class="crancy-body">
                        <!-- Dashboard Inner -->
                        <div class="crancy-dsinner">
                            <form action="{{ route('admin.country.update', $country->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                @method('PUT')

                                <div class="row">
                                    <div class="col-12 mg-top-30">
                                        <!-- Product Card -->
                                        <div class="crancy-product-card">
                                            <div class="create_new_btn_inline_box">
                                                <h4 class="crancy-product-card__title">{{ __('translate.Edit Country') }}</h4>

                                                <a href="{{ route('admin.country.index') }}" class="crancy-btn "><i class="fa fa-list"></i> {{ __('translate.Country List') }}</a>
                                            </div>

                                            <div class="row mg-top-30">


                                                <div class="col-12">
                                                    <div class="crancy__item-form--group mg-top-form-20">
                                                        <label class="crancy__item-label">{{ __('translate.Country Name') }} * </label>
                                                        <input class="crancy__item-input" type="text" name="name" id="name" value="{{ $country->name }}">
                                                    </div>
                                                </div>

                                            </div>

                                            <button class="crancy-btn mg-top-25" type="submit">{{ __('translate.Save') }}</button>

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
