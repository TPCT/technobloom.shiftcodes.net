@extends('layouts.main')

@section('title', '')

@section('content')


    <div
            class="all-section-bg"
            style="
        background-image: url(/images/pages-bg1.png);
        background-repeat: no-repeat;
        background-size: cover;
      "
    >
        @foreach($sections as $index => $section)
            @include('Site.homepage-sections.' . $section->slug, ['section' => $section, 'testimonials' => $testimonials, 'companies_slider' => $companies_slider])
        @endforeach

            <div class="contact1-section-area sp6" id="contact-us-form">
                <div class="container">
                    @if ($homepage_contact_us_top_section)
                        <div class="row">
                            <div class="col-lg-12 m-auto">
                                <div class="contact-header-area text-center heading2">
                                    <img src="/images/star2.png" alt="" class="star2 keyframe5" />
                                    <img src="/images/star2.png" alt="" class="star3 keyframe5" />
                                    <h2 class="text-anime-style-3">{{$homepage_contact_us_top_section->title}}</h2>
                                    {!! $homepage_contact_us_top_section->description !!}
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-5" data-aos="zoom-out" data-aos-duration="1000">
                            <div class="contact-info-area">
                                @if ($homepage_contact_us_left_section)
                                    <h3>{{$homepage_contact_us_left_section->title}}</h3>
                                    {!! $homepage_contact_us_left_section->description !!}
                                @endif
                                <div class="space32"></div>

                                @if ($map_link = app(\App\Settings\Site::class)->address_map_link)
                                        <div class="contact-auhtor-box">
                                            <div class="icons">
                                                <img src="/images/location2.svg" alt="" />
                                            </div>
                                            <div class="content">
                                                <h4>@lang('site.Our Location')</h4>
                                                <a href="{{$map_link}}"
                                                >{{app(\App\Settings\Site::class)->translate('address')}}</a>
                                            </div>
                                        </div>
                                        <div class="space40"></div>
                                @endif

                                @if ($phone = app(\App\Settings\Site::class)->phone)
                                    <div class="contact-auhtor-box">
                                        <div class="icons">
                                            <img src="/images/phone2.svg" alt="" />
                                        </div>
                                        <div class="content">
                                            <h4>@lang('site.Phone Number')</h4>
                                            <a href="tel:{{$phone}}">{{$phone}}</a>
                                        </div>
                                    </div>
                                    <div class="space40"></div>
                                @endif

                                @if ($email = app(\App\Settings\Site::class)->email)
                                        <div class="contact-auhtor-box">
                                            <div class="icons">
                                                <img src="/images/email2.svg" alt="" />
                                            </div>
                                            <div class="content">
                                                <h4>@lang('site.Email Address')</h4>
                                                <a href="mailto:{{$email}}">{{$email}}</a>
                                            </div>
                                        </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-7" data-aos="zoom-out" data-aos-duration="1200">

                            <div class="contact-boxarea">
                                @if($success_message = session('success'))
                                    <div class="my-3 alert alert-success">
                                        <span class="">{{$success_message}}</span>
                                    </div>
                                @endif
                                @if($homepage_contact_us_right_section)
                                    <h3>{{$homepage_contact_us_right_section->title}}</h3>
                                    {!! $homepage_contact_us_right_section->description !!}
                                @endif
                                <form action="{{route('site.index')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-area">
                                                <input
                                                        type="text"
                                                        placeholder="@lang('site.First Name')"
                                                        name="first_name"
                                                        required=""
                                                />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-area">
                                                <input
                                                        type="text"
                                                        placeholder="@lang('site.Last Name')"
                                                        name="last_name"
                                                        required=""
                                                />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-area">
                                                <input
                                                        type="email"
                                                        placeholder="@lang('site.Email Address')"
                                                        name="email"
                                                        required=""
                                                />
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="input-area">
                                                <input
                                                        type="number"
                                                        placeholder="@lang('site.Phone Number')"
                                                        name="phone_number"
                                                        required=""
                                                />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-area">
                                                <textarea
                                                        placeholder="@lang('site.Your Message')"
                                                        name="message"
                                                        required=""
                                                ></textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            @if (app(\App\Settings\Site::class)->enable_captcha)
                                                <div class="form-group mb-2">
                                                    {!! \Anhskohbo\NoCaptcha\Facades\NoCaptcha::display() !!}
                                                    @if ($errors->has('g-recaptcha-response'))
                                                        <span class="text-danger">
                                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="input-area">
                                                <button class="header-btn1">
                                                    @lang('site.Free Consultation')
                                                    <span><i class="fa-solid fa-arrow-right"></i></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div class="cta-section-area">
        <img src="images/cta-bg1.png" alt="" class="cta-bg1 aniamtion-key-2" />
        <img src="images/cta-bg2.png" alt="" class="cta-bg2 aniamtion-key-1" />
        <div class="container">
            <div class="row">
                <div class="col-lg-12 m-auto">
                    <div class="cta-header-area text-center sp4 heading2">
                        <h2 class="text-anime-style-3">
                            {{$homepage_bottom_section->title}}
                        </h2>
                        <div data-aos="fade-up" data-aos-duration="1000">
                            {!! $homepage_bottom_section->description !!}
                        </div>
                        <div
                                class="btn-area text-center"
                                data-aos="fade-up"
                                data-aos-duration="1200"
                        >
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