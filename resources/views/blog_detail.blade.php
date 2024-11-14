@extends('layout-1')
@section('title')
    <title>{{ $blog->seo_title }}</title>
    <meta name="title" content="{{ $blog->seo_title }}">
    <meta name="description" content="{{ $blog->seo_description }}">
    @php
        $tags = '';
        if($blog->tags){
            foreach (json_decode($blog->tags) as $blog_tag) {
                $tags .= $blog_tag->value.', ';
            }
        }
    @endphp
     <meta name="keywords" content="{{ $tags }}">
@endsection
@push('style_section')
    <style>
       

    </style>
@endpush

@section('body-content')

<main style="background-color: #2a2a2a; color:#fff;">
    <br>
    <br>
    <hr>
    <br>    

    <section style="padding: 50px 0; background-color: #2a2a2a; color:#fff;">
        <div style="width: 100%; max-width: 1200px; margin: 0 auto; display: flex; gap: 30px; padding: 0 15px;">
            
            <div style="width: 100%; max-width: 100%; padding: 0 15px;">
                <!-- Blog details and content -->
                <div style="border-bottom: 1px solid #e1e1e1; padding-bottom: 15px; margin-bottom: 15px;">
                    <ul style="list-style: none; display: flex; gap: 15px; padding: 0;">
                        <li><a href="javascript:;" style="color: #ffffff; text-decoration: none;">{{ $blog?->author?->name }}</a></li>
                        <li>{{ $blog->created_at->format('d M, Y') }}</li>
                        <li>{{ $blog->total_comment }} {{ __('translate.Comments') }}</li>
                        <li>{{ $blog->views }}+ {{ __('translate.Views') }}</li>
                    </ul>
                </div>
            
                <h2 style="font-size: 30px; font-weight: bold; color: #ffffff;">{{ $blog->title }}</h2>
            
                <div style="margin-top: 20px;">
                    {!! clean($blog->description) !!}
                </div>
            
                <!-- Tag and Share Section -->
                <div style="display: flex; justify-content: space-between; margin-top: 20px;">
                    <div style="display: flex; align-items: center;">
                        <h6 style="margin-right: 10px;">{{ __('translate.Tag') }}:</h6>
                        <ul style="display: flex; list-style: none; padding: 0; gap: 10px;">
                            @foreach (json_decode($blog->tags) as $blog_tag)
                                <li><a href="{{ route('blogs', ['search' => $blog_tag->value]) }}" style="color: #007bff; text-decoration: none;">#{{ $blog_tag->value }}</a></li>
                            @endforeach
                        </ul>
                    </div>
            
                    <div>
                        <h6 style="margin-bottom: 5px;">{{ __('translate.share') }}:</h6>
                        <ul style="display: flex; list-style: none; padding: 0; gap: 10px;">
                            <li><a href="https://twitter.com/share?text={{ $blog->title }}&url={{ route('blog', $blog->slug) }}" target="_blank">Twitter</a></li>
                            <li><a href="https://www.linkedin.com/shareArticle?mini=true&url={{ route('blog', $blog->slug) }}&title={{ $blog->title }}" target="_blank">LinkedIn</a></li>
                            <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ route('blog', $blog->slug) }}&t={{ $blog->title }}" target="_blank">Facebook</a></li>
                            <li><a href="https://www.instagram.com/?url={{ route('blog', $blog->slug) }}" target="_blank">Instagram</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            


            
        </div>
    </section>
    <!-- blogs-rightbar-part-end -->
</main>

@endsection

@push('js_section')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endpush
