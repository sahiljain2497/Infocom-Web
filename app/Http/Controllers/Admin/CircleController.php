<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Circle;
use Validator;

class CircleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $circle = Circle::paginate(10);
        return view('admin.circle.index')->withCircles($circle);
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
            'circle' => 'required'
        ]);
        if($v->fails()){
            return redirect()->route('circle.index')->withErrors($v);
        }
        else{
            Circle::forceCreate(['region' => $request->circle]);
            return redirect()->route('circle.index')->with('success-message','CIRCLE CREATED SUCCESSFULLY');
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
        $data = Circle::where('id','=',$id)->first();
        return view('admin.circle.edit')->withData($data);
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
            'circle' => 'required'
        ]);
        if($v->fails()){
            return redirect()->route('circle.edit',$id)->withErrors($v);
        }
        else{
            Circle::where('id','=',$id)->update(['region' => $request->circle]);
            return redirect()->route('circle.edit',$id)->with('update-message','CIRCLE EDITED SUCCESSFULLY');
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
        Circle::where('id',$id)->delete();
        return redirect()->route('circle.index')->with('delete-message','CIRCLE DELETED SUCCESSFULLY');
    }
}
