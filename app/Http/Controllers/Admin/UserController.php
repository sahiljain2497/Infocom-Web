<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Validator;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {   
        $empid = $request->input('search-id');
        $users = User::searchId($empid);
        return view('admin.user.index')->withUsers($users);
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
        $user = DB::table('users')->where('id',$id)->first();
        return view('admin.user.show')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = DB::table('users')->where('id',$id)->first();
        return view('admin.user.edit')->withUser($user);
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
        ]);
        if($v->fails())
            return redirect()->route('user.index')->withErrors($v);
        else{
            DB::table('users')->where('id',$id)->update(['emp_id' => $request->emp_id,
            'name' => $request->name,'aadhar' => $request->aadhar, 'email' => $request->email,
             'mobile' => $request->mobile, 'dob' => $request->dob, 'pan' => $request->pan,
             'experience' => $request->experience , 'designation' => $request->designation, 'joining' => $request->joining  ]);
            return redirect('admin/users');
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
        DB::table('users')->where('id',$id)->delete();
        return redirect()->route('users.index');
    }
}
