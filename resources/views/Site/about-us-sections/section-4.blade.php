<div class="history-inner-section-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="history-header-area text-center heading2">
                    <img src="/images/star7.png" alt="" class="star2 keyframe5" />
                    <img src="/images/star7.png" alt="" class="star3 keyframe5" />
                    <h5>{{$section->title}}</h5>
                    <h2>
                        {{$section->second_title}}
                    </h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-all-images-area">
                    <img
                            src="/images/elements14.png"
                            alt=""
                            class="elements12 keyframe5"
                    />
                    <img
                            src="/images/elements15.png"
                            alt=""
                            class="elements13 keyframe5"
                    />
                    <div class="row">
                        @foreach($section->images as $index => $image)
                            <div class="col-lg-6 col-md-6">
                                <div class="img1 image-anime">
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

            <div class="col-lg-6">
                <div class="history-content-area">
                    <div class="row">
                        @foreach($section->features as $feature)
                            <div class="col-lg-6 col-md-6">
                                <div class="history-box-content">
                                    <h5>{{$feature->title}}</h5>
                                    <a href="{{$feature->link}}">{{$feature->second_title}}</a>
                                    {!! $feature->description !!}
                                    <a href="{{$feature->link}}" class="readmore"
                                    >@lang('site.Read More') <i class="fa-solid fa-arrow-right"></i
                                        ></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>