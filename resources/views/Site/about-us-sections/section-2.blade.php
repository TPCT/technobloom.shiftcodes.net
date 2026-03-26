<div class="works-inner-section-area sp1">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="works-header-area heading2">
                    <h5>{{$section->title}}</h5>
                    <h2>{{$section->second_title}}</h2>
                    {!! $section->description !!}
                    @foreach($section->features as $feature)
                        <div class="space32"></div>
                        <div class="works-content-box">
                            <div class="icons">
                                <x-curator-glider
                                    :media="$feature->image_id"
                                />
                            </div>
                            <div class="content">
                                <a href="{{$feature->link}}">{{$feature->title}}</a>
                                {!! $feature->description !!}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-all-images-area">
                    <img
                            src="images/elements15.png"
                            alt=""
                            class="elements13 keyframe5"
                    />
                    <div class="row">
                        @foreach($section->images as $index => $image)
                            @break($index > 1)
                            <div class="col-lg-6 col-md-6">
                                <div class="img{{$index+1}} image-anime">
                                    @if ($index == 0)
                                        <div class="space100"></div>
                                    @endif
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