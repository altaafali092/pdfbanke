@extends('admin.layouts.master')
@section('content')
    <div class="container">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">डाउनलोड Category थप्नुहोस्</h1>

        </div>
        <div class="page-content fade-in-up">
            <div class="row">
                <div class="col-md-9">
                    <div class="ibox">

                        <div class="ibox-body">
                            <form action="{{ route('admin.downloadCategory.update',$downloadCategory)}}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Title</label>
                                        <input class="form-control" type="text" name="title" value="{{old('title',$downloadCategory->title)}}" placeholder="Enter Title">
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Title(Nepali)</label>
                                        <input class="form-control" type="text" name="title_ne" value="{{old('title_ne',$downloadCategory->title_ne)}}" placeholder="Enter Title">
                                        @error('title_ne')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input class="form-control" name="slug" type="text" value="{{old('slug',$downloadCategory->slug)}}" placeholder="Enter Slug">
                                    @error('slug')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
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
