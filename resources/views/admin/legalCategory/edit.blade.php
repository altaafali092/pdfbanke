@extends('admin.layouts.master')
@section('content')

<h1>edit</h1>
<div class="container-fluid">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">legal Categoryमा सुधारहोस्</h1>

    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-8">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Basic form</div>
                    </div>
                    <div class="ibox-body">
                        <form action="{{ route('admin.legalCategory.update', $legalCategory) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Title</label>
                                    <input class="form-control" name="title" type="text" value="{{old('title',$legalCategory->title)}}" placeholder="Enter Title">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Title_NEPALI</label>
                                    <input class="form-control" name="title_ne" type="text" value="{{old('title_ne',$legalCategory->title_ne)}}" placeholder="Enter Title">
                                    @error('title_ne')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>slug</label>
                                <input class="form-control" name="slug" type="text" value="{{old('slug',$legalCategory->slug)}}" placeholder="Slug">
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