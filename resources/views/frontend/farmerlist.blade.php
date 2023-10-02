@extends('frontend.layouts.master')
@section('main-container')
    <div class="container-fluid py-2">
        <a href=""><i class="fa fa-home" style="font-size: 20px;"> > किसान सूचना केन्द्र</i></a>

    </div>

    <div class="text-white" style="background-color:blue; padding:10px;  height: 45px; width: 100%;">
        <i class="fa fa-newspaper-o" style="font-size: 20px;"> किसान सूचना केन्द्र</i>
    </div>
    <div class="container-fluid">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>क्र.सं</th>
                    <th>शीर्षक</th>
                    <th>समुह</th>
                    <th>प्रकाशित मिति</th>
                    <th>प्रकाशक</th>
                    <th>#</th>
                </tr>
            <tbody>
                @foreach ($farmerLists as $farmerList)
                   
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td> @if (App::getLocale() === 'en')
                            {{ $farmerList->title ?? '' }}
                        @elseif (App::getLocale() === 'ne')
                            {{ $farmerList->title_ne ?? '' }}
                        @endif</td>
                        <td>{{ $farmerList->farmerCategory->title ?? '' }}</td>
                        <td>{{ $farmerList->publish_date }}</td>
                        <td>{{ $farmerList->publisher }}</td>
                        <td><a href="{{ route('farmerListDetails', ['farmerList' => $farmerList->slug]) }}"><i
                                    class="fa fa-eye btn btn-primary btn-xs">
                                    विवरण हेर्नुहोस्</i> </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            </thead>
        </table>
    </div>
@endsection
