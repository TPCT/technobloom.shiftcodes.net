@extends('layouts.main')

@section('title', __('site.About Us'))

@section('content')

    <div
        class="about-header-area"
        style="background-image: url(/images/inner-header.png); background-repeat: no-repeat; background-size: cover; background-position: center;"
    >
        <img
                src="/images/elements1.png"
                alt=""
                class="elements1 aniamtion-key-1"
        />
        <img src="/images/star2.png" alt="" class="star2 keyframe5" />
        <div class="container">
            <div class="row">
                <div class="col-lg-3 m-auto">
                    <div class="about-inner-header heading9 text-center">
                        <h1 data-aos="zoom-in" data-aos-duration="800">@lang('site.About Us')</h1>
                        <a href="{{route('site.index')}}" data-aos="fade-up" data-aos-delay="500"
                        >@lang('site.Home') <i class="fa-solid fa-angle-right"></i>
                            <span>@lang('site.About Us')</span></a
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach($sections as $index => $section)
        @include('Site.about-us-sections.' . $section->slug, ['section' => $section, 'companies_slider' => $companies_slider, 'testimonials' => $testimonials])
    @endforeach

    <div class="cta-section-area">
        <img src="/images/cta-bg1.png" alt="" class="cta-bg1 aniamtion-key-2" />
        <img src="/images/cta-bg2.png" alt="" class="cta-bg2 aniamtion-key-1" />
        <div class="container">
            <div class="row">
                <div class="col-lg-12 m-auto">
                    <div class="cta-header-area text-center sp4 heading2">
                        <h2>
                            {{$about_us_bottom_section->title}}
                        </h2>
                        {!! $about_us_bottom_section->description !!}
                        <div class="btn-area text-center">
                            <a href="{{route('site.contact-us')}}" class="header-btn1"
                            >@lang('site.Free Consultation')
                                <span><i class="fa-solid fa-arrow-right"></i></span
                                ></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection