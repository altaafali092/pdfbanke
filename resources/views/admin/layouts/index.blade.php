@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="page-content fade-in-up">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="ibox bg-success color-white widget-stat">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">{{$sliders_count}}</h2>
                            <div class="m-b-5">Sliders</div><i class="ti-shopping-cart widget-stat-icon"></i>
                            <div><i class="fa fa-level-up m-r-5"></i><small></small></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ibox bg-info color-white widget-stat">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">{{$empDetails_count}}</h2>
                            <div class="m-b-5">EMPLOYEES</div><i class="ti-bar-message widget-stat-icon"></i>
                            <div><i class="fa fa-level-up m-r-5"></i><small>OFFICE EMPLOYEES LIST</small></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ibox bg-warning color-white widget-stat">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">{{$farmerLists_count}}</h2>
                            <div class="m-b-5">FARMER INFORMATION CENTER</div><i class="fa fa-money widget-stat-icon"></i>
                            <div><i class="fa fa-level-up m-r-5"></i><small>FARMER CATEGORY:{{ $farmerCategories_count}}</small></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ibox bg-danger color-white widget-stat">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">{{$newsLists_count}}</h2>
                            <div class="m-b-5">NEWS LIST</div><i class="ti-user widget-stat-icon"></i>
                            <div><i class="fa fa-level-up m-r-5"></i><small>NEWS CATEGORY:{{$newsCategories_count}}</small></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="ibox bg-success color-white widget-stat">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">{{$downloadLists_count}}</h2>
                            <div class="m-b-5">DOWNLOAD LIST</div><i class="ti-shopping-cart widget-stat-icon"></i>
                            <div><i class="fa fa-level-up m-r-5"></i><small>DOWNLOAD CATEGORY:{{$downloadCategories_count}}</small></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ibox bg-info color-white widget-stat">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">{{ $officeDetailLists_count}}</h2>
                            <div class="m-b-5">Office Detail List</div><i class="ti-bar-message widget-stat-icon"></i>
                            <div><i class="fa fa-level-up m-r-5"></i><small>office Detail List</small></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ibox bg-warning color-white widget-stat">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">{{$legalLists_count}}</h2>
                            <div class="m-b-5">LEGAL LISTS </div><i class="fa fa-money widget-stat-icon"></i>
                            <div><i class="fa fa-level-up m-r-5"></i><small>LEGAL CATEGORY:{{$legalCategories_count}}</small></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="ibox bg-danger color-white widget-stat">
                        <div class="ibox-body">
                            <h2 class="m-b-5 font-strong">{{$links_count}}</h2>
                            <div class="m-b-5">LINKS</div><i class="ti-user widget-stat-icon"></i>
                            <div><i class="fa fa-level-up m-r-5"></i><small>Important Links</small></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="chart-wrapper">
            <div class="progress-wrapper">
                <h2>Overview</h2>
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
@endsection
