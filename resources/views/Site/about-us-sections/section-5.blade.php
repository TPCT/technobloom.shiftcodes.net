<div class="skills-section-area sp2">
    <img src="/images/cta-bg1.png" alt="" class="cta-bg1 aniamtion-key-2" />
    <img src="/images/cta-bg2.png" alt="" class="cta-bg2 aniamtion-key-1" />
    <div class="container">
        <div class="row">
            <div class="col-lg-3 m-auto">
                <div class="skills-header text-center heading2">
                    <h5>{{$section->title}}</h5>
                    <h2>{{$section->second_title}}</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-10 m-auto">
            <div class="circle-progress-area">
                <div class="row">
                    @foreach($section->features as $feature)
                        <div class="col-lg-3 col-md-6">
                            <div class="progresbar">
                                <div class="progressbar">
                                    <div class="circle" data-percent="{{str_replace('%', '', $feature->title)}}">
                                        <canvas></canvas>
                                        <div>{{$feature->title}}</div>
                                    </div>
                                </div>
                                <p>{{$feature->second_title}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>