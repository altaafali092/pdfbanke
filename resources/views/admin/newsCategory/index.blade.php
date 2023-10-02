@extends('admin.layouts.master')
@section('content')

<div class="container-fluid">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">सुचना \समाचार Category थप्नुहोस् </h1>
       
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-10">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Basic form</div>
                        
                    </div>
                    <div class="ibox-body">
                        <form action="{{route('admin.newsCategory.store')}}" method="post" enctype="multipart/form-data" >
                        @csrf
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>News Category Title</label>
                                    <input class="form-control"  name="title" type="text" placeholder="Enter Title">
                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>News Category Title(Nepali)</label>
                                    <input class="form-control"  name="title_ne" type="text" placeholder="Enter Title Nepali">
                                    @error('title_ne')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                </div>
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

    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title"> सुचना \ समाचार DataTable</h1>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Data Table</div>
            </div>
            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Title_ne</th>
                            <th>Slug</th>
                            <th>Action</th>
                    </thead>
                    <tbody>
                        @forelse ($newsCategories as $key => $newsCategory )
                        <tr>
                            <td>{{$newsCategories->firstItem() + $key }}</td>
                            <td>{{$newsCategory->title}}</td>
                            <td>{{$newsCategory->title_ne}}</td>
                            <td>{{$newsCategory->slug}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('admin.newsCategory.edit', $newsCategory)}}">Edit</a>&nbsp;
                                <form action="{{route('admin.newsCategory.destroy',$newsCategory)}}" method="post" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                <button class="btn btn-danger text-white" onclick="return confirm('Are you sure want to Delete')">Delete</button>
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
                    </tbody>
                </table>
                {{-- {{ $newsCategories->links() }} --}}
            </div>
        </div>
    </div>
</div>
@endsection