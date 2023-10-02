@extends('frontend.layouts.master')

@section('main-container')
    <div class="container-fluid py-2">
        <a href="{{ route('galleryPhotos')}}"><i class="fa fa-home" style="font-size: 20px;"> > {{__('Photo Gallery')}}</i></a>
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
                    <section>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 class="title-dark mb-4">
                                        @if(App::getLocale()==='en')
                                        {{$photo->title ??''}}
                                        @elseif(App::getLocale()==='ne')
                                        {{$photo->title_ne ??''}}
                                        @endif
                                    </h4>
                                    <div class="row">
                                        @foreach ($photo->files as $file)
                                            <div class="col-12 col-sm-6 col-md-4 mb-4">
                                                <a class="album" href="{{ $file->file_url }}">
                                                    <img class="album-img" alt="" src="{{ $file->file_url }}" style="height: 200px; width:300px;">
                                                </a>
                                            </div>
                                        @endforeach
                                    </div><br>
                                </div>
                            </div>
                    </section>
            </div><br>
        </div>
    </div>
    </div>
@endsection
