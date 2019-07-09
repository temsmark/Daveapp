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
                                    <td class="add"> <b> <u>{{$claim->service + $claim->marking + $claim->transport}} Sh/=</u></b></td>


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
                        <p><a class="btn btn-primary icon-btn" href="#" disabled><i class="fa fa-file"></i>Docs</a></p>
                    </div>
                    <div class="tile-body">
                        @if (count($uploads)<=0)
                            <div class="alert alert-info">
                                <strong>OOps!! Sorry</strong> No uploads associated with <b>this Claim.</b>
                            </div>
                        @else
                            <div class="list-group">
                                @foreach($uploads as $upload)
                                    <a href="{{action('DocumentController@index',['id'=>$upload->id])}}" target="_blank" class="list-group-item list-group-item-action">
                                        <span class="fa fa-file-pdf-o"></span> &nbsp;{{$upload->upload}} <span class="float-right badge badge-primary">{{$upload->created_at->DiffForHumans()}}</span></a>
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
                                            &nbsp;{{$message->role['role_name']}}
                                        </h5>

                                        <span class="badge badge-primary badge-pill">{{$message->created_at->DiffForHumans()}}</span>

                                        <p class="ml-5 mt-2"><i>{{$message->message}}</i></p>
                                    </div>
                                </div>



                                <hr class="mt-4">
                            @endforeach
                            <h6>{{$messages->render()}}</h6>

                        </div>
                    </div>

                @endif



            </div>
            <div class="col-md-6">
                <div class="tile ">
                    <div class="tile-title-w-btn">
                        <h3 class="title">Total Claim</h3>
                    </div>
                    <div class="tile-body">

                            <ul class="list-group">

                                <li class="list-group-item list-group-item-info"> <h1 class="total text-center font-weight-bold"></h1></li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>

@section('script')
    <script>
        var sum =0;
        $('.add').each(function () {
           sum+=parseFloat($(this).text());

        });
$('.total').html("Total:"+' '+sum);
    </script>
@stop
@stop