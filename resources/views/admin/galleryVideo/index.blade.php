@extends('admin.layouts.master')
@section('content')
    <div class="content-fluid">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Basic Form</h1>
        </div>
        <div class="page-content fade-in-up">
            <div class="row">
                <div class="col-md-8">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Basic form</div>
                        </div>
                        <div class="ibox-body">
                            <form action="{{ route('admin.galleryVideo.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Video Name</label>
                                        <input class="form-control" name="title_ne" type="text" placeholder="Video Name">
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Video Name(nepali)</label>
                                        <input class="form-control" name="title" type="text" placeholder="Video Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input class="form-control" type="text" name="slug" placeholder="Slug">
                                </div>
                                <div class="form-group">
                                    <label>video URL</label>
                                    <input class="form-control" type="text" name="url" placeholder="video URL">
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
                                <th>Title_NE</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>video</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody> 
                            @forelse ($galleryVideos as $key=>$galleryVideo)
                                <tr>
                                    <td>{{ $galleryVideos->firstItem() + $key }}</td>
                                    <td>{{ $galleryVideo->title }}</td>
                                    <td>{{ $galleryVideo->title_ne }}</td>
                                    <td>{{ $galleryVideo->slug }}</td>
                                    <td>
                                        <form action="{{ route('admin.galleryVideo.update', $galleryVideo) }}"
                                            method="post" style="display: inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" style="border: none; background: none;">
                                                <i
                                                    class="fa fa-{{ $galleryVideo->status == 1 ? 'toggle-on text-success' : 'toggle-off text-danger' }} fa-2x"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <iframe width="55%" height="160" src="{{ $galleryVideo->url }}"
                                            title="YouTube video player" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                    </td>
                                    <td>
                                        <a class="btn btn-primary"
                                            href="{{ route('admin.galleryVideo.edit', $galleryVideo) }}">Edit</a>
                                        <form action="{{ route('admin.galleryVideo.destroy', $galleryVideo) }}"
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
