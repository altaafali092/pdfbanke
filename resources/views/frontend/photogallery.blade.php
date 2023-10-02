@extends('frontend.layouts.master')

@section('main-container')
    <div class="container-fluid py-2">
        <a href="{{route('index')}}"><i class="fa fa-home" style="font-size: 20px;"> > {{__('Photo Gallery')}}</i></a>
    </div>

    <div class="container-fluid py-3">
        <div class="row">
            <div class="col-sm-4">
                <h6 class="font-weight-bold mb-md-3">{{__('Gallery')}}</h6>
                <div>
                    <a href="{{ route('galleryPhotos') }}" class="btn btn-primary"
                        style="font-size: 16px; text-align: center; display: inline-block; width: 300px; height: 50px; line-height: 50px;">
                        <h6 style="margin: 10px;">{{__('Photo Gallery')}}</h6>
                    </a>
                </div><br>
                <div>
                    <a href="{{ route('Videos') }}" class="btn btn-light"
                        style="font-size: 16px; text-align: center; display: inline-block; width: 300px; height: 50px; line-height: 50px;">
                    <h6 style="margin: 10px;">{{__('Video Gallery')}}</h6>
                    </a>
                </div>
            </div>
            <div class="col-sm-8">
                <h4 class="title-dark mb-3">{{__('Photo Gallery')}}</h4>
                <div class=" text-center">
                    <div class="row">
                        @foreach ($photos as $photo)
                            <div class="col">
                                <a href="{{route('photoList',$photo)}}"><img class="album-img" alt=""
                                        src="{{ count($photo->files) > 0 ? $photo->files?->random()->file_url : '' }}">
                                </a>
                                <a href="{{route('photoList',$photo)}}">
                                    <h6 class="album-title">
                                        @if(App::getLocale()==='en')
                                        {{$photo->title ??''}}
                                        @elseif(App::getLocale()==='ne')
                                        {{$photo->title_ne ??''}}
                                        @endif
                                    </h6>
                                </a>
                                <a href="{{route('photoList',$photo)}}"> <span class="count">
                                        <small>item {{ count($photo->files) }}</small>
                                    </span></a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div><br>
        </div>
    </div>
    </div>
@endsection
