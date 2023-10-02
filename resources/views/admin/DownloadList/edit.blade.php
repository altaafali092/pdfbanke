@extends('admin.layouts.master')

@section('content')
    <div class="container">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">डाउनलोडहरु लिस्टमा सुधार गर्नुहोस्</h1>
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-9">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">डाउनलोड form</div>
                            </div>
                            <div class="ibox-body">
                                <form action="{{ route('admin.downloadList.update', $downloadList) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" type="text"
                                                value="{{ old('title', $downloadList->title ?? '') }}"
                                                placeholder="Enter Title">
                                            @error('title')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Title(nepali)</label>
                                            <input class="form-control" name="title_ne" type="text"
                                                value="{{ old('title_ne', $downloadList->title_ne ?? '') }}"
                                                placeholder="Enter Title">
                                            @error('title_ne')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Slug</label>
                                        <input class="form-control" name="slug" type="text"
                                            value="{{ old('slug', $downloadList->slug ?? '') }}" placeholder="Enter Slug">
                                        @error('slug')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select name="download_category_id" class="form-control">
                                            <option value="">--Select Category--</option>
                                            @foreach ($downloadCategories as $downloadCategory)
                                                <option value="{{ $downloadCategory->id }} "
                                                    {{ old('download_category_id', $downloadCategory->download_category_id) == $downloadCategory->id ? 'selected' : '' }}>
                                                    {{ $downloadCategory->title }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-warning">
                                            @error('download_category_id')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Publisher</label>
                                        <input class="form-control" name="publisher" type="text"
                                            value="{{ old('publisher', $downloadList->publisher ?? '') }}"
                                            placeholder="Enter publisher">
                                        @error('publisher')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Publisher_ne</label>
                                        <input class="form-control" name="publisher_ne" type="text"
                                            value="{{ old('publisher_ne', $downloadList->publisher_ne ?? '') }}"
                                            placeholder="Enter publisher">
                                        @error('publisher_ne')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <label>Publisher_Date</label>
                                        <input class="form-control" name="publisher_date" type="text"
                                            value="{{ old('publisher_date', $downloadList->publisher_date ?? '') }}"
                                            placeholder="date">
                                        @error('publlisher_date')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
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
    </div>
@endsection
