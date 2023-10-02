@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Add New List</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html"><i class="la la-home font-20"></i></a>
                </li>
                <li class="breadcrumb-item">Basic Form</li>
            </ol>
        </div>
        <div class="page-content fade-in-up">
            <div class="row">
                <div class="col-md-12">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Basic form</div>

                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="ibox-body">

                            <form action="{{ route('admin.officeDetailList.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Title</label>
                                        <input class="form-control" name="title" type="text" placeholder="title">
                                        <span class="text-danger">
                                            @error('title')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Title(Nepali)</label>
                                        <input class="form-control" name="title_ne" type="text" placeholder="title">
                                        <span class="text-danger">
                                            @error('title_ne')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input class="form-control" type="text" name="slug" placeholder="slug">
                                    <span class="text-danger">
                                        @error('slug')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label>position</label>
                                    <input class="form-control" type="number" name="position" placeholder="Poisition">
                                    <span class="text-danger">
                                        @error('position')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="office_detail_id" class="form-control">
                                        <option value="">--Select Category--</option>
                                        @foreach ($officeDetails as $officeDetail)
                                            <option value="{{ $officeDetail->id }} "
                                                {{ old('office_detail_id', $officeDetail->office_detail_id) == $officeDetail->id ? 'selected' : '' }}>
                                                {{ $officeDetail->title }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">
                                        @error('office_detail_id')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control summernote" data-plugin="summernote" data-air-mode="true" type="text"
                                        name="description" placeholder="Description">{{ old('description', $officeDetailList->description ?? '') }}</textarea>
                                    <span class="text-warning">
                                        @error('description')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label>Description(nepali)</label>
                                    <textarea class="form-control summernote" data-plugin="summernote" data-air-mode="true" type="text"
                                        name="description_ne" placeholder="Description">{{ old('description_ne', $officeDetailList->description_ne ?? '') }}</textarea>
                                    <span class="text-warning">
                                        @error('description_ne')
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
    </div>



    <div class="container-fluid">
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
                                <th>Title(nepali)</th>
                                <th>Slug</th>
                                <th>Category</th>
                                <th>Status</th>
                                {{-- <th>Description</th>
                                <th>Description(Nepali)</th> --}}
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($officeDetailLists as $key=>$officeDetailList)
                                <tr>
                                    <td>{{ $officeDetailLists->firstItem() + $key }}</td>
                                    <td>{{ $officeDetailList->title }}</td>
                                    <td>{{ $officeDetailList->title_ne }}</td>
                                    <td>{{ $officeDetailList->slug }}</td>
                                    <td>{{ $officeDetailList->officeDetail->title ?? '' }}</td>
                                    <td>
                                        <form
                                            action="{{ route('admin.officeDetailList.updateStatus', $officeDetailList) }}"
                                            method="post" style="display: inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" style="border: none; background: none;">
                                                <i
                                                    class="fa fa-{{ $officeDetailList->status == 1 ? 'toggle-on text-success' : 'toggle-off text-danger' }} fa-2x"></i>
                                            </button>
                                        </form>
                                    </td>
                                    {{-- <td>{!! $officeDetailList->description !!}</td>
                                <td>{!! $officeDetailList->description_ne !!}</td> --}}
                                    <td>
                                        <a class="btn btn-warning"
                                            href="{{ route('admin.officeDetailList.show', $officeDetailList) }}">View</a>
                                        <a class="btn btn-primary"
                                            href="{{ route('admin.officeDetailList.edit', $officeDetailList) }}">Edit</a>
                                        <form action="{{ route('admin.officeDetailList.destroy', $officeDetailList) }}"
                                            method="post" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger text-white"
                                                onclick="return confirm('Are you sure want to Delete')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">
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

    @push('script')
        <script type="text/javascript">
            $(function() {
                $('.summernote').summernote();
                $('.summernote_air').summernote({
                    airMode: true
                });
            });
        </script>
    @endpush
@endsection
