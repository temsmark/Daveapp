@extends('layouts.master')
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-calendar"></i> Recent Claims</h1>
                <p>" {{str_limit(Illuminate\Foundation\Inspiring::quote(),60,'... -- more--')}} "</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-sm"></i></li>
                <li class="breadcrumb-item">Claim</li>
                <li class="breadcrumb-item">Recent Claims</li>


            </ul>
        </div>


        <div class="row">
            <div class="container-fluid">
                <div class="tile">
                    @if(count($claims)!=0)
                        <h3 class="tile-title">Pending Claims</h3>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Department</th>
                                <th>Faculty</th>
                                <th>Semester /Year</th>
                                <th>Service</th>
                                <th>Bank</th>
                                <th>Acc No</th>
                                <th>Total</th>
                                <th>Claimed On</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($claims as $claim)

                                    <tr>
                                <td>{{$i++}}</td>
                                <td>{{str_limit(ucfirst($claim->claim['department_name']),10)}}</td>
                                <td>{{$claim->faculty['faculty_name']}}</td>
                                <td>Sem {{$claim->semester}} / {{$claim->year}}</td>
                                <td>{{$claim->service}}</td>
                                <td>{{strtoupper($claim->bank)}}</td>
                                <td>{{$claim->acc_no}}</td>
                                <td> {{$claim->total}} Sh/=</td>
                                <td> {{$claim->created_at}} <br> <b class="small">{{$claim->created_at->DiffForHumans()}}</b> </td>
                                <td>
                                    @if ($claim->finance==0)
                                        <span class="badge badge-pill badge-danger">Pending Finance Department</span>

                                    @elseif($claim->dep_admin==0)
                                        <span class="badge badge-pill badge-danger">Pending Department Admin</span>

                                    @else
                                        <span class="badge badge-pill badge-success">Approved</span>

                                    @endif

                                </td>
                                <td> <a class="btn btn-primary"  href="{{url('claim/'.$claim->id .'/more/'.$claim->user_id)}}">VIEW MORE</a></td>
                            </tr>

                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                        @else
                        <div class="alert alert-info">
                           <h5 class="text-center"><strong>OOps!!</strong> You havent made any claims yet <b>Sorry!!</b></h5>
                        </div>
                    @endif
                </div>
                <hr>
                <div class="tile">
                    <h3 class="tile-title">Processed</h3>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>




        </div>
    </main>


@stop