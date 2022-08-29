<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Process;
use App\Models\Customers;
use App\Models\Supplier;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class ProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('process.index');
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

    public function createProcess(Request $request){
        // dd($request);
        $project=Project::find($request->project_id);
        $suppliers =Supplier::all();
        $products = Product::all();
        // dd($customers, $suppliers, $products);
        return view('process.create',compact('project','suppliers','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $process=new Process;
        $process->project_id=$request->project_id;
        $process->supplier_id=$request->supplier_id;
        $process->product_id=$request->product_id;
        $process->description=$request->description;
        $process->qty=$request->qty;
        $process->sp=$request->sp;
        $process->pp=$request->pp;
        $process->LeadTime=$request->LeadTime;
        $process->tolerance=$request->tolerance;
        $process->supplier_quotation_validity=$request->supplier_quotation_validity;
        $process->product_design=$request->product_design;
        $process->cliche_die_cut=$request->cliche_die_cut;
        $process->approved_customer_quotation=$request->approved_customer_quotation;
        $process->reason_for_rejection=$request->reason_for_rejection;
        $process->supplier_quotation=$request->supplier_quotation;
        $process->purchase_contract_reference=$request->purchase_contract_reference;
        $process->supplier_contract_status=$request->supplier_contract_status;
        $process->supplier_contract_date=$request->supplier_contract_date;
        $process->supplier_PO_rate=$request->supplier_PO_rate;
        $process->customer_comments=$request->customer_comments;
        $process->supplier_comments=$request->supplier_comments;
        $process->validity_s=$request->validity_s;
        $process->leadtime_s=$request->leadtime_s;
        $process->delivery_handling_s=$request->delivery_handling_s;
        $process->advance_payment_s=$request->advance_payment_s;
        $process->tolerance_s=$request->tolerance_s;
        $process->printing_cost_s=$request->printing_cost_s;
        $process->validity_c=$request->validity_c;
        $process->leadtime_c=$request->leadtime_c;
        $process->delivery_handling_c=$request->delivery_handling_c;
        $process->advance_payment_c=$request->advance_payment_c;
        $process->tolerance_c=$request->tolerance_c;
        $process->printing_cost_c=$request->printing_cost_c;
        $process->paid_amount=$request->paid_amount;
        $process->save();
        $project=Project::find($process->project_id);
        return redirect()->route('processIndex',$project->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function show(Process $process)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function edit(Process $process)
    {
        //
        $pro = Process::find($process->id);
        return view ('process.edit')->with('pro',$pro);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Process $process)
    {
        $item = Process::findOrFail($process->id);

        $input = $request->all();

        $item->update($input);

        return redirect('project');

    }

    public function proccessStatistics($id)
    {
        $marginProccess=DB::select('select round((sp-pp)/pp*100,2) as marginPer , round((qty*sp)-(qty*pp),2) as margin , created_at
        from processes where  id = ?',[$id]);
       


        $all =Process::select('*')->where('id',$id)->first() ;
        $cr=$all->created_at->format('Y-m-d');//20
        $endDate=$all->created_at->addDays($all->LeadTime)->format('Y-m-d');//30
        $current=Carbon::now()->format('Y-m-d');//22

        $cr1=new \DateTime($cr);
        $current1=new \DateTime($current);
        $end=new \DateTime($endDate);

        $diff=$current1->diff($cr1);
        $days=$diff->format('%a');

        if($current>$endDate)
        $latelyDays=$current1->diff($end)->format('%a');
        else
        $latelyDays=0;


        $leadTime=$all->LeadTime;
        $daysPer=($days/$leadTime)*100;
        $remainingDays=$leadTime-$days;
        // dd($margin);
        return view('proccessStatistics',compact('marginProccess','id','daysPer','days','remainingDays','latelyDays','leadTime'));
    }


  

    public function projectStatistics()
    {
        $projectStatistics= DB::table("processes")
        ->select("processes.project_id as ProjectID",
                 "processes.id as proccessID",
                 "processes.LeadTime as leadtime",
                  DB::raw("(SELECT suppliers.supplier_organization_name as supplierName from suppliers where  processes.supplier_id=suppliers.id) as supplierName"),
                  DB::raw("(SELECT products.product_class as productName from products where  processes.product_id=products.id) as productName"))
        ->get()->toArray() ;
  
        
        $margin = DB::select('select project_id as ProjectID,round((sum(qty)*sum(pp))-(sum(qty)*sum(sp)),2) as margin ,round((sum(qty)*sum(pp))-(sum(qty)*sum(sp)),2)/100  as marginper  from processes  as margin group by project_id' );

        // dd($projectStatistics);
        // dd( gettype($projectStatistics));
        // dd($margin);
        return view('projectStatistics',compact('projectStatistics','margin'));
    }
    ////
    public function search()
    {
        return view('margin');
        // return "hi";
    }
    ////
    public function result(Request $request)
    {

        $margin = DB::table('processes')
        ->whereBetween('created_at', [$request->datefrom,$request->dateTo])
       ->select(DB::raw('(qty*pp)-(qty*sp)  as  margin'),DB::raw('((qty*pp)-(qty*sp))/100  as  marginPer'),'pp','id')
        ->get()->toArray();


        return view('margin',compact('margin'));

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Process  $process
     * @return \Illuminate\Http\Response
     */
    public function destroy(Process $process)
    {
        //
        $item = Process::findOrFail($process->id);
        $item->delete();
        return redirect ('project');
    }
}
