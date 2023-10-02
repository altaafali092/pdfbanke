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
                            <form action="{{route('admin.farmerList.update', $farmerList)}}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Title</label>
                                        <input class="form-control" type="text" name="title"
                                            value="{{ old('title', $farmerList->title ?? '') }}" placeholder="Enter title">
                                        <span class="text-warning">
                                            @error('title')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Title _NEPALI</label>
                                        <input class="form-control" type="text" name="title_ne"
                                            value="{{ old('title_ne', $farmerList->title_ne ?? '') }}" placeholder="Enter title_ne">
                                        <span class="text-warning">
                                            @error('title_ne')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Slug</label>
                                        <input class="form-control" type="text" name="slug" value="{{old('slug',$farmerList->slug)}}" placeholder="Enter slug">
                                        <span class="text-warning">
                                            @error('slug')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Category</label>
                                        <select name="farmer_category_id" class="form-control">
                                            <option value="">--Select Category--</option>
                                            @foreach ($farmerCategories as $farmerCategory)
                                                <option value="{{ $farmerCategory->id }} "
                                                    {{ old('farmer_category_id', $farmerList->farmer_category_id) == $farmerCategory->id ? 'selected' : '' }}>
                                                    {{ $farmerCategory->title }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-warning">
                                            @error('farmer_category_id')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                               <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>publisher</label>
                                    <input class="form-control" type="text" name="publisher" value="{{old('pulisher',$farmerList->publisher)}}" placeholder="Publisher">
                                    <span class="text-warning">
                                        @error('publisher')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>publisher_nepali</label>
                                    <input class="form-control" type="text" name="publisher_ne" value="{{old('pulisher',$farmerList->publisher_ne)}}" placeholder="Publisher_ne">
                                    <span class="text-warning">
                                        @error('publisher_ne')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                               </div>
                              
                                <div class="form-group">
                                    <label>publish date</label>
                                    <input class="form-control" type="date" name="publish_date" value="{{old('publish_date',$farmerList->publish_date)}}">
                                    <span class="text-warning">
                                        @error('publish_date')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label>File</label>
                                    <label for="files">Multiple File</label>
                                    <input class="form-control" id="files" type="file" name="files[]" multiple>
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
