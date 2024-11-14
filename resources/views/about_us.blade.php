@extends('layout-1')
@section('title')
<title>{{ $seo_setting->seo_title }}</title>
<meta name="title" content="{{ $seo_setting->seo_title }}">
<meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description)) !!}">
@endsection

@section('body-content')

<section style="background-color: #2a2a2a; color:#fff;" id="feature--section" class="section--spacing bg--cover first--section"
        >
        <div class="container z-1">
            <div class="row align-items-center">
                <div class="col-12 position-relative">
                    <h1 class="display-6 text-center heading-font mb-0" data-aos="zoom-out" data-aos-duration="600"
                        data-aos-delay="200" data-aos-once="true">About Us</h1>
                </div>
                <div class="col-12 position-relative mb-4 pb-3">
                    <div class="d-flex justify-content-center align-items-center">
                        <hr class="hr--colored" style="border-color: var(--color-black);">
                        <hr class="hr--colored" style="border-color: var(--bs-teal);width: 3%;">
                        <hr class="hr--colored" style="border-color: var(--bs-teal);width: 3%;">
                    </div>
                </div>
                <div class="col-12 col-lg-5 text-center" data-aos="zoom-out" data-aos-duration="600"
                    data-aos-delay="150" data-aos-once="true"><iframe id="map"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7384.4012650722625!2d51.4127807!3d25.282477102312086!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sen!2sqa!4v1701875114944!5m2!1sen!2sqa"
                        height="500" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe></div>
                <div class="col-12 col-lg-7" data-aos="fade-up" data-aos-duration="600" data-aos-delay="150"
                    data-aos-once="true" style="border-left: 2px solid var(--bg-theme-dark);border-radius: 2px;">
                    <div class="w-100 px-2 px-lg-4 my-2 scale--3 mt-5 mt-lg-0">
                        <h5 class="d-flex align-items-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                height="1em" fill="currentColor" viewbox="0 0 16 16"
                                class="bi bi-info-circle-fill fs-4 fill--green me-3">
                                <path
                                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z">
                                </path>
                            </svg>About Dealership</h5>
                        <p>{{ $homepage->home3_intro_des }}<br></p>
                        <hr class="mt-4 mb-4" style="border-color: #d1d1d1;">
                        <h5 class="d-flex align-items-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                height="1em" fill="currentColor" viewbox="0 0 16 16"
                                class="bi bi-envelope fs-4 fill--green me-3">
                                <path fill-rule="evenodd"
                                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z">
                                </path>
                            </svg>Email Address</h5>
                        <p class="mb-1">sales@dealership.sa<br></p>
                        <p class="mb-4">{{ $setting->email }}<br></p>
                        <h5 class="d-flex align-items-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em"
                                height="1em" fill="currentColor" viewbox="0 0 16 16"
                                class="bi bi-telephone-outbound fs-4 fill--green me-3">
                                <path
                                    d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM11 .5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0V1.707l-4.146 4.147a.5.5 0 0 1-.708-.708L14.293 1H11.5a.5.5 0 0 1-.5-.5z">
                                </path>
                            </svg>Our Contacts</h5>
                        <p class="mb-1">+ 971 55 182853<br></p>
                        <p class="mb-0">{{ $setting->phone }}<br></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

{{-- <main>
    
    
    <section style="padding: 50px 0;">
        <div style="max-width: 1140px; margin: 0 auto;">
            <div style="display: flex; align-items: center;">
                <div style="flex: 1; padding-right: 30px;">
                    <img src="{{ asset($about_us->about_image) }}" alt="img" style="width: 100%; border-radius: 5px;">
                </div>
                <div style="flex: 2; padding-left: 30px;">
                    <div style="font-size: 1.5rem; font-weight: bold;">
                        <span>{{ $about_us->header }}</span>
                    </div>
                    <h2 style="font-size: 2rem; margin-top: 20px;">{{ $about_us->title }}</h2>
                    <div style="margin-top: 20px;">
                        {!! clean($about_us->description) !!}
                    </div>
                    <div style="display: flex; margin-top: 30px;">
                        <div style="display: flex; align-items: center; margin-right: 20px;">
                            <img src="{{ asset($about_us->car_image) }}" alt="img" style="width: 50px; margin-right: 10px;">
                            <div>
                                <h6>{{ $about_us->total_car }}</h6>
                                <p>{{ $about_us->total_car_title }}</p>
                            </div>
                        </div>
                        <div style="display: flex; align-items: center;">
                            <img src="{{ asset($about_us->review_image) }}" alt="img" style="width: 50px; margin-right: 10px;">
                            <div>
                                <h6>{{ $about_us->total_review }}</h6>
                                <p>{{ $about_us->total_review_title }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section style="padding: 50px 0;">
        <div style="max-width: 1140px; margin: 0 auto;">
            <div style="display: flex; align-items: flex-end;">
                <div style="flex: 1;">
                    <div style="font-size: 1.5rem; font-weight: bold;">
                        <span>{{ ('Brands') }}</span>
                    </div>
                    <h2 style="font-size: 2rem;">{{ __('translate.Explore Popular Brand') }}</h2>
                </div>
            </div>

            <div style="display: flex; flex-wrap: wrap; margin-top: 30px;">
                @foreach ($brands->take(6) as $index => $brand)
                <div style="flex: 0 0 16.666%; padding: 10px; text-align: center;">
                    <a href="{{ route('listings', ['brands[]' => $brand->id]) }}" style="display: block;">
                        <img src="{{ getImageOrPlaceholder($brand->image,'180x90') }}" alt="logo" style="width: 100%; height: auto; margin-bottom: 10px;">
                        <p>{{ $brand->name }}</p>
                        <h5>{{ $brand->total_car }}</h5>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    
    <section style="background-image: url({{ asset($homepage->video_bg_image) }}); padding: 50px 0; background-size: cover;">
        <div style="max-width: 1140px; margin: 0 auto; display: flex; align-items: center;">
            <div style="flex: 1;">
                <div style="font-size: 1.5rem; font-weight: bold;">
                    <span>{{ $homepage->video_short_title }}</span>
                </div>
                <h2>{{ $homepage->video_title }}</h2>
                <a href="{{ route('contact-us') }}" style="display: inline-block; padding: 10px 20px; background-color: #555; color: white; border-radius: 5px; text-decoration: none; margin-top: 20px;">{{ __('translate.Contact Us') }}</a>
            </div>
            <div style="flex: 1; text-align: center;">
                <a href="https://youtu.be/{{ $homepage->video_id }}" class="my-video-links" data-autoplay="true" data-vbtype="video">
                    <span style="display: inline-block; background-color: #555; border-radius: 50%; width: 60px; height: 60px; color: white; font-size: 2rem; line-height: 60px; text-align: center;">▶</span>
                </a>
            </div>
        </div>
    </section>
    
    <section style="padding: 50px 0; text-align: center;">
        <div style="max-width: 1140px; margin: 0 auto;">
            <div style="font-size: 2rem; font-weight: bold;">
                <span>{{ $homepage->callus_header1 }}</span>
            </div>
            <span>{{ $homepage->callus_header2 }}</span>
            <h3 style="font-size: 1.5rem; margin-top: 20px;">
                <a href="tel:{{ $homepage->callus_phone }}" style="color: inherit; text-decoration: none;">{{ $homepage->callus_phone }}</a>
            </h3>
            <div style="margin-top: 30px;">
                <img src="{{ getImageOrPlaceholder($homepage->callus_image, '1350x395') }}" alt="img" style="width: 100%; border-radius: 5px;">
            </div>
        </div>
    </section>
</main> --}}




@endsection
