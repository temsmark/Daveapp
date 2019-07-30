@extends('layouts.master')
@section('content')


    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-users"></i> Edit User</h1>
                <p>" {{str_limit(Illuminate\Foundation\Inspiring::quote(),60,'... -- more--')}} "</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-sm"></i></li>
                <li class="breadcrumb-item "><a href="#">Manage Users</a></li>
                <li class="breadcrumb-item"><a href="#">Edit User</a></li>

            </ul>
        </div>



        <div class="row">

            @foreach($data as $profile)
            <div class="col-md-6">
                <div class="tile">

                    <div class="tile-title-w-btn">
                        <h3 class="title">Edit Users</h3>
                        <p class="small"><sup>**</sup>Remember to set user to a particular role,department and faculty</p>
                    </div>
                    <div class="tile-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success text-center" id="alert-out">
                                {{Session::get('message')}}
                            </div>
                        @endif
                        <form class="form-horizontal m-3" method="post" action="{{action('UserController@adminupdate',['id'=>$profile->id])}}" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="form-group row">
                                <label class="control-label col-md-3">First Name</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" placeholder="First Name" name="fname" value="{{$profile->fname}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Last Name</label>
                                <div class="col-md-8">
                                    <input class="form-control" type="text" placeholder="Last Name" name="lname" value="{{$profile->lname}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">Email</label>
                                <div class="col-md-8">
                                    <input class="form-control col-md-8" type="email" placeholder="Enter email address" name="email" value="{{$profile->email}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Pf Number</label>
                                <div class="col-md-8">
                                    <input class="form-control col-md-8" type="number" name="pf_no" value="{{$profile->pf_no}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Id Number</label>
                                <div class="col-md-8">
                                    <input class="form-control col-md-8" type="number" name="id_no" value="{{$profile->id_no}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">Role</label>
                                <div class="col-md-8">
                                    <select name="role_id" id="">
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{$role->role_name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Faculty</label>
                                <div class="col-md-8">
                                    <select name="faculty_id" id="">
                                        @foreach($faculties as $faculty)
                                            <option value="{{$faculty->id}}">{{str_limit( $faculty->faculty_name,40)}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="control-label col-md-3">Department</label>
                                <div class="col-md-8">
                                    <select name="department_id" id="">
                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}">{{$department->department_name}}</option>

                                        @endforeach

                                    </select>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="control-label col-md-3">Password</label>
                                <div class="col-md-8">
                                    <input class="form-control col-md-8" type="password" name="password">
                                </div>
                            </div>
                            <button class="btn btn-success " type="submit"><i class="fa fa-fw fa-lg fa-arrow-up"></i>Update</button>

                        </form>

                    </div>
                </div>
            </div>
                <div class="col-md-6">
                    <div class="tile">


                        <div class="card" style="width:400px">
                            <img class="card-img-top" src="{{$profile->path}}" alt="Card image" >
                            <div class="card-body">
                                <h4 class="card-title text-center">{{ucfirst($profile->fname).' '.ucfirst($profile->lname)}}</h4>
                                <h5 class="text-center"><b><i>PF NO:{{$profile->pf_no}}</i></b></h5>
                                <p class="card-text text-center small">{{$profile->role['role_name']}}</p>
                            </div>
                        </div>
                    </div>
                </div>


            @endforeach
        </div>

    </main>
    
@stop
@section('script')
    <script>
        setTimeout(function () {
            $('#alert-out').hide()
        },3000)
    </script>
@stop