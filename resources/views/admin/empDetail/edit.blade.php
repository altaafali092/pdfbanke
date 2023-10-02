@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Employee Detail From</h1>
        </div>
        <div class="page-content fade-in-up">
            <div class="row">
                <div class="col-md-12">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Basic form</div>
                        </div>
                        <div class="ibox-body">
                            <form action="{{ route('admin.empDetail.update', $empDetail) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-sm-4 form-group">
                                        <label>Name of Employee</label>
                                        <input class="form-control" type="text" name="name"
                                            value="{{ old('name', $empDetail->name) }}">
                                        @error('name')
                                            <div class="text-danger">{{ 'message' }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>Name of Employee(Nepali)</label>
                                        <input class="form-control" type="text" name="name_ne"
                                            value="{{ old('name_ne', $empDetail->name_ne ?? '') }}"
                                            placeholder="कर्मचारीको नाम">
                                        @error('name_ne')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>Post</label>
                                        <input class="form-control" type="text" name="post"
                                            value="{{ old('post', $empDetail->post) }}">
                                        @error('post')
                                            <div class="text-danger">{{ 'message' }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 form-group">
                                        <label>पद</label>
                                        <input class="form-control" type="text" name="post_ne"
                                            value="{{ old('post_ne', $empDetail->post_ne ?? '') }}"
                                            placeholder="कर्मचारीको पद">
                                        @error('post_ne')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Level</label>
                                        <input class="form-control" type="text" name="level"
                                            value="{{ old('level', $empDetail->level) }}">
                                        @error('level')
                                            <div class="text-danger">{{ 'message' }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>तह</label>
                                        <input class="form-control" type="text" name="level_ne"
                                            value="{{old('level_ne',$empDetail->level_ne ??'')}}">
                                        @error('level_ne')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label>Contact Number</label>
                                        <input class="form-control" type="number" name="contact"
                                            value="{{ old('contact', $empDetail->contact) }}">
                                        @error('contact')
                                            <div class="text-danger">{{ 'message' }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Email of Employee</label>
                                        <input class="form-control" type="text" name="email"
                                            value="{{ old('email', $empDetail->email) }}">
                                        @error('email')
                                            <div class="text-danger">{{ 'message' }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Position</label>
                                        <input type="number" class="form-control" name="position" value="{{old('position',$empDetail->position)}}">
                                        @error('position')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Image of Employee</label>
                                    <input class="form-control" type="file" name="image"
                                        value="{{ old('image', $empDetail->image) }}">
                                    @error('image')
                                        <div class="text-danger">{{ 'message' }}</div>
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
@endsection
