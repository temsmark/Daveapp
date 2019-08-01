@extends('layouts.master')
@section('css')
    {{--<link rel="stylesheet" href="{{asset('css/dropzone.min.css')}}">--}}
    {{--<script src="{{asset('js/dropzone.min.js')}}"></script>--}}


@stop
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-edit"></i> Claim</h1>
                <p>" {{str_limit(Illuminate\Foundation\Inspiring::quote(),60,'... -- more--')}} "</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-sm"></i></li>
                <li class="breadcrumb-item">Claim</li>
                <li class="breadcrumb-item">Claim Form</li>


            </ul>
        </div>

        <div class="col-md-12">
            <div class="tile">
                @if (Session::has('message'))
                    <div id="alert-out" class="alert alert-success">

                        <h3 class="text-center"><i>{{Session::get('message')}}</i></h3>
                    </div>
                @endif
                <h3 class="tile-title">Claim Form</h3>
                <div class="tile-body" id="app">
                    <form class="row" method="post" action=" {{action("ClaimController@store")}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-3">
                            <label class="control-label">Name:</label>
                            <input class="form-control" type="text" placeholder="Enter full name" value="{{ucfirst(Auth::User()->fname).' '.ucfirst(Auth::User()->lname)}}" disabled>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label">Identification Number:</label>
                            <input class="form-control col-md-8" type="email" placeholder="Enter email address" value="{{Auth::User()->id_no}}" disabled>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label">PF Number:</label>
                            <input class="form-control col-md-8" type="email" placeholder="Enter email address" value="{{Auth::User()->pf_no}}" disabled>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label">Department:</label>
                            <input class="form-control col-md-8" type="email"  value="{{Auth::User()->department['department_name']}}" disabled>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label">Faculty:</label>
                            <select name="faculty_id" id="">
                            @foreach ($faculties as $faculty)
                                <option value="{{$faculty->id}}">{{str_limit( $faculty->faculty_name,30)}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label">Department Chairman:</label>
                            <select name="department_admin_id" id="">
                                @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{ucfirst($user->fname).' '. ucfirst($user->lname)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label">Semester:</label>
                            <select name="semester" id="">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>

                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label">Year:</label>
                            <input class="form-control col-md-8" placeholder="{{date('Y')}}" name="year" required>
                        </div>

                        <div class="form-group col-md-3">
                            <label class="control-label">Bank:</label>
                            <select name="bank" id="">
                                <option value="Equity">--Equity--</option>
                                <option value="Kcb">--Kcb--</option>
                                <option value="Unaitas">--Unaitas--</option>
                                <option value="NationalBank">--National Bank--</option>
                                <option value="StandardChartered">--Standard Chartard--</option>

                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="control-label">Account Number:</label>
                            <input class="form-control" type="number" placeholder="Acc no" name="acc_no">
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="serve" value="1" checked>Teaching
                                <input type="radio" class="form-check-input" name="serve" value="2">Technical
                                <input type="radio" class="form-check-input" name="serve" value="3">Technical Support

                            </label>
                        </div>




                        <div class="form-group col-md-12">

                            <button type="button" class="btn btn-info button fa fa-plus">Add</button>
                            <button type="button" class="btn btn-danger button2 float-right fa fa-minus">Remove</button>
                        </div>


                        <table class="table table-borderless">
                            <thead>
                            <tr>
                                <th>Unit:</th>
                                <th>Service:</th>
                                <th>Marking:</th>
                                <th>Transport:</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr class="tr">
                                <td >
                                    <div class="form-group">
                                        <select name="unit[]">
                                            @foreach ($units as $unit)
                                                <option value="{{$unit->id}}">{{str_limit( $unit->unit_name,40)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </td>
                                <td >
                                    <div class="form-group">
                                        <input class="form-control col-md-8" type="number" id="service" name="service[]" placeholder="Service Claim"  >

                                    </div>
                                </td>
                                <td >
                                    <div class="form-group">
                                        <input class="form-control col-md-8" type="number" id="marking" name="marking[]" placeholder="Marking Claim" >

                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input class="form-control col-md-8" type="number" id="transport" name="transport[]" placeholder="Transport Claim" >

                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="container">
                            <input type="number" name="total" id="sum" hidden>
                            <h3 class="text-center total">Total</h3>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Upload Files:</label>
                            <input class="form-control-file col-md-12" type="file" name="upload" required>
                        </div>

                        <div class="form-group col-md-4 align-self-end m-3">
                            <button class="btn btn-primary float-right" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Claim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </main>


@stop
@section('script')
    <Script>
        $(document).ready( function () {
            $(".button").click(function () {
                $(".tr:last").clone(false).appendTo("tbody:last");

                var sum=0;
                $("#service,#marking,#transport").clone(true).each(function () {
                    sum+=+$(this).val();
                });
                $('.total').html("Total:"+' '+sum+" Sh/=");
                $('#sum').val(sum);

            });
            $(".button2").click(function () {
                $(".tr").not(".tr:first").remove(".tr:last");
                var sum=0;
                $("#service,#marking,#transport").clone(true).each(function () {
                    sum-=-$(this).val();
                });
                $('.total').html("Total:"+' '+sum+" Sh/=");
                $('#sum').val(sum);

            });

        })
    </Script>
    <script>
        $(document).ready( function () {
            $("tbody").bind('keyup change',function () {
                var sum=0;
                $("#service,#marking,#transport").clone(true).each(function () {
                    sum+=+$(this).val();
               });
                $('.total').html("Total:"+' '+sum+" Sh/=");
                $('#sum').val(sum);




            });



        })
    </script>
    <script>  setTimeout(function () {
            $('#alert-out').hide();
        },3000);
    </script>
@stop
