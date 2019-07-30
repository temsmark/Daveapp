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
                        <h3 class="tile-title"> Claims</h3>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Faculty</th>
                                    <th>Department</th>
                                    <th>Semester /Year</th>
                                    <th>Service</th>
                                    <th>Bank Details</th>
                                    <th>Total</th>
                                    <th>Claimed On</th>
                                    <th>Department</th>
                                    <th>Director</th>
                                    <th>Finance</th>
                                    <th>Status</th>

                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($claims as $claim)

                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$claim->faculty['faculty_name']}}</td>
                                        <td>{{str_limit(ucfirst($claim->claim['department_name']),10)}}</td>
                                        <td>Sem {{$claim->semester}} / {{$claim->year}}</td>
                                        <td>{{$claim->service}}</td>
                                        <td>{{strtoupper($claim->bank)}}<br>{{$claim->acc_no}}</td>
                                        <td> {{number_format($claim->total)}} Sh/=</td>
                                        <td> {{$claim->created_at}} <br> <b class="small">{{$claim->created_at->DiffForHumans()}}</b> </td>
                                        <td>
                                            @if ($claim->dep_admin==0)
                                                <span class="badge badge-pill badge-info small">pending</span>
                                            @elseif($claim->dep_admin==1)
                                                <span class="badge badge-pill badge-success small">Approved</span>
                                            @else
                                                <span class="badge badge-pill badge-danger small">Rejected</span>

                                            @endif
                                        </td>
                                        <td>
                                            @if ($claim->director==0)
                                                <span class="badge badge-pill badge-info small">pending</span>
                                            @elseif($claim->director==1)
                                                <span class="badge badge-pill badge-success small">Approved</span>
                                            @else
                                                <span class="badge badge-pill badge-danger small">Rejected</span>

                                            @endif
                                        </td>
                                        <td>
                                            @if ($claim->finance==0)
                                                <span class="badge badge-pill badge-info small">pending</span>
                                            @elseif($claim->finance==1)
                                                <span class="badge badge-pill badge-success small">Approved</span>
                                            @else
                                                <span class="badge badge-pill badge-danger small">Rejected</span>

                                            @endif
                                        </td>
                                        <td> <a class="btn btn-primary btn-sm"  href="{{url('claim/'.$claim->id .'/more/'.$claim->user_id)}}">VIEW MORE</a></td>

                                        <td>
                                            @if ($claim->finance==1)
                                                <a class="btn btn-success btn-sm"  href="{{url('invoice/more/'.$claim->id)}}">VIEW VOUCHER</a>
                                            @endif
                                        </td>
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

            </div>




        </div>
    </main>


@stop