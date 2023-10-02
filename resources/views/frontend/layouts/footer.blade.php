<footer style="background-color: #00335e;">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-sm">
                <h3 style=" text-decoration: underline;" class="text-white"> {{__('Contact Us')}}</h3>
                <h6 class=" text-bold text-white">
                    @if (App::getLocale() === 'en')
                        {{ officeSetting()->office_name ?? '' }}
                    @elseif (App::getLocale() === 'ne')
                        {{ officeSetting()->office_name_ne ?? '' }}
                    @endif
                </h6>
                <ul class="list mt-2">
                    <li class="text-white">
                        <i class="fa fa-map-marker"></i> 
                        @if (App::getLocale() === 'en')
                            {{ officeSetting()->office_add ?? '' }}
                        @elseif (App::getLocale() === 'ne')
                            {{ officeSetting()->office_add_ne ?? '' }}
                        @endif
                    </li>
                    <li class="text-white">
                        <i class="fa fa-phone"></i> {{ officeSetting()->phone }}
                    </li>
                    <li class="text-white">
                        <i class="fa fa-envelope"></i> {{ officeSetting()->email }}
                    </li><br>
                    <li class="text-white">
                        <a href="{{ officeSetting()->fburl }}"><i class="fa fa-facebook"
                                style="font-size: 30px;  padding: 10px; color: white;"></i></a>
                        <a href="{{ officeSetting()->twitterurl }}"><i class="fa fa-twitter"
                                style="font-size: 30px; padding: 10px; color: white"></i></a>
                        <a href=""><i class="fa fa-youtube"
                                style="font-size: 30px; padding: 10px; color: white"></i></a>
                    </li>
                </ul>

            </div>
            <div class="col-sm">
                <h3 style=" text-decoration: underline;" class="text-white">{{ __('Important Link') }}</h3>
                <div>
                    @foreach (links() as $link)
                        <tr>
                            <td>
                                <li class="text-white">
                                    <a class="text-white" href="{{ $link->links }}" target="_blank">
                                        @if (App::getLocale() === 'en')
                                            {{ $link->title ?? '' }}
                                        @elseif (App::getLocale() === 'ne')
                                            {{ $link->title_ne ?? '' }}
                                        @endif
                                    </a>
                                </li>
                            </td>
                        </tr>
                    @endforeach
                </div>
            </div>
            <div class="col-sm">
                <h3 style=" text-decoration: underline;" class="text-white">{{ __('Our Map') }}</h3>
                <div class="textwidget links">
                    <iframe src="{{ officeSetting()->mapurl }}" width="100%" height="250" style="border:0;"
                        allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright" style="background-color: #004a89;">
        <span>Copyright © कुखुरा बिकास फार्म</span>
        <span>Last Updated: 2022-06-08</span>
        <span>Visitors: 0</span>
        <span>Developed By:
            <a href="" target="blank">Ninja Infosys</a></span>
    </div>
</footer>
