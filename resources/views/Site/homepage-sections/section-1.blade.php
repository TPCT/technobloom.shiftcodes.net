<div class="hero1-section-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="header-main-content heading1">
                    <h5>
                        <img src="/images/logo-icons.svg" alt=""/> {{$section->title}}
                    </h5>
                    <h1 class="text-anime-style-3">
                        {{$section->second_title}}
                    </h1>
                    <div data-aos="fade-left" data-aos-delay="1000">
                        {!! $section->description !!}
                    </div>

                    @if($section->buttons && count($section->buttons))
                        <div
                                class="btn-area"
                                data-aos="fade-left"
                                data-aos-duration="1200"
                        >
                            @foreach($section->buttons as $index => $button)
                                <a href="{{$button['url'][app()->getLocale()]}}"
                                   class="{{$index % 2 == 0 ? 'header-btn1' : 'header-btn2'}}"
                                > {{$button['text'][app()->getLocale()]}}
                                    <span><i class="fa-solid fa-arrow-right"></i></span
                                    ></a>
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>
            <div class="col-lg-6">
                <div class="header-images-area">
                    <div class="main-images-area">
                        <div class="img1">
                            <x-curator-glider
                                    :media="$section->image_id"
                            />
                        </div>
                        <div class="auhtor-icons">

                            <img src="images/elements2.png" alt="" class="elements2"/>
                            <img src="images/elements3.png" alt="" class="elements3"/>
                        </div>
                        <div class="auhtor-images">
                            @foreach($section->images as $index => $image)
                                @break($index > 2)
                                <x-curator-glider
                                        class="header-author-img{{$index+1}} aniamtion-key-2"
                                        :media="$image['image'][app()->getLocale()]"
                                />
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if ($companies_slider && count($companies_slider->slides))
    <div class="slider-section-area sp5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2">
                    <div class="sldier-head">
                        {{$companies_slider->title }}
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