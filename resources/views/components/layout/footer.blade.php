<div class="footer1-section-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="footer-logo-area">
                    <x-curator-glider
                        :media="app(\App\Settings\Site::class)->translate('footer_logo')"
                    />
                    {!! app(\App\Settings\Site::class)->translate('footer_description') !!}
                    <ul>
                        @if ($facebook = app(\App\Settings\Site::class)->facebook_link)
                            <li>
                                <a href="{{$facebook}}"><img src="/images/facebook.svg" alt="" /></a>
                            </li>
                        @endif

                        @if ($instagram = app(\App\Settings\Site::class)->instagram_link)
                            <li>
                                <a href="{{$instagram}}"><img src="/images/instagram.svg" alt="" /></a>
                            </li>
                        @endif

                        @if ($linked_in = app(\App\Settings\Site::class)->linkedin_link)
                            <li>
                                <a href="{{$linked_in}}"><img src="/images/linkedin.svg" alt="" /></a>
                            </li>
                        @endif

                        @if($youtube = app(\App\Settings\Site::class)->youtube_link)
                            <li>
                                <a href="{{$youtube}}"><img src="/images/youtube.svg" alt="" /></a>
                            </li>
                        @endif

                    </ul>
                </div>
            </div>

            <div class="col-lg-2 col-md-6">
                <div class="footer-logo-area1">
                    <h3>@lang('site.About Link')</h3>
                    <ul>
                        @foreach($menu->links as $link)
                            <li><a href="{{$link->link}}">{{$link->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="footer-logo-area2">
                    <h3>@lang('site.Get in touch')</h3>
                    <ul>
                        @if ($email = app(\App\Settings\Site::class)->email)
                            <li>
                                <a href="mailto:{{$email}}"
                                ><img src="/images/email.svg" alt="" /><span
                                    >{{$email}}</span
                                    ></a
                                >
                            </li>
                        @endif
                        @if($address = app(\App\Settings\Site::class)->translate('address'))
                                <li>
                                    <a href="{{app(\App\Settings\Site::class)->address_map_link}}"
                                    ><img src="/images/location.svg" alt="" /><span
                                        >{{$address}}
                                    </span></a
                                    >
                                </li>
                        @endif
                        @if ($phone = app(\App\Settings\Site::class)->phone)
                            <li>
                                <a href="tel:{{$phone}}"
                                ><img src="/images/phone.svg" alt="" /><span
                                    >{{$phone}}</span
                                    ></a
                                >
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="space80 d-lg-block d-none"></div>
        <div class="space40 d-lg-none d-block"></div>
        <div class="row">
            <div class="col-lg-12">
                <div class="copyright-area">
                    <div class="pera">
                        <p>ⓒ @lang('site.Copyright') {{date('Y')}} <a href="https://shiftcodes.net">@lang('site.ShiftCodes')</a>. @lang('site.All rights reserved')</p>
                    </div>
                    <ul>
                        <li><a href="/terms-and-conditions">@lang('site.Terms & Conditions')</a></li>
                        <li><a href="/privacy-policy" class="m-0">@lang('site.Privacy Policy')</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
