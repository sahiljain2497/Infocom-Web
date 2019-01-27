<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Salary;
use Carbon\Carbon;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $emp_id = $request->input('emp_id');
        $date = $request->input('salary_date');
        $start = Carbon::parse($date)->startOfMonth();
        $end = Carbon::parse($date)->endOfMonth();
        $records = [];
        if(empty($emp_id) && $date == "")
            return view('admin.salary.index',['emp_id' => $emp_id , 'date' => $date,'records' => $records ]); 
        $records = Salary::query();
        $records = !empty($emp_id) ? $records->where('emp_id',$emp_id) : $records;
        $records = $date != ""? $records->whereDate('date','>=',$start)->whereDate('date','<=',$end) : $records;
        $records = $records->orderBy('month')->get();
        // dd($records);
        return view('admin.salary.index',['emp_id' => $emp_id , 'date' => $date,'records' => $records]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.salary.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = $request->input('date');
        $month = Carbon::parse($date)->month;
        $year = Carbon::parse($date)->year;
        Salary::create($request->all() + ['month' => $month, 'year' => $year]);
        return redirect()->route('salary.index')->with('success-message','SALARY SAVED SUCCESSFULLY');
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
        $record = Salary::where('id',$id)->first();
        return view('admin.salary.edit',['record' => $record]);
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
        $salary = Salary::where('id',$id);
        $date = $request->input('date');
        $month = Carbon::parse($date)->month;
        $year = Carbon::parse($date)->year;
        $salary = $salary->update($request->except('_method','_token') + ['month' => $month, 'year' => $year]);
        return redirect()->route('salary.edit',['id' => $id,'record' => $salary])->with('success-message','SALARY UPDATED SUCCESSFULLY');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sal = Salary::findOrFail($id);
        $sal->delete();
        return redirect()->route('salary.index')->with('success-message','SALARY DELETED SUCCESSFULLY');
    }
}
