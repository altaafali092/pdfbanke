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
                            <form action="{{ route('admin.empDetail.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4 form-group">
                                        <label>Name of Employee</label>
                                        <input class="form-control" type="text" name="name"
                                            placeholder="Enter Employee Name">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>Name of Employee(Nepali)</label>
                                        <input class="form-control" type="text" name="name_ne"
                                            placeholder="कर्मचारीको नाम">
                                        @error('name_ne')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>Post</label>
                                        <input class="form-control" type="text" name="post"
                                            placeholder="Enter Post of Employee">
                                        @error('post')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label>पद</label>
                                    <input class="form-control" type="text" name="post_ne"
                                        placeholder="कर्मचारीको पद">
                                    @error('post_ne')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Level</label>
                                    <input class="form-control" type="text" name="level"
                                        placeholder="Enter Level of Employee">
                                    @error('level')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>तह</label>
                                    <input class="form-control" type="text" name="level_ne"
                                        placeholder="कर्मचारीको तह">
                                    @error('level_ne')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <label>Contact Number</label>
                                    <input class="form-control" type="number" name="contact" placeholder="Contact Number">
                                    @error('contact')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Email of Employee</label>
                                    <input class="form-control" type="text" name="email" placeholder="Email address">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Position</label>
                                    <input type="number" class="form-control" name="position" placeholder="enter positon">
                                    @error('position')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                                <div class="form-group">
                                    <label>Image of Employee</label>
                                    <input class="form-control" type="file" name="image">
                                    @error('image')
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
    </div>



    <div class="content-fluid">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">DataTables</h1>

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
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Level</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($empDetails as $key=>$empDetail)
                                    <tr>
                                        <td>{{ $empDetails->firstItem() + $key }} </td>
                                        <td>{{ $empDetail->name }}</td>
                                        <td>{{ $empDetail->post }}</td>
                                        <td>{{ $empDetail->level }}</td>
                                        <td>{{ $empDetail->contact }}</td>
                                        <td>{{ $empDetail->email }}</td>
                                        <td>
                                            <img src="{{ $empDetail->image ?? '' }}" height="50px" alt="">
                                        </td>
                                        <td>
                                            <a class="btn btn-primary"
                                                href="{{ route('admin.empDetail.edit', $empDetail) }}">Edit</a>
                                            <form action="{{ route('admin.empDetail.destroy', $empDetail) }}" method="post"
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
                                        <td colspan="6">
                                            <center>No data found.</center>
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endsection
