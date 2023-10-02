@extends('admin.layouts.master')
@section('content')
    <div class="content-fluid">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Add Cover Slider</h1>
        </div>
        <div class="page-content fade-in-up">
            <div class="row">
                <div class="col-md-9">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">CoverSlider</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <form action="{{ route('admin.CoverSlider.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Image</label>
                                    <img src="{{ $coverSlider->image ?? '' }}" height="100" alt="">
                                    <input class="form-control" type="file" name="image">
                                    @error('image')
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
