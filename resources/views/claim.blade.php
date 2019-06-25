@extends('layouts.master')
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-edit"></i> Claim</h1>
                <p>" {{str_limit(Illuminate\Foundation\Inspiring::quote(),60,'... -- more--')}} "</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-sm"></i></li>
                <li class="breadcrumb-item">Claim</li>
                <li class="breadcrumb-item">Claim Form</li>


            </ul>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="tile">
                    <h3 class="tile-title">Register</h3>
                    <hr>
                    <div class="tile-body">
                        <form class="form-horizontal">
                            <div class="form-group row">
                                <label class="control-label col-md-3">Name</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" placeholder="Enter full name" value="{{ucfirst(Auth::User()->fname).' '.ucfirst(Auth::User()->lname)}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Id Number</label>
                                <div class="col-md-8">
                                    <input class="form-control col-md-8" type="email" placeholder="Enter email address" value="{{Auth::User()->id_no}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Pf Number</label>
                                <div class="col-md-8">
                                    <input class="form-control col-md-8" type="email" placeholder="Enter email address" value="{{Auth::User()->pf_no}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Department</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" rows="4" placeholder="Enter your address"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Gender</label>
                                <div class="col-md-9">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="gender">Male
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="gender">Female
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Identity Proof</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="file">
                                </div>
                            </div>


                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="tile">
                    <div class="form-group row">
                        <label class="control-label col-md-3">Email</label>
                        <div class="col-md-8">
                            <input class="form-control col-md-8" type="email" placeholder="Enter email address">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-3">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Claim</button>
                            {{--&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>--}}
                        </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>
        </main>


@stop