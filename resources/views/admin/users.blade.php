@extends('layouts.master')
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-users"></i> All Users</h1>
                <p>" {{str_limit(Illuminate\Foundation\Inspiring::quote(),60,'... -- more--')}} "</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-sm"></i></li>
                <li class="breadcrumb-item "><a href="#">Manage Users</a></li>
                <li class="breadcrumb-item"><a href="#">All Users</a></li>

            </ul>
        </div>
        <div class="row">
            <div class="container-fluid">
                <div class="tile">
                    <h3 class="tile-title">All Users</h3>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>PF Number</th>
                            <th>Id Number</th>
                            <th>Created </th>
                            <th>Edit</th>
                            <th>Delete </th>



                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$count++}}</td>
                            <td><img src="{{$user->path}}" height="30px" width="30px" alt="">
                                {{ ucfirst($user->fname). ' '. ucfirst($user->lname)}}</td>
                                <td><span class="font-weight-bold">{{$user->role->role_name}}</span>
                                    <br>
                                  <i class="small"> {{strtoupper(($user->department_id==null)?'Management' :$user->department['department_name'])}} </i></td>

                            <td>{{$user->email}}</td>
                            <td>PF_{{$user->pf_no}}</td>
                            <td>{{$user->id_no}}</td>
                            <td>{{$user->created_at->DiffForHumans()}}</td>
                            <td> <a href="{{url('edit/'.$user->id)}}" class="btn btn-info" role="button">EDIT</a></td>
                            <td> <a class="btn btn-danger" id="demoNotify" href="{{url('manage/users/'.$user->id)}}">DELETE</a></td>

                        </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div>
                        {{$users->render()}}
                    </div>
                </div>
            </div>
        </div>
    </main>
    @section('script')
        <script type="text/javascript" src="{{asset('valijs/plugins/bootstrap-notify.min.js')}}"></script>
@if(Session::has('message'))
        <script>
            $('#demoNotify').click(function(){
                $.notify({
                    message: "{{Session::get('message')}}",
                    icon: 'fa fa-check'
                },{
                    type: "danger"
                });
console.log('clicked')
            });   </script>
        @endif
@endsection
@stop