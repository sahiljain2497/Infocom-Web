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
        $users = $empid ? User::searchId($empid)->paginate(10) : User::paginate(10);
        return view('admin.user.index')->withUsers($users)->withSearch($empid);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $len = User::orderBy('id','desc')->first()->id + 1;
        if($len < 10)
            $emp_id = 'EMP00'.$len;
        else if($len < 100)
            $emp_id = 'EMP0'.$len;
        else 
            $emp_id = 'EMP'.$len;
        return view('admin.user.create')->withEmpid($emp_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        User::create($request->all());
        $userId = User::where('emp_id','=',$request->emp_id)->first();
        return redirect()->route('users.edit',$userId->id)->with('create-message','USER CREATED SUCCESSFULLY');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id',$id)->first();
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
        $user = User::where('id',$id)->first();
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
            return redirect()->route('users.edit',$id)->withErrors($v);
        else{
            DB::table('users')->where('id',$id)->update(['emp_id' => $request->emp_id,
            'name' => $request->name,'aadhar' => $request->aadhar, 'email' => $request->email,
            'mobile' => $request->mobile, 'dob' => $request->dob, 'pan' => $request->pan,
            'experience' => $request->experience , 'designation' => $request->designation,
            'joining' => $request->joining, 'type' => $request->type  ]);
            return redirect()->route('users.edit',$id)->with('update-message','USER UPDATED SUCCESSFULLY');
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
        User::where('id',$id)->delete();
        return redirect()->route('users.index')->with('delete-message','USER DELETED SUCCESSFULLY');
    }
}
