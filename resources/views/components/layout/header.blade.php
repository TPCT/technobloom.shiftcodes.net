<header>
    <div
            class="header-area homepage1 header header-sticky d-none d-lg-block"
            id="header"
    >
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-elements">
                        <div class="site-logo">
                            <a href="{{route('site.index')}}">
                                <x-curator-glider
                                        :media="app(\App\Settings\Site::class)->translate('logo')"
                                />
                            </a>
                        </div>
                        <div class="main-menu">
                            <ul>
                                @foreach($menu->links as $link)
                                    <li>
                                        <a class="{{\App\Helpers\Utilities::getActiveLink($link->link)}}" href="{{$link->link}}">{{$link->title}}</a>
                                        @if ($link->children->count())
                                            <i class="fa-solid fa-angle-down"></i>
                                            <ul class="dropdown-padding">
                                                @foreach($link->children as $link)
                                                    <a class="{{\App\Helpers\Utilities::getActiveLink($link->link)}}" href="{{$link->link}}">{{$link->title}}</a>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="btn-area">
                            <a href="{{route('site.contact-us')}}" class="header-btn1">
                                @lang('site.Free Consultation')
                                <span><i class="fa-solid fa-arrow-right"></i></span>
                            </a>
                        </div>
                        <div class="body-overlay"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="mobile-header mobile-haeder1 d-block d-lg-none">
    <div class="container-fluid">
        <div class="col-12">
            <div class="mobile-header-elements">
                <div class="mobile-logo">
                    <a href="{{route('site.index')}}"><img src="/images/logo1.png" alt="" /></a>
                </div>
                <div class="mobile-nav-icon dots-menu">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="mobile-sidebar mobile-sidebar1">
    <div class="logosicon-area">
        <div class="logos">
            <img src="/images/logo1.png" alt="" />
        </div>
        <div class="menu-close">
            <i class="fa-solid fa-xmark"></i>
        </div>
    </div>
    <div class="mobile-nav mobile-nav1">
        <ul class="mobile-nav-list nav-list1">
            @foreach($menu->links as $link)
                <li class="@if($link->children->count())has-sub hash-has-sub @endif">
                    @if($link->children->count())
                        <span class="submenu-button"><em></em></span>
                    @endif

                    <a class="{{\App\Helpers\Utilities::getActiveLink($link->link)}}" href="{{$link->link}}">{{$link->title}}</a>

                    @if($link->children->count())
                            <ul class="sub-menu" style="display: none;">
                                @foreach($link->children as $link)
                                    <li class="hash-has-sub">
                                        <a class="{{\App\Helpers\Utilities::getActiveLink($link->link)}}" href="{{$link->link}}">{{$link->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                    @endif
                </li>
            @endforeach
        </ul>

        <div class="allmobilesection">
            <a href="{{route('site.contact-us')}}" class="header-btn1"
            >@lang('site.Get Started')
                <span><i class="fa-solid fa-arrow-right"></i></span>
            </a>
            <div class="single-footer">
                <h3>@lang('site.Contact Info')</h3>
                <div class="footer1-contact-info">

                    @if ($phone = app(\App\Settings\Site::class)->phone)
                        <div class="contact-info-single">
                            <div class="contact-info-icon">
                                <i class="fa-solid fa-phone-volume"></i>
                            </div>
                            <div class="contact-info-text">
                                <a href="tel:{{$phone}}">{{$phone}}</a>
                            </div>
                        </div>
                    @endif

                    @if ($email = app(\App\Settings\Site::class)->email)
                        <div class="contact-info-single">
                            <div class="contact-info-icon">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                                <div class="contact-info-text">
                                    <a href="mailto:{{$email}}">{{$email}}</a>
                                </div>
                        </div>
                    @endif

                    @if ($address = app(\App\Settings\Site::class)->translate('address'))
                        <div class="single-footer">
                            <h3>@lang('site.Our Location')</h3>

                            <div class="contact-info-single">
                                <div class="contact-info-icon">
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>

                                    <div class="contact-info-text">
                                        <a href="mailto:{{app(\App\Settings\Site::class)->address_map_link}}">
                                            {{$address}}
                                        </a>
                                    </div>
                            </div>
                        </div>
                    @endif

                    <div class="single-footer">
                        <h3>@lang('site.Social Links')</h3>

                        <div class="social-links-mobile-menu">
                            <ul>
                                @if ($facebook = app(\App\Settings\Site::class)->facebook_link)
                                    <li>
                                        <a href="{{$facebook}}"><i class="fa-brands fa-facebook-f"></i></a>
                                    </li>
                                @endif

                                @if ($instagram = app(\App\Settings\Site::class)->instagram_link)
                                    <li>
                                        <a href="{{$instagram}}"><i class="fa-brands fa-instagram"></i></a>
                                    </li>
                                @endif

                                @if ($linkedin = app(\App\Settings\Site::class)->linkedin_link)
                                    <li>
                                        <a href="{{$linkedin}}"><i class="fa-brands fa-linkedin-in"></i></a>
                                    </li>
                                @endif

                                @if ($youtube = app(\App\Settings\Site::class)->youtube_link)
                                    <li>
                                        <a href="{{$youtube}}"><i class="fa-brands fa-youtube"></i></a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>