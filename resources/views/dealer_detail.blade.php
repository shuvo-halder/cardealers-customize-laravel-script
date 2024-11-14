@extends('layout-1')
@section('title')
    <title>{{ $dealer->name }}</title>
    <meta name="title" content="{{ $dealer->name }}">
    <meta name="description" content="{{ $dealer->name }}">
@endsection
@push('style_section')
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sedan+SC&display=swap");

        /*  font-family: "Poppins", sans-serif;
              font-family: "Sedan SC", serif; */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        p {
            font-family: "Poppins", sans-serif;
            margin: 0;
            font-size: 17px;
            font-weight: 300;
            color: #ffffff;
        }

        h3 {
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
            font-weight: 400;
            color: #ffffff;
            font-size: 24px;
        }

        a {
            text-decoration: none !important;
            transition: all 0.5s ease-in-out;
        }

        .container {
            width: 1320px;
            margin: 0 auto;
            max-width: 100%;
            padding: 0 20px;

        }

        .row {
            display: flex;
            flex-wrap: wrap;
            align-items: stretch;
        }

        .blog_listing .item a {
            display: grid;
            gap: 15px;

        }

        .blog_listing .item a img {
            width: 100%;
            height: auto;
            aspect-ratio: 4/3;
            background: #e9e9e9;
            object-fit: cover;
            border: 1px solid #ffffff;
        }

        .blog_listing .item p {
            color: #ffffff;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            border: 1px solid #ffffff;
        }

        .blog_listing .wrapper {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        @media only screen and (max-width: 991px) {
            .blog_listing .wrapper {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media only screen and (max-width: 767px) {
            .blog_listing .wrapper {
                grid-template-columns: repeat(1, 1fr);
            }
        }

        .clickButton {
            display: inline-block;
            border-radius: 4px;
            background-color: #f4511e;
            border: none;
            color: #FFFFFF;
            text-align: center;
            font-size: 10px;
            padding: 10px;
            width: 200px;
            transition: all 0.5s;
            cursor: pointer;
            margin: 5px;
        }

        .clickButton span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .clickButton span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -20px;
            transition: 0.5s;
        }

        .clickButton:hover span {
            padding-right: 25px;
        }

        .clickButton:hover span:after {
            opacity: 1;
            right: 0;
        }
    </style>
@endpush

@section('body-content')

<main style="background-color: #2a2a2a; color:#fff;">
    <!-- banner-part-start  -->
    <br/> <br/>
    <section class="inner-banner inner-banner-two" style="background: #2a2a2a; padding: 50px 0;">
        
        <div class="container">
            <div class="col-lg-6" style="max-width: 50%; padding: 15px;">
                <div style="background-color: #5e5e5e; color:#fff; border-radius:10px;" class="dealers-banner-item" style="border: 1px solid #ddd; padding: 20px; background: #fff; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                    <div class="dealers-banner-logo" style="text-align: center; margin-bottom: 20px;">
                        <a href="javascript:;" style="display: inline-block;">
                            <img src="{{ getImageOrPlaceholder($dealer->image, '100x100') }}" alt="icon" style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;">
                        </a>
                    </div>
    
                    <div class="dealers-banner-contact" style="font-family: Arial, sans-serif; color: #333;">
                        <h3 class="dealers-banner-contact-taitel" style="font-size: 24px; color:#fff; font-weight: bold; margin-bottom: 15px;">
                            &nbsp;&nbsp;&nbsp;{{ html_decode($dealer->name) }}
                            @php
                                $kyc = Modules\Kyc\Entities\KycInformation::where('user_id',$dealer->id)->where('status',1)->first();
                            @endphp
                            @if($kyc)
                                <span class="varified-badge" style="background: #28a745; color: #fff; padding: 5px 10px; border-radius: 20px; font-size: 12px; margin-left: 10px;">
                                    Verified
                                </span>
                            @endif
                        </h3>
                        <ul style="list-style: none; padding: 0; margin: 0;">
                            <li style="margin-bottom: 10px;">
                                <a  href="javascript:;" style="text-decoration: none; color: #ffffff;">
                                    &nbsp;&nbsp;&nbsp;<span style="margin-right: 5px;">📅</span>
                                    {{ __('translate.Member Since') }} {{ $dealer->created_at->format('F Y') }}
                                </a>
                            </li>
                            <li style="margin-bottom: 10px;">
                                <a href="javascript:;" style="text-decoration: none; color: #ffffff;">
                                    &nbsp;&nbsp;&nbsp;<span style="margin-right: 5px;">🚗</span>
                                    {{ __('translate.Total Cars') }} {{ $dealer->total_car }}
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;" style="text-decoration: none; color: #ffffff;">
                                    &nbsp;&nbsp;&nbsp;<span style="margin-right: 5px;">⭐</span>
                                    {{ $total_dealer_rating }} {{ __('translate.Reviews') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- banner-part-end -->



    <!-- dealers-details-part-start -->
    <section class="dealers-details feature-two">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xl-3" style="padding: 20px;">

                    <!-- Contact Beach -->
                    <div class="contact-beach-box" style="background-color: #f9f9f9; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                        <div class="contact-beach-box-taitel" style="margin-bottom: 20px;">
                            <h3 style="font-size: 20px; font-weight: bold; color: #333;">{{ __('translate.Send Message To Us') }}</h3>
                        </div>
                
                        <form class="contact-beach-box-main" method="POST" action="{{ route('send-message-to-dealer', $dealer->id) }}">
                            @csrf
                            <div class="contact-beach-box-item" style="margin-bottom: 15px;">
                                <input type="text" class="form-control" id="exampleFormControlInput3" placeholder="{{ __('translate.Name') }} *" name="name" value="{{ old('name') }}" style="padding: 10px; border-radius: 5px; border: 1px solid #ddd;">
                            </div>
                            <div class="contact-beach-box-item" style="margin-bottom: 15px;">
                                <input type="email" class="form-control" id="exampleFormControlInput4" placeholder="{{ __('translate.Email') }} *" name="email" value="{{ old('email') }}" style="padding: 10px; border-radius: 5px; border: 1px solid #ddd;">
                            </div>
                            <div class="contact-beach-box-item" style="margin-bottom: 15px;">
                                <input type="text" class="form-control" id="exampleFormControlInput5" placeholder="{{ __('translate.Phone') }}" name="phone" value="{{ old('phone') }}" style="padding: 10px; border-radius: 5px; border: 1px solid #ddd;">
                            </div>
                            <div class="contact-beach-box-item" style="margin-bottom: 15px;">
                                <input type="text" class="form-control" id="exampleFormControlInpu6" placeholder="{{ __('translate.Subject') }} *" value="{{ old('subject') }}" name="subject" style="padding: 10px; border-radius: 5px; border: 1px solid #ddd;">
                            </div>
                
                            <div class="contact-beach-box-item" style="margin-bottom: 20px;">
                                <textarea class="form-control" id="exampleFormControlTextarea11" rows="3" placeholder="{{ __('translate.Message') }} *" name="message" style="padding: 10px; border-radius: 5px; border: 1px solid #ddd;">{{ old('message') }}</textarea>
                            </div>
                
                            @if($google_recaptcha->status==1)
                                <div class="contact-beach-box-item" style="margin-bottom: 20px;">
                                    <div class="g-recaptcha" data-sitekey="{{ $google_recaptcha->site_key }}"></div>
                                </div>
                            @endif
                
                            <button type="submit" class="thm-btn-two" style="background-color: #343f37; color: #fff; padding: 12px 20px; border-radius: 5px; border: none; font-weight: bold; cursor: pointer;">{{ __('translate.Send Message') }}</button>
                        </form>
                    </div>
                
                    <!-- dealers-details-side-bar -->
                    <div class="dealers-details-side-bar" style="margin-top: 30px;">
                        <!-- Description -->
                        @if ($dealer->about_me)
                            <div class="dealers-details-taitel" style="margin-bottom: 20px;">
                                <h3 style="font-size: 20px; font-weight: bold; color: #ffffff;">{{ __('translate.About Us') }}</h3>
                                <p style="font-size: 14px; color: #ffffff;">{{ html_decode($dealer->about_me) }}</p>
                            </div>
                        @endif
                
                        <!-- Address -->
                        <div class="dealers-details-taitel two" style="margin-bottom: 20px;">
                            <h3 style="font-size: 20px; font-weight: bold; color: #ffffff;">{{ __('translate.Contact Us') }}</h3>
                            <ul class="address" style="list-style: none; padding: 0; margin: 0;">
                                <li style="margin-bottom: 10px;">
                                    <a href="tel:{{ html_decode($dealer->phone) }}" style="color: #007bff; text-decoration: none;">
                                        <span style="margin-right: 8px;">📞</span>
                                        {{ html_decode($dealer->phone) }}
                                    </a>
                                </li>
                                <li style="margin-bottom: 10px;">
                                    <a href="mailto:{{ html_decode($dealer->email) }}" style="color: #007bff; text-decoration: none;">
                                        <span style="margin-right: 8px;">
                                            <svg class="svg-two" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2 12V7C2 4.79086 3.79086 3 6 3H18C20.2091 3 22 4.79086 22 7V17C22 19.2091 20.2091 21 18 21H8M6 8L9.7812 10.5208C11.1248 11.4165 12.8752 11.4165 14.2188 10.5208L18 8M2 15H8M2 18H8" stroke-width="1.5" stroke-linecap="round" />
                                            </svg>
                                        </span>
                                        {{ html_decode($dealer->email) }}
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;" style="color: #007bff; text-decoration: none;">
                                        <span style="margin-right: 8px;">📍</span>
                                        {{ html_decode($dealer->address) }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                
                        <!-- Working Hours -->
                        <div class="dealers-details-taitel two" style="margin-bottom: 20px;">
                            <h3 style="font-size: 20px; font-weight: bold; color: #ffffff;">{{ __('translate.Working Hours') }}</h3>
                            <ul class="working-hours" style="list-style: none; padding: 0; margin: 0;">
                                <li style="margin-bottom: 8px;"><span style="font-weight: bold;">{{ __('translate.Sunday') }}:</span> {{ html_decode($dealer->sunday) }}</li>
                                <li style="margin-bottom: 8px;"><span style="font-weight: bold;">{{ __('translate.Monday') }}:</span> {{ html_decode($dealer->monday) }}</li>
                                <li style="margin-bottom: 8px;"><span style="font-weight: bold;">{{ __('translate.Tuesday') }}:</span> {{ html_decode($dealer->tuesday) }}</li>
                                <li style="margin-bottom: 8px;"><span style="font-weight: bold;">{{ __('translate.Wednesday') }}:</span> {{ html_decode($dealer->wednesday) }}</li>
                                <li style="margin-bottom: 8px;"><span style="font-weight: bold;">{{ __('translate.Thursday') }}:</span> {{ html_decode($dealer->thursday) }}</li>
                                <li style="margin-bottom: 8px;"><span style="font-weight: bold;">{{ __('translate.Friday') }}:</span> {{ html_decode($dealer->friday) }}</li>
                                <li style="margin-bottom: 8px;"><span style="font-weight: bold;">{{ __('translate.Saturday') }}:</span> {{ html_decode($dealer->saturday) }}</li>
                            </ul>
                        </div>
                
                        <!-- Location Map -->
                        <div class="dealers-details-taitel two" style="margin-bottom: 20px;">
                            <h3 style="font-size: 20px; font-weight: bold; color: #ffffff;">{{ __('translate.Location Map') }}</h3>
                            <div class="map" style="width: 100%; height: 250px; margin-bottom: 20px;">
                                <iframe src="{{ html_decode($dealer->google_map) }}" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" style="width: 100%; height: 100%; border: none;"></iframe>
                            </div>
                        </div>
                
                        <!-- Follow my Social -->
                        <div class="dealers-details-taitel two" style="margin-bottom: 20px;">
                            <h3 style="font-size: 20px; font-weight: bold; color: #ffffff;">{{ __('translate.Follow my Social') }}</h3>
                            <ul class="social-link" style="list-style: none; padding: 0; margin: 0;">
                                <li style="display: inline-block; margin-right: 10px;">
                                    <a href="{{ html_decode($dealer->instagram) }}" target="_blank" style="color: #007bff; text-decoration: none;">
                                        <span>📷</span>
                                    </a>
                                </li>
                                <li style="display: inline-block; margin-right: 10px;">
                                    <a href="{{ html_decode($dealer->facebook) }}" target="_blank" style="color: #007bff; text-decoration: none;">
                                        <span>📘</span>
                                    </a>
                                </li>
                                <li style="display: inline-block; margin-right: 10px;">
                                    <a href="{{ html_decode($dealer->linkedin) }}" target="_blank" style="color: #007bff; text-decoration: none;">
                                        <span>🔗</span>
                                    </a>
                                </li>
                                <li style="display: inline-block; margin-right: 10px;">
                                    <a href="{{ html_decode($dealer->twitter) }}" target="_blank" style="color: #007bff; text-decoration: none;">
                                        <span>🐦</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
               
                <div class="col-lg-8 col-xl-9" style="padding: 20px;">

                    @if ($dealer_ads->status == 'enable')
                        <div class="dealers-details-banner" style="margin-bottom: 30px;">
                            <a href="{{ $dealer_ads->link }}" target="_blank">
                                <img src="{{ getImageOrPlaceholder($dealer_ads->image, '1056x152') }}" alt="img" style="width: 100%; height: auto; border-radius: 5px;">
                            </a>
                        </div>
                    @endif
                
                    @if($cars->count() > 0)
                
                        <!-- Filter Title -->
                        <div class="inventory-ber" style="margin-bottom: 30px;">
                            <div class="inventory-ber-left">
                                <ul class="shaf-filter course-filter j" style="list-style: none; padding: 0; margin: 0;">
                                    <li class="active" data-group="all" style="display: inline-block; margin-right: 10px; cursor: pointer; font-weight: bold;">{{ __('translate.All Car') }}</li>
                                    <li data-group="Used" style="display: inline-block; margin-right: 10px; cursor: pointer;">{{ __('translate.Used Car') }}</li>
                                    <li data-group="New" style="display: inline-block; cursor: pointer;">{{ __('translate.New Car') }}</li>
                                </ul>
                            </div>
                        </div>
                
                        

                        <section class="blog_listing">
                            <div class="container">
                                <div class="wrapper">

                                    @forelse ($cars as $index => $car)
                                        <div class="item">
                                            <a href="{{ route('listing', $car->slug) }}">
                                                <img style="border-radius: 10px" src="{{ asset($car->thumb_image) }}"
                                                    alt="">
                                                <p style="font-size:1em;"> &nbsp;&nbsp; {{ html_decode($car?->dealer?->name) }}
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                        fill="currentColor" viewbox="0 0 16 16"
                                                        class="bi bi-diamond-fill fs-09 mx-2" style="margin-bottom: 2px;">
                                                        <path fill-rule="evenodd"
                                                            d="M6.95.435c.58-.58 1.52-.58 2.1 0l6.515 6.516c.58.58.58 1.519 0 2.098L9.05 15.565c-.58.58-1.519.58-2.098 0L.435 9.05a1.482 1.482 0 0 1 0-2.098L6.95.435z">
                                                        </path>
                                                    </svg>
                                                    {{ $car->condition == 'New' ? __('translate.New') : __('translate.Used') }}
                                                   
                                                </p>
                                                <span>

                                                </span>
                                                <h3>{{ html_decode($car->title) }}</h3>
                                                <p>
                                                    @if ($car->offer_price)
                                                    {{ currency($car->offer_price) }}
                                                @else
                                                    {{ currency($car->regular_price) }}
                                                @endif
                                                </p>
                                                <p> 
                                                    <div class="brand-car-inner-item-two" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                                                        <div class="brand-car-inner-item-thumb" style="background-color: #f1f1f1; padding: 5px; border-radius: 5px;"></div>
                                                        <span style="font-size: 14px; color: #666;">{{ html_decode($car->mileage) }}</span>
                                                    </div>
                                                    <div class="brand-car-inner-item-two" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                                                        <div class="brand-car-inner-item-thumb" style="background-color: #f1f1f1; padding: 5px; border-radius: 5px;"></div>
                                                        <span style="font-size: 14px; color: #666;">{{ html_decode($car->fuel_type) }}</span>
                                                    </div>
                                                    <div class="brand-car-inner-item-two" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                                                        <div class="brand-car-inner-item-thumb" style="background-color: #f1f1f1; padding: 5px; border-radius: 5px;"></div>
                                                        <span style="font-size: 14px; color: #666;">{{ html_decode($car->engine_size) }}</span>
                                                    </div>
                                                </p>
                                                
                                            </a>
                                        </div>
                                    @empty
                                        <div>
                                            <div class="not-found-txt-main">
                                                <h4 class="not-found-txt">
                                                    {{ __('translate.Listing Not Found!') }}
                                                </h4>
                                                <p class="not-found-sub-txt">
                                                    {{ __('translate.Whoops... this information is not available for a  moment') }}
                                                </p>
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </section>
                
                        @if ($cars->hasPages())
                            <div class="pagination" style="margin-top: 30px; text-align: center;">
                                {{ $cars->links('listing_paginate') }}
                            </div>
                        @endif
                
                    @else
                        <div class="row">
                            <div class="col-12">
                                <div class="not-found-box" style="text-align: center; padding: 30px;">
                                    <div class="not-found-thumb-main" style="margin-bottom: 20px;">
                                        <div class="not-fount-main-thumb" style="font-size: 50px; color: #ccc;">🙁</div>
                                    </div>
                
                                    <div class="not-found-txt-main">
                                        <h4 class="not-found-txt" style="font-size: 20px; font-weight: bold;">{{ __('translate.Listing Not Found!') }}</h4>
                                        <p class="not-found-sub-txt" style="font-size: 16px; color: #777;">
                                            {{ __('translate.Whoops... this information is not available for a  moment') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                
                </div>
                


            </div>
        </div>
    </section>
    <!-- dealers-details-part-end -->

</main>
@endsection



@push('js_section')

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<!-- jquery.shuffle.min.js -->
<script src="{{ asset('frontend/assets/js/jquery.shuffle.min.js') }}"></script>

@endpush
