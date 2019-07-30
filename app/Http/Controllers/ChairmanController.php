<?php

namespace App\Http\Controllers;

use App\Claim;
use App\ClaimAmount;
use App\Message;
use App\Upload;
use App\User;
use App\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class ChairmanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department=Auth::User()->department_id;
        $users=User::where('department_id','=',$department)->get();
        $claim=Claim::where('department_id','=',$department)->get();
        return view('chairman.chairman-dashboard',compact('claim','users'));
    }

    public  function claim()
    {
        $i=1;
        $depid=Auth::user()->department_id;
        $claims=Claim::where('department_id','=',$depid)->get();
        return view('chairman.claims',compact('claims','i'));

    }
    public  function approve($id)
    {
        Claim::findOrFail($id)->update(['dep_admin'=>1]);
        return redirect()->back();

    }
    public  function more($id){

        $i=1;
        $claims=Claim::Where('id','=',$id)->get();
        $uploads=Upload::Where('claim_id','=',$id)->get();
        $claimAmount=ClaimAmount::Where('claim_id','=',$id)->get();
        $messages=Message::Where('claim_id','=',$id)->orderBy('created_at','DESC')->paginate(3);
        return view('chairman.view-more',compact('uploads','claimAmount','i','messages','claims'));
    }

    /**
     *
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        Claim::find(Input::get('claim_id'))->update(['dep_admin'=>2,]);


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

}
