@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">नयाँ लिंकहरु थप्नुहोस्</h1>
            <div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-md-9">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">लिंक form</div>
                            </div>
                            <div class="ibox-body">
                                <form action="{{ route('admin.links.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6 form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" type="text"
                                                placeholder="Enter Title">
                                            @error('title')
                                                <div class="text-danger">{{ 'Enter Title' }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 form-group">
                                            <label>Title_ne</label>
                                            <input class="form-control" name="title_ne" type="text"
                                                placeholder="Enter Title_ne">
                                            @error('title_ne')
                                                <div class="text-danger">{{ 'Enter Title_ne' }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group  ">
                                        <label>Links</label>
                                        <input class="form-control" type="url" name="links" placeholder="Enter links">
                                        @error('title')
                                            <div class="text-danger">{{ 'Enter links' }}</div>
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



        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">LinksTable</h1>
        </div>
        <div class="page-content fade-in-up">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title">लिंक Table</div>
                </div>
                <div class="ibox-body">
                    <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0"
                        width="100%">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Title_NE</th>
                                <th>Links</th>
                                <th>Action</th>

                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($links as $key=>$link)
                                <tr>
                                    <td>{{ $links->firstItem() + $key }}</td>
                                    <td>{{ $link->title }}</td>
                                    <td>{{ $link->title_ne }}</td>
                                    <td>{{ $link->links }}</td>
                                    <td>
                                        <a class="btn btn-primary text-white"
                                            href="{{ route('admin.links.edit', $link) }}">Edit</a>&nbsp;
                                        <form action="{{ route('admin.links.destroy', $link) }}" method="post"
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
                                    <td colspan="5">
                                        <center>No data found.</center>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $links->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
