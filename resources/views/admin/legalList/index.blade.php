@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Legal List थपनुहोस्</h1>
        </div>
        <div class="page-content fade-in-up">
            <div class="row">
                <div class="col-md-9">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Basic form</div>
                        </div>
                        <div class="ibox-body">
                            <form action="{{ route('admin.legalList.store', $legalLists) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Title</label>
                                        <input class="form-control" name="title" type="text"
                                            value="{{ old('title', $legalLists->title ?? '') }}" placeholder="Enter Title">
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Title_Nepali</label>
                                        <input class="form-control" name="title_ne" type="text"
                                            value="{{ old('title_ne', $legalLists->title_ne ?? '') }}"
                                            placeholder="Enter Title_ne">
                                        @error('title_ne')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Slug</label>
                                        <input class="form-control" value="{{ old('slug', $legalLists->slug ?? '') }}"
                                            name="slug" type="text" placeholder="Enter slug">
                                        @error('slug')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Category</label>
                                        <select name="legal_category_id" class="form-control">
                                            <option value="">--Select Category--</option>
                                            @foreach ($legalCategories as $legalCategory)
                                                <option value="{{ $legalCategory->id }} "
                                                    {{ old('legal_category_id', $legalCategory->legal_category_id) == $legalCategory->id ? 'selected' : '' }}>
                                                    {{ $legalCategory->title }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-warning">
                                            @error('legal_category_id')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Publisher</label>
                                        <input class="form-control" type="text"
                                            value="{{ old('publisher', $legallists->publisher ?? '') }}" name="publisher"
                                            placeholder="Enter publisher">
                                        @error('publisher')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Publisher_NEPALI</label>
                                        <input class="form-control" type="text"
                                            value="{{ old('publisher_ne', $legallists->publisher_ne ?? '') }}"
                                            name="publisher_ne" placeholder="Enter publisher_ne">
                                        @error('publisher_ne')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Publish Date</label>
                                    <input class="form-control" name="publish_date" type="date" placeholder="Enter Date">
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



        {{-- //datatable --}}


        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title"> Legal List DataTable</h1>

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
                                <th>Title_NE</th>
                                {{-- <th>Slug</th> --}}
                                <th>Category</th>
                                <th>Publisher</th>
                                <th>Publisher_NE</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>
                            @forelse($legalLists as $key=>$legalList)
                                <tr>
                                    <td>{{ $legalLists->firstItem() + $key }}</td>
                                    <td>{{ $legalList->title }}</td>
                                    <td>{{ $legalList->title_ne }}</td>
                                    {{-- <td>{{ $legalList->slug }}</td> --}}
                                    <td>{{ $legalList->legalCategory->title }}</td>
                                    <td>{{ $legalList->publisher }}</td>
                                    <td>{{ $legalList->publisher_ne }}</td>
                                    <td>
                                        <form action="{{ route('admin.legalList.updateStatus', $legalList) }}"
                                            method="post" style="display: inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" style="border: none; background: none;">
                                                <i
                                                    class="fa fa-{{ $legalList->status == 1 ? 'toggle-on text-success' : 'toggle-off text-danger' }} fa-2x"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <a class="btn btn-warning text-white"
                                            href="{{ route('admin.legalList.show', $legalList) }}">View</a>
                                        <a class="btn btn-primary text-white"
                                            href="{{ route('admin.legalList.edit', $legalList) }}">Edit</a>
                                        <form action="{{ route('admin.legalList.destroy', $legalList) }}" method="post"
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
                                    <td colspan="8">
                                        <center>No data found.</center>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $legalLists->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
