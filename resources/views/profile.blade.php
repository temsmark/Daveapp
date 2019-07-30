@extends('layouts.master')
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-plus"></i> More ...</h1>
                <p>" {{str_limit(Illuminate\Foundation\Inspiring::quote(),60,'... -- more--')}} "</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-sm"></i></li>
                <li class="breadcrumb-item">Claim</li>
                <li class="breadcrumb-item">Recent Claims</li>
                <li class="breadcrumb-item">More ..</li>



            </ul>
        </div>

<div class="row">
    @foreach($data as $profile)
    <div class="col-sm-4">
            <div class="card" style="width:400px">
                <img class="card-img-top" src="{{$profile->path}}" alt="Card image" >
                <div class="card-body">
                    <h4 class="card-title text-center">{{ucfirst($profile->fname).' '.ucfirst($profile->lname)}}</h4>
                    <h5 class="text-center"><b><i>PF NO:{{$profile->pf_no}}</i></b></h5>
                    <p class="card-text text-center small">{{$profile->role['role_name']}}</p>
                </div>
            </div>

    </div>

    <div class="col-sm-8">
        <div class="tile">
            <div class="tile-body">
                <ul class="list-group">
                    @if (Session::has('message'))
                        <div id="alert-out" class="alert alert-success">

                            <h3 class="text-center"><i>{{Session::get('message')}}</i></h3>
                        </div>
                    @endif
                @foreach ($errors->all() as $error)
                        <li class="list-group-item list-group-item-danger">{{$error}}</li>
                @endforeach
                    </ul>
                <form class="form-horizontal m-3" method="post" action="{{action('UserController@update',['id'=>Auth::User()->id])}}" enctype="multipart/form-data">
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
                        <label class="control-label col-md-3">Department</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text"  name="department" value="{{$profile->department['department_name']}}" disabled>
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
                        <label class="control-label col-md-3">Profile Pic</label>
                        <div class="col-md-8">
                            <input class="form-control-file" type="file" name="image">
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
        @endforeach

</div>
    </main>


@stop
@section('script')
    <script>  setTimeout(function () {
            $('#alert-out').hide();
        },3000);
    </script>
@stop