<div class="about1-section-area sp6">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4">
                <div class="about-images">
                    <figure class="image-anime reveal">
                        <x-curator-glider
                                :media="$section->images[0]['image'][app()->getLocale()]"
                        />
                    </figure>
                    <img src="/images/star1.png" alt="" class="star1 keyframe5" />
                </div>
            </div>
            <div class="col-lg-5">
                <div class="about-content-area heading2">
                    <div class="arrow-circle">
                        @if ($section->buttons && count($section->buttons))
                            <a href="{{$section->buttons[0]['url'][app()->getLocale()]}}">
                                <img
                                        src="/images/elements4.png"
                                        alt=""
                                        class="elements4 keyframe5"
                                />
                                <img src="/images/arrow.svg" alt="" class="arrow" />
                            </a>
                        @endif
                    </div>
                    <h2 class="text-anime-style-3">
                        {{$section->title}}
                    </h2>
                    <div data-aos="fade-left" data-aos-duration="1000">
                        {!! $section->description !!}
                    </div>
                    @if ($section->buttons && count($section->buttons))
                        <div
                                class="btn-area"
                                data-aos="fade-left"
                                data-aos-duration="1200"
                        >
                            <a href="{{$section->buttons[0]['url'][app()->getLocale()]}}" class="header-btn1"
                            >{{$section->buttons[0]['text'][app()->getLocale()]}}<span
                                ><i class="fa-solid fa-arrow-right"></i></span
                                ></a>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-3">
                <div class="about-auhtor-images">
                    <img
                            src="/images/elements5.png"
                            alt=""
                            class="elements5 keyframe5"
                    />
                    <figure class="image-anime reveal">
                        <x-curator-glider
                                :media="$section->images[1]['image'][app()->getLocale()]"
                        />
                    </figure>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="space60"></div>

@if($companies_slider && count($companies_slider->$slides))
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