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
            <div class="col-md-6">
                <div class="tile">
                    <div class="tile-body">
                        @if (Session::has('message'))
                            <div id="alert-out" class="alert alert-info">
                          <span class="text-center"> {{ old('fname').' '.old('lname')}}{{ Session::get('message')}}</span>
                            </div>
                        @endif
                        <form class="form-horizontal" method="post" action="{{action('UserController@store')}}">
                            @csrf
                            <div class="form-group row">
                                <label class="control-label col-md-3">First Name:</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" name="fname" placeholder="Enter first name">
                                    @if ($errors->has('fname'))
                                        <span class="text-danger" role="alert">
                                        <strong>* Please enter your First Name</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Last Name:</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" name="lname" placeholder="Enter last name">
                                    @if ($errors->has('lname'))
                                        <span class="text-danger" role="alert">
                                        <strong>* Please enter your Last Name</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Role:</label>
                                <select name="role_id">
                                    @foreach($roles as $role)
                                        <option value="{{$role->role_id}}"> {{$role->role_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Id Number:</label>
                                <div class="col-md-8">
                                    <input class="form-control col-md-8" type="number" name="id_no" placeholder="Id No" >
                                    @if ($errors->has('id_no'))
                                        <span class="text-danger" role="alert">
                                        <strong>* Please enter your Identity Number</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Pf Number:</label>
                                <div class="col-md-8">
                                    <input class="form-control col-md-8" type="number" placeholder="PF Number"  name="pf_no">
                                    @if ($errors->has('pf_no'))
                                        <span class="text-danger" role="alert">
                                        <strong>* Please enter your Pf Number</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">School/Faculty:</label>
                                <select name="faculty_id">
                                    @foreach($faculties as $faculty)
                                        <option value="{{$faculty->id}}"> {{$faculty->faculty_name}}</option>
                                    @endforeach
                                </select>
                            </div>


                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="tile">

                    <div class="form-group row">
                        <label class="control-label col-md-3">Department:</label>
                        <select name="department_id">
                            @foreach($departments as $department)
                                <option value="{{$department->id}}"> {{$department->department_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Email:</label>
                        <div class="col-md-8">
                            <input class="form-control col-md-8" type="email" name="email" placeholder="Enter email address">
                            @if ($errors->has('email'))
                                <span class="text-danger" role="alert">
                                        <strong>* Please enter your Email</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Password:</label>
                        <div class="col-md-8">
                            <input class="form-control col-md-8" name="password" type="password" placeholder="Enter Password">
                            @if ($errors->has('password'))
                                <span class="text-danger" role="alert">
                                        <strong>* Please enter your Password</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8 col-md-offset-3">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-add"></i>Add User</button>
                            {{--&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>--}}
                        </div>
                    </div>

                    </form>

                </div>
            </div>
        </div>



    </main>


@stop
@section('script')
    <script>
    setTimeout(function () {
    $('#alert-out').hide();
    },3000);
    </script>
@stop