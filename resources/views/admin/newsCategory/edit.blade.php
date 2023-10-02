@extends('admin.layouts.master')
@section('content')

<div class="container-fluid">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">सुचना \समाचार Category Edit</h1>
       
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-10">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Basic form</div>
                        
                    </div>
                    <div class="ibox-body">
                        <form action="{{route('admin.newsCategory.update',$newsCategory)}}" method="POST">
                        @csrf
                        @method('PUT')
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>News Category Title</label>
                                    <input class="form-control"  name="title" type="text" value="{{old('title',$newsCategory->title)}}">
                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>News Category Title(Nepali)</label>
                                    <input class="form-control"  name="title_ne" type="text" value="{{old('title_ne',$newsCategory->title_ne)}}">
                                    @error('title_ne')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Slug</label>
                                <input class="form-control" name="slug" value="{{old('slug',$newsCategory->slug)}}" type="text" placeholder="Enter slug">
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