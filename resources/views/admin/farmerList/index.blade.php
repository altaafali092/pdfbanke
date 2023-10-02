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
                            <form action="{{ route('admin.farmerList.store', $farmerLists) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
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
                                            value="{{ old('title_ne', $farmerList->title_ne ?? '') }}"
                                            placeholder="Enter title_ne">
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
                                        <input class="form-control" type="text" name="slug" value="{{old('slug',$farmerList->slug??'')}}" placeholder="Enter slug">
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
                                                    {{ old('farmer_category_id', $farmerCategory->farmer_category_id) == $farmerCategory->id ? 'selected' : '' }}>
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
                                        <input class="form-control" type="text" name="publisher" value="{{old('publisher',$farmerList->publisher??'')}}"  placeholder="Publisher">
                                        <span class="text-warning">
                                            @error('publisher')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>publisher_nepali</label>
                                        <input class="form-control" type="text" name="publisher_ne" value="{{old('publisher_ne',$farmerList->publisher_ne??'')}}" 
                                            placeholder="Publisher">
                                        <span class="text-warning">
                                            @error('publisher_ne')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class=" form-group">
                                    <label>publish date</label>
                                    <input class="form-control" type="date" name="publish_date" placeholder="date">
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
                                <th>Id</th>
                                <th>Title</th>
                                <th>Title_ne</th>
                                {{-- <th>Slug</th> --}}
                                <th>Category</th>
                                <th>status</th>
                                <th>Publisher</th>
                                <th>Publisher_ne</th>
                                <th>Publish Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($farmerLists as $key=>$farmerList)
                                <tr>
                                    <td>{{ $farmerLists->firstItem() + $key }}</td>
                                    <td>{{ $farmerList->title }}</td>
                                    <td>{{ $farmerList->title_ne }}</td>
                                    {{-- <td>{{ $farmerList->slug }}</td> --}}
                                    <td>{{ $farmerList->farmerCategory->title ?? '' }}</td>
                                    <td>
                                        <form action="{{ route('admin.farmerList.updateStatus', $farmerList) }}"
                                            method="post" style="display: inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" style="border: none; background: none;">
                                                <i
                                                    class="fa fa-{{ $farmerList->status == 1 ? 'toggle-on text-success' : 'toggle-off text-danger' }} fa-2x"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>{{ $farmerList->publisher }}</td>
                                    <td>{{ $farmerList->publisher_ne }}</td>
                                    <td>{{ $farmerList->publish_date }}</td>
                                    <td>
                                        <a class="btn btn-warning"
                                            href="{{ route('admin.farmerList.show', $farmerList) }}">View</a>
                                        <a class="btn btn-primary"
                                            href="{{ route('admin.farmerList.edit', $farmerList) }}">Edit</a>&nbsp;
                                        <form action="{{ route('admin.farmerList.destroy', $farmerList) }}" method="post"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger text-white"
                                                onclick="return confirm('Are you sure want to Delete')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="11">
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
