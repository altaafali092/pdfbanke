@extends('admin.layouts.master')
@section('content')
    <div class="content-fluid">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Add Cover Slider</h1>
        </div>
        <div class="page-content fade-in-up">
            <div class="row">
                <div class="col-md-9">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">CoverSlider</div>
                            <div class="ibox-tools">
                                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                            </div>
                        </div>
                        <div class="ibox-body">
                            <form action="{{ route('admin.CoverSlider.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Title</label>
                                    <input class="form-control" name="title" type="text" placeholder="Enter Title">
                                    @error('title')
                                        <div class="text-danger">{{ 'message' }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input class="form-control" type="file" name="image">
                                    @error('image')
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
            <h1 class="page-title">DataTables</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html"><i class="la la-home font-20"></i></a>
                </li>
                <li class="breadcrumb-item">DataTables</li>
            </ol>
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
                                <th>Image</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($coverSliders as $key=>$coverSlider)
                                <tr>
                                    <td>{{ $coverSliders->firstItem() + $key }}</td>
                                    <td>{{ $coverSlider->title }}</td>
                                    <td><img src="{{ $coverSlider->image }}" height="50px" alt=""></td>
                                    <td><a href="{{route('admin.CoverSlider.edit',$coverSlider)}}">Edit</a>
                                        <form action="{{ route('admin.CoverSlider.destroy', $coverSlider) }}"
                                            method="post" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger text-white"
                                                onclick="return confirm('Are you sure want to Delete')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
