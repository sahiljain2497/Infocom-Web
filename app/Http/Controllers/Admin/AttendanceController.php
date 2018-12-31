<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Attendance;

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$empid,$start,$end)
    {   
        Attendance::where('id',$id)->delete();
        return redirect('/admin/attendance/?emp_id='.$empid.'&start='.$start.'&end='.$end);
    }
}
