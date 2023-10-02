@extends('frontend.layouts.master')
@section('main-container')
    {{-- suchana --}}


    <section class="newsbar-section mt-2">
        <div class="container-fluid">
            <div class="newsbar-container" style="background-color: #ce1126">
                <div class="flex-shrink-0 newsbar-title pr-lg-3">ताजा सूचना</div>
                <div class="d-block jctkr-wrapper jctkr-initialized">
                    <ul class="marquee-list">
                        <marquee onmouseover="stop()" onmouseout="start()">
                            <li>
                                <a href="" style="text-decoration: none;">
                                    प्रस्ताब आह्वान सम्बन्धि सुचना 2079-09-15
                                    <span class="type">नयाँ</span>
                                </a>
                            </li>
                            <li>
                                <a href="" style="text-decoration: none;">
                                    नतिजा प्रकाशन सम्बन्धि सूचना
                                    2079-11-29
                                    <span class="type">नयाँ</span>
                                </a>
                            </li>
                        </marquee>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <div class="conatiner">
        <section class="introduction mt-2">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 order-2 order-lg-1">
                        <h5 class="container">
                            {{ __('Farmer Information Center') }}
                        </h5>
                        @foreach ($farmerListes as $farmerList)
                            <a href="{{ route('farmerListDetails', ['farmerList' => $farmerList->slug]) }}"
                                class="card-01 mb-2 border">
                                <h6 class="heading">
                                    @if (App::getLocale() === 'en')
                                        {{ $farmerList->title ?? '' }}
                                    @elseif (App::getLocale() === 'ne')
                                        {{ $farmerList->title_ne ?? '' }}
                                    @endif
                                </h6>
                                <p class="mt-2">
                                    {{ $farmerList->publish_date }}
                                    | @if (App::getLocale() === 'en')
                                        {{ $farmerList->publisher ?? '' }}
                                    @elseif (App::getLocale() === 'ne')
                                        {{ $farmerList->publisher_ne ?? '' }}
                                    @endif
                                </p>
                            </a>
                        @endforeach
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2">
                        <div id="slider" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                @foreach ($sliders as $slider)
                                    <button type="button" data-bs-target="#slider" data-bs-slide-to="{{ $loop->index }}"
                                        class="{{ $loop->first ? 'active' : '' }}" aria-current="true"
                                        aria-label="Slide 1"></button>
                                @endforeach
                            </div>
                            <div class="carousel-inner">
                                @foreach ($sliders as $slider)
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <img src="{{ $slider->image }}" class="d-block w-100 height-455"
                                            alt="खजुरा साकिनी क्रस  जातका कुखुराहरु">
                                        <div class="carousel-caption d-none d-md-block">
                                            <p>
                                                @if (App::getLocale() === 'en')
                                                    {{ $slider->title ?? '' }}
                                                @elseif (App::getLocale() === 'ne')
                                                    {{ $slider->title_ne ?? '' }}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#slider"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#slider"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Adhikarwaala --}}
        <div class="container py-4">
            <div class="row gx-6">
                <div class="col">
                    <div class="p-3 border bg-light">
                        <ul class="text-center" style="list-style-type: none;">
                            <li>
                                <div class="avatar avatar-lg " style="margin-left: 230px;">
                                    <img src="{{ asset('frontend\assets\image\slider\admi1.jpg') }}"
                                        alt="डा. शंकर न्यौपाने">
                                </div><br>
                                <div class="textbox-01">
                                    <h6>डा. शंकर न्यौपाने</h6>
                                    <p>कार्यालय प्रमुख</p>
                                    <p><i class="fa fa-phone"></i> 9858024218</p>
                                    <p><i class="fa fa-envelope"></i> nyaupaneshankarssp@gmail.com
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col">
                    <div class="p-3 border bg-light">
                        <ul class="text-center"style="list-style-type: none;">
                            <li>
                                <div class="avatar avatar-lg" style="margin-left: 230px;">
                                    <img src="{{ asset('frontend\assets\image\slider\admi2.jpg') }}" alt="कर्मध्वज छत्याल">
                                </div><br>
                                <div class="textbox-01">
                                    <h6>कर्मध्वज छत्याल</h6>
                                    <p>सूचना अधिकारी</p>
                                    <p><i class="fa fa-phone"></i> 9868327062</p>
                                    <i class="fa fa-envelope"></i> kdchhatyal30@gmail.com
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-7">
                <h4 style="color:blue;">
                    @if (App::getLocale() === 'en')
                        {{ $officeDetailList->first()->title ?? '' }}
                    @elseif(App::getLocale() === 'ne')
                        {{ $officeDetailList->first()->title_ne ?? '' }}
                    @endif
                </h4>
                <p style="font-size:25px; text-align:justify;">
                    {!! Str::words($officeDetailList->first()->description_ne ?? '', 200, '....') !!}
                    <a class="intro-title" href="">
                        {{ __('View more') }}
                    </a>
                </p>
            </div>
            <div class="col-5"><img src="{{ officeSetting()->cover }}" width="600" height="350" alt="">
            </div>
        </div>
    </div>

    <div class="container-fluid py-4 form">
        <img src="{{ officeSetting()->adphoto }}" width="1500" height="300" alt="">
    </div>

    <section>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-8">
                    <div style="background-color:blue; padding:10px;  height: 45px; width: 100%;">
                        <i class="fa fa-info-circle icon-large text-white" aria-hidden="true"></i>
                        <strong class="text-white">{{ __('Legal document') }} </strong>
                    </div>
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        @foreach ($legalCategories as $legalCategory)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{ $loop->first ? 'active' : '' }}"
                                    id="home{{ $loop->iteration }}-tab" data-bs-toggle="pill"
                                    data-bs-target="#home{{ $loop->iteration }}" type="button" role="tab"
                                    aria-controls="home{{ $loop->iteration }}" aria-selected="true">
                                    @if (App::getLocale() === 'en')
                                        {{ $legalCategory->title ?? '' }}
                                    @elseif(App::getLocale() === 'ne')
                                        {{ $legalCategory->title_ne ?? '' }}
                                    @endif
                                </button>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        @foreach ($legalCategories as $legalCategory)
                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                id="home{{ $loop->iteration }}" role="tabpanel"
                                aria-labelledby="home{{ $loop->iteration }}-tab">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{ __('Title') }}</th>
                                            <th scope="col">{{__('Publish Date')}}</th>
                                            <th scope="col"> {{__('Download')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($legalCategory->legalLists as $legalList)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>
                                                    @if(App::getLocale()==='en')
                                                    {{$legalList->title ??''}}
                                                    @elseif(App::getLocale()==='ne')
                                                    {{$legalList->title_ne ??''}}
                                                    @endif
                                                </td>
                                                <td> {{ $legalList->publish_date }}</td>
                                                </td>
                                                <td><a
                                                        href="{{ route('legalListDetails', ['legalList' => $legalList->slug]) }}">
                                                        <i class="fa fa-eye btn btn-primary btn-xs"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div><a class="btn btn-danger btn-sm" href="{{ route('legalLists') }}">
                                        {{ __('View more') }}
                                    </a>
                                    </a>
                                </div><br>
                            </div>
                        @endforeach
                    </div>
                    <div style="background-color:blue; padding:10px;  height: 45px; width: 100%;">
                        <i class="fa fa-info-circle icon-large text-white" aria-hidden="true"></i>
                        <strong class="text-white">{{ __('Information/News') }}</strong>
                    </div>
                    @foreach ($newsCategories as $newsCategory)
                        <div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ __('Title') }}</th>
                                        <th scope="col">{{ __('Publish Date') }}</th>
                                        <th scope="col"> {{ __('Download') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($newsLists as $newsList)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>
                                                @if(App::getLocale()==='en')
                                                {{$newsList->title ??''}}
                                                @elseif(App::getLocale()==='ne')
                                                {{$newsList->title_ne ??''}}
                                                @endif
                                            </td>
                                            <td>{{ $newsList->publish_date }}</td>
                                            <td>
                                                <a href="{{ route('newsListDetails', ['newsList' => $newsList->slug]) }}">
                                                    <i class="fa fa-eye btn btn-primary btn-xs"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                    <div class="text-right mb-3">
                        <a class="btn btn-danger btn-sm" href="{{ route('newsCategory', $newsCategory) }}">
                            {{ __('View more') }}
                        </a>
                    </div><br>
                    <div style="background-color:blue; padding:10px;  height: 45px; width: 100%;">
                        <i class="fa fa-info-circle icon-large text-white" aria-hidden="true"></i>
                        <strong class="text-white">{{__('Farmer Information Center')}}</strong>
                    </div>
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{__('Title')}}</th>
                                    <th scope="col">{{__('Publish')}}</th>
                                    <th scope="col"> {{__('Download')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($farmerLists as $farmerList)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            @if(App::getLocale()==='en')
                                            {{$farmerList->title ?? ''}}
                                            @elseif(App::getLocale()==='ne')
                                            {{$farmerList->title_ne ??''}}
                                            @endif
                                        </td>
                                        <td>{{ $farmerList->publish_date }}</td>
                                        <td>
                                            <a
                                                href="{{ route('farmerListDetails', ['farmerList' => $farmerList->slug]) }}">
                                                <i class="fa fa-eye btn btn-primary btn-xs"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-right mb-3">
                        <a class="btn btn-danger btn-sm" href="{{ route('farmerLists') }}">
                            {{ __('View more') }}
                        </a>
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div style="background-color:blue; padding:10px;  height: 45px; width: 100%;">
                        <i class="fa fa-link" aria-hidden="true" style="color: white; font-size: 20px;"></i>
                        <strong style="margin-left: 5px;" class="text-white"> {{__('Related information')}}</strong>
                    </div><br>
                    <ul class="list-group">
                        <li class="list-group-item active" style="display: flex; align-items: center;">
                            <a href="https://pdfbanke.gov.np/detail/faq?language=ne">
                                <i class="fa fa-question-circle" style="color: white; font-size: 30px;"></i>
                            </a>    
                            <div style="margin-left: 10px;">{{__('Frequently asked questions')}}</div>
                        </li><br>
                        <li class="list-group-item active" style="display: flex; align-items: center;">
                            <a href=""">
                                <i class="fa fa-envelope" style="color: white; font-size: 30px;"></i>
                            </a>
                            <div style="margin-left: 10px;">{{__('Check the mail')}}</div>
                        </li><br>
                        <li class="list-group-item active" style="display: flex; align-items: center;">
                            <a href="https://pdfbanke.gov.np/detail/bill?language=ne">
                                <i class="fa fa-calculator"" style="color: white; font-size: 30px;"></i>
                            </a>
                            <div style="margin-left: 10px;"> {{__('Publicization of bills')}}</div>
                        </li><br>
                        <li class="list-group-item active" style="display: flex; align-items: center;">
                            <a href="{{ officeSetting()->twitterurl }}">
                                <i class="fa fa-twitter"" style="color: white; font-size: 30px;"></i>
                            </a>
                            <div style="margin-left: 10px;"> {{__('Twitter Link')}}</div>
                        </li><br>
                        <li class="list-group-item active" style="display: flex; align-items: center;">
                            <a href="{{ url('links') }}">
                                <i class="fa fa-link"" style="color: rgb(246, 243, 243); font-size: 30px;"></i>
                            </a>
                            <div style="margin-left: 10px;">{{__('Links')}}</div>
                        </li><br>
                        <li class="list-group-item active" style="display: flex; align-items: center;">
                            <a href="{{ officeSetting()->fburl }}">
                                <i class="fa fa-facebook"" style="color: white; font-size: 30px;"></i>
                            </a>
                            <div style="margin-left: 10px;"> {{__('Facebook')}}</div>
                        </li><br>
                    </ul>
                </div>
            </div>
    </section>


    <section class="container-fluid">
        <div class="wrapper mt-5 mb-3">
            <div class="photobanner">
                <img src="{{ asset('frontend/assets/image/slider/admi1.jpg') }}" alt="" />
                <img src="{{ asset('frontend/assets/image/slider/admi2.jpg') }}" alt="" />
                <img src="{{ asset('frontend/assets/image/slider/admi2.jpg') }}" alt="" />
                <img src="{{ asset('frontend/assets/image/slider/admi2.jpg') }}" alt="" />
                <img src="{{ asset('frontend/assets/image/slider/admi2.jpg') }}" alt="" />
                <img src="{{ asset('frontend/assets/image/slider/admi2.jpg') }}" alt="" />
                <img src="{{ asset('frontend/assets/image/slider/admi2.jpg') }}" alt="" />
                <img src="{{ asset('frontend/assets/image/slider/admi1.jpg') }}" alt="" />

            </div>
        </div>

    </section>
@endsection
