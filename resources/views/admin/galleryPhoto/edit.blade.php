@extends('admin.layouts.master')
@section('content')
<div class="content-fluid">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Edit Photos</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html"><i class="la la-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">Form</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-8">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Basic form</div>
                    </div>
                    <div class="ibox-body">
                        <form action="{{route('admin.galleryPhoto.update',$galleryPhoto)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Image Name</label>
                                    <input class="form-control" name="title" type="text" value="{{old('title',$galleryPhoto->title)}}" placeholder="Image Name">
                                    <span class="text-warning">
                                        @error('title')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Image Name(Nepali)</label>
                                    <input class="form-control" name="title_ne" type="text" value="{{old('title_ne',$galleryPhoto->title_ne)}}" placeholder="Image Name">
                                    <span class="text-warning">
                                        @error('title_ne')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Slug</label>
                                    <input class="form-control" name="slug" type="text" value="{{old('slug',$galleryPhoto->slug)}}" placeholder="slug">
                                    <span class="text-warning">
                                        @error('slug')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="files"> File(Multiple )</label>
                                <input class="form-control" id="file" type="file" name="files[]" multiple>
                                <span class="text-warning">
                                    @error('files')
                                        {{ $message }}
                                    @enderror
                                </span>
                                <span class="text-warning">
                                    @error('files.*')
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