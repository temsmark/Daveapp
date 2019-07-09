<?php

namespace App\Http\Controllers;

use App\Department;
use App\Faculty;
use App\Role;
use App\User;
use foo\bar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count=1;
        $users=User::orderBy('id','DESC')->paginate(10);
        return view('admin.users',compact('users','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties=Faculty::all();
        $roles=Role::orderBy('id','DESC')->get();
        $departments=Department::all();

        return view('admin.addusers',Compact('roles','departments','faculties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fname'=>'required',
            'lname'=>'required',
            'pf_no'=>'required|max:15',
            'id_no'=>'required|max:15',
            'email'=>'required',
            'password'=>'required'

        ]);

        if(User::where('email','=',$request->email)->exists()){
            Session::flash('message', $request->email.' Already exists');
            return redirect()->back();
        }else{

        $user=new User();
        $user->fname=ucfirst($request->fname);
        $user->lname=ucfirst($request->lname);
        $user->pf_no=$request->pf_no;
        $user->role_id=$request->role_id;
        $user->department_id=$request->department_id;
        $user->faculty_id=$request->faculty_id;
        $user->id_no=$request->id_no;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->path="avatar.png";

        $user->save();
            Session::flash('message', 'has been created  successfully');
            return redirect()->back()->withInput();

    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id=Auth::user()->id;
        $data=User::where('id','=',$id)->get();

        return view('profile',compact('data'));
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
        $request->validate([
            'image'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
            'password'=>'required'
        ]);

        $input=$request->all();
        $user=User::findOrFail($id);
        $user->fname=$input['fname'];
        $user->lname=$input['lname'];
        $user->role_id=Auth::user()->role_id;
        $user->pf_no=$input['pf_no'];
        $user->id_no=$input['id_no'];
        if ($request->file('image')==null){

        }else{
           $file= $request->file('image');
           $name=time() . $file->getClientOriginalName();
          $file->move('images',$name);
            $user->path=$name;
        }
        if ($input['password']==null){
        }else{
            $user->password=bcrypt($input['password']);
        }

            $user->save();

        Session::flash('message', "User details updated");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::whereId($id)->delete();
        Session::flash('message', "User deleted successfully");
        return redirect('manage/users');
    }
}
