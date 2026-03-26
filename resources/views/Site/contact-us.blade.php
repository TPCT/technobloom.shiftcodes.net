@extends('layouts.main')

@section('title', __('site.Contact Us'))

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
                        <h1 data-aos="zoom-in" data-aos-duration="800">@lang('site.Contact Us')</h1>
                        <a href="{{route('site.index')}}" data-aos="fade-up" data-aos-delay="500"
                        >@lang('site.Home') <i class="fa-solid fa-angle-right"></i>
                            <span>@lang('site.Contact Us')</span></a
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-main-inner-area sp1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="heading2 contact-header">
                        <h5>{{$contact_us_form_section->title}}</h5>
                        <h2>{{$contact_us_form_section->second_title}}</h2>
                        {!! $contact_us_form_section->description !!}
                        <div class="space32"></div>
                        <div class="number-address-area">
                            @if ($phone = app(\App\Settings\Site::class)->phone)
                                <div class="phone-number">
                                    <div class="img1">
                                        <img src="/images/phone3.svg" alt="" />
                                    </div>
                                    <div class="content">
                                        <p>@lang('site.Phone Number')</p>
                                        <a href="tel:{{$phone}}">{{$phone}}</a>
                                    </div>
                                </div>
                            @endif

                            @if ($email = app(\App\Settings\Site::class)->email)
                                    <div class="phone-number m-0">
                                        <div class="img1">
                                            <img src="/images/email3.svg" alt="" />
                                        </div>
                                        <div class="content">
                                            <p>@lang('site.Email Address')</p>
                                            <a href="mailto:{{$email}}">{{$email}}</a>
                                        </div>
                                    </div>
                            @endif
                        </div>
                        <div class="space50"></div>
                        <div class="number-address-area2">
                            @if ($address = app(\App\Settings\Site::class)->translate('address'))
                                <div class="phone-number">
                                    <div class="img1">
                                        <img src="/images/location3.svg" alt="" />
                                    </div>
                                    <div class="content">
                                        <span class="fw-bolder">{{$address}}</span>
                                    </div>
                                </div>
                            @endif

                            @if ($map_link = app(\App\Settings\Site::class)->address_map_link)
                                <div class="phone-number">
                                    <a
                                            href="{{$map_link}}"
                                            class="map"
                                            target="_blank"
                                    >@lang('site.View Our Map')</a
                                    >
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-5">
                    <form class="contact-form-area" method="post">
                        @if($success_message = session('success'))
                            <div class="my-3 alert alert-success">
                                <span class="">{{$success_message}}</span>
                            </div>
                        @endif
                        @csrf
                        <h4>@lang('site.Get In Touch')</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-area">
                                    <input name="first_name" type="text" placeholder="@lang('site.First Name')"  required="required"/>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="input-area">
                                    <input name="last_name" type="text" placeholder="@lang('site.Last Name')"  required="required"/>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="input-area">
                                    <input name="email" type="email" placeholder="@lang('site.Email Address')"  required="required"/>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-area">
                                    <input name="phone_number" type="number" placeholder="@lang('site.Phone Number')"  required="required"/>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-area">
                                    <textarea name="message" placeholder="@lang('site.Your Message')" required="required"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-area">
                                    <button type="submit" class="header-btn1">
                                        @lang('site.Get In Touch')
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


    <div class="location-section-area sp2 bg2">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 m-auto">
                    <div class="location-header text-center heading2">
                        <h5>@lang('site.Location')</h5>
                        <h2>@lang('site.Our Location')</h2>
                    </div>
                </div>
            </div>
            <div class="space60 d-lg-block d-none"></div>
            <div class="space30 d-lg-none d-block"></div>
            <div class="row">
                @foreach($branches as $branch)
                    <div class="col-lg-4 col-md-6">
                        <div class="location-boxes">
                            <div class="img1">
                                <img src="/images/location3.svg" alt="" />
                            </div>
                            <div class="space32"></div>
                            <a href="{{$branch->map_link}}"
                            >{{$branch->address}}</a
                            >
                            <div class="space24"></div>
                            <p>@lang('site.Phone Number')</p>
                            <a href="tel:{{$branch->phone_number}}">{{$branch->phone_number}}</a>
                            <div class="space32"></div>
                            <a
                                    href="{{$branch->map_link}}"
                                    class="map"
                                    target="_blank"
                            >@lang('site.View Our Map')</a
                            >
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="cta-section-area">
        <img src="/images/cta-bg1.png" alt="" class="cta-bg1 aniamtion-key-2" />
        <img src="/images/cta-bg2.png" alt="" class="cta-bg2 aniamtion-key-1" />
        <div class="container">
            <div class="row">
                <div class="col-lg-12 m-auto">
                    <div class="cta-header-area text-center sp4 heading2">
                        <h2>
                            {{$contact_us_bottom_section->title}}
                        </h2>
                        {!! $contact_us_bottom_section->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection