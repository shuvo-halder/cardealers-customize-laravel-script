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

    </style>
@endpush

@section('body-content')
    <main style="background-color: #2a2a2a; color:#fff;">
        <!-- banner-part-start -->
        <br /> <br />
        <hr /><br>

        <!-- blogs-rightbar-part-start -->
        <section class="blogs-rightbar">
            <div class="container" style="width: 100%; padding: 0 15px;">
                <div class="row" style="display: flex; flex-wrap: wrap;">

                    <section class="blog_listing col-lg-9" style="flex: 0 0 75%; max-width: 75%;">
                        <div class="container">
                            <div class="wrapper">

                                @forelse ($blogs as $index => $blog)
                                    <div class="item">
                                        <a href="">
                                            <img style="border-radius: 10px" src="{{ getImageOrPlaceholder($blog->image, '336x210') }}"
                                                alt="{{ $blog->title ?? 'Blog image' }}">
                                            <p style="font-size:1em;"> &nbsp;&nbsp;{{ __('translate.By') }} {{ $blog?->author?->name }}
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                    fill="currentColor" viewbox="0 0 16 16"
                                                    class="bi bi-diamond-fill fs-09 mx-2" style="margin-bottom: 2px;">
                                                    <path fill-rule="evenodd"
                                                        d="M6.95.435c.58-.58 1.52-.58 2.1 0l6.515 6.516c.58.58.58 1.519 0 2.098L9.05 15.565c-.58.58-1.519.58-2.098 0L.435 9.05a1.482 1.482 0 0 1 0-2.098L6.95.435z">
                                                    </path>
                                                </svg>
                                                {{ $blog->total_comment }}{{ __('translate.Comments') }}

                                            </p>
                                            <span>

                                            </span>
                                            <h3>{{ $blog->title }}</h3>
                                            <div class="blog-item-btn" style="margin-top: 15px;">
                                                <a href="{{ route('blog', $blog->slug) }}"
                                                    style="text-decoration: none; color: #007bff;">{{ __('translate.Learn More') }}<span></span></a>
                                            </div>

                                        </a>
                                    </div>
                                @empty
                                    <div class="col-12" style="width: 100%;">
                                        <div class="not-found-box" style="text-align: center;">
                                            <div class="not-found-thumb-main" style="margin-bottom: 20px;">
                                                <div class="not-fount-main-thumb"
                                                    style="font-size: 50px; color: #e0e0e0;">
                                                    <span></span>
                                                </div>
                                            </div>
                                            <div class="not-found-txt-main">
                                                <h4 class="not-found-txt"
                                                    style="font-size: 22px; font-weight: bold; color: #333;">
                                                    {{ __('translate.Blog Not Found!') }}</h4>
                                                <p class="not-found-sub-txt" style="color: #777;">
                                                    {{ __('translate.Whoops... this information is not available for a  moment') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </section>

                    

                    <div class="col-lg-3 col-md-4 col-sm-6 col-12" style="padding-left: 30px;">
                        <!-- Search Form Section -->
                        <div class="blogs-rightbar-item" style="margin-bottom: 30px;">
                            <h3 class="blogs-rightbar-taitel" style="font-size: 20px; font-weight: bold; margin-bottom: 15px; color: white;">
                                {{ __('translate.Search') }}
                            </h3>
                            <div class="blogs-rightbar-sarch-box">
                                <form action="" style="display: flex; flex-wrap: nowrap; align-items: center; position: relative;">
                                    <!-- Input Field -->
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        placeholder="{{ __('translate.Type here') }}" name="search"
                                        value="{{ request()->get('search') }}"
                                        style="padding: 10px; margin-bottom: 10px; border: 1px solid #ddd; background-color: #000; color: white; flex: 1;">
                                    
                                    <!-- Submit Button -->
                                    <button type="submit" class="sarch-btn"
                                        style="background-color: #007bff; display:flex; color: white; padding: 10px; border: none; cursor: pointer; position: absolute; right: 0; height: 80%; display: flex; align-items: center; justify-content: center;">
                                        <span>{{ __('translate.Search Now') }}</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    
                        <!-- Popular Blog Section -->
                        <div class="blogs-rightbar-item two" style="margin-bottom: 30px;">
                            <h3 class="blogs-rightbar-taitel" style="font-size: 20px; font-weight: bold; margin-bottom: 15px; color: white;">
                                {{ __('translate.Popular Blog') }}
                            </h3>
                            <div class="blogs-list-item">
                                @foreach ($popular_blogs as $popular_blog)
                                    <div class="blogs-list-inner" style="display: flex; margin-bottom: 15px;">
                                        <div class="blogs-list-img" style="flex: 0 0 60px; max-width: 60px;">
                                            <img src="{{ asset($popular_blog->image) }}" alt="img"
                                                style="width: 100%; height: auto; border-radius: 4px;">
                                        </div>
                                        <div class="blogs-list-text" style="flex: 1; padding-left: 10px;">
                                            <a href="{{ route('blog', $popular_blog->slug) }}"
                                                style="text-decoration: none; font-weight: bold; color: #fff;">{{ $popular_blog->title }}</a>
                                            <div class="blogs-list-text-item"
                                                style="font-size: 12px; color: #777; margin-top: 5px;">
                                                <h6 style="margin: 0;">{{ $popular_blog->created_at->format('d M, Y') }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    
                        <!-- Categories Section -->
                        <div class="blogs-rightbar-item two" style="margin-bottom: 30px;">
                            <h3 class="blogs-rightbar-taitel" style="font-size: 20px; font-weight: bold; margin-bottom: 15px; color: white;">
                                {{ __('translate.Categories') }}
                            </h3>
                            <ul class="brand-categories" style="padding: 0; list-style: none; margin: 0;">
                                @foreach ($categories as $category)
                                    <li style="margin-bottom: 10px;">
                                        <a href="{{ route('blogs', ['category' => $category->slug]) }}"
                                            style="text-decoration: none; color: white;">
                                            {{ $category->name }} <span style="color: #777;">({{ $category->total_blog }})</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    
                        <!-- Social Media Section -->
                        <div class="blogs-rightbar-item two" style="margin-bottom: 30px;">
                            <h3 class="blogs-rightbar-taitel" style="font-size: 20px; font-weight: bold; margin-bottom: 15px; color: white;">
                                {{ __('translate.Follow Us') }}
                            </h3>
                            <ul class="blogs-rightbar-social-link" style="list-style: none; padding: 0;">
                                <li style="margin-bottom: 10px;">
                                    <a href="{{ $setting->twitter }}" target="_blank"
                                        style="text-decoration: none; color: #1DA1F2;">
                                        <span>
                                            <!-- Twitter SVG Icon here -->
                                        </span>
                                    </a>
                                </li>
                                <li style="margin-bottom: 10px;">
                                    <a href="{{ $setting->linkedin }}" target="_blank"
                                        style="text-decoration: none; color: #0077b5;">
                                        <span>
                                            <!-- LinkedIn SVG Icon here -->
                                        </span>
                                    </a>
                                </li>
                                <li style="margin-bottom: 10px;">
                                    <a href="{{ $setting->facebook }}" target="_blank"
                                        style="text-decoration: none; color: #3b5998;">
                                        <span>
                                            <!-- Facebook SVG Icon here -->
                                        </span>
                                    </a>
                                </li>
                                <li style="margin-bottom: 10px;">
                                    <a href="{{ $setting->instagram }}" target="_blank"
                                        style="text-decoration: none; color: #C13584;">
                                        <span>
                                            <!-- Instagram SVG Icon here -->
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    
                </div>
                <hr>
                @if ($blogs->hasPages())
                    {{ $blogs->links('pagination_box') }}
                @endif
                <hr>
            </div>
        </section>
        <!-- blogs-rightbar-part-end -->
    </main>
@endsection
