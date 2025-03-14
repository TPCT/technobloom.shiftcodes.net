@extends('layouts.main')

@section('title', 'site.Our Projects')

@section('content')
    <div class="case-inner-section-area sp1">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 m-auto">
                    <div class="case-header text-center heading2">
                        <h5>@lang('site.Projects')</h5>
                        <h2>@lang('site.Our Projects')</h2>
                    </div>
                    <div class="space50 d-lg-block d-none"></div>
                    <div class="space30 d-lg-none d-block"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-7 m-auto">
                    <div class="tabs-area text-center">
                        <form method="get" id="projects-search-form">
                        </form>
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button
                                        class="nav-link {{$search ? '' : 'active'}}"
                                        id="pills-all-tab"
                                        data-bs-toggle="pill"
                                        data-bs-target="#pills-home"
                                        type="submit"
                                        role="tab"
                                        name="search"
                                        value=""
                                        form="projects-search-form"
                                >
                                    @lang('site.All')
                                </button>
                            </li>
                            @foreach($categories as $category)
                                <li class="nav-item" role="presentation">
                                    <button
                                            class="nav-link {{$search == $category->slug ? "active" : ""}}"
                                            id="pills-{{$category->slug}}-tab"
                                            data-bs-toggle="pill"
                                            data-bs-target="#pills-home"
                                            type="submit"
                                            role="tab"
                                            name="search"
                                            value="{{$category->slug}}"
                                            form="projects-search-form"
                                    >
                                        {{$category->title}}
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="tabs-content-area">
                        <div class="tab-content" id="pills-tabContent">
                            <div
                                    class="tab-pane fade active show"
                                    id="pills-home"
                                    role="tabpanel"
                            >
                                <div class="tabs-contents">
                                    <div class="row align-items-center">
                                        @foreach($projects as $project)
                                            <div class="col-lg-4">
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
                                                    <div class="d-flex justify-content-center">
                                                        {{$project->title}}
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
                        </div>
                    </div>
                </div>

                {{$projects->links()}}
            </div>
        </div>
    </div>

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