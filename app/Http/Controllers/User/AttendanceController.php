<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Attendance;
use Validator;
use Auth;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dateInterval($start,$end){
        $date1 = date_create($start);
        $date2 = date_create($end);
        return date_diff($date1,$date2)->days;
    }
    public function index(request $request)
    {   
        $empid = Auth::user()->emp_id;
        $start = $request->input('start');
        $end = $request->input('end');
        $absent = "";
        $present = "";

        if($start == '' || $end == '')
            $records = [];
        else{
            $records = Attendance::findAttendance($empid,$start,$end)->paginate(10);
            $interval = $this->dateInterval($start,$end);
            $present = count($records);
            $absent = $interval - $present;
        }

        return view('user.attendance',['records' => $records,
            'start' => $start, 'end' => $end, 'absent' => $absent , 'present' => $present  ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
    
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
