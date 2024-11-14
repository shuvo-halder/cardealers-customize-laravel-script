@extends('layout-1')
@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
    <meta name="title" content="{{ $seo_setting->seo_title }}">
    <meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description)) !!}">
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
        .next-prev-btn ul {
    display: flex;
    flex-direction: row;
    justify-content: center; /* Center-aligns pagination items horizontally */
    list-style: none;
    padding: 0;
    margin: 0;
}

.next-prev-btn li {
    margin-right: 15px; /* Adds space between items */
}

.next-prev-btn li:last-child {
    margin-right: 0; /* Removes margin from the last item */
}

.next-prev-btn a {
    text-decoration: none;
    padding: 5px 10px;
    color: #fff;
}

.next-prev-btn a.active {
    font-weight: bold;
    color: #f4511e;
}


    </style>
@endpush
@section('body-content')
    <main style="background-color: #2d2d2d;; padding:0; margin:0;">
        <!-- banner-part-start  -->
        <br><br><br><br><br>


        <section class="inventory feature-two">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <form action="" id="search_form">
                            <div class="inventory-main-box">


                                <div class="location-box">

                                    <select style="background-color: #2d2d2d; color:#ffffff;" class="form-control select2"
                                        name="country" id="country_id">
                                        <option value="">
                                            {{ __('translate.Select Country') }}</option>
                                        @foreach ($countries as $country)
                                            <option {{ request()->get('country') == $country->id ? 'selected' : '' }}
                                                value="{{ $country->id }}">
                                                {{ $country->name }}</option>
                                        @endforeach
                                    </select>


                                </div>


                                <div class="location-box">

                                    <select style="background-color: #2d2d2d; color:#ffffff;" class="form-control select2"
                                        name="location" id="city_id">
                                        <option value="">
                                            {{ __('translate.Select City') }}</option>
                                        @foreach ($cities as $city)
                                            <option {{ request()->get('location') == $city->id ? 'selected' : '' }}
                                                value="{{ $city->id }}">
                                                {{ $city->name }}</option>
                                        @endforeach
                                    </select>


                                </div>



                                <!-- Select Your Brand  -->
                                <div class="accordion" id="accordionPanelsStayOpenExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                                aria-controls="panelsStayOpen-collapseOne">
                                                {{ __('translate.Select Brand') }}
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="panelsStayOpen-headingOne">
                                            <div style="background-color: #2d2d2d; color:#FFFFFF;" class="accordion-body">
                                                <span class="select-Brand-box">
                                                    @if (request()->has('brands'))
                                                        @php
                                                            $brand_arr = request()->get('brands');
                                                        @endphp

                                                        @foreach ($brands as $brand)
                                                            <span class="form-check">
                                                                <input
                                                                    {{ in_array($brand->id, $brand_arr) ? 'checked' : '' }}
                                                                    name="brands[]" class="form-check-input" type="checkbox"
                                                                    id="flexCheckDefault-{{ $brand->id }}"
                                                                    value="{{ $brand->id }}">
                                                                <label class="form-check-label"
                                                                    for="flexCheckDefault-{{ $brand->id }}">
                                                                    {{ $brand->name }}
                                                                </label>
                                                            </span>
                                                        @endforeach
                                                    @else
                                                        @foreach ($brands as $brand)
                                                            <span class="form-check">
                                                                <input name="brands[]" class="form-check-input"
                                                                    type="checkbox"
                                                                    id="flexCheckDefault-{{ $brand->id }}"
                                                                    value="{{ $brand->id }}">
                                                                <label class="form-check-label"
                                                                    for="flexCheckDefault-{{ $brand->id }}">
                                                                    {{ $brand->name }}
                                                                </label>
                                                            </span>
                                                        @endforeach
                                                    @endif

                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <!-- Condition  -->
                                <div class="accordion" id="accordionPanelsStayOpenExample1">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingtwo">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#panelsStayOpen-collapsetwo" aria-expanded="true"
                                                aria-controls="panelsStayOpen-collapsetwo">
                                                {{ __('translate.Condition') }}
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapsetwo" class="accordion-collapse collapse show"
                                            aria-labelledby="panelsStayOpen-headingtwo">
                                            <div style="background-color: #2d2d2d; color:#FFFFFF;" class="accordion-body">
                                                <span class="select-Brand-box two four">

                                                    @if (request()->has('condition'))
                                                        @php
                                                            $condition_arr = request()->get('condition');
                                                        @endphp

                                                        <span class="form-check">
                                                            <input {{ in_array('New', $condition_arr) ? 'checked' : '' }}
                                                                class="form-check-input" type="checkbox" value="New"
                                                                id="new_condition" name="condition[]">
                                                            <label class="form-check-label" for="new_condition">
                                                                {{ __('translate.New') }}
                                                            </label>
                                                        </span>
                                                        <span class="form-check">
                                                            <input {{ in_array('Used', $condition_arr) ? 'checked' : '' }}
                                                                class="form-check-input" type="checkbox" value="Used"
                                                                id="used_condition" name="condition[]">
                                                            <label class="form-check-label" for="used_condition">
                                                                {{ __('translate.Used') }}
                                                            </label>
                                                        </span>
                                                    @else
                                                        <span class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="New"
                                                                id="new_condition" name="condition[]">
                                                            <label class="form-check-label" for="new_condition">
                                                                {{ __('translate.New') }}
                                                            </label>
                                                        </span>
                                                        <span class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="Used" id="used_condition" name="condition[]">
                                                            <label class="form-check-label" for="used_condition">
                                                                {{ __('translate.Used') }}
                                                            </label>
                                                        </span>
                                                    @endif

                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <!-- Offer  -->
                                <div class="accordion" id="accordionPanelsStayOpenExample3">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingfour">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#panelsStayOpen-collapsefour" aria-expanded="true"
                                                aria-controls="panelsStayOpen-collapsefour">
                                                {{ __('translate.Purpose') }}
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapsefour" class="accordion-collapse collapse show"
                                            aria-labelledby="panelsStayOpen-headingfour">
                                            <div style="background-color: #2d2d2d; color:#FFFFFF;" class="accordion-body">
                                                <span class="select-Brand-box two four">

                                                    @if (request()->has('purpose'))
                                                        @php
                                                            $purpose_arr = request()->get('purpose');
                                                        @endphp

                                                        <span class="form-check">
                                                            <input {{ in_array('Rent', $purpose_arr) ? 'checked' : '' }}
                                                                class="form-check-input" type="checkbox" value="Rent"
                                                                id="for_rent" name="purpose[]">
                                                            <label class="form-check-label" for="for_rent">
                                                                {{ __('translate.For Rent') }}
                                                            </label>
                                                        </span>
                                                        <span class="form-check">
                                                            <input {{ in_array('Sale', $purpose_arr) ? 'checked' : '' }}
                                                                class="form-check-input" type="checkbox" value="Sale"
                                                                id="for_sale" name="purpose[]">
                                                            <label class="form-check-label" for="for_sale">
                                                                {{ __('translate.For Sale') }}
                                                            </label>
                                                        </span>
                                                    @else
                                                        <span class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="Rent" id="for_rent" name="purpose[]">
                                                            <label class="form-check-label" for="for_rent">
                                                                {{ __('translate.For Rent') }}
                                                            </label>
                                                        </span>
                                                        <span class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                value="Sale" id="for_sale" name="purpose[]">
                                                            <label class="form-check-label" for="for_sale">
                                                                {{ __('translate.For Sale') }}
                                                            </label>
                                                        </span>
                                                    @endif


                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- Transmission -->
                                <div class="accordion" id="accordionPanelsStayOpenExample4">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="panelsStayOpen-headingfive">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#panelsStayOpen-collapsefive" aria-expanded="true"
                                                aria-controls="panelsStayOpen-collapsefive">
                                                {{ __('translate.Features') }}
                                            </button>
                                        </h2>
                                        <div id="panelsStayOpen-collapsefive" class="accordion-collapse collapse show"
                                            aria-labelledby="panelsStayOpen-headingfive">
                                            <div style="background-color: #2d2d2d; color:#FFFFFF;" class="accordion-body">
                                                <span class="select-Brand-box">
                                                    @if (request()->has('features'))
                                                        @php
                                                            $features_arr = request()->get('features');
                                                        @endphp

                                                        @foreach ($features as $index => $feature)
                                                            <span class="form-check">
                                                                <input
                                                                    {{ in_array($feature->id, $features_arr) ? 'checked' : '' }}
                                                                    class="form-check-input" type="checkbox"
                                                                    value="{{ $feature->id }}" name="features[]"
                                                                    id="feature{{ $index }}">
                                                                <label class="form-check-label"
                                                                    for="feature{{ $index }}">
                                                                    {{ $feature->name }}
                                                                </label>
                                                            </span>
                                                        @endforeach
                                                    @else
                                                        @foreach ($features as $index => $feature)
                                                            <span class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    value="{{ $feature->id }}" name="features[]"
                                                                    id="feature{{ $index }}">
                                                                <label class="form-check-label"
                                                                    for="feature{{ $index }}">
                                                                    {{ $feature->name }}
                                                                </label>
                                                            </span>
                                                        @endforeach
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <input type="hidden" value="{{ request()->get('search') }}" name="search"
                                    id="inside_form_search">

                                <div class="search-here-btn">
                                    <button style="background-color: #007bff;" type="submit"
                                        class="btn btn-dark btn--regular scale--3 py-2 mt-2">{{ __('translate.Search Here') }}</button>
                                </div>

                            </div>


                        </form>



                    </div>


                    <div class="col-lg-9">


                        <section class="blog_listing">
                            <div class="container">
                                <div class="wrapper">

                                    @forelse ($cars as $index => $car)
                                        <div class="item">
                                            <a href="{{ route('listing', $car->slug) }}">
                                                <img style="border-radius: 10px" src="{{ asset($car->thumb_image) }}"
                                                    alt="">
                                                <p style="font-size:1em;"> &nbsp;&nbsp; {{ $car?->brand?->name }}
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                        fill="currentColor" viewbox="0 0 16 16"
                                                        class="bi bi-diamond-fill fs-09 mx-2" style="margin-bottom: 2px;">
                                                        <path fill-rule="evenodd"
                                                            d="M6.95.435c.58-.58 1.52-.58 2.1 0l6.515 6.516c.58.58.58 1.519 0 2.098L9.05 15.565c-.58.58-1.519.58-2.098 0L.435 9.05a1.482 1.482 0 0 1 0-2.098L6.95.435z">
                                                        </path>
                                                    </svg>
                                                    @if ($car->condition == 'New')
                                                        {{ __('translate.New') }}
                                                    @else
                                                        {{ __('translate.Used') }}
                                                    @endif
                                                </p>
                                                <span>

                                                </span>
                                                <h3>{{ html_decode($car->title) }}</h3>
                                                <p> &nbsp;
                                                    <span class="feature--price">
                                                        <small class="fs-10 ms-1"></small>
                                                        @if ($car->offer_price)
                                                            {{ currency($car->offer_price) }}
                                                        @else
                                                            {{ currency($car->regular_price) }}
                                                        @endif
                                                    </span>

                                                </p>
                                                <a class="clickButton" style="vertical-align:middle"
                                                    href="{{ route('listing', $car->slug) }}"> <span>Check Vehicle
                                                    </span></a>
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



                        <hr>


                        @if ($cars->hasPages())
                            {{ $cars->links('pagination_box') }}
                        @endif

                        <hr>
                        
                    </div>
                </div>
            </div>
        </section>

        <!-- Inventory-part-end -->



    </main>
@endsection

@push('js_section')
    <script>
        (function($) {
            "use strict"
            $(document).ready(function() {

                $("#outside_form_search").on("keyup", function(e) {
                    let inputValue = $(this).val();
                    $("#inside_form_search").val(inputValue);
                })

                $("#outside_form_btn").on("click", function(e) {
                    $("#search_form").submit();
                })

                $("#country_id").on("change", function(e) {
                    let country_id = $(this).val();

                    if (country_id) {
                        $.ajax({
                            type: "get",
                            url: "{{ url('cities-by-country') }}" + "/" + country_id,
                            success: function(response) {
                                $("#city_id").html(response)

                            },
                            error: function(response) {
                                let empty_html =
                                    `<option value="">{{ __('translate.Select City') }}</option>`;
                                $("#city_id").html(empty_html)
                            }
                        });
                    } else {
                        let empty_html =
                            `<option value="">{{ __('translate.Select City') }}</option>`;
                        $("#city_id").html(empty_html)
                    }
                })

            });
        })(jQuery);
    </script>
@endpush
