@extends('admin.layouts.master')
@section('content')
    <div class="container-fluid">
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Office Setting Form</h1>
        </div>
        <div class="page-content fade-in-up">
            <div class="row">
                <div class="col-md-12">
                    <div class="ibox">
                        <div class="ibox-head">
                            <div class="ibox-title">Form</div>
                        </div>
                        <div class="ibox-body">
                            <form action="{{ route('admin.officeSetting.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-4 form-group">
                                        <label>Office Name</label>
                                        <input class="form-control" name="office_name" type="text"
                                            value="{{ old('office_name', $officeSetting->office_name ?? '') }}"
                                            placeholder="Office Name">
                                        <span class="text-warning">
                                            @error('office_name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>कार्यालयको नाम</label>
                                        <input class="form-control" name="office_name_ne" type="text"
                                            value="{{ old('office_name_ne', $officeSetting->office_name_ne ?? '') }}"
                                            placeholder="कार्यालयको नाम">
                                        <span class="text-warning">
                                            @error('office_name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>Office Address</label>
                                        <input class="form-control" name="office_add" type="text"
                                            value="{{ old('office_name', $officeSetting->office_add ?? '') }}"
                                            placeholder="Office Address">
                                        <span class="text-warning">
                                            @error('office_add')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>कार्यालयको ठेगाना</label>
                                        <input class="form-control" name="office_add_ne" type="text"
                                            value="{{ old('office_add_ne', $officeSetting->office_add_ne ?? '') }}"
                                            placeholder="कार्यालयको ठेगाना">
                                        <span class="text-warning">
                                            @error('office_add_ne')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>Phone NO.*</label>
                                        <input class="form-control" name="phone" type="text"
                                            value="{{ old('phone', $officeSetting->phone ?? '') }}"
                                            placeholder="Phone number">
                                        <span class="text-warning">
                                            @error('phone')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>इमेल</label>
                                        <input class="form-control" name="email" type="text"
                                            value="{{ old('email', $officeSetting->email ?? '') }}" placeholder="इमेल">
                                        <span class="text-warning">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Cover Photo</label>
                                        <img src="{{ $officeSetting->cover ?? '' }}" height="100" alt="">
                                        <input class="form-control" type="file" name="cover">
                                        <span class="text-warning">
                                            @error('cover')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>logo 1</label>
                                        <img src="{{ $officeSetting->logo1 ?? '' }}" height="100" alt="">
                                        <input class="form-control" type="file" name="logo1">
                                        <span class="text-warning">
                                            @error('logo1')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>logo 2</label>
                                        <img src="{{ $officeSetting->logo2 ?? '' }}" height="100" alt="">
                                        <input class="form-control" type="file" name="logo2">
                                        <span class="text-warning">
                                            @error('logo2')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label>Ad photo</label>
                                        <img src="{{ $officeSetting->adphoto ?? '' }}" height="100" alt="">
                                        <input class="form-control" type="file" name="adphoto">
                                        <span class="text-warning">
                                            @error('adphoto')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="office_cheif_id">कार्यालय प्रमुख</label>
                                        <select name="office_cheif_id" id="office_cheif_id" class="form-control">
                                            <option value="">--Select Employee--</option>
                                            @foreach ($empDetails as $empDetail)
                                                <option value="{{ $empDetail->id }}"
                                                    {{ $empDetail->id == old('office_cheif_id', $officeSetting->office_cheif_id ?? '') ? 'selected' : '' }}>
                                                    {{ $empDetail->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-warning">
                                            @error('office_cheif_id')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-6 form-group">
                                        <label for="information_officer_id">सुचना अधिकारी</label>
                                        <select name="information_officer_id" id="information_officer_id"
                                            class="form-control">
                                            <option value="">--Select Employee--</option>
                                            @foreach ($empDetails as $empDetail)
                                                <option value="{{ $empDetail->id }}"
                                                    {{ $empDetail->id == old('information_officer_id', $officeSetting->information_officer_id ?? '') ? 'selected' : '' }}>
                                                    {{ $empDetail->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="text-warning">
                                            @error('information_officer_id')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4 form-group">
                                        <label>Map Url</label>
                                        <input class="form-control" type="url" name="mapurl"
                                            value="{{ old('mapurl', $officeSetting->mapurl ?? '') }}"
                                            placeholder="Map Url">
                                        <span class="text-warning">
                                            @error('mapurl')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>Facebook Url</label>
                                        <input class="form-control" type="url" name="fburl"
                                            value="{{ old('fburl', $officeSetting->fburl ?? '') }}"
                                            placeholder="Facebook Url">
                                        <span class="text-warning">
                                            @error('fburl')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label>Twitter(X) Url</label>
                                        <input class="form-control" type="url" name="twitterurl"
                                            value="{{ old('twitterurl', $officeSetting->twitterurl ?? '') }}"
                                            placeholder="Twitter Url">
                                        <span class="text-warning">
                                            @error('twitterurl')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
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
