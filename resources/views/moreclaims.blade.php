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
            <div class="col-md-8">
                <div class="tile">
                    <div class="tile-title-w-btn">
                        <h3 class="title">Units:</h3>
                        <p>      @foreach($claims as $claim)
                                @if ($claim->finance==0)
                                    <a class="btn btn-danger icon-btn" href="#" >Pending: Finance</a>
                                @elseif ($claim->dep_admin==0)
                                    <a class="btn btn-danger icon-btn" href="#" >Pending: Admin Department </a>
                                @elseif($claim->finance==1 || $claim->dep_admin==1)
                                    <a class="btn btn-info icon-btn" href="#" >Print Voucher</a>

                                @endif
                                &nbsp;&nbsp;&nbsp;&nbsp;
                            @endforeach
                        </p>
                    </div>
                    <div class="tile-body">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Unit Name</th>
                                <th>Service</th>
                                <th>Marking</th>
                                <th>Transport</th>
                                <th>Total</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($claimAmount as $claim)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{strtoupper(str_limit( $claim->unit['unit_name'],35,' ---'))}}</td>
                                    <td>{{$claim->service}} Sh/=</td>
                                    <td>{{$claim->marking}} Sh/=</td>
                                    <td>{{$claim->transport}} Sh/=</td>
                                    <td>7177717Sh/=</td>


                                </tr>

                            @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="tile">
                    <div class="tile-title-w-btn">
                        <h3 class="title">Uploads</h3>
                        <p><a class="btn btn-primary icon-btn" href="#" target="_blank"><i class="fa fa-file"></i>Docs</a></p>
                    </div>
                    <div class="tile-body">
                        @if (count($uploads)<=0)
                            <div class="alert alert-info">
                                <strong>OOps!! Sorry</strong> No uploads associated with <b>this Claim.</b>
                            </div>
                        @else
                            <div class="list-group">
                                @foreach($uploads as $upload)
                                    <a href="#" class="list-group-item list-group-item-action"><span class="fa fa-file"></span> {{$upload->upload}}</a>
                                @endforeach
                            </div>
                        @endif


                    </div>
                </div>
            </div>


        </div>



        <div class="row">
            <div class="col-md-6">
                @if (count($messages)<=0)
                    @else

                    <div class="tile">
                        <div class="tile-title-w-btn">
                            <h3 class="title">Comments / Issues</h3>
                        </div>
                        <div class="tile-body">


                            @foreach($messages as $message)

                                <div class="media">
                                    <div class="media-left">
                                        <img src="{{asset('images/avatar.png')}}" class="media-object" height="30" width="30px">
                                    </div>
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            {{$message->roleClaim}}

                                        </h5>

                                        <span class="badge badge-primary badge-pill">{{$message->created_at->DiffForHumans()}}</span>

                                        <p>{{str_limit($message->message ,150,' ...more')}}</p>
                                    </div>
                                </div>

                                <hr class="mt-4">
                            @endforeach
                        </div>
                    </div>

                @endif



            </div>
            <div class="col-md-6">
                <div class="tile">
                    <div class="tile-title-w-btn">
                        <h3 class="title">Total Claim</h3>
                    </div>
                    <div class="tile-body">

                    </div>
                </div>
            </div>
            </div>
    </main>


@stop