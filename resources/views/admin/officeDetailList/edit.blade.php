@extends('admin.layouts.master')
@section('content')

 <div class="container-fluid">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Basic Form</h1>
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
                        <div class="ibox-body">
                            {{-- @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif --}}
                            <form action="{{ route('admin.officeDetailList.update', $officeDetailList) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Title</label>
                                        <input class="form-control" name="title" type="text" value="{{old('title',$officeDetailList->title)}}" placeholder="title">
                                        <span class="text-danger">
                                            @error('title')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Title(Nepali)</label>
                                        <input class="form-control" name="title_ne" type="text" value="{{old('title_ne',$officeDetailList->title_ne)}}" placeholder="title">
                                        <span class="text-danger">
                                            @error('title_ne')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label>position</label>
                                        <input class="form-control" type="number" name="position" placeholder="position" value="{{old('position',$officeDetailList->position)}}">
                                        <span class="text-danger">
                                            @error('position')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input class="form-control" type="text" name="slug" value="{{old('slug',$officeDetailList->slug)}}" placeholder="slug">
                                    <span class="text-danger">
                                        @error('slug')
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
                                            {{ old('office_detail_id', $officeDetailList->office_detail_id) == $officeDetail->id ? 'selected' : '' }}>
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
                                    <label>Description(Nepali)</label>
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