@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Basic Form</h1>
        </div>
        <div class="page-content fade-in-up">
            <div class="row">
                <div class="col-md-9">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Basic form</div>

                        </div>
                        <div class="ibox-body">
                            <form action="{{ route('admin.farmerCategory.update',$farmerCategory) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Category Title</label>
                                        <input class="form-control" type="text" name="title" value="{{old('title',$farmerCategory->title ?? '')}}" placeholder="First Name">
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Category Title_NEPALI</label>
                                        <input class="form-control" type="text" name="title_ne" value="{{old('title_ne',$farmerCategory->title_ne ?? '')}}" placeholder="First Name">
                                        @error('title_ne')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input class="form-control" type="text" name="slug" value="{{old('slug',$farmerCategory->slug)}}" placeholder="First Name">
                                    @error('slug')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
