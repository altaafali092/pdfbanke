@extends('admin.layouts.master')
@section('content')
    <div class="container">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Legalलिस्टमा सुधार गर्नुहोस्</h1>

        </div>
        <div class="page-content fade-in-up">
            <div class="row">
                <div class="col-md-9">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Basic form</div>

                        </div>
                        <div class="ibox-body">
                            <form action="{{ route('admin.legalList.update', $legalList) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Title</label>
                                        <input class="form-control" name="title" type="text" value="{{old('title',$legalList->title)}}" placeholder="Enter Title">
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Title_NE</label>
                                        <input class="form-control" name="title_ne" type="text" value="{{old('title_ne',$legalList->title_ne)}}" placeholder="Enter Title_ne">
                                        @error('title_ne')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 form-group">
                                        <label>Slug</label>
                                        <input class="form-control" value="{{old('slug',$legalList->slug ?? '')}}" name="slug" type="text" placeholder="Enter slug">
                                        @error('slug')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class=" col-sm-6 form-group">
                                        <label>Category</label>
                                        <select name="legal_category_id" class="form-control">
                                            <option value="">--Select Category--</option>
                                            @foreach ($legalCategories as $legalCategory)
                                                <option value="{{ $legalCategory->id }} "
                                                    {{ old('legal_category_id', $legalCategory->legal_category_id) == $legalCategory->id ? 'selected' : '' }}>
                                                    {{ $legalCategory->title }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-warning">
                                            @error('legal_category_id')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label>Publisher</label>
                                    <input class="form-control" type="text" value="{{old('publisher',$legalList->publisher  ?? '')}}" name="publisher"
                                        placeholder="Enter publisher">
                                    @error('publisher')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Publish Date</label>
                                    <input class="form-control" name="publish_date" type="date" placeholder="Enter Date">
                                    @error('publish_date') 
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="files"> File(Multiple )</label>
                                    <input class="form-control" id="file" type="file" name="files[]"
                                        multiple>
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
    </div>
    @endsection