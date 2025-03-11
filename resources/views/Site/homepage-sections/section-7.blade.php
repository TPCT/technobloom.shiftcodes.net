{{--<div class="blog1-scetion-area sp6">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-12 m-auto">--}}
{{--                <div class="blog-hedaer-area heading2 text-center">--}}
{{--                    <img src="/images/star2.png" alt="" class="star2 keyframe5" />--}}
{{--                    <img src="/images/star2.png" alt="" class="star3 keyframe5" />--}}
{{--                    <h2 class="text-anime-style-3">--}}
{{--                        {{$section->title}}--}}
{{--                    </h2>--}}
{{--                    <div data-aos="fade-up" data-aos-duration="1000">--}}
{{--                        {!! $section->description !!}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row">--}}
{{--            @foreach($blogs as $blog)--}}
{{--                <div class="col-lg-4 col-md-6">--}}
{{--                    <div--}}
{{--                            class="blog-author-boxarea"--}}
{{--                            data-aos="fade-right"--}}
{{--                            data-aos-duration="800"--}}
{{--                    >--}}
{{--                        <div class="img1">--}}
{{--                            <x-curator-glider--}}
{{--                                :media="$blog->image_id"--}}
{{--                            />--}}
{{--                        </div>--}}
{{--                        <div class="content-area">--}}
{{--                            <div class="tags-area">--}}
{{--                                <ul>--}}
{{--                                    <li>--}}
{{--                                        <span><img style="padding-inline: 5px" src="/images/contact1.svg" alt="" />{{$blog->author->name}}</span>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <span><img style="padding-inline: 5px" src="images/calender1.svg" alt="" />{{$blog->publishedAtForHumans()}}</span>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                            <a href="{{route('news.show', ['news' => $blog])}}"--}}
{{--                            >{{$blog->title}}</a--}}
{{--                            >--}}
{{--                            {!! $blog->description !!}--}}
{{--                            <a href="{{route('news.show', ['news' => $blog])}}" class="readmore"--}}
{{--                            >@lang('site.Read More') <i class="fa-solid fa-arrow-right"></i--}}
{{--                                ></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="space30 d-lg-none d-block"></div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}