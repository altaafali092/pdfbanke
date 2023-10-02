@extends('frontend.layouts.master')

@section('main-container')
    <div class="container-fluid py-2">
        <a href="{{route('index')}}"><i class="fa fa-home" style="font-size: 20px;"> > {{__('Video Gallery')}}</i></a>
    </div>

    <div class="container-fluid py-3">

        <div class="row">



            <div class="col-sm-4">
                <h6 class="font-weight-bold mb-md-3">{{__('Gallery')}}</h6>
                <div>
                    <a href="{{route('Videos')}}" class="btn btn-primary"
                        style="font-size: 16px; text-align: center; display: inline-block; width: 300px; height: 50px; line-height: 50px;">
                        <h6 style="margin: 10px;">{{__('Video Gallery')}}</h6>
                    </a>
                </div><br>
                <div>
                    <a href="{{ route('galleryPhotos') }}" class="btn btn-light"
                        style="font-size: 16px; text-align: center; display: inline-block; width: 300px; height: 50px; line-height: 50px;">
                        <h6 style="margin: 10px;">फोटो ग्यालरी</h6>
                    </a>
                </div>
            </div>

            <div class="col-sm-8">
                <h4 class="title-dark mb-3">{{__('Video Gallery')}}</h4>
                <div class="container text-center">
                    <div class="row">
                    
                        @foreach ($Videos as $Video)
                            <div class="col-12 col-sm-6 col-md-4 mb-4">
                                <iframe width="100%" height="200" src="{{ $Video->url }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write;
                            encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                                <h6 class="album-title"> 
                                    @if(App::getLocale()==='en')
                                    {{$Video->title_ne ??''}}
                                    @elseif(App::getLocale()==='ne')
                                    {{$Video->title ??''}}
                                    @endif
                                </h6>
                            </div>
                        @endforeach
                    </div>
                </div><br>
            </div>
        </div>
    </div>
@endsection
