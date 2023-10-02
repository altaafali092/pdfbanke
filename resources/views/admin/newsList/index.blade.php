@extends('admin.layouts.master')
@section('content') 

    <div class="container-fliud">
        <!-- START PAGE CONTENT-->
        <div class="page-heading mt-2">
            <h1 class="page-title"> समाचार list थपनुहोस्</h1>
        </div>
        <div class="page-content fade-in-up">
            <div class="row">
                <div class="col-md-9">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Basic form</div>
                        </div>
                        <div class="ibox-body">
                            <form action="{{ route('admin.newsList.store', $newsLists) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Title</label>
                                        <input class="form-control" name="title" type="text"
                                            value="{{ old('title', $newsLists->title ?? '') }}" placeholder="Enter title">
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Title(Nepali)</label>
                                        <input class="form-control" name="title_ne" type="text"
                                            value="{{ old('title_ne', $newsLists->title ?? '') }}" placeholder="Enter title in  Nepali">
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <div class=" form-group">
                                    <label>slug</label>
                                    <input class="form-control" name="slug"
                                        value="{{ old('slug', $newsLists->slug ?? '') }}" type="text"
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
                                                {{ old('news_category_id', $newsCategory->legal_category_id) == $newsCategory->id ? 'selected' : '' }}>
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
                                        value="{{ old('publisher', $newsLists->publisher ?? '') }}" placeholder="publisher">
                                    @error('pubisher')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class=" col-sm-6 form-group">
                                    <label>Publisher(Nepali)</label>
                                    <input class="form-control" type="text" name="publisher_ne"
                                        value="{{ old('publisher_ne', $newsLists->publisher_ne ?? '') }}" placeholder="publisher in nepali">
                                    @error('pubisher_ne')
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

        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">DataTables</h1>
        </div>
        <div class="page-content fade-in-up">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">Data Table</div>
                </div>
                <div class="ibox-body">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                        width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Title_ne</th>
                                {{-- <th>Slug</th> --}}
                                <th>Category</th>
                                <th>Publisher</th>
                                <th>Publisher_ne</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                @forelse($newsLists as $key=>$newsList)
                                    <td>{{ $newsLists->firstItem() + $key }}</td>
                                    <td>{{ $newsList->title }}</td>
                                    <td>{{ $newsList->title_ne }}</td>
                                    {{-- <td>{{ $newsList->slug }}</td> --}}
                                    <td>{{ $newsList->newsCategory->title }}</td>
                                    <td>{{ $newsList->publisher }}</td>
                                    <td>{{ $newsList->publisher_ne }}</td>
                                    <td>
                                        <form action="{{ route('admin.newsList.updateStatus', $newsList) }}" method="post"
                                            style="display: inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" style="border: none; background: none;">
                                                <i
                                                    class="fa fa-{{ $newsList->status == 1 ? 'toggle-on text-success' : 'toggle-off text-danger' }} fa-2x"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <a class="btn btn-warning"
                                            href="{{ route('admin.newsList.show', $newsList) }}">View</a>
                                        <a class="btn btn-primary"
                                            href="{{ route('admin.newsList.edit', $newsList) }}">Edit</a>&nbsp;
                                        <form action="{{ route('admin.newsList.destroy', $newsList) }}" method="post"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="btn
                                                btn-danger text-white"
                                                onclick="return confirm('Are you sure want to Delete')">
                                                Delete</button>
                                        </form>
                                    </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9">
                                    <center>No data found.</center>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
