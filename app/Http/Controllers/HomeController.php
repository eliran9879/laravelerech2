<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Charts;
use DB;

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

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Gate::denies('manager')){  
            if (Gate::denies('worker')) {
                abort(403,"Are you a hacker or what?");} }
      
        $customers = DB::table('customers') ->get();
       
        $loans = DB::table('banks')
        ->join('clientdatas', 'banks.id', '=', 'clientdatas.bank_id') 
         ->where('clientdatas.status', '=' ,'open') ->orWhere('clientdatas.status', '=' ,'close') ->get();
        // $top = DB::table('customers')
        // ->join('clientdatas', 'customers.id_account', '=', 'clientdatas.client_id') 
        // ->where('clientdatas.status', '=' ,'open') ->orWhere('clientdatas.status', '=' ,'close')
        // ->get();
       
        // echo( $top);

        // foreach  ($top as $top )
        // {
        //     $trytry=  $top ->client_name;
        //     $sum = $top ->post_count;
        // }
    
    //      $bar_chart = Charts::database( $customers, 'bar', 'material')
    //    ->title('segmentation occuputioan')
    //    ->elementLabel("Total Customers")
    //    ->Width(0)
    //    ->responsive(true)
    //    ->Colors(['#4caf50'])
    //    ->groupBy('occupation');
       $bar_chart1 = Charts::database( $loans, 'bar', 'material')
       ->title('segmentation occuputioan')
       ->elementLabel("Total transactions by banks")
       ->Width(0)
       ->responsive(true)
       ->Colors(['#4caf50'])
       ->groupBy('name');
       $customersindu = DB::table('customers')->where('occupation', 'industry')->count();
       $customersreal = DB::table('customers')->where('occupation', 'real_estate')->count();
       $customersgeneral = DB::table('customers')->count();
       $customersperind = $customersindu /  $customersgeneral;
       $customersperreal = $customersreal /  $customersgeneral;

       $pie1  =	 Charts::create('pie', 'highcharts')
       ->title('My nice chart')
       ->labels(['real_estate', 'industry'])
       ->values([$customersperreal,$customersperind])
       ->responsive(true);

    $sumBrpro = DB::table('customers')
    ->select([DB::raw('sum(amount) as totalpro'),'client_name'])
    ->join('clientdatas', 'customers.id_account', '=', 'clientdatas.client_id') 
    ->where('clientdatas.status', '=' ,'open') ->orWhere('clientdatas.status', '=' ,'close')
    ->groupBy('client_name')
    ->orderBy('client_name','DESC')
    ->take(5)
    ->get();
    
       $bar_top = Charts::create('bar', 'highcharts')
       ->title("Top 5 customer transactions")
       ->elementLabel('Sum of transactions','csd')
       ->labels($sumBrpro->pluck('client_name')->all())
       ->values($sumBrpro->pluck('totalpro')->all())
       ->responsive(true);

        return view('charts.index',compact('bar_chart1','pie1','bar_top'));
    }
}
