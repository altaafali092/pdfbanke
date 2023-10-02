@extends('frontend.layouts.master')

@section('main-container')
    <div class="container-fluid py-2">
        <a href="{{route('index')}}"><i class="fa fa-home" style="font-size: 20px;"> > {{__('Important Link')}}</i></a>
    </div>
    <div class="container-fluid">
        <div class="text-white" style="background-color:blue; padding:10px;  height: 45px; width: 100%;">
            <i class="fa fa-newspaper-o" style="font-size: 20px;"> {{__('Important Link')}}</i>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{__('S.No.')}}</th>
                    <th>{{__('Office Name')}}</th>
                    <th>{{__('Links')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($links as $link)
                <tr>
                    <td>{{ $loop->iteration}}</td>
                    <td>
                        @if(App::getLocale()==='en')
                        {{$link->title ??''}}
                        @elseif(App::getLocale()==='ne')
                        {{$link->title_ne ??''}}
                        @endif
                    </td>
                    <td>
                        <a href="{{ $link->links}}" target="_blank">
                        {{ $link->links}}
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
