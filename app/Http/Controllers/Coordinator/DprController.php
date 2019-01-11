<?php

namespace App\Http\Controllers\Coordinator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
use App\Dpr;
use App\Circle;

class DprController extends Controller
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
        $emp_id = Auth::user()->emp_id;
        $records = [];
        if($start != '' || $end != ''){
            $records = Dpr::findById($emp_id);
            if($start){
                $records = $records->findByStart($start);
            }
            if($end){
                $records = $records->findByEnd($end);
            }
            $records = $records->paginate(10);
        }
        return view('coordinator.dpr.index',['records' => $records , 'start' => $start ,
                    'end' => $end, 'emp_id' => $emp_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $circles = Circle::all();
        return view('coordinator.dpr.create',['circles' => $circles]);
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
        'date' => 'required',
        'month' => 'required',
        'project' => 'required',
        'customer' => 'required',
        'circle' => 'required',
        'site_id_a' => 'required',
        'site_id_b' => 'required',
        'site_name_a' => 'required',
        'site_name_b' => 'required',
        'link_id' => 'required',
        'site_type' => 'required',
        'sow' => 'required',
        'quantity' => 'required',
        'rate' => 'required',
        'amount' => 'required',
        'payterm' => 'required',
        'first_mile_amount' => 'required',
        'allocation_date' => 'required',
        'integration_date' => 'required',
        'installation_date' => 'required',
        'site_completion_date' => 'required',
        'anteena_size' => 'required'
        ]);
        if($v->fails()){
            return redirect()->route('coordinator.dpr.create')->withErrors($v)->with('unsuccess-message','DPR INFORMATION INVALID');
        }
        else{
            Dpr::forceCreate($request->except('_token'));
            return redirect()->route('coordinator.dpr.create')->with('success-message','DPR CREATED SUCCESSFULLY');
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
        $data = Dpr::where('id','=',$id)->first();
        return view('coordinator.dpr.view',['data' => $data]);
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
