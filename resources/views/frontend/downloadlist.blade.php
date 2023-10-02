@extends('frontend.layouts.master')

@section('main-container')
    <div class="container-fluid py-2">
        <a href="{{route('index')}}"><i class="fa fa-home" style="font-size: 20px;"> > 
        @if(App::getLocale()==='en')
        {{$downloadCategory->title ??''}}
        @elseif(App::getLocale()==='ne')
        {{$downloadCategory->title_ne ??''}}
        @endif
        </i></a>
    </div>
    
    <div class="container-fluid mt-2">
        <div class="text-white" style="background-color:blue ; padding:10px;  height: 45px; width: 100%;">
            <i class="fa fa-newspaper-o" style="font-size: 20px;"> 
            @if(App::getLocale()==='en')
            {{$downloadCategory->title ??''}}
            @elseif(App::getLocale()==='ne')
            {{$downloadCategory->title_ne ??''}}
            @endif
            </i>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>क्र.सं</th>
                    <th>{{__('Title')}}</th>
                    <th>{{__('Category')}}</th>
                    <th>{{'Publish Date'}}</th>
                    <th>{{__('Publisher')}}</th>
                    <th>{{__('See Details')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($downloadCategory->downloadLists as $key => $downloadList)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>
                        @if(App::getLocale()==='en')
                        {{$downloadList->title ??''}}
                        @elseif(App::getLocale()==='ne')
                        {{$downloadList->title_ne ??''}}
                        @endif
                    </td>
                    <td>
                        @if(App::getLocale()==='en')
                        {{$downloadList->downloadCategory->title ??''}}
                        @elseif(App::getLocale()==='ne')
                        {{$downloadList->downloadCategory->title_ne ??''}}
                        @endif
                    </td>
                    <td> {{ $downloadList->publisher_date??'' }}</td>
                    <td> PDF</td>
                    <td><a href="{{ route('downloadDetail',$downloadList)}}"><i class="fa fa-eye btn btn-primary btn-xs"></i> </a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection
