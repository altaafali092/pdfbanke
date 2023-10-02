@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Basic Form</h1>
        </div>
        <div class="page-content fade-in-up">
            <div class="row">
                <div class="col-md-10">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Basic form</div>

                        </div>
                        <div class="ibox-body">
                            <form action="{{ route('admin.officeDetail.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Title</label>
                                    <input class="form-control" name="title" type="text" placeholder="Enter Title">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Title(Nepali)</label>
                                    <input class="form-control" name="title_ne" type="text" placeholder="Enter Title (Neplai)">
                                    @error('title_ne')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input class="form-control" name="slug" type="text" placeholder="Enter slug">
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
    </div>




    <div class="container">
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
                                <th>Slug</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                @forelse ($officeDetails as $key=>$officeDetail)
                                    <td>{{ $officeDetails->firstItem() + $key }}</td>
                                    <td>{{ $officeDetail->title }}</td>
                                    <td>{{ $officeDetail->title_ne }}</td>
                                    <td>{{ $officeDetail->slug }}</td>
                                    <td>
                                        <a class="btn btn-primary text-white"
                                            href="{{route('admin.officeDetail.edit', $officeDetail)}}">Edit</a>&nbsp;
                                        <form
                                            action="{{route('admin.officeDetail.destroy', $officeDetail)}}"method="post" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger text-white"
                                                onclick="return confirm('Are you sure want to delete')">Delete</button>
                                        </form>
                                    </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <center>No data found.</center>
                                </td>
                            </tr>
                            @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
