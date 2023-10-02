@extends('admin.layouts.master')
@section('content')
    <div class="content-fluid">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Basic Form</h1>

        </div>
        <div class="page-content fade-in-up">
            <div class="row">
                <div class="col-md-8">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Basic form</div>

                        </div>
                        <div class="ibox-body">
                            <form action="{{ route('admin.galleryVideo.update',$galleryVideo) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Video Name</label>
                                        <input class="form-control" name="title" type="text" value="{{old('title',$galleryVideo->title)}}" placeholder="Video Name">
                                        <span class="text-warning">
                                            @error('title')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Slug</label>
                                        <input class="form-control" type="text" name="slug" value="{{old('slug',$galleryVideo->slug)}}" placeholder="Slug">
                                        <span class="text-warning">
                                            @error('slug')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>video URL</label>
                                    <input class="form-control" type="text" name="url" value="{{old('url',$galleryVideo->url)}}" placeholder="video URL">
                                    <span class="text-warning">
                                        @error('url')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection