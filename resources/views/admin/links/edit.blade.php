@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">लिंकहरुमा सुधार गर्नुहोस्</h1>
        </div>

        <div class="page-content fade-in-up">
            <div class="row">
                <div class="col-md-9">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">लिंक form</div>
                        </div>
                        <div class="ibox-body">
                            <form action="{{ route('admin.links.update',$link) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Title</label>
                                        <input class="form-control" name="title" type="text"  value="{{ old('title', $link->title) }}" placeholder="Enter Title">
                                        @error('title')
                                            <div class="text-danger">{{ 'Enter Title' }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Title_ne</label>
                                        <input class="form-control" name="title_ne" type="text"  value="{{ old('title_ne', $link->title_ne) }}" placeholder="Enter Title_ne">
                                        @error('title_ne')
                                            <div class="text-danger">{{ 'Enter Title_ne' }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group  ">
                                    <label>Links</label>
                                    <input class="form-control" type="url" name="links" value="{{old('links', $link->links)}}" placeholder="Enter links">
                                    @error('title')
                                        <div class="text-danger">{{ 'Enter links' }}</div>
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
    @endsection
