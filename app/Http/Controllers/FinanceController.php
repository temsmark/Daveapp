<?php

namespace App\Http\Controllers;

use App\Claim;
use App\ClaimAmount;
use App\Message;
use App\Upload;
use App\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('finance.finance-dashboard');
    }
    public  function more($id){

        $i=1;
        $claims=Claim::Where('id','=',$id)->get();
        $uploads=Upload::Where('claim_id','=',$id)->get();
        $claimAmount=ClaimAmount::Where('claim_id','=',$id)->get();
        $messages=Message::Where('claim_id','=',$id)->orderBy('created_at','DESC')->paginate(3);
        return view('finance.view-more',compact('uploads','claimAmount','i','messages','claims'));
    }

    public  function approve($id)
    {
        Claim::findOrFail($id)->update(['finance'=>1]);
        return redirect()->back();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $i=1;
        $claims=Claim::where('director','=',1)->orderBy('created_at','DESC')->get();
        return view('finance.claims',compact('claims','i'));
    }

    public  function voucher()
    {
        $i=1;
        $vouchers=Voucher::all();
        return view('finance.vouchers',compact('vouchers','i'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role_id=Auth::user()->role_id;
        $department_id=Auth::user()->department_id;
        $user_id=Auth::user()->id;

        $message=new Message();
        $message->message=$request->message;
        $message->claim_id=$request->claim_id;
        $message->department_id=$department_id;
        $message->user_id=$user_id;
        $message->role_id=$role_id;
        $message->status_id=rand(1,5);
        $message->save();

        Claim::find(Input::get('claim_id'))->update(['finance'=>0]);

        Session::flash('message', 'Message sent Successfully');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
