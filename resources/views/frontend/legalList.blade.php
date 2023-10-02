@extends('frontend.layouts.master')
@section('main-container')
    <div class="container-fluid py-2">
        <a href=""><i class="fa fa-home" style="font-size: 20px;"> > कार्यविधि/ निर्देशिका</i></a>
    </div>
    <div class="container-fluid">
        <div class="text-white" style="background-color:blue; padding:10px;  height: 45px; width: 100%;">
            <i class="fa fa-newspaper-o" style="font-size: 15px;"><b> कार्यविधि/ निर्देशिका</b> </i>
        </div>
        <table class="table table-striped mt-2">
            <thead>
                <tr>
                    <th>क्र.सं</th>
                    <th>शीर्षक</th>
                    <th>समुह</th>
                    <th>प्रकाशित मिति</th>
                    <th>प्रकाशक</th>
                    <th> विवरण हेर्नुहोस्</th>
                </tr>
            <tbody>
                @foreach ($legalLists as $legalList)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$legalList->title}}</td>
                    <td>{{$legalList->legalCategory->title ?? ''}}</td>
                    <td>{{$legalList->publish_date}}</td>
                    <td>{{$legalList->publisher}}</td>
                    <td><a href="{{route('legalListDetails',['legalList'=> $legalList->slug])}}"><i class="fa fa-eye btn btn-primary btn-xs"></i> </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </thead>
        </table>
    </div>
@endsection
