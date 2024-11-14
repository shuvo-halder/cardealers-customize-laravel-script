@extends('layout-1')
@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
    <meta name="title" content="{{ $seo_setting->seo_title }}">
    <meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description)) !!}">
@endsection


@section('body-content')
    {{-- hero section --}}
    <section id="hero--section" class="hero--section" style="padding-top: 90px;">
        <div class="carousel slide carousel-fade hero--slider z--1" data-bs-ride="carousel" data-bs-pause="false"
            data-bs-keyboard="false" data-bs-touch="false" id="hero--slider">
            <div class="carousel-inner h-100">
                <div class="carousel-item active"><img class="w-100 d-block" src="images/Hero-cover-1.jpg"
                        alt="Slide Image"></div>
                <div class="carousel-item"><img class="w-100 d-block" src="{{ asset('frontendDellar/images/Hero-cover-2.jpg') }}" alt="Slide Image">
                </div>
                <div class="carousel-item"><img class="w-100 d-block" src="{{ asset('frontendDellar/images/Hero-cover-4.jpg') }}" alt="Slide Image">
                </div>
            </div>
        </div>
        <div id="hero--overlay" class="hero--overlay z--1"></div>
        <div class="text-center d-sm-none dream--button" data-aos="zoom-out" data-aos-duration="950" data-aos-delay="200"><a
                class="btn btn-success btn--regular py-2 px-3 mt-2" role="button" href="stock.html"
                style="border-radius: 60px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                    fill="currentColor" viewbox="0 0 16 16" class="bi bi-key me-2 fs-13 key--icon">
                    <path
                        d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z">
                    </path>
                    <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"></path>
                </svg>Find Your Dream Vehicle</a></div>
        <div class="container" id="hero--content">
            <div class="row mt-5 pt-4">
                <div class="col-12 col-sm-8 col-md-6 col-lg-4 d-sm-block position-relative">
                    <div class="d-none d-sm-block overlay--blur z--1 rounded-1" id="form--overlay"></div>
                    <div class="d-none d-sm-block hero--search" data-aos="zoom-out" data-aos-duration="950"
                        data-aos-delay="200">
                        <h3 class="text-center mb-4 pb-3 fw-bold">Search Inventory</h3><label
                            class="form-label form--label">Vehicle Maker</label>
                        <div class="select--single-wrapper mb-4">
                            <select class="form--select2">
                                
                                    @foreach ($new_cars as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand?->brand?->name }}</option>
                                    @endforeach
                                    
                            </select>
                        </div><label class="form-label form--label">Manufacture Year</label>
                        <div class="select--single-wrapper mb-4"><select class="form--select2">
                                <option value=""></option>
                                <option value="2024">2024</option>
                                <option value="2023">2023</option>
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                            </select></div>
                        <div class="d-block text-center">
                            <a class="btn btn-dark btn--regular scale--3 py-2 px-3 mt-2" href="{{ route('listings') }}"
                                role="button" href="stock.html"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                    height="1em" fill="currentColor" viewbox="0 0 16 16" class="bi bi-search me-2">
                                    <path
                                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z">
                                    </path>
                                </svg>Search</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- end hero section --}}

    {{-- future section start --}}
    <section style="background-color: #2a2a2a; color:#fff;" id="feature--section" class="section--spacing bg--cover"
        style='background-image: url("assets/img/Backgrounds/whitegrey.svg");'>
        <div class="container">
            <div class="row">
                <div class="col-12 position-relative">
                    <h1 class="display-5 text-center heading-font mb-0" data-aos="zoom-out" data-aos-duration="600"
                        data-aos-delay="200" data-aos-once="true">Featured Vehicles</h1>
                </div>
                <div class="col-12 position-relative mb-5 pb-4">
                    <div class="d-flex justify-content-center align-items-center">
                        <hr class="hr--colored" style="border-color: var(--color-black);">
                        <hr class="hr--colored" style="border-color: var(--color-black);">
                        <hr class="hr--colored" style="border-color: var(--color-black);">
                        <hr class="hr--colored" style="border-color: var(--bs-teal);width: 3%;">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($new_cars as $car)
                <div class="col-12 col-sm-10 col-md-6 col-lg-4" data-aos="zoom-out" data-aos-duration="600" data-aos-delay="200">
                    <div style="background-color: #151515;" class="feature--card">
                        <a class="btn btn-success btn--regular scale--3 btn--order mb-2" role="button" href="tel:{{ $setting->phone }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" class="bi bi-whatsapp fs-5 me-2">
                                <path
                                    d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z">
                                </path>
                            </svg>Get Vehicle
                        </a>
                            <img src="{{ asset($car->thumb_image) }}">
                        <div  class="feature--card-content scale--4">
                            <div class="d-flex align-items-center justify-content-center mb-3">
                                <span class="fw-semibold fs-13 text--green">{{ $car?->brand?->name }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" class="bi bi-diamond-fill fs-09 mx-2" style="margin-bottom: 2px;">
                                    <path fill-rule="evenodd"
                                        d="M6.95.435c.58-.58 1.52-.58 2.1 0l6.515 6.516c.58.58.58 1.519 0 2.098L9.05 15.565c-.58.58-1.519.58-2.098 0L.435 9.05a1.482 1.482 0 0 1 0-2.098L6.95.435z">
                                    </path>
                                </svg>
                                <span class="fw-semibold fs-13">
                                    @if ($car->condition == 'New')
                                        <p class="text text-two ">{{ __('translate.New') }}</p>
                                    @else
                                        <p class="text text-two ">{{ __('translate.Used') }}</p>
                                    @endif
                                </span>
                            </div>
                            <h5 class="text-center fw-semibold mb-3">
                                
                                    <h3><strong>{{ html_decode($car->title) }}</strong></h3>
                                
                                <br>
                            </h5>
                            <p class="text-center fs-15">Resilient from the ground up.<br></p>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="feature--price">
                                    <small class="fs-10 ms-1">$</small>
                                    @if ($car->offer_price)
                                        {{ currency($car->offer_price) }}
                                    @else
                                        {{ currency($car->regular_price) }}
                                    @endif
                                </span>
                                <a class="btn btn--regular fs-13 fw-semibold scale--3 mb-2 pb-1" role="button" href="{{ route('listing', $car->slug) }}">Check Vehicle
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16" class="bi bi-chevron-double-right ms-1 fs-12">
                                        <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                        <path fill-rule="evenodd"
                                            d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
                <br>
                <br>
                <div style="display: flex; justify-content: center; flex-wrap: wrap; padding: 0;">
                    <a 
                        style="display: inline-block; background-color: #343a40; color: #fff; font-size: 16px; padding: 0.5rem 1rem; margin-top: 10px; text-align: center; border-radius: 4px; text-decoration: none; transition: transform 0.3s ease, box-shadow 0.3s ease;"
                        href="{{ route('listings') }}" 
                        role="button" 
                        data-aos="fade-up" 
                        data-aos-duration="450" 
                        data-aos-delay="150"
                        onmouseover="this.style.transform='scale(1.1)'; this.style.boxShadow='0 4px 6px rgba(0, 0, 0, 0.1)'" 
                        onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='none'"
                    >
                        {{ __('translate.View More Car List') }}
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" style="margin-left: 0.5rem; font-size: 1.125rem;">
                            <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"></path>
                            <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"></path>
                        </svg>
                    </a>
                </div>
                
                
            </div>
            
            
            
        </div>
    </section>
    {{-- end future section --}}

    <section style="background-color: #2a2a2a; color:#fff;"  id="windows--section" class="bg--cover mb-0"
        style='background-image: url("assets/img/Hero/cover-2.jpg");background-attachment: fixed;margin-bottom: 100px;'>
        <div class="container-fluid px-0">
            <div class="row g-0">
                <div class="col-12 col-sm-6 col-md-5 col-lg-4">
                    <div data-aos="zoom-in" data-aos-duration="600" data-aos-delay="200" data-aos-once="true"
                        class="windows--div scale--3" style="background-color: #111;">
                        <div class="text-white w-100 py-4 px-4">
                            <h5 class="d-flex align-items-center text-uppercase"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16"
                                    class="bi bi-info-circle fill--gold me-3">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                    </path>
                                    <path
                                        d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z">
                                    </path>
                                </svg>About dealership</h5>
                            <p class="mb-4">{{ $homepage->home3_intro_des }}<br></p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-5 col-lg-4 col-xxl-3 offset-md-2 offset-lg-3">
                    <div data-aos="zoom-in" data-aos-duration="600" data-aos-delay="200" class="windows--div scale--3"
                        style="background-color: rgba(17,17,17,0.75);">
                        <div class="text-white w-100 py-4 px-4">
                            <h5 class="d-flex align-items-center text-uppercase"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16"
                                    class="bi bi-envelope fs-4 fill--gold me-3">
                                    <path fill-rule="evenodd"
                                        d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z">
                                    </path>
                                </svg>Email Address</h5>
                            <p class="mb-1"><a href="mailto:{{ $setting->email }}">{{ $setting->email }}</a><br></p>
                            <p class="mb-4"><a href="mailto:support@dealership.sa">support@dealership.sa</a><br></p>
                            <h5 class="d-flex align-items-center text-uppercase"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="1em" height="1em" fill="currentColor" viewbox="0 0 16 16"
                                    class="bi bi-telephone-outbound fill--gold me-3">
                                    <path
                                        d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5z">
                                    </path>
                                </svg>Our Contacts</h5>
                            <p class="mb-1"><a href="tel:{{ $setting->phone }}">{{ $setting->phone }}</a><br></p>
                            <p class="mb-0"><a href="tel:+ 971 66 258510">+ 971 66 258510</a><br></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section style="background-color: #2a2a2a; color:#fff;"  id="reviews--seciton" class="bg--cover"
        style='padding-top: 80px;padding-bottom: 120px;/*background-color: #e7e7e7;*/background-image: url("assets/img/Backgrounds/plubs-gold.svg");'>
        <div class="container">
            <div class="row">
                <div class="col-12 position-relative">
                    <h1 class="display-5 text-center heading-font mb-0" data-aos="zoom-out" data-aos-duration="600"
                        data-aos-delay="200" data-aos-once="true">Testimonials</h1>
                </div>
                <div class="col-12 position-relative mb-5 pb-1">
                    <div class="d-flex justify-content-center align-items-center">
                        <hr class="hr--colored" style="border-color: var(--color-black);">
                        <hr class="hr--colored" style="border-color: var(--bs-teal);width: 20%;">
                        <hr class="hr--colored" style="border-color: var(--bs-teal);">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200">
                    <div class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-pause="false"
                        data-bs-keyboard="false" id="reviews--carousel">
                        <div class="carousel-inner">
                            @foreach ($testimonials as $index => $testimonial)
                                <div class="carousel-item active">
                                    <div class="row g-0 justify-content-center">
                                        <div class="col-12 col-md-10 col-lg-8">
                                            <div id="single--review-1" class="review--wrap scaleimg--2">
                                                <div class="d-flex align-items-sm-end mb-3 flex-column flex-sm-row">
                                                    <img
                                                        class="me-sm-4 mb-4 mb-sm-0" src="{{ asset($testimonial->image) }}">
                                                    <div class="d-block w-100">
                                                        <h4 class="w-100 d-flex">{{ $testimonial->name }}</h4>
                                                        <p class="mb-0">{{ $testimonial->designation }}</p>
                                                    </div>
                                                </div>
                                                <p class="truncate-3l">
                                                    {{ $testimonial->comment }}
                                                    <br>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            {{-- <div class="carousel-item">
                                <div class="row g-0 justify-content-center">
                                    <div class="col-12 col-md-10 col-lg-8">
                                        <div id="single--review-2" class="review--wrap scaleimg--2">
                                            <div class="d-flex align-items-sm-end mb-3 flex-column flex-sm-row"><img
                                                    class="me-sm-4 mb-4 mb-sm-0" src="images/Reviewers-2.jpg">
                                                <div class="d-block w-100">
                                                    <h4 class="w-100 d-flex">Muhammed Yasir Ahmed</h4>
                                                    <p class="mb-0">General Manager at Tesla</p>
                                                </div>
                                            </div>
                                            <p class="truncate-3l">Lorem, ipsum dolor sit amet consectetur adipisicing
                                                elit. Doloribus ullam dolore, officia quod nisi aliquam nemo voluptas!
                                                Pariatur ipsum nihil saepe laudantium quibusdam similique vel!<br></p>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
