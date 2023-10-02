   {{-- nav bar --}}

    <nav class="navbar navbar-expand-lg navbar-dark shadow mt-2" style="background-color: #004a84;"">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('index') }}">
                            <i class="fa fa-home"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown" id="1">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">
                            {{ __('About us') }}
                        </a>
                        <ul class="dropdown-menu">
                            @foreach (officeDetails() as $officeDetail)
                                <li>
                                    <a class="dropdown-item" href="{{ route('officeDetail', $officeDetail) }}">
                                        @if (App::getLocale() === 'en')
                                            {{ $officeDetail->title ?? '' }}
                                        @elseif (App::getLocale() === 'ne')
                                            {{ $officeDetail->title_ne ?? '' }}
                                        @endif
                                    </a>
                                </li>
                            @endforeach
                            <li>
                                <a class="dropdown-item"href="{{ route('employeeDetails') }}">{{__('Employee Detail')}}</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown" id="2">
                        <a class="nav-link  dropdown-toggle" data-bs-toggle="dropdown">{{__('Information/News')}} </a>
                        <ul class="dropdown-menu">
                            @foreach (newsCategorys() as $newsCategory)
                                <li>
                                    <a class=dropdown-item
                                        href="{{ route('newsCategory', $newsCategory) }}">
                                        @if (App::getLocale() === 'en')
                                            {{ $newsCategory->title ?? '' }}
                                        @elseif (App::getLocale() === 'ne')
                                            {{ $newsCategory->title_ne ?? '' }}
                                        @endif
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="nav-item dropdown" id="3">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown"> {{__('Download')}}</a>
                        <ul class="dropdown-menu">
                            @foreach (downloadCategorys() as $downloadCategory)
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ route('downloadCategory', $downloadCategory) }}"> 
                                        @if (App::getLocale() === 'en')
                                            {{ $downloadCategory->title ?? '' }}
                                        @elseif (App::getLocale() === 'ne')
                                            {{ $downloadCategory->title_ne ?? '' }}
                                        @endif</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="nav-item dropdown" id="4">
                        <a class="nav-link " href="{{ url('links') }}">{{__('Links')}}</a>
                    </li>


                    <li class="nav-item dropdown" id="5">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown"> {{__('Gallery')}} </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item"href="{{ route('galleryPhotos') }}"> {{__('Photo Gallery')}} </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('Videos') }}"> {{__('Video Gallery')}}</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown" id="6">
                        <a class="nav-link " href="{{ url('contact') }}"> {{__('Contact Us')}} </a>
                        <ul class="dropdown-menu">
                        </ul>
                    </li>


                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="text" placeholder="Search">
                    <button class="btn btn-primary" type="button">Search</button>
                </form>
            </div>
        </div>
    </nav>
</section>


