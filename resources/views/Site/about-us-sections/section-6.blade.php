<div class="team-inner-section-area sp2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="team2-header-area text-center heading2">
                    <h5>{{$section->title}}</h5>
                    <h2>{{$section->second_title}}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($team_members as $team_member)
                <div class="col-lg-3 col-md-6">
                    <div class="team-boxarea">
                        <div class="img1">
                            <x-curator-glider
                                :media="$team_member->image_id"
                            />
                        </div>
                        @if ($team_member->facebook || $team_member->$instagram || $team_member->linkedin || $team_member->youtube)
                            <ul>
                                @if ($facebook = $team_member->facebook)
                                    <li>
                                        <a href="{{$facebook}}"><img src="/images/facebook.svg" alt="" /></a>
                                    </li>
                                @endif
                                @if ($instagram = $team_member->instagram)
                                    <li>
                                        <a href="{{$instagram}}"><img src="/images/instagram.svg" alt="" /></a>
                                    </li>
                                @endif
                                @if ($linkedin = $team_member->linkedin)
                                    <li>
                                        <a href="{{$linkedin}}"><img src="/images/linkedin.svg" alt="" /></a>
                                    </li>
                                @endif
                                @if ($youtube = $team_member->youtube)
                                    <li>
                                        <a href="{{$youtube}}" class="m-0"
                                        ><img src="/images/youtube.svg" alt=""
                                            /></a>
                                    </li>
                                @endif
                            </ul>
                        @endif
                        <div class="content">
                            <span>{{$team_member->title}}</span>
                            <p>{{$team_member->position}}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>