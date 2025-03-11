<div class="service1-section-area sp9">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="service-header-area heading2 text-center">
                    <img src="/images/star2.png" alt="" class="star2 keyframe5" />
                    <img src="/images/star2.png" alt="" class="star3 keyframe5" />
                    <h2 class="text-anime-style-3">
                        {{$section->title}}
                    </h2>
                    <div data-aos="fade-up" data-aos-duration="1000">
                        {!! $section->description !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="service-all-boxes-area">
                    @foreach($section->features as $index => $feature)
                        <div
                                class="service-boxarea {{$index > 0 ? "box" . ($index + 1) : ''}}"
                                data-aos="zoom-in"
                                data-aos-duration="800"
                        >
                            <a href="{{$feature->link}}">{{$feature->title}}</a>
                            <div class="space40"></div>
                            <x-curator-glider
                                :media="$feature->image_id"
                            />
                            <div class="space40"></div>
                            {!! $feature->description !!}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
