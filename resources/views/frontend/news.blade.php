@extends('frontend.layouts.master')

@section('main-container')
    <div class="container-fluid my-3">
        <a href="{{route('index')}}"><i class="fa fa-home" style="font-size: 20px;"> > {{__('Information/News')}}</i></a>
    </div>
    
    <div class="container-fluid">
        <div class="text-white" style="background-color:blue; padding:10px;  height: 45px; width: 100%;">
            <i class="fa fa-newspaper-o" style="font-size: 18px;"><b> {{__('Information/News')}}</b></i>
        </div>
        <table class="table mt-2">
            <thead>
                <tr>
                    <th>क्र.सं</th>
                    <th>शीर्षक</th>
                    <th>समुह</th>
                    <th>प्रकाशित मिति</th>
                    <th>प्रकाशक</th>
                    <th> विवरण हेर्नुहोस्</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($newsCategory->newsLists as $key => $newsList)
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>
                        @if(App::getLocale()==='en')
                        {{$newsList->title ??''}}
                        @elseif(App::getLocale()==='ne')
                        {{$newsList->title_ne ??''}}
                        @endif
                    </td>
                    {{-- <td> {{ $newsList->newsCategory->title ??'' }}</td> --}}
                    <td>
                        @if(App::getLocale()==='en')
                        {{$newsList->newsCategory->title ??''}}
                        @elseif(App::getLocale()==='ne')
                        {{$newsList->newsCategory->title_ne ??''}}
                        @endif
                    </td>
                     <td> {{ $newsList->publish_date ??'' }}</td>
                    <td> {{ $newsList->publisher ?? ''}}</td>

                    <td>
                        <a href="{{route('newsListDetails',['newsList'=> $newsList->slug])}}"
                            class="btn btn-sm btn-info">
                            <i class="fa fa-eye"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
