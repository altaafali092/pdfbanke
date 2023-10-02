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
                        <form action="{{route('admin.farmerCategory.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Category Title</label>
                                    <input class="form-control" type="text" name="title" placeholder="First Name">
                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Category Title NEPALI</label>
                                    <input class="form-control" type="text" name="title_ne" placeholder="First Name">
                                    @error('title_ne')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label>Slug</label>
                                <input class="form-control" type="text" name="slug" placeholder="First Name">
                                @error('slug')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary type="submit">Submit</button>
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
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
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
                        @forelse ($farmerCategories as $key=>$farmerCategory)
                        <tr>
                            <td>{{ $farmerCategories->firstItem() + $key}}</td>
                            <td>{{$farmerCategory->title}}</td>
                            <td>{{$farmerCategory->title_ne}}</td>
                            <td>{{$farmerCategory->slug}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('admin.farmerCategory.edit',$farmerCategory)}}">Edit</a>&nbsp;
                                <form
                                action="{{ route('admin.farmerCategory.destroy', $farmerCategory) }}"
                                method="post" style="display: inline">
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