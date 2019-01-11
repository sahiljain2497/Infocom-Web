<?php

namespace App\Http\Controllers\Coordinator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Validator;
use DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $UserData = User::where('id','=',$id)->first();
        return view('coordinator.user.index')->withUser($UserData);
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
        $v = Validator::make($request->all(),[
            'emp_id' => 'required',
            'aadhar' => 'required',
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'mobile' => 'required',
            'dob' => 'required',
            'password' => 'confirmed'
        ]);
        if($v->fails()){
            return redirect()->route('coordinator.user.index')->withErrors($v)->with('unsuccess','USER UPDATION FAILED');}
        else{
            if($request['password'] == ''){
                DB::table('users')->where('id',$id)->update(['emp_id' => $request->emp_id,
                'name' => $request->name,'aadhar' => $request->aadhar, 'email' => $request->email,
                 'mobile' => $request->mobile, 'dob' => $request->dob, 'pan' => $request->pan,
                 'experience' => $request->experience ]);
            }
            else{
                $request['password'] = Hash::make($request['password']);
                DB::table('users')->where('id',$id)->update(['emp_id' => $request->emp_id,
                'name' => $request->name,'aadhar' => $request->aadhar, 'email' => $request->email,
                 'mobile' => $request->mobile, 'dob' => $request->dob, 'pan' => $request->pan,
                 'experience' => $request->experience ,'password' => $request->password]);
                }
                return redirect()->route('coordinator.user.index')->with('success','USER UPDATION SUCCESSFUL');
        }
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
