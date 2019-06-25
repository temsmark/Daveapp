<?php

namespace App\Http\Controllers;

use App\Claim;
use App\ClaimAmount;
use App\Message;
use App\Status;
use App\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClaimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('claim');
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
        //
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
