<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Expense;
use Auth;

class EmployeeExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $myid = Auth::user()->emp_id;
        $emp_id = $request->input('emp_id');
        $start = $request->input('start');
        $end = $request->input('end');
        $records = [];
        $records = $emp_id ? Expense::findById($emp_id) : Expense::query();
        if($start)
            $records = $records->findByStart($start);
        if($end)
            $records = $records->findByEnd($end);
        if($records != []){
            $records = $records->corApproved();
            $records = $records->notMyExpense($myid);
            $records = $records->paginate(10);
        }
        return view('admin.employee_expense.index',['emp_id' => $emp_id , 'start' => $start , 'end' => $end ,'records' => $records]);
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
        $action = $request->input('action');
        if($action === 'approved')
            Expense::where('id','=',$id)->update(['a_approved' => 'approved','status' => 'pending']);
        else
            Expense::where('id','=',$id)->update(['a_approved' => 'rejected','status' => 'rejected']);
        return redirect()->route('employee_expense.index');

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
