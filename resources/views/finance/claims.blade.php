@extends('layouts.master')
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-list"></i> Claims</h1>
                <p>" {{str_limit(Illuminate\Foundation\Inspiring::quote(),60,'... -- more--')}} "</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-sm"></i></li>
                <li class="breadcrumb-item">Claims</li>

            </ul>
        </div>
        <div class="row">
            <div class="container-fluid">
            <div class="tile">
                @if (count($claims)<=0)
                   @else
                    <div class="table-responsive">
                        <table class="table"  id="sampleTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>PF No</th>

                                {{--<th>Dep.</th>--}}
                                {{--<th>Faculty</th>--}}
                                <th>Sem/Year</th>
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
                                    <td><img src="{{$claim->userclaim['path']}}" height="15px" width="15px" alt="">
                                      <span class="small"> {{ucfirst($claim->userclaim['fname']). ' '.ucfirst($claim->userclaim['lname'])}}</span>
                                    </td>
                                    {{--<td>{{$claim->userclaim['pf_no']}}</td>--}}
                                    {{--<td>{{str_limit(ucfirst($claim->claim['department_name']),10)}}</td>--}}
                                    {{--<td>{{$claim->faculty['faculty_name']}}</td>--}}

                                    <td><b>{{$claim->userclaim['pf_no']}}</b></td>
                                    <td>Sem {{$claim->semester}} / {{$claim->year}}</td>
                                    <td>{{$claim->service}}</td>
                                    <td>{{strtoupper($claim->bank)}}</td>
                                    <td>{{$claim->acc_no}}</td>
                                    <td> {{$claim->total}} Sh/=</td>
                                    <td> {{$claim->created_at}} <br> <b class="small">{{$claim->created_at->DiffForHumans()}}</b> </td>
                                    <td>
                                        @if ($claim->finance==0)
                                            <span class="badge badge-pill badge-danger">Pending Finance Dep</span>

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

                @endif

            </div>
        </div>
        </div>
    </main>

@section('script')
    <script type="text/javascript" src="{{asset('valijs/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('valijs/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@stop
@stop