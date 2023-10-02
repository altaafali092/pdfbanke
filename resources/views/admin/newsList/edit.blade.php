@extends('admin.layouts.master')
@section('content')

<div class="container-fluid">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title"> Form</h1>

    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-9">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Basic form</div>

                    </div>
                    <div class="ibox-body">
                        <form action="{{ route('admin.newsList.update', $newsList) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Title</label>
                                    <input class="form-control" name="title" type="text"
                                        value="{{ old('title', $newsList->title) }}" placeholder="Enter title">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Title</label>
                                    <input class="form-control" name="title_ne" type="text"
                                        value="{{ old('title_ne', $newsList->title_ne) }}" placeholder="Enter title">
                                    @error('title_ne')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>slug</label>
                                <input class="form-control" name="slug"
                                    value="{{ old('slug', $newsList->slug) }}" type="text"
                                    placeholder="Enter Slug">
                                @error('slug')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select name="news_category_id" class="form-control">
                                    <option value="">--Select Category--</option>
                                    @foreach ($newsCategories as $newsCategory)
                                        <option value="{{ $newsCategory->id }} "
                                            {{ old('news_category_id', $newsList->legal_category_id) == $newsCategory->id ? 'selected' : '' }}>
                                            {{ $newsCategory->title }}</option>
                                    @endforeach
                                </select>
                                <span class="text-warning">
                                    @error('news_category_id')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Publisher</label>
                                    <input class="form-control" type="text" name="publisher"
                                        value="{{ old('publisher', $newsList->publisher) }}" placeholder="publisher">
                                    @error('publisher')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Publisher-Neplai</label>
                                    <input class="form-control" type="text" name="publisher_ne"
                                        value="{{ old('publisher_ne', $newsList->publisher_ne) }}" placeholder="publisher">
                                    @error('publisher_ne')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Publish Date</label>
                                <input class="form-control" type="date" name="publish_date">
                                @error('publish_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="files"> File(Multiple )</label>
                                <input class="form-control" id="file" type="file" name="files[]" multiple>
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