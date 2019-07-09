<?php

namespace App\Http\Controllers;

use App\Claim;
use App\ClaimAmount;
use App\Faculty;
use App\Message;
use App\Status;
use App\Unit;
use App\Upload;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ClaimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    //show recent claims
    public  function recent(){
        $id=Auth::user()->id;
        $i=1;
        $claims=Claim::Where('user_id','=',$id)->get();


        return view('recentclaims',compact('i','claims'));
    }
    //show more claims from recent url
    public  function more($id,$user_id){

        $i=1;
        $claims=Claim::Where('id','=',$id)->get();
        $uploads=Upload::Where('claim_id','=',$id)->get();
        $claimAmount=ClaimAmount::Where('claim_id','=',$id)->get();
        $messages=Message::Where('claim_id','=',$id)->orderBy('created_at','DESC')->paginate(10);
        return view('moreclaims',compact('uploads','claimAmount','i','messages','claims'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units=Unit::all();
        $faculties=Faculty::all();
        $users=User::where('role_id','=',2)->get();
        return view('claim',compact('units','faculties','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $claim=new Claim();
        $claim->user_id=Auth::User()->id;
        $claim->dep_admin=0;
        $claim->director=0;
        $claim->finance=0;
        $claim->semester=$request['semester'];
        $claim->year=$request['year'];
        $claim->faculty_id =$request['faculty_id'];
        $claim->department_admin_id=$request['department_admin_id'];
        $claim->department_id=$request->department_admin_id;
        $claim->service=$request['serve'];
        $claim->bank=$request['bank'];
        $claim->acc_no=$request['acc_no'];
        $claim->total=$request['total'];
        $claim->save();

foreach ($request->service as $key=>$v){
    $data=array(
        'claim_id'=>$claim->id,
        'unit_id'=>$request->unit[$key],
        'service'=>$request->service[$key],
        'marking'=>$request->marking[$key],
        'transport'=>$request->transport[$key],
        'created_at'=>now(),
        'updated_at'=>now(),
    );
    ClaimAmount::insert($data);
}
        $uploads=new Upload();


$file=$request->file('upload');
            $name=time(). $file->getClientOriginalName();
            $file->move('uploads',$name);
            $uploads->user_id=Auth::User()->id;
            $uploads->claim_id=$claim->id;
            $uploads->upload=$name;
            $uploads->save();





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
