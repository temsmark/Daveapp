@extends('layouts.master')
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-ticket"></i> Vouchers</h1>
                <p>" {{str_limit(Illuminate\Foundation\Inspiring::quote(),60,'... -- more--')}} "</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-sm"></i></li>
                <li class="breadcrumb-item">Vouchers</li>

            </ul>
        </div>

        <div class="row">
            <div class="container-fluid">
                <div class="tile">

                    @if (Session::has('message'))
                        <div id="alert-out" class="alert alert-info">

                            <h3 class="text-center">     {{Session::get('message','message sent Successfully')}}</h3>
                        </div>
                    @endif

                    @if (count($vouchers)<=0)
                    @else
                        <div class="table-responsive">
                            <table class="table"  id="sampleTable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Voucher Id</th>
                                    <th>PF No</th>
                                    <th>Amount</th>
                                    <th>Time Processed</th>
                                    <th>View More</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($vouchers as $voucher)

                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$voucher->user['fname'].' '.$voucher->user['lname']}}</td>
                                        <td><b>{{$voucher->voucher_id}}</b></td>
                                        <td><b>{{$voucher->user['pf_no']}}</b></td>
                                        <td><b>{{number_format($voucher->amount)}} /=</b></td>
                                        <td>{{$voucher->created_at}}
                                            <br>
                                            <span class="small font-italic">{{$voucher->created_at->DiffForHumans()}}</span></td>
                                        <td> <a href="{{url('finance/voucher/more/'.$voucher->id)}}" class="btn btn-success btn-sm" role="button">Preview</a></td>

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