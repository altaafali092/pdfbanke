@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">नयाँ डाउनलोडहरु थप्नुहोस्</h1>
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-9">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">डाउनलोड form</div>

                            </div>
                            <div class="ibox-body">
                                <form action="{{ route('admin.downloadList.store', $downloadLists) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" type="text"
                                                value="{{ old('title', $downloadLists->title ?? '') }}"
                                                placeholder="Enter Title">
                                            @error('title')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Title(Nepali)</label>
                                            <input class="form-control" name="title_ne" type="text"
                                                value="{{ old('title_ne', $downloadLists->title_ne ?? '') }}"
                                                placeholder="Enter Title(nepali)">
                                            @error('title')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label>Slug</label>
                                        <input class="form-control" name="slug" type="text"
                                            value="{{ old('slug', $downloadLists->slug ?? '') }}"
                                            placeholder="Enter Slug">
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
                                            value="{{ old('publisher', $downloadLists->publisher ?? '') }}"
                                            placeholder="Enter publisher">
                                        @error('publisher')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Publisher(Nepali)</label>
                                        <input class="form-control" name="publisher_ne" type="text"
                                            value="{{ old('publisher_ne', $downloadLists->publisher_ne ?? '') }}"
                                            placeholder="Enter publisher">
                                        @error('publisher_ne')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <label>Publisher_Date</label>
                                        <input class="form-control" name="publisher_date" type="date"
                                            value="{{ old('title', $downloadLists->title ?? '') }}"
                                            placeholder="Enter Title">
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
 
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">downloadListTable</h1>
        </div>
        <div class="page-content fade-in-up">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">डाउनलोड Table</div>
                </div>
                <div class="ibox-body">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                        width="100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Title_ने</th>
                                {{-- <th>Slug</th> --}}
                                <th>Category</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($downloadLists as $key=>$downloadList)
                                <tr>
                                    <td>{{ $downloadLists->firstItem() + $key }}</td>
                                    <td>{{ $downloadList->title }}</td>
                                    <td>{{ $downloadList->title_ne }}</td>
                                    {{-- <td>{{ $downloadList->slug }}</td> --}}
                                    <td>{{ $downloadList->downloadCategory->title }}</td>
                                    <td>
                                        <form action="{{ route('admin.downloadList.updateStatus', $downloadList) }}"
                                            method="post" style="display: inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" style="border: none; background: none;">
                                                <i
                                                    class="fa fa-{{ $downloadList->status == 1 ? 'toggle-on text-success' : 'toggle-off text-danger' }} fa-2x"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <a class="btn btn-warning"
                                            href="{{ route('admin.downloadList.show', $downloadList) }}">View</a>
                                        <a class="btn btn-primary text-white"
                                            href="{{ route('admin.downloadList.edit', $downloadList) }}">Edit</a>&nbsp;
                                        <form action="{{ route('admin.downloadList.destroy', $downloadList) }}"
                                            method="post" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger text-white"
                                                onclick="return confirm('Are you sure want to Delete')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <center>No data found.</center>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $downloadLists->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
