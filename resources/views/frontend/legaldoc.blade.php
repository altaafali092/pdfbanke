@extends('frontend.layouts.master')
@section('main-container')
    <div class="container-fluid py-3">
        <a href=""><i class="fa fa-home" style="font-size: 20px;"> >{{$legalList->title}}</i></a>
    </div>


    <div class="container-fluid py-2">
        <div class="row">
            <div class="col-md-8">
                <div>
                    @foreach ($legalList->files as $file)
                    <div class="col">
                        <h4 class="mt-3 text-center"><b>{{ $legalList->title?? ''}}</b></h4>
                        <iframe src="{{ $file->file_url ?? '' }}" height="700px" width="100%"></iframe>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    <h4>सम्बन्धित किसान सूचना केन्द्र</h4>
                   <h6> No Data !!</h6>
                </div>
            </div>
        </div>
    </div>
@endsection
