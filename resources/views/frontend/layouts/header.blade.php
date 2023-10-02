<body>

    <section class="container-fluid">

        <div class="sub-header-card d-none d-sm-block">
            <div class="row">
                <div class="col-md-6">
                    <div class="sub-header-dt-card">
                        <p>
                            <span class="date-text">
                                <iframe scrolling="no" border="0" frameborder="0" marginwidth="0" marginheight="0"
                                    allowtransparency="true"
                                    src="https://www.ashesh.com.np/linknepali-time.php?time_only=no&font_color=000&aj_time=yes&font_size=14&line_brake=0&bikram_sambat=0&api=741198k444"
                                    width="308" height="25">
                                </iframe>
                            </span>
                        </p>
                    </div>
                </div>
                <div class="col-md-6 mt-1">
                    <div class="header-navbar-language ">
                        <ul
                            style="display:inline-flex; justify-content: space-between; align-items:center; list-style-type:none; float:right;">
                            <li style=" margin-left:5px">
                                <button style="height:30px; width: 95px;"> <a
                                        style="text-decoration: none;  color:rgb(12, 48, 178)" href="{{ url('login') }}">
                                        <p><i class="fa fa-lock "></i> LOGIN</p>
                                    </a></button>
                            </li>
                            <li style=" margin-left:4px" class="buttons-right">
                                <a href="{{ url()->current() }}?change_language=ne">
                                    <button style="height:30px; width: 95px;" 
                                        class="{{ app()->getLocale() === 'ne' ? 'btn-success' : '' }}">{{ __('Nepali') }}</button>
                                </a>
                            </li>
                            <li style=" margin-left:4px" class="buttons-right">
                                <a href="{{ url()->current() }}?change_language=en">
                                    <button style="height:30px; width: 95px;" 
                                        class="{{ app()->getLocale() === 'en' ? 'btn-success' : '' }}">{{ __('English') }}</button>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            {{-- logo --}}


            <div class="background d-flex justify-content-around" style="background-image:();">
                <div class="col-md-2 col-sm-2 col-xs-2">
                    <a class="main-logo" href="/">
                        <img alt="nepal-government-logo" class="logo" src="{{ officeSetting()->logo1 }}">
                    </a>
                </div>
                <div class="col-md-8 col-sm-8 col-xs-8 mt-3">
                    <div class="row">
                        <div class="header-title">
                            <span
                                style="font-size:16px;font-family: ;color: #f20707;line-height: 0.8 !important;font-weight: normal;">
                                {{__('Lumbini State Government')}}
                            </span> <br>
                            <span
                                style="font-size:16px;font-family: ;color: #ff0000;line-height: 0.8 !important;font-weight: normal;">
                               {{__('Ministry of Agriculture and Land Administration')}}
                            </span> <br>
                            <span
                                style="font-size:16px;font-family: ;color: #ff0000;line-height: 0.8 !important;font-weight: normal;">
                               {{__('Directorate of Animal Husbandry and Fisheries Development')}}
                            </span> <br>
                            <span
                                style="font-size:18px;font-family: ;color: #ff0000;line-height: 0.8 !important;font-weight: bold;">
                                @if (App::getLocale() === 'en')
                                    {{ officeSetting()->office_name ?? '' }}
                                @elseif(App::getLocale() === 'ne')
                                    {{ officeSetting()->office_name_ne ?? '' }}
                                @endif
                            </span> <br>
                            <span
                                style="font-size:16px;font-family: ;color: #ff0000;line-height: 0.8 !important;font-weight: normal;">
                                {{-- {{officeSetting()->office_add_ne}} --}}
                                @if (App::getLocale() === 'en')
                                    {{ officeSetting()->office_add ?? '' }}
                                @elseif (App::getLocale() === 'ne')
                                    {{ officeSetting()->office_add_ne ?? '' }}
                                @endif
                            </span> <br>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2 col-xs-2">
                    <a class="main-logo" href="/">
                        <img alt="nepal-flag" class="logo-nep float-start d-none d-lg-block"
                            src="{{ officeSetting()->logo2 }}">
                    </a>
                </div>
            </div>
        </div>
