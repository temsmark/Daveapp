<!DOCTYPE html>
<html lang="en">
<head>

    <title>P.T.C.S</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @yield('css')
</head>
<body class="app sidebar-mini rtl">
<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="{{url('/')}}">P.T.C.S  <sup>(Beta <sup>v.1</sup>)</sup></a>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
    {{--<li class="app-search">--}}
    {{--<input class="app-search__input" type="search" placeholder="Search">--}}
    {{--<button class="app-search__button"><i class="fa fa-search"></i></button>--}}
    {{--</li>--}}
    <!--Notification Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
                <li class="app-notification__title">You have 4 new notifications.</li>
                <div class="app-notification__content">
                    <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                            <div>
                                <p class="app-notification__message">Lisa sent you a mail</p>
                                <p class="app-notification__meta">2 min ago</p>
                            </div></a></li>
                    <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                            <div>
                                <p class="app-notification__message">Mail server not working</p>
                                <p class="app-notification__meta">5 min ago</p>
                            </div></a></li>
                    <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                            <div>
                                <p class="app-notification__message">Transaction complete</p>
                                <p class="app-notification__meta">2 days ago</p>
                            </div></a></li>
                    <div class="app-notification__content">
                        <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                                <div>
                                    <p class="app-notification__message">Lisa sent you a mail</p>
                                    <p class="app-notification__meta">2 min ago</p>
                                </div></a></li>
                        <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                                <div>
                                    <p class="app-notification__message">Mail server not working</p>
                                    <p class="app-notification__meta">5 min ago</p>
                                </div></a></li>
                        <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                                <div>
                                    <p class="app-notification__message">Transaction complete</p>
                                    <p class="app-notification__meta">2 days ago</p>
                                </div></a></li>
                    </div>
                </div>
                <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
            </ul>
        </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg small">{ {{ucfirst(Auth::user()->fname).' '.ucfirst(Auth::user()->lname) ?? ''}}}</i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li><a class="dropdown-item" href="{{url('user/profile')}}"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                <li><a class="dropdown-item" href="{{url('logout')}}"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            </ul>
        </li>
    </ul>
</header>
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="{{Auth::user()->path ?? ''}}" height="50px" width="50px" alt="User Image">
        <div>
            <p class="app-sidebar__user-name">{{ucfirst(Auth::user()->fname).' '.ucfirst(Auth::user()->lname) ?? ''}}</p>
            <br>
            {{--<h6 class="app-sidebar__user-designation text-center">Role</h6>--}}
            <i class="app-sidebar__user-designation">{{ucfirst(Auth::user()->role->role_name)}}</i>
        </div>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item {{(request()->is(['dashboard','finance','user','chairman']))?'active':''}}" href="
@if(Auth::User()->role_id==1)
            {{url('/dashboard')}}
            @elseif(Auth::User()->role_id==4)
            {{url('/finance')}}
            @elseif(Auth::User()->role_id==5)
            {{url('/user')}}
            @elseif(Auth::User()->role_id==3)
            {{url('/director')}}
            @elseif(Auth::User()->role_id==2)
            {{url('/chairman')}}
            @endif"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

        @if (Auth::User()->role_id==2)
            <li><a class="app-menu__item {{(request()->is('chairman/claim'))?'active':''}}" href="{{url('chairman/claim')}}"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Dep Claims</span></a></li>
        @elseif(Auth::User()->role_id==3)
            <li><a class="app-menu__item {{(request()->is('director/claim'))?'active':''}}" href="{{url('director/claim')}}"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Claims</span></a></li>

        @endif

        @if (Auth::User()->role_id==4)
            <li><a class="app-menu__item {{(request()->is('finance/claim'))?'active':''}}" href="{{url('finance/claim')}}"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">Claims</span></a></li>
            <li><a class="app-menu__item {{(request()->is('finance/voucher'))?'active':''}}" href="{{url('finance/voucher')}}"><i class="app-menu__icon fa fa-ticket"></i><span class="app-menu__label">Vouchers</span></a></li>

        @endif
        @if (Auth::User()->role_id==1)
            <li class="treeview {{(request()->is('manage/*'))?'is-expanded':''}} "><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Manage Users</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item {{(request()->is('manage/users'))?'active':''}}" href="{{url('manage/users')}}"><i class="icon fa fa-users"></i>All Users</a></li>
                    <li><a class="treeview-item {{(request()->is('manage/add'))?'active':''}}" href="{{url('manage/add')}}"><i class="icon fa fa-plus"></i>Add Users</a></li>
                    {{--<li><a class="treeview-item" href="widgets.html"><i class="icon fa fa-circle-o"></i> Widgets</a></li>--}}
                </ul>
            </li>
        @endif

        @if (Auth::user()->role_id!=4)

            <li class="treeview {{(request()->is('claim/*'))?'is-expanded':''}} "><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">My Claim</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item {{(request()->is('claim/claim'))?'active':''}}" href="{{url('claim/claim')}}"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Post Claim</span></a></li>
                    <li><a class="treeview-item {{(request()->is('claim/recent'))?'active':''}}" href="{{url('claim/recent')}}"><i class="app-menu__icon fa fa-clock-o"></i><span class="app-menu__label">Recent Claims</span></a></li>
                    {{--<li><a class="treeview-item" href="form-components.html"><i class="icon fa fa-circle-o"></i> Form Components</a></li>--}}
                    {{--<li><a class="treeview-item" href="form-custom.html"><i class="icon fa fa-circle-o"></i> Custom Components</a></li>--}}
                    {{--<li><a class="treeview-item" href="form-samples.html"><i class="icon fa fa-circle-o"></i> Form Samples</a></li>--}}
                    {{--<li><a class="treeview-item" href="form-notifications.html"><i class="icon fa fa-circle-o"></i> Form Notifications</a></li>--}}
                </ul>
            </li>

        @endif




    </ul>
    <li><a class="app-menu__item " href="{{route('logout')}}"><i class="app-menu__icon fa fa-sign-out"></i><span class="app-menu__label">Logout</span></a></li>
</aside>
@yield('content')

<!-- Essential javascripts for application to work-->
{{--<script src="js/jquery-3.2.1.min.js"></script>--}}
{{--<script src="{{asset('valijs/popper.min.js')}}"></script>--}}
{{--<script src="js/bootstrap.min.js"></script>--}}
<!-- The javascript plugin to display page loading on top-->
{{--<script src="js/plugins/pace.min.js"></script>--}}
<script type="text/javascript" src="{{asset('valijs/plugins/sweetalert.min.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>

<!-- Page specific javascripts-->
<!-- Google analytics script-->
@yield('script')

</body>
</html>