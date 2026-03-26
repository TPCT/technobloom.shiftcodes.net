<div class="case1-section-area sp6">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="case-header-area heading2 text-center">
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
            <div class="col-lg-12" data-aos="zoom-out" data-aos-duration="1200">
                <div class="cs_case_study_1_list">
                    @foreach($section->features as $index => $feature)
                        <div
                                class="cs_case_study cs_style_1 cs_hover_active {{$index == 0 ? 'active' : ''}}"
                                data-aos="fade-up"
                                data-aos-duration="800"
                        >
                            <a
                                    href="{{$feature->link}}"
                                    class="cs_case_study_thumb cs_bg_filed"
                                    style="background-image: url('{{\Awcodes\Curator\Models\Media::find($feature->image_id)?->url}}')"
                            ></a>
                            <div class="content-area1">
                                <a href="{{$feature->link}}"
                                >{{$feature->title}}</a
                                >
                            </div>
                            <div class="content-area">
                                <a href="{{$feature->link}}}"
                                >{{$feature->title}}
                                </a>
                                {!! $feature->description !!}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
