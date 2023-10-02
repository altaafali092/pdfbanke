@extends('admin.layouts.master')
@section('content')
    <div class="container">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Edit officeDetail Category</h1>

        </div>
        <div class="page-content fade-in-up">
            <div class="row">
                <div class="col-md-9">
                    <div class="ibox">
                        <div class="ibox-body">
                            <form action="{{ route('admin.officeDetail.update',$officeDetail) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-12 form-group">
                                        <label>Title</label>
                                        <input class="form-control" type="text" name="title" value="{{old('title',$officeDetail->title ?? '')}}">
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <label>Title (Nepali)</label>
                                        <input class="form-control" type="text" name="title_ne" value="{{old('title_ne',$officeDetail->title_ne ?? '')}}">
                                        @error('title_ne')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input class="form-control" name="slug" type="text" value="{{old('slug',$officeDetail->slug ?? '')}}">
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
