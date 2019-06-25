@extends('layouts.master')
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-plus"></i> Add Users</h1>
                <p>" {{str_limit(Illuminate\Foundation\Inspiring::quote(),60,'... -- more--')}} "</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-sm"></i></li>
                <li class="breadcrumb-item"><a href="#">Manage Users</a></li>
                <li class="breadcrumb-item"><a href="#">Add Users</a></li>

            </ul>
        </div>
        <div class="row">
            {{--<div class="col-md-12">--}}
            {{--<div class="tile">--}}
            {{--<div class="tile-body">Create a beautiful dashboard</div>--}}
            {{--</div>--}}
            {{--</div>--}}
        </div>
    </main>


@stop