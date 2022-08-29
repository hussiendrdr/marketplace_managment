<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Customers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Models\Project;
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;




class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        if (!Auth::user()) {
            return view('auth.login');
        }
        $productStatus = DB::table('processes as pj')
            ->join('projects as j', 'j.id', '=', 'pj.project_id')
            ->join('customers as cust', 'j.customer_id', '=', 'cust.id')
            ->join('products as pd', 'pj.product_id', '=', 'pd.id')
            ->select('pj.supplier_id', 'pj.approved_customer_quotation', 'j.customer_id', 'pj.created_at', 'pj.LeadTime', 'pd.product_name')
            ->groupBy('pj.id')
            ->get();


        $marginUserProduct = DB::table('processes as pj')
            ->join('projects as j', 'j.id', '=', 'pj.project_id')
            ->where('pj.approved_customer_quotation', 'yes')
            ->select(DB::raw('round((pj.qty*pj.sp)-(pj.qty*pj.pp),2) as margin'), DB::raw('round((pj.sp-pj.pp)/pj.pp,2)*100 as  marginPer'), DB::raw('round(sum(pj.sp)/sum(pj.pp),2) as marginshare'), 'j.customer_id')
            ->groupBy('j.customer_id')
            ->get();

        
        //quantity of product sale
        $NumberOfProuductSaleing = DB::table('processes as pj')
            ->join('products as pd', 'pj.product_id', '=', 'pd.id')
            ->where('pj.approved_customer_quotation', 'yes')
            ->select(DB::raw('sum(pj.qty) as qty'))
            ->get();


        // $mytime = Carbon::now();
        // $currentDate=$mytime->format('d-m-Y');

        $currentUsers = DB::select('select count(*) as count  from customers');
        $numberOfSuppliers = DB::select('select count(*) as count  from suppliers ');

        $marginPer = DB::select('select round((sp-pp)/pp,2)*100 as marginPer , round((qty*sp)-(qty*pp),2) as margin , created_at  from processes where  approved_customer_quotation="yes" and id between 1 and 7 group by created_at order by created_at desc');
        $earn = DB::select('select sum(sp) as sp ,sum(pp) as pp  from processes where approved_customer_quotation="yes"');
        $prouductPending = DB::select('select count(*) as count  from processes where approved_customer_quotation="pending"');
        $prouductSuccess = DB::select('select count(*) as count  from processes where approved_customer_quotation="yes"');
        $prouductFailed = DB::select('select count(*) as count  from processes where approved_customer_quotation="no"');

        // dd($mm);

        // return view('home',compact('marginPer','earn','prouductPending','prouductSuccess','prouductFailed','currentUsers','numberOfSuppliers','NumberOfProuductSaleing','marginUserProduct'));
        return view('home', compact('earn', 'NumberOfProuductSaleing', 'prouductPending', 'prouductSuccess', 'prouductFailed', 'currentUsers', 'numberOfSuppliers', 'marginPer', 'marginUserProduct', 'productStatus'));

    }

    public function index()
    {
        $customers = Customers::all();
        $suppliers = Supplier::all();
        // dd($customers);
        return view('home.index', compact('customers', 'suppliers'));
    }

    function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('country_state_city')
            ->where($select, $value)
            ->groupBy($dependent)
            ->get();
        $output = '<option value="">Select ' . ucfirst($dependent) . '</option>';
        foreach ($data as $row) {
            $output .= '<option value="' . $row->$dependent . '">' . $row->$dependent . '</option>';
        }
        echo $output;
    }
}
