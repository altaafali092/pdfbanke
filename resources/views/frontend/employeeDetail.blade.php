@extends('frontend.layouts.master')


@section('main-container')
    <div class="container-fluid py-2">
        <a href="{{ url('index') }}"><i class="fa fa-home" style="font-size: 16px;"> > कर्मचारीहरु</i></a>
    </div>
    <div class="container text-center py-4">
        <div class="row">
            <div class="col">
                <div class="row">
                    @foreach ($employeeDetails as $employeeDetail)
                        <div class="col-md-3">
                            <img class="rounded py-2" src="{{ $employeeDetail->image }}" height="200" width="200"
                                alt="">
                            <h6 class="fw-bold">{{ $employeeDetail->name_ne }}</h6>
                            <p>{{ $employeeDetail->post_ne }}</p>
                            <p>{{ $employeeDetail->level_ne }}</p>
                            <p><i class="fa fa-phone"></i>{{ $employeeDetail->contact }}</p>
                            <p><i class="fa fa-envelope"></i> {{ $employeeDetail->email }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
