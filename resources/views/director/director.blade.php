@extends('layouts.master')
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
                <p>" {{str_limit(Illuminate\Foundation\Inspiring::quote(),60,'... -- more--')}} "</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-sm"></i></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                    <div class="info">
                        <h4>Users in Dep</h4>
                        {{--<p><b>{{count($users)}}</b></p>--}}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="widget-small info coloured-icon"><i class="icon fa fa-building-o fa-3x"></i>
                    <div class="info">
                        <h4>Departments</h4>
                        <p><b></b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
                    <div class="info">
                        <h4>Uploades</h4>
                        <p><b>10</b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
                    <div class="info">
                        <h4>Claims</h4>
                        {{--<p><b>{{count($claim)}}</b></p>--}}
                    </div>
                </div>
            </div>
        </div>
    </main>


@stop