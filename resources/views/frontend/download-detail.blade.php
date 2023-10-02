@extends('frontend.layouts.master')

@section('main-container')
    <div class="container-fluid py-2">
        <a href="{{ route('index') }}"><i class="fa fa-home text-dark" style="font-size: 20px;"> >
                {{ $downloadList->title_ne ?? '' }}</i></a>
    </div>

    <div class="container-fluid py-3">
        <div class="row">
            <div class="col-sm-4">
                <h6 class="font-weight-bold mb-md-3">सम्बन्धित सुचना/ समाचार</h6>
            </div>
            <div class="col-sm-8">
                <div class="container text-center">
                    <div class="row">
                        @foreach ($downloadList->files as $file)
                            <div class="col">
                                <h5><b>{{ $downloadList->title_ne ?? '' }}</b></h5>
                                <iframe src="{{ $file->file_url ?? '' }}" height="500px" width="100%"></iframe>
                            </div>
                        @endforeach
                    </div>
                </div><br>
            </div>
        </div>
    </div>
@endsection
