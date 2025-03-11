@extends('layouts.main')

@section('title', 'site.Our Projects')

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
                        <h1>{{$project->title}}</h1>
                        <a href="{{route('site.index')}}"
                        >@lang('site.Home') <i class="fa-solid fa-angle-right"></i> @lang('site.Our Projects')
                            <i class="fa-solid fa-angle-right"></i>
                            <span>@lang('site.Project Details')</span></a
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="project-pics mt-5">
        <div class="container">
            <div class="row">
                @foreach($project->images as $image)
                    <div class="col-md-6 col-lg-3">
                        <div class="pic">
                            <a href="#" data-fancybox="gallery">
                                <x-curator-glider
                                        :media="$image->id"
                                />
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="case-single-section-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="case-auhtor-area sp1">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="case-single-hedaer heading2">
                                    <h2>@lang('site.Information')</h2>
                                    {!! $project->information !!}
                                    <div class="case-others-area">
                                        <ul>
                                            <li><span>@lang('site.Date'):</span>{{$project->publishedAt()}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-7">
                                <div class="case-images image-anime">
                                    <x-curator-glider
                                            :media="$project->image_id"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="case-lista-area sp1 bg2">
        <div class="container">
            <div class="row align-items-center">
                <div class="">
                    <div class="case-pera-area heading2">
                        <h2>@lang('site.Project Brief'):</h2>
                        <div class="row">
                            <div class="col-lg-7">
                                {!! $project->description !!}
                            </div>
                            <div class="col-lg-5">
                                <div class="case-list">
                                    <ul>
                                        @foreach($project->features as $feature)
                                            <li>
                                                <img src="/images/check6.svg" alt=""/>{{$feature->title}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="works-inner-section-area sp1">
        <div class="container">
            @foreach($project->steps as $step)
                <div class="row align-items-center">
                    @if ($loop->even)
                        <div class="col-lg-6">
                            <div class="about-all-images-area">
                                @if ($step->image_1_id)
                                    <img
                                            src="/images/elements14.png"
                                            alt=""
                                            class="elements12 keyframe5"
                                    />
                                @endif
                                @if ($step->image_2_id)
                                    <img
                                            src="/images/elements15.png"
                                            alt=""
                                            class="elements13 keyframe5"
                                    />
                                @endif
                                <div class="row">
                                    @if ($step->image_1_id)
                                        <div class="col-lg-6 col-md-6">
                                            <div class="img1">
                                                <div class="space100"></div>
                                                <x-curator-glider
                                                        :media="$step->image_1_id"
                                                />
                                            </div>
                                        </div>
                                    @endif

                                    @if ($step->image_2_id)
                                        <div class="col-lg-6 col-md-6">
                                            <div class="img2">
                                                <x-curator-glider
                                                        :media="$step->image_2_id"
                                                />
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="works-header-area heading2 specing2">
                                <h5>@lang('site.Step') {{$loop->index + 1}}</h5>
                                <h2>{{$step->title}}</h2>
                                {!! $step->description !!}
                            </div>
                        </div>
                    @else
                        <div class="col-lg-6">
                            <div class="works-header-area heading2 specing2">
                                <h5>@lang('site.Step') {{$loop->index + 1}}</h5>
                                <h2>{{$step->title}}</h2>
                                {!! $step->description !!}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-all-images-area">
                                @if ($step->image_1_id)
                                    <img
                                            src="/images/elements14.png"
                                            alt=""
                                            class="elements12 keyframe5"
                                    />
                                @endif
                                @if ($step->image_2_id)
                                    <img
                                            src="/images/elements15.png"
                                            alt=""
                                            class="elements13 keyframe5"
                                    />
                                @endif
                                <div class="row">
                                    @if ($step->image_1_id)
                                        <div class="col-lg-6 col-md-6">
                                            <div class="img1">
                                                <div class="space100"></div>
                                                <x-curator-glider
                                                        :media="$step->image_1_id"
                                                />
                                            </div>
                                        </div>
                                    @endif

                                    @if ($step->image_2_id)
                                        <div class="col-lg-6 col-md-6">
                                            <div class="img2">
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
                </div>
                @if($loop->last)
                    <div class="space100 d-lg-block d-none"></div>
                    <div class="space30 d-lg-none d-block"></div>
                @endif
            @endforeach

        </div>
    </div>

    @if ($projects->count())
        <div class="project-inner-section-area">
            <div class="container">
                <h2 class="mb-4 fw-bold">@lang('site.Related projects')</h2>
                <div class="owl-carousel owl-theme">
                    @foreach($projects as $project)
                        <div class="item">
                            <div class="case-inner-box">
                                <div
                                        class="date d-flex align-items-center justify-content-center rounded-3 gap-2 position-absolute"
                                >
                                    <i class="fa-solid fa-calendar-days"></i>
                                    {{$project->publishedAt()}}
                                </div>
                                <div class="img1 image-anime">
                                    <x-curator-glider
                                        :media="$project->image_id"
                                    />
                                </div>
                                <div class="content-area">
                                    <div class="link-area">
                                        @foreach($project->categories as $category)
                                            <a href="{{route('projects.show', ['project' => $project])}}" class="tags"
                                            >#{{$category->title}}</a
                                            >
                                        @endforeach
                                    </div>
                                    <div class="arrow">
                                        <a href="{{route('projects.show', ['project' => $project])}}"
                                        ><i class="fa-solid fa-arrow-right"></i
                                            ></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @if ($our_projects_bottom_section)
        <div class="cta-section-area">
            <img src="/images/cta-bg1.png" alt="" class="cta-bg1 aniamtion-key-2" />
            <img src="/images/cta-bg2.png" alt="" class="cta-bg2 aniamtion-key-1" />
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 m-auto">
                        <div class="cta-header-area text-center sp4 heading2">
                            <h2>
                                {{$our_projects_bottom_section->title}}
                            </h2>
                            {!! $our_projects_bottom_section->description !!}
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
    @endif
@endsection

@push('script')
    <script>
        $(".owl-carousel").owlCarousel({
            loop: true,
            margin: 20,
            autoplay: true,
            autoplayTimeout: 5000,
            dots: true,
            nav: true,
            responsive: {
                0: {
                    items: 1,
                },
                600: {
                    items: 3,
                },
                1000: {
                    items: 4,
                },
            },
        });
    </script>
@endpush