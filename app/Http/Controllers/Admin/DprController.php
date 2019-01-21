<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dpr;
use Auth;
use Validator;
use App\Circle;
use App\Vendor;

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
        if($start)
        {
            $records = Dpr::findByStart($start);
            if($end){
                $records = $records->findByEnd($end);
            }
            $records = $records->paginate(10);
        }
        else if($end){
            $records =Dpr::findByEnd($end);
            $records = $records->paginate(10);
        }
        return view('admin.dpr.index',['records' => $records , 'start' => $start ,
                    'end' => $end, 'emp_id' => $emp_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendors = Vendor::all();
        $circles = Circle::all();
        return view('admin.dpr.create',['circles' => $circles,'vendors' => $vendors]);
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
            'site_name_a' => 'required',
            'link_id' => 'required',
            'site_type' => 'required',
            'sow' => 'required',
            'quantity' => 'required',
            'rate' => 'required',
            'amount' => 'required',
            'payterm' => 'required',
            'allocation_date' => 'required',
            'integration_date' => 'required',
            'installation_date' => 'required',
            'site_completion_date' => 'required',
            'anteena_size' => 'required'
            ]);
            if($v->fails()){
                return redirect()->route('dpr.create')->withErrors($v)->with('unsuccess-message','DPR INFORMATION INVALID');
            }
            else{
                Dpr::forceCreate($request->except('_token'));
                return redirect()->route('dpr.create')->with('success-message','DPR CREATED SUCCESSFULLY');
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
        return view('admin.dpr.edit',['data' => $data]);
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
            'date' => 'required',
            'month' => 'required',
            'project' => 'required',
            'customer' => 'required',
            'circle' => 'required',
            'site_id_a' => 'required',
            'site_name_a' => 'required',
            'link_id' => 'required',
            'site_type' => 'required',
            'sow' => 'required',
            'quantity' => 'required',
            'rate' => 'required',
            'amount' => 'required',
            'payterm' => 'required',
            'allocation_date' => 'required',
            'integration_date' => 'required',
            'installation_date' => 'required',
            'site_completion_date' => 'required',
            'anteena_size' => 'required'
            ]);
            if($v->fails()){
                return redirect()->route('dpr.show',$id)->withErrors($v)->with('unsuccess-message','DPR UPDATION NOT POSSIBLE');
            }
            else{
                $dpr = Dpr::findOrFail($id);
                $dpr->fill($request->except(['_token','_method']));
                $dpr->save();
                return redirect()->route('dpr.show',$id)->with('success-message','DPR UPDATED SUCCESSFULLY');
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
