<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="{{ asset('assets/img/admin-avatar.png') }}" width="45px" />
            </div>
            <div class="admin-info">
                <div class="font-strong">James Brown</div><small>Administrator</small>
            </div>
        </div>
        <ul class="side-menu metismenu">
            <li>
                <a class="active" href="{{ route('admin.dashboard') }}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                    <span class="nav-label">हाम्रो बारेमा</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ route('admin.officeDetail.index') }}">Intro Category</a>
                    </li>
                    <li>
                        <a href="{{route('admin.officeDetailList.index')}}">IntroList</a>
                    </li>

                </ul>
            </li>
             <li>
                <a href="{{ route('admin.empDetail.index') }}"><i class="sidebar-item-icon fa fa-sliders"></i>
                    <span class="nav-label">कर्मचारीहरु </span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.officeSetting.index') }}"><i class="sidebar-item-icon fa fa-sliders"></i>
                    <span class="nav-label">कर्यालय Setting</span>
                </a>
            </li>
            <li>
                <a href=""><i class="sidebar-item-icon fa fa-edit"></i>
                    <span class="nav-label">डाउनलोड</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ route('admin.downloadCategory.index') }}">डाउनलोड Category</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.downloadList.index') }}">डाउनलोड लिस्ट</a>
                    </li>

                </ul>
            </li>

            <li>
                <a href=""><i class="sidebar-item-icon fa fa-newspaper-o"></i>
                    <span class="nav-label">सुचना/ समाचार</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ route('admin.newsCategory.index') }}">सुचना/ समाचार Category</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.newsList.index') }}">list</a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-table"></i>
                    <span class="nav-label">कानूनी दस्तावेज</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ route('admin.legalCategory.index') }}">legalCategory</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.legalList.index') }}">LegalList</a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="{{ route('admin.links.index') }}"><i class="sidebar-item-icon fa fa-link"></i>
                    <span class="nav-label"> लिंकहरु</span>
                </a>
            </li>
            <li>
                <a href=""><i class="sidebar-item-icon fa fa-image"></i>
                    <span class="nav-label">Gallery</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{ route('admin.galleryPhoto.index') }}">photoGallery</a>
                    </li>
                    <li>
                        <a href="{{route('admin.galleryVideo.index')}}">VideoGallery</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                    <span class="nav-label">Charts</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="charts_flot.html">Flot Charts</a>
                    </li>
                    <li>
                        <a href="charts_morris.html">Morris Charts</a>
                    </li>
                    <li>
                        <a href="chartjs.html">Chart.js</a>
                    </li>
                    <li>
                        <a href="charts_sparkline.html">Sparkline Charts</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-map"></i>
                    <span class="nav-label">किशान सुचना</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('admin.farmerCategory.index')}}">kisaan Cateory</a>
                    </li>
                    <li>
                        <a href="{{route('admin.farmerList.index')}}">kisaan List</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('admin.slider.index') }}"><i class="sidebar-item-icon fa fa-sliders"></i>
                    <span class="nav-label">स्लाइडर</span>
                </a>
            </li>   
            <li>
                <a href="{{ route('admin.CoverSlider.index') }}"><i class="sidebar-item-icon fa fa-sliders"></i>
                    <span class="nav-label"> Cover स्लाइडर</span>
                </a>
            </li>  
            <li>
                <a href="{{ route('admin.contact.index') }}"><i class="sidebar-item-icon fa fa-envelope"></i>
                    <span class="nav-label">Feedback or Query</span></a>
            </li>
           
        </ul>
    </div>
</nav>
