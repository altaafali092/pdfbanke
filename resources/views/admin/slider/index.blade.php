@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">नयाँ स्लाइडर थप्नुहोस्</h1>
        </div>
        <div class="page-content fade-in-up">
            <div class="row">
                <div class="col-md-9">
                    <div class="ibox">
                        <div class="ibox-body">
                            <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Title</label>
                                        <input class="form-control" name="title" type="text" placeholder="Enter Title">
                                        @error('title')
                                            <div class="text-danger">{{ 'message' }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Title (Nepali)</label>
                                        <input class="form-control" name="title_ne" type="text"
                                            placeholder="Enter Title">
                                        @error('title_ne')
                                            <div class="text-danger">{{ 'message' }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input class="form-control" type="file" name="image">
                                    @error('image')
                                        <div class="text-danger">{{ 'message' }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-info" type="submit">Submit</button>
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
        <h1 class="page-title">Slider Tables</h1>

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
                            <th>image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sliders as $key=>$slider)
                            <tr>
                                <td>{{ $sliders->firstItem() + $key }}</td>
                                <td>{{ $slider->title }}</td>
                                <td>{{ $slider->title_ne }}</td>
                                <td>
                                    <img src="{{ $slider->image }}" height="50px" alt="">
                                </td>
                                <td>
                                    <a class="btn btn-primary text-white"
                                        href="{{ route('admin.slider.edit', $slider) }}">Edit</a>
                                    <form action="{{ route('admin.slider.destroy', $slider) }}" method="post"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger text-white" type="submit"
                                            onclick="return confirm('Are you sure want to delete')"> Delete</button>
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
                {{ $sliders->links() }}
            </div>
        </div>
    </div>
    </div>
@endsection
