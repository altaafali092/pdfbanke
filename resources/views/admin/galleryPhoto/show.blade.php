
@extends('admin.layouts.master')
@section('content')
    <div class="content-fluid">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Gallery file view</h1>
            <nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" style="color: blue"><a href="{{ route('admin.dashboard') }}">ड्यासबोर्ड
                        </a></li>
                    <li class="breadcrumb-item" style="color: blue"><a href="{{ route('admin.galleryPhoto.index') }}">Back to photo from
                            
                        </a></li>
                </ol>
            </nav>
        </div>
        <div class="page-content fade-in-up">

            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-body">
                        <div class="col-md-12">
                            <div class="row">
                                @foreach ($galleryPhoto->files as $file)
                                    <div class="col-md-3 mt-3" style="display: inline-block;">
                                        <div class="files" style="display: inline-block;">
                                            @if (in_array($file->extension, ['jpg', 'jpeg', 'png', 'jfif']))
                                                <div class="image" style="margin-right: 20px; margin-bottom: 20px;">
                                                    <img class="card-img-top" src="{{ $file->file_url }}"
                                                        style="height: 200px; width: 200px;">
                                                </div>
                                            @elseif ($file->extension === 'pdf')
                                                <div class="pdf" style="padding-right: 10px; margin-bottom: 20px;">
                                                    <div style="margin-left: 10px;">
                                                        <iframe src="{{ $file->file_url }}" frameborder="4"
                                                            style="height: 200px;width:100%"></iframe>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="mt-5">
                                                <form action="{{ route('admin.file.destroy', $file) }}" method="post"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete?')"> Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
