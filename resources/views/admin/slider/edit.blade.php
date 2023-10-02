@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">नयाँ स्लाइडर थप्नुहोस्</h1>

        </div>
        <div class="page-content fade-in-up">
            <div class="row">
                <div class="col-md-9">
                    <div class="ibox">
                        <div class="ibox-body">
                            <form action="{{ route('admin.slider.update', $slider) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Title</label>
                                        <input class="form-control" name="title" value="{{ old('title', $slider->title) }}"
                                            type="text" placeholder="Enter Title">
                                        @error('title')
                                            <div class="text-danger">{{ 'message' }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Title_nepali</label>
                                        <input class="form-control" name="title_ne" value="{{ old('title_ne', $slider->title_ne) }}"
                                            type="text" placeholder="Enter Title_ne">
                                        @error('title_ne')
                                            <div class="text-danger">{{ 'message' }}</div>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input class="form-control" type="file" name="image">
                                    <div class="image">
                                        <img src="{{ $slider->image }}" height="60px" alt="">
                                    </div>
                                    @error('image')
                                        <div class="text-danger">{{ 'message' }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-info" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
