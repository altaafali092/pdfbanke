@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">legal Category थपनुहोस्</h1>
        </div>
        <div class="page-content fade-in-up">
            <div class="row">
                <div class="col-md-8">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Basic form</div>
                        </div>
                        <div class="ibox-body">
                            <form action="{{ route('admin.legalCategory.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Title</label>
                                        <input class="form-control" name="title" type="text" placeholder="Enter Title">
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Title_nepali</label>
                                        <input class="form-control" name="title_ne" type="text"
                                            placeholder="Enter Title_Nepali">
                                        @error('title_ne')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>slug</label>
                                    <input class="form-control" name="slug" type="text" placeholder="Slug">
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



        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title"> Legal Category DataTable</h1>
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
                                <th>Title_NE</th>
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($legalCategories as $key=>$legalCategory)
                                <tr>
                                    <td>{{ $legalCategories->firstItem() + $key }}</td>
                                    <td> {{ $legalCategory->title }}</td>
                                    <td> {{ $legalCategory->title_ne }}</td>
                                    <td>{{ $legalCategory->slug }}</td>
                                    <td>
                                        <a class="btn btn-primary"
                                            href="{{ route('admin.legalCategory.edit', $legalCategory) }}">Edit</a>&nbsp;
                                        <form action="{{ route('admin.legalCategory.destroy', $legalCategory) }}"
                                            method="post" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger text-white"
                                                onclick="return confirm('Are you sure want to delete')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
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
