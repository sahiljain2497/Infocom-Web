<?php

namespace App\Http\Controllers\Coordinator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Attendance;
use App\Circle;
use Auth;
use Validator;
use App\User;
use Redirect;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $circles = Circle::all();
        $user = Auth::user()->emp_id;
        $date = date('Y-m-d');
        $d = [];
        $status = Attendance::where('emp_id','=',$user)->where('date','=',$date)->count();
        if($status === 1){
            $d = Attendance::where('emp_id','=',$user)->where('date','=',$date)->get()->first(); 
        }
        return view('coordinator.home')->withStatus($status)->withData($d)->withCircles($circles);
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
            'circle' => 'required',
            'manager' => 'required',
            'date' => 'required',
            'project' => 'required'
        ]);
        if($v->fails()){
            return redirect()->route('coordinator.home.index')->withErrors($v);}
        else{
            //create attendance
            $id = Auth::user()->emp_id;
            $name = Auth::user()->name;
            $designation = Auth::user()->designation;
            $mobile = Auth::user()->mobile;
            Attendance::forceCreate(['emp_id' => $id,'name' => $name,
            'designation' => $designation,
            'mobile' => $mobile,'circle' => $request->circle,
            'manager' => $request->manager,
            'project' => $request->project,
            'date' => $request->date ]);
            return redirect()->route('coordinator.home.index');
        }
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
        $record = Attendance::where('id','=',$id)->first();
        $record->timeout = true;
        $record->save();
        return redirect()->route('coordinator.home.index');
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
    public function markAsRead(){
        $user = Auth::user();
        $user->unreadNotifications->markAsRead();
        return Redirect::back();
    }
}
