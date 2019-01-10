<?php

namespace App\Http\Controllers\Coordinator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Task;
use Auth;
use Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $emp_id = Auth::user()->emp_id;
        $start = $request->input('start');
        $end = $request->input('end');
        if($start == '' && $end == '')
            $records = [];
        else{
            $records = Task::findByOwner($emp_id);        
            if($start){
                $records = $records->findByStart($start);
            }
            if($end){
                $records = $records->findByEnd($end);
            }
            $records =$records->paginate(10);
        }   
        return view('coordinator.task.index',['emp_id' => $emp_id,'start' => $start,'end' => $end , 'records' => $records]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coordinator.task.create');
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
            'emp_id' => 'required',
            'manager' => 'required',
            'note' => 'required',
        ]);
        if($v->fails()){
            return redirect()->route('coordinator.task.create')->withErrors($v)->with('unsuccess-message','TASK INFORMATION INVALID');
        }
        else{
            TASK::forceCreate($request->except('_token'));
            return redirect()->route('coordinator.task.create')->with('success-message','TASK CREATED SUCCESSFULLY');
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
        Task::where('id','=',$id)->update(['status' => true]);
        return redirect()->route('coordinator.task.index')->with('success-message','TASK COMPLETED SUCCESSFULLY');
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
