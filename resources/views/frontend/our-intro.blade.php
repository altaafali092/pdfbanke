@extends('frontend.layouts.master')
@section('main-container')
    <div class="container-fluid py-2">
        <a href="{{ route('index') }}"><i class="fa fa-home" style="font-size: 16px;"> > {{ $officeDetail->title_ne }}</i></a>
    </div>
    <div class="container-fluid">
        <div class="text-white" style="background-color:blue; padding:10px;  height: 45px; width: 100%;">
            <i class="fa fa-clipboard" style="font-size: 18px;"> {{ $officeDetail->title_ne }} </i>
        </div>
    </div>
    <div class="container-fluid py-3">
        @if ($officeDetail->officeDetailList && $officeDetail->officeDetailList->isNotEmpty())
            @foreach ($officeDetail->officeDetailList as $item)
                <p>
                    <span style="font-size:40px;">
                        {!! $item->description_ne !!}
                    </span>
                </p>
            @endforeach
        @else
            <p>No office details found.</p>
        @endif
    </div>
@endsection
