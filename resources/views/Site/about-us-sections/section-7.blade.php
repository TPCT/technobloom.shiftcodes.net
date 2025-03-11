<div class="testimonial1-section-area sp1 bg2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="testimonial-header heading2 text-center">
                    <img src="images/star7.png" alt="" class="star2 keyframe5" />
                    <img src="images/star7.png" alt="" class="star3 keyframe5" />
                    <h5>{{$section->title}}</h5>
                    <h2>
                        {{$section->second_title}}
                    </h2>
                    {!! $section->description !!}
                </div>
            </div>
        </div>
        <div class="row">
            <div
                    class="col-lg-8 m-auto"
                    data-aos="fade-up"
                    data-aos-duration="1000"
            >
                <div class="testimonials-slider-area owl-carousel">
                    @foreach($testimonials as $testimonial)
                        <div class="testimonial-boxarea">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="pera">
                                        {!! $testimonial->description !!}
                                        <div class="space100"></div>
                                        <div class="space30"></div>
                                        <div class="list-area">
                                            <div class="list">
                                                <ul>
                                                    @for ($i=0; $i < $testimonial->rate; $i++)
                                                        <li><i class="fa-solid fa-star"></i></li>
                                                    @endfor
                                                </ul>
                                                <span>{{$testimonial->title}}</span>
                                            </div>
                                            {{--                                            <img src="images/google.svg" alt="" />--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="images">
                                        <x-curator-glider
                                                :media="$testimonial->image_id"
                                        />
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