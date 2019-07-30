@extends('layouts.master')
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-list"></i> Claims Posted To The Dean</h1>
                <p>" {{str_limit(Illuminate\Foundation\Inspiring::quote(),60,'... -- more--')}} "</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-sm"></i></li>
                <li class="breadcrumb-item">Department Claim</li>

            </ul>
        </div>


        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="widget-small primary coloured-icon"><i class="icon fa fa-list fa-3x"></i>
                    <div class="info">
                        <h4>Pending Claims</h4>
                        <p><b>{{count($pending)}}</b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
                    <div class="info">
                        <h4>Approved</h4>
                        <p><b>{{count($all)}}</b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">

            </div>
            <div class="col-md-6 col-lg-3">

            </div>
        </div>




        <div class="row">
            <div class="container-fluid">
                <div class="tile">
                    @if (Session::has('message'))
                        <div id="alert-out" class="alert alert-info">

                            <h3 class="text-center">     {{Session::get('message','message sent Successfully')}}</h3>
                        </div>
                    @endif

                    @if (count($claims)<=0)
                        <div class="alert alert-info">
                            <h4 class="text-center small"> <strong>Sorry!</strong> No Claims made yet</h4>
                        </div>
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
                                    <th>Total</th>
                                    <th>Claimed On</th>
                                    <th>Status</th>
                                    <th>Approve</th>
                                    <th>Decline</th>
                                    <th>More</th>

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
                                        <td> {{$claim->total}} Sh/=</td>
                                        <td> {{$claim->created_at}} <br> <b class="small">{{$claim->created_at->DiffForHumans()}}</b> </td>
                                        <td>

                                            @if($claim->dean==0)
                                                <span class="badge badge-pill badge-info">Pending Department Chairman</span>

                                            @elseif($claim->dean==1)
                                                <span class="badge badge-pill badge-success">Approved</span>
                                            @else
                                                <span class="badge badge-pill badge-danger"> Declined By Chairman</span>

                                            @endif

                                        </td>
                                        <td> <a class="btn btn-info"  href="{{url('dean/approve/'.$claim->id)}}">APPROVE</a></td>



                                        <td>

                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal{{$i}}">DECLINE</button>

                                            <!-- Modal -->
                                            <div id="myModal{{$i}}" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="alert alert-info">
                                                                Decline <strong><i>{{ucfirst($claim->userclaim['fname']). ' '.ucfirst($claim->userclaim['lname'])}}</i></strong> request by stating your reason.
                                                            </div>
                                                            <form action="{{action('DeanController@store')}}"  method="post">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label for="email">Comment: </label>
                                                                    <input type="hidden" name="claim_id" value="{{$claim->id}}">
                                                                    <textarea type="text"name="message" class="form-control" rows="10" cols="30" autofocus required></textarea>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </td>


                                        <td> <a class="btn btn-primary"  href="{{url('dean/more/'.$claim->id)}}">VIEW MORE</a></td>
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
    <script>  setTimeout(function () {
            $('#alert-out').hide();
        },3000);
    </script>

@stop


@stop