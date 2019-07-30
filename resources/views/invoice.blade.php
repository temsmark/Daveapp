@extends('layouts.master')
@section('content')

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-file-text-o"></i> Invoice</h1>
                <p>" {{str_limit(Illuminate\Foundation\Inspiring::quote(),60,'... -- more--')}} "</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-sm"></i></li>
                <li class="breadcrumb-item">Invoice</li>

            </ul>
        </div>








        <div class="row">
            <div class="col-md-12">
                @foreach($invoices as $invoice)
                <div class="tile">
                    <section class="invoice">
                        <div class="row mb-4">
                            <div class="col-6">
                                <h2 class="page-header"><img src="{{asset("images/jkuat.jpg")}}" height="40px" width="40px" alt=""> JKUAT</h2>
                            </div>
                            <div class="col-6">
                                <h5 class="text-right"><b>DATE:{{date('d/m/Y')}}</b></h5>
                            </div>
                        </div>
                        <div class="row invoice-info">
                            <div class="col-4">From
                                <address><strong>Jomo Kenyatta University of Agriculture and Technology</strong><br>P.O. Box 62 000 – 00200 NAIROBI, KENYA<br>Email: fo@finance.jkuat.ac.ke</address>
                            </div>
                            <div class="col-4">To
                                <address><strong>{{$invoice->fromy->fname .' '.$invoice->fromy->lname}}</strong><br>Id Number: {{$invoice->fromy->id_no}}<br>PF No: <b>{{$invoice->fromy->pf_no}}</b> <br></address>
                            </div>
                            <div class="col-4"><b>Invoice #{{$invoice->id}}</b></div>
                        </div>
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Serial #</th>
                                        <th>Processed On</th>
                                        <th>Amount</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>{{$invoice->voucher_id}}</td>
                                        <td>{{$invoice->created_at->format('d-m-y')}} <span class="small"> <b>{{$invoice->created_at->DiffForHumans()}} </b></span></td>
                                        <td>{{number_format($invoice->amount)}} Shillings Only</td>

                                    </tr>

                                    </tbody>
                                </table>
                                @endforeach

                            </div>
                        </div>
                        <div class="row d-print-none mt-2">
                            <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print</a></div>
                        </div>
                    </section>
                </div>
            </div>
        </div>







    </main>



@stop