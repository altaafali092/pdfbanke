@extends('admin.layouts.master')
@section('content')
<div class="content-fluid">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Add Photos</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html"><i class="la la-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">Form</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-8">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Basic form</div>
                    </div>
                    <div class="ibox-body">
                        <form action="{{route('admin.galleryPhoto.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Image Name</label>
                                    <input class="form-control" name="title" type="text" placeholder="Image Name">
                                    <span class="text-warning">
                                        @error('title')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Image Name(Nepali</label>
                                    <input class="form-control" name="title_ne" type="text" placeholder="Image Name">
                                    <span class="text-warning">
                                        @error('title_ne')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                              
                            </div>
                            <div class="form-group">
                                <label>Slug</label>
                                <input class="form-control" name="slug" type="text" placeholder="slug">
                                <span class="text-warning">
                                    @error('slug')
                                        {{ $message }}
                                    @enderror
                                </span>
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
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Title</th>
                            <th>Title_ne</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($galleryPhotos as  $key=>$galleryPhoto)
                        <tr>
                            <td>{{$galleryPhotos->firstItem() + $key}}</td>
                            <td>{{$galleryPhoto->title}}</td>
                            <td>{{$galleryPhoto->title_ne}}</td>
                            <td>{{$galleryPhoto->slug}}</td>   
                            <td>
                                <form action="{{ route('admin.galleryPhoto.update', $galleryPhoto) }}"
                                    method="post" style="display: inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" style="border: none; background: none;">
                                        <i
                                            class="fa fa-{{ $galleryPhoto->status == 1 ? 'toggle-on text-success' : 'toggle-off text-danger' }} fa-2x"></i>
                                    </button>
                                </form>
                            </td>                         
                            <td> <img src="{{count($galleryPhoto->files)>0 ? $galleryPhoto->files?->random()->file_url : ''}}" height="80"></td>
                            <td>
                                <a class="btn btn-warning" href="{{route('admin.galleryPhoto.show',$galleryPhoto)}}">Show</a>
                                <a class="btn btn-primary" href="{{route('admin.galleryPhoto.edit',$galleryPhoto)}}">Edit</a>
                                <form action="{{ route('admin.galleryPhoto.destroy', $galleryPhoto) }}" method="post"
                                style="display:inline;">
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