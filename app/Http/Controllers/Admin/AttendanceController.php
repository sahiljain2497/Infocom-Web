<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Attendance;
use Validator;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $empid = $request->input('emp_id');
        $start = $request->input('start');
        $end = $request->input('end');
        if($empid == '' || $start == '' || $end == '')
            $records = [];
        else{
            $records = Attendance::findAttendance($empid,$start,$end)->paginate(10);
            //print($records);
            //die;
        }
        return view('admin.attendance.index')->withRecords($records)->withEmpid($empid)->withStart($start)->withEnd($end);
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
        $attendance = Attendance::where('id','=',$id)->first();
        return view('admin.attendance.edit')->withAttendance($attendance);
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
            'circle' => 'required',
            'manager' => 'required',
            'project' => 'required',
            'timein' =>'required',
            'timeout' => 'required'
        ]);
        if($v->fails())
            return redirect()->route('attendance.edit',$id)->withErrors($v);
        else{
            Attendance::find($id)->update(['created_at' =>$request->timein,
            'updated_at' =>$request->timeout,'circle'=>$request->circle,
            'project' => $request->project, 'manager' => $request->manager]);
            return redirect()->route('attendance.edit',$id)->with('edit-message','ATTENDANCE EDITED SUCCESSFULLY');
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
        $start = explode(" ",$_POST['start']);
        $start = $start[0];
        $end = explode(" ",$_POST['end']);
        $end = $end[0];
        Attendance::where('id',$id)->delete();
        return redirect()->route('attendance.index',['emp_id'=>$_POST['empid'],'start'=>$start,'end'=>$end])->with('delete-message','RECORD DELETED SUCCESSFULLY');
    }
}
