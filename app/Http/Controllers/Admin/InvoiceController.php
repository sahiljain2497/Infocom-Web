<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Invoice;
use Illuminate\Support\Facades\Storage;
use App\Information;
class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $num = $request->input('search_no');
        $start = $request->input('start');
        $end = $request->input('end');
        $type = $request->input('search_type');
        $invoices = [];
        if($num){
            $invoices = Invoice::where('invoice_no','=',$num)->where('invoice_type','=',$type)->get();
        }
        else if($start){
            $invoices = Invoice::whereDate('invoice_date','>=',$start);
            if($end){
                $invoices = Invoice::whereDate('invoice_date','<=',$end);
            }
            $invoices = $invoices->get();
        }
        return view('admin.invoice.index',['start' => $start,'end' => $end,'num' => $num,'type'=>$type,'invoices' => $invoices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->ajax()){
            $info = Information::first();
            return response()->json([$info,'success'=>true]);
        }
        return view('admin.invoice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if($request->ajax()){
            Invoice::create($request->all());
            return response()->json([$request->all(),'success'=>true]);
        }
        else if ($request->file('invoice_file')) {
            $file     = $request->file('invoice_file');
            $fileName   = time().'.'.$file->getClientOriginalExtension();
            Storage::disk('local')->put('/invoices/'.$fileName,file_get_contents($file));
            $request['invoice_path'] = $fileName;
            Invoice::create($request->all());
            return view('admin.invoice.index');
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoice = Invoice::where('id','=',$id)->first();
        // dd($invoice->items_table);
        return view('admin.invoice.edit',['invoice' => $invoice]);
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
        $invoice=Invoice::where('id','=',$id)->first()->update($request->all());        
        return response()->json(['success'=> true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();
        return redirect()->route('invoice.index')->with('delete','INVOICE DELETED!');
    }
}
