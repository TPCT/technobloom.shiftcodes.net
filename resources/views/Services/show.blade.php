@extends('layouts.main')

@section('title', $service->title)

@section('content')
<div
        class="about-header-area"
        style="background-image: url(/images/inner-header.png); background-repeat: no-repeat; background-size: cover; background-position: center;"    >
    <img
            src="/images/elements1.png"
            alt=""
            class="elements1 aniamtion-key-1"
    />
    <img src="/images/star2.png" alt="" class="star2 keyframe5"/>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="about-inner-header heading9 text-center">
                    <h1>{{$service->title}}</h1>
                    <a href="{{route('site.index')}}"
                    >@lang('site.Home') <i class="fa-solid fa-angle-right"></i> @lang('site.Services')
                        <i class="fa-solid fa-angle-right"></i>
                        <span>{{$service->title}}</span></a
                    >
                </div>
            </div>
        </div>
    </div>
</div>

<div class="service-inner-header sp8">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="service-images">
                    <x-curator-glider
                        :media="$service->image_id"
                    />
                </div>
            </div>
            <div class="col-lg-6">
                <div class="service-textarea heading2">
                    <h5>{{$service->title}}</h5>
                    <h2>{{$service->second_title}}</h2>
                    {!! $service->description !!}
                    <div class="space32"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="space100"></div>
</div>

@if($companies_slider && count($companies_slider->slides))
    <div class="slider-section-area slider-inner sp5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2">
                    <div class="sldier-head">
                        <p>
                            {{$companies_slider->title}}
                        </p>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="slider-images-area owl-carousel">
                        @foreach($companies_slider->slides as $slide)
                            <div class="img1">
                                <x-curator-glider
                                        :media="$slide->image_id"
                                />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<div class="works-inner-section-area sp1">
    <div class="container">
        @foreach($service->steps as $step)
            <div class="row align-items-center">
                <div class="col-lg-1"></div>
                @if ($loop->even)
                    <div class="col-lg-6">
                        <div class="about-all-images-area">
                            @if ($step->image_1_id)
                                <img src="/images/elements14.png" alt="" class="elements12 keyframe5">
                            @endif

                            @if ($step->image_2_id)
                                <img src="/images/elements15.png" alt="" class="elements13 keyframe5">
                            @endif
                            <div class="row">
                                @if ($step->image_1_id)
                                    <div class="col-lg-6 col-md-6">
                                        <div class="img1 ">
                                            <div class="space100"></div>
                                            <x-curator-glider
                                                    :media="$step->image_1_id"
                                            />
                                        </div>
                                    </div>
                                @endif
                                @if ($step->image_2_id)
                                    <div class="col-lg-6 col-md-6">
                                        <div class="img2 ">
                                            <x-curator-glider
                                                    :media="$step->image_2_id"
                                            />
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="works-header-area heading2 specing2">
                            <h5>{{$step->title}}</h5>
                            <h2>{{$step->second_title}}</h2>
                            {!! $step->description !!}
                        </div>
                    </div>
                @else
                    <div class="col-lg-4">
                        <div class="works-header-area heading2 specing2">
                            <h5>{{$step->title}}</h5>
                            <h2>{{$step->second_title}}</h2>
                            {!! $step->description !!}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-all-images-area">
                            @if ($step->image_1_id)
                                <img src="/images/elements14.png" alt="" class="elements12 keyframe5">
                            @endif

                            @if ($step->image_2_id)
                                <img src="/images/elements15.png" alt="" class="elements13 keyframe5">
                            @endif
                            <div class="row">
                                @if ($step->image_1_id)
                                    <div class="col-lg-6 col-md-6">
                                        <div class="img1 ">
                                            <div class="space100"></div>
                                            <x-curator-glider
                                                    :media="$step->image_1_id"
                                            />
                                        </div>
                                    </div>
                                @endif
                                @if ($step->image_2_id)
                                    <div class="col-lg-6 col-md-6">
                                        <div class="img2 ">
                                            <x-curator-glider
                                                    :media="$step->image_2_id"
                                            />
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-lg-1"></div>
            </div>

        @if (!$loop->last)
                <div class="space100 d-lg-block d-none"></div>
                <div class="space30 d-lg-none d-block"></div>
            @endif
        @endforeach

    </div>
</div>

<div class="choose-section-area sp1">
    <img src="/images/cta-bg1.png" alt="" class="cta-bg1 aniamtion-key-2">
    <img src="/images/cta-bg2.png" alt="" class="cta-bg2 aniamtion-key-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="choose-header-area text-center heading2">
                    <h5>{{$why_to_choose_us_section->title}}</h5>
                    <h2>{{$why_to_choose_us_section->second_title}}</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="accordian-tabs-area">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        @foreach($why_to_choose_us_section->features as $feature)
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-{{$feature->id}}" aria-expanded="false" aria-controls="flush-collapseOne">
                                        {{$feature->title}}
                                    </button>
                                </h2>
                                <div id="flush-{{$feature->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample" style="">
                                    <div class="accordion-body">
                                        {!! $feature->description !!}
                                    </div>
                                    <div class="space10"></div>
                                </div>
                            </div>
                            @if (!$loop->last)
                                <div class="space24"></div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-all-images-area">
                    @foreach($why_to_choose_us_section->images as $image)
                        @break($loop->index > 1)
                        <img src="/images/elements{{14 + $loop->index}}.png" alt="" class="elements{{12 + $loop->index}} keyframe5">
                    @endforeach
                    <div class="row">
                        @foreach($why_to_choose_us_section->images as $image)
                            @break($loop->index > 1)
                            <div class="col-lg-6 col-md-6">
                                <div class="img1">
                                    <div class="space100"></div>
                                    <x-curator-glider
                                        :media="$image['image'][app()->getLocale()]"
                                    />
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="team-inner-section-area sp1">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="team2-header-area text-center heading2">
                    <h5>@lang('site.Our Team')</h5>
                    <h2>@lang('site.Meet With Our Expert Team')</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($team_members as $team_member)
                <div class="col-lg-3 col-md-6">
                    <div class="team-boxarea">
                        <div class="img1">
                            <x-curator-glider
                                    :media="$team_member->image_id"
                            />
                        </div>
                        @if ($team_member->facebook || $team_member->$instagram || $team_member->linkedin || $team_member->youtube)
                            <ul>
                                @if ($facebook = $team_member->facebook)
                                    <li>
                                        <a href="{{$facebook}}"><img src="/images/facebook.svg" alt="" /></a>
                                    </li>
                                @endif
                                @if ($instagram = $team_member->instagram)
                                    <li>
                                        <a href="{{$instagram}}"><img src="/images/instagram.svg" alt="" /></a>
                                    </li>
                                @endif
                                @if ($linkedin = $team_member->linkedin)
                                    <li>
                                        <a href="{{$linkedin}}"><img src="/images/linkedin.svg" alt="" /></a>
                                    </li>
                                @endif
                                @if ($youtube = $team_member->youtube)
                                    <li>
                                        <a href="{{$youtube}}" class="m-0"
                                        ><img src="/images/youtube.svg" alt=""
                                            /></a>
                                    </li>
                                @endif
                            </ul>
                        @endif
                        <div class="content">
                            <span>{{$team_member->title}}</span>
                            <p>{{$team_member->position}}</p>
                        </div>
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
                        {{$services_bottom_section->title}}
                    </h2>
                    {!! $services_bottom_section->description !!}
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