<?php

namespace App\Http\Controllers\Coordinator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use App\Expense;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $start = $request->input('start');
        $end = $request->input('end');
        $empid = Auth::user()->emp_id;
        if($start == '' || $end == '')
            $records = [];
        else
            $records = Expense::findExpense($empid,$start,$end)->paginate(10);
        return view('coordinator.expense.index',[ 'start'=>$start , 'end' => $end , 'empid' => $empid ,'records' => $records ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
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
        $v = Validator::make($request->all(),[
            'amount' => 'required',
            'date' => 'required',
            'note' => 'required',
        ]);
        if($v->fails()){
            return redirect()->route('coordinator.expense.index')->withErrors($v)->with('unsuccess-message','EXPENSE INFORMATION INVALID');
        }
        else{
            Expense::forceCreate(['emp_id' => Auth::user()->emp_id,'amount' => $request->amount,
            'date' => $request->date,'note' => $request->note,'coordinate' => 'none']);
            return redirect()->route('coordinator.expense.index')->with('success-message','EXPENSE APPLIED SUCCESSFULLY');
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
