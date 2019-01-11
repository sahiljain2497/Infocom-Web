<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Validator;
use App\Information;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->emp_id;
        $info = Information::where('emp_id','=',$id)->first();
        return view('admin.profile')->withInfo($info)->withId($id);
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
        $v = Validator::make($request->all(),[
            'companyname' => 'required',
            'gstin' => 'required',
            'address_line_1' => 'required',
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'aadhar' => 'required',
            'emp_id' => 'required'
        ]);
        if($v->fails()){
            return redirect()->route('profile.index')->withErrors($v);
        }
        $data = request()->except(['_token']);
        Information::create($data);
        return redirect()->route('profile.index')->with('created','USER INFORMATION SAVED');
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
            'companyname' => 'required',
            'gstin' => 'required',
            'address_line_1' => 'required',
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'aadhar' => 'required',
            'emp_id' => 'required',
            'password' => 'confirmed'
        ]);
        if($v->fails()){
            return redirect()->route('profile.index')->withErrors($v)->with('unsuccess','INFORMATION INVALID');
        }
        else{
            if($request['password'] == ''){
                $request->request->remove('password');
            }
            else{
                $request['password'] = Hash::make($request['password']);
            }
            $data = $request->except(['_token','_method']);
            $profile = Information::where('emp_id','=',$request->emp_id)->first();
            $profile->fill($data);
            $profile->save();
            return redirect()->route('profile.index')->with('success','INFORMATION UPDATED'); 
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
