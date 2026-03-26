<div class="service2-section-area sp1 bg2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="service2-header heading2 text-center">
                    <img src="/images/star7.png" alt="" class="star2 keyframe5" />
                    <img src="/images/star7.png" alt="" class="star3 keyframe5" />
                    <h5>{{$section->title}}</h5>
                    <h2>
                        {{$section->second_title}}
                    </h2>
                    {!! $section->description !!}
                </div>
            </div>
        </div>
        <div class="row">
            @if ($feature = $section->features->first())
                <div class="col-lg-7">
                    <div class="images-content-area aos-init aos-animate" data-aos="zoom-in" data-aos-duration="1000">
                        <div class="img1">
                            <x-curator-glider
                                    :media="$feature->image_id"
                            />
                        </div>
                        <div class="content-area">
                            <h5>{{$feature->title}}</h5>
                            <a class="text text-anime-style-3" href="{{$feature->link}}">
                                {{$feature->second_title}}
                            </a>

                            <div data-aos="fade-up" data-aos-duration="1000">
                                {!! $feature->description !!}
                            </div>

                            <div class="btn-area aos-init" data-aos="fade-up" data-aos-duration="1200">
                                <a href="{{$feature->link}}" class="header-btn1">@lang('site.Learn More')
                                    <span><i class="fa-solid fa-arrow-right"></i></span>
                                </a>
                            </div>
                        </div>
                        <div class="arrow-area">
                            <a href="{{$feature->link}}"><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            @endif

            <div class="col-lg-5">
                <div class="service-all-boxes">
                    <div class="row">
                        @foreach($section->features as $index => $feature)
                            @continue($index == 0)
                            @break($index > 2)
                            <div class="col-lg-12 col-md-6">
                                <div class="service2-auhtor{{$index==1 ? "" : "2"}}-boxarea aos-init aos-animate" data-aos="zoom-out" data-aos-duration="1200">
                                    <div class="arrow">
                                        <a href="{{$feature->link}}"><i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                    <div class="content-area">
                                        <h5>{{$feature->title}}</h5>
                                        <a href="{{$feature->link}}">{{$feature->second_title}}
                                        </a>
                                        {!! $feature->description !!}
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