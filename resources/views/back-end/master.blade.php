<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>HRMS</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <!-- Styles -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">



    <link href="{{ asset('back-end/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('front-end/css/font-end-style.css') }}" rel="stylesheet">
    <link href="{{ asset('back-end/css/back-end-style.css') }}" rel="stylesheet">

</head>
<body>
<div class="container-fluid totalBody">
    <div class="row">
        <div class="col-md-3">
            <div class="back-end-sidebar">
                <div class="sidebarHeadding">
                    <h2>
                        <i class="fas fa-paw"></i>
                        <a style="text-decoration: none;color: #ffffff;" href="{{ url('/home') }}">Dashboard</a>
                    </h2>
                </div>
                <div class="personalInfo">
                    <div class="row">
                        <div class="col-4">
                            <img width="50"  class="rounded-circle"  src="{{ asset('back-end/images/job-final-image.jpg') }}"/>
                        </div>
                        <div class="col-7">
                            <small>Welcome</small>
                            <h3>{{ Auth::user()->name }}</h3>
                        </div>
                    </div>
                </div>
                <div class="sidbarMenu">
                    <ul>
                        <li class="" data-toggle="collapse" data-target="#demo1">
                            <a id="myLink"> <i class="fas fa-home"></i>Setting <span class="fas fa-chevron-down"></span></a>
                            <ul id="demo1" class="collapse">
                                <li><a href="{{ route('manage-user') }}"> User Management</a></li>
                                <li><a href="{{ route('manage-role') }}"> Role Management</a></li>
                                <li><a href=""> Access Control</a></li>
                                <li><a href="{{ route('manage-department') }}"> Depertment Setup</a></li>
                                <li><a href="{{ route('manage-supervisor') }}"> Supervisor list</a></li>
                                <li><a href="{{ route('manage-departmentHead-setup') }}"> Department HeadList</a></li>
                            </ul>
                        </li>
                        <li  class="" data-toggle="collapse" data-target="#demo2">
                            <a id="myLink"> <i class="fas fa-user"></i> Recruitments <span class="fas fa-chevron-down"></span></a>
                            <ul id="demo2" class="collapse">
                                <li><a href="{{ route('manage-advertisement') }}"> Advertisement</a></li>
                                <li><a href="{{ route('applied-list') }}"> Applied List</a></li>
                                <li><a href="{{ route('short-list') }}"> Short List</a></li>
                                <li><a href="{{ route('written-list') }}"> Written List</a></li>
                                <li><a href="{{ route('viva-list') }}"> Viva List</a></li>
                                <li><a href="{{ route('final-list') }}"> Final List</a></li>
                            </ul>
                        </li>
                        <li  class="" data-toggle="collapse" data-target="#demo3">
                            <a  id="myLink"> <i class="fas fa-industry"></i> Employee Info <span class="fas fa-chevron-down"></span></a>
                            <ul id="demo3" class="collapse">
                                <li><a href="{{ route('manage-employee') }}"> Employee Manage</a></li>
                                @if(Auth::check() && Auth::user()->role != 1)
                                <li><a href="{{ url('single-employee-details-view',['id' => Auth::user()->employeeId ]) }}"> Employee Details</a></li>
                                @endif
                                <li><a href="{{ url('search-employee') }}"> Search Employee</a></li>
                                {{--<li><a href=""> Hierarchy</a></li>--}}
                            </ul>
                        </li>
                        <li  class="" data-toggle="collapse" data-target="#demo4">
                            <a  id="myLink"> <i class="fas fa-graduation-cap"></i> Attendance <span class="fas fa-chevron-down"></span></a>
                            <ul id="demo4" class="collapse">
                                <li><a href=""> Attendance Daily View</a></li>
                                <li><a href=""> Attendance Status</a></li>
                                <li><a href=""> Attendance Approval</a></li>
                            </ul>
                        </li>
                        <li  class="" data-toggle="collapse" data-target="#demo5">
                            <a id="myLink"> <i class="fas fa-file-code"></i> Leave <span class="fas fa-chevron-down"></span></a>
                            <ul id="demo5" class="collapse">
                                <li><a href=""> Leave Allocation</a></li>
                                <li><a href=""> Leave Balance</a></li>
                                <li><a href=""> Leave Apply</a></li>
                                <li><a href=""> Leave Approval</a></li>
                                <li><a href=""> Find Holiday</a></li>
                            </ul>
                        </li>
                        <li  class="" data-toggle="collapse" data-target="#demo7">
                            <a id="myLink"> <i class="fas fa-industry"></i> Separation <span class="fas fa-chevron-down"></span></a>
                            <ul id="demo7" class="collapse">
                                <li><a href=""> Resignation/Termination</a></li>
                                <li><a href=""> Approval</a></li>
                                <li><a href=""> Certificate Generate</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="back-end-header">
                <div class="row">
                    <div class="col-md-3">
                        <a target="_blank" href="{{ url('/') }}" class="btn btn-outline-warning btn-sm mt-3 ml-3">Go Website</a>
                    </div>
                    <div class="col-md-9">
                        <ul class="back-end-header-menu">
                            <li><a><i class="fas fa-comment-alt"></i></a></li>
                            <li><a><i class="fas fa-bell"></i></a></li>
                            <li><a><i class="fas fa-user-tie"></i> {{ Auth::user()->name }} <span class="fas fa-chevron-down"> </span></a>
                                <ul>
                                    <li><a href="">Setting<i class="fas fa-cog "></i></a></li>
                                    <li><a href="">Profile<i class="fas fa-user-tie"></i></a></li>
                                    <li><a onclick="event.preventDefault();document.getElementById('logout-form').submit();" href="{{ route('logout') }}">logout<i class="fas fa-sign-out-alt"></i></a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="app">
                @yield('body')
            </div>
            <div class="back-end-footer">

            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
{{--<script type="text/javascript" src="{{ asset('back-end/js/jquery-3.3.1.min.js') }}"></script>--}}
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{ asset('back-end/js/main.js') }}"></script>

<script type="text/javascript">
    jQuery(document).ready(function($){

        $('#table_id').DataTable();

        $('.sidbarMenu li').click(function() {
            $(this).siblings('li').addClass('collapsed');
            $('.sidbarMenu li ul').removeClass('show');
            $(this).siblings('li').removeClass('active');
            $(this).addClass('active');
        });
        $(".sidbarMenu li ul li a").click(function() {
            if($(this).attr("href")== window.location.href){
                $(this).attr("class","dropdown");
                $(".sidbarMenu li").addClass("dropdown");
            }
        });

        $(".back-end-header-menu li:last-child").click(function() {
            $(".back-end-header-menu li ul").toggle();
        });

        $('.back-end-header-menu li:last-child').click(function() {
            $(".back-end-header-menu li ul").css({
                'opacity' : '1',
                'visibility' : 'visible'
            });
        });

    }(jQuery));
</script>


<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'editor' );
    CKEDITOR.replace( 'editor1' );
    CKEDITOR.replace( 'editor2' );
    CKEDITOR.replace( 'editor3' );
    CKEDITOR.replace( 'editor4' );
    CKEDITOR.replace( 'editor5' );
</script>

</body>
</html>
