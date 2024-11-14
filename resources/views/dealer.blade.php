@extends('layout-1')
@section('title')
    <title>{{ $seo_setting->seo_title }}</title>
    <meta name="title" content="{{ $seo_setting->seo_title }}">
    <meta name="description" content="{!! strip_tags(clean($seo_setting->seo_description)) !!}">
@endsection
@push('style_section')
    <style>
        @import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,600);
        @import url(https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css);

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

        .snip1344 {
            font-family: "Open Sans", Arial, sans-serif;
            position: relative;
            overflow: hidden;
            margin: 10px;
            min-width: 230px;
            max-width: 315px;
            width: 100%;
            color: #ffffff;
            text-align: center;
            line-height: 1.4em;
            background-color: #141414;
        }

        .snip1344 * {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-transition: all 0.25s ease;
            transition: all 0.25s ease;
        }

        .snip1344 .background {
            width: 100%;
            vertical-align: top;
            opacity: 0.2;
            -webkit-filter: grayscale(100%) blur(10px);
            filter: grayscale(100%) blur(10px);
            -webkit-transition: all 2s ease;
            transition: all 2s ease;
        }

        .snip1344 figcaption {
            width: 100%;
            padding: 15px 25px;
            position: absolute;
            left: 0;
            top: 50%;
        }

        .snip1344 .profile {
            border-radius: 50%;
            position: absolute;
            bottom: 50%;
            left: 50%;
            max-width: 100px;
            opacity: 1;
            box-shadow: 3px 3px 20px rgba(0, 0, 0, 0.5);
            border: 2px solid rgba(255, 255, 255, 0.5);
            -webkit-transform: translate(-50%, 0%);
            transform: translate(-50%, 0%);
        }

        .snip1344 h3 {
            margin: 0 0 5px;
            font-weight: 400;
        }

        .snip1344 h3 span {
            display: block;
            font-size: 0.6em;
            color: #f39c12;
            opacity: 0.75;
        }

        .snip1344 i {
            padding: 10px 5px;
            display: inline-block;
            font-size: 32px;
            color: #ffffff;
            text-align: center;
            opacity: 0.65;
        }

        .snip1344 a {
            text-decoration: none;
        }

        .snip1344 i:hover {
            opacity: 1;
            -webkit-transition: all 0.35s ease;
            transition: all 0.35s ease;
        }

        .snip1344:hover .background,
        .snip1344.hover .background {
            -webkit-transform: scale(1.3);
            transform: scale(1.3);
        }
        
    </style>
@endpush
@section('body-content')
    <main style="background-color: #2a2a2a; color:#fff;">

        <br /><br /><br /><br />


        <section>
            <div style="width: 100%; margin-right: auto; margin-left: auto;">
                
                <div style="display: flex; flex-wrap: nowrap; justify-content: space-between; align-items: center; margin-right: -15px; margin-left: -15px;">
                    <div style="flex: 1; padding-right: 15px; padding-left: 15px;">
                        <form action="{{ route('dealers') }}" style="display: flex; flex-wrap: nowrap; gap: 10px;">
                            <!-- Input Field -->
                            <div style="flex: 1;">
                                <input name="search" value="{{ request()->get('search') }}" type="text"
                                    style="display: block; width: 100%; padding: .375rem .75rem; font-size: 1rem; line-height: 1.5; color: #fff; background-color: #2a2a2a; background-clip: padding-box; border: 1px solid #ced4da; border-radius: .25rem;"
                                    id="exampleFormControlInput1"
                                    placeholder="{{ __('translate.Dealers name/username') }}">
                            </div>
                            <!-- Select Field -->
                            <div style="flex: 1;">
                                <select
                                    style="display: block; width: 100%; padding: .375rem 1.75rem .375rem .75rem; font-size: 1rem; line-height: 1.5; color: #fff; background-color: #2a2a2a; background-clip: padding-box; border: 1px solid #ced4da; border-radius: .25rem;"
                                    name="location">
                                    <option selected value=""> {{ __('translate.Select City') }} </option>
                                    @foreach ($cities as $city)
                                        <option {{ request()->get('location') == $city->id ? 'selected' : '' }}
                                            value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Submit Button -->
                            <div style="flex: 0;">
                                <button type="submit" 
                                        class="btn btn-dark btn--regular scale--3 py-2 mt-2"
                                        style="background-color: #080808; color: #fff; border: none; border-radius: .25rem; padding: 10px; cursor: pointer;">
                                    {{ __('translate.Search Now') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div style="display: flex; flex-wrap: wrap; margin-right: -15px; margin-left: -15px;">
                    @forelse ($dealers as $index => $dealer)
                        

                        <figure style="padding-right:3px" class="snip1344">
                            <img
                                src="{{ getImageOrPlaceholder($dealer->image, '80x80') }}"
                                alt="profile-sample1" class="background" />
                                <img
                                src="{{ getImageOrPlaceholder($dealer->image, '80x80') }}"
                                alt="profile-sample1" class="profile" />
                            <figcaption>
                                <h3><a href="{{ route('dealer', $dealer->username) }}">{{ html_decode($dealer->name) }}</a>
                                    @php
                                            $kyc = Modules\Kyc\Entities\KycInformation::where('user_id', $dealer->id)
                                                ->where('status', 1)
                                                ->first();
                                        @endphp
                                        @if ($kyc)
                                                <span style="color: green; font-size: 1rem; margin-left: 5px;"></span>
                                        @endif
                                    <span>Total car: {{ $dealer->total_car }}</span>
                                    <span> {{ html_decode($dealer->address) }} </span>
                                </h3>
                                <div class="icons">
                                    <a href="mailto:{{ html_decode($dealer->email) }}"><i class="ionicons ion-email"></i></a>
                                    <a href="call:{{ html_decode($dealer->phone) }}"><i class="ionicons ion-android-call"></i></a>
                                    <a href="{{ route('dealer', $dealer->username) }}"><i class="ionicons ion-android-send"></i></a>
                                </div>
                            </figcaption>
                        </figure>
                
                    @empty
                        <p>No dealers found.</p>
                    @endforelse
                </div>
            </div>



        </section>

    </main>
@endsection
@push('js_section')
    <script>
        /* Demo purposes only */
        $(".hover").mouseleave(
            function() {
                $(this).removeClass("hover");
            }
        );
    </script>
@endpush
