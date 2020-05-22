<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;

use App\clientdata;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Charts;
use DB;
use DateTime;
use Carbon;
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
    
    $sumBrpro1 = DB::table('banks')
    ->select([DB::raw('sum(amount) as totalpro'),'name'])
    ->join('clientdatas', 'banks.id', '=', 'clientdatas.bank_id') 
    ->where('clientdatas.status', '=' ,'open') ->orWhere('clientdatas.status', '=' ,'close')
    ->groupBy('name')
    ->get();

       $bar_chart1 =  Charts::create('bar', 'highcharts')
       ->title('Total transactions by banks')
       ->elementLabel('Name of bank')
       ->labels($sumBrpro1->pluck('name')->all())
       ->values($sumBrpro1->pluck('totalpro')->all())
       ->Colors(['#4caf50'])
       ->responsive(true);
    //    Charts::database( $loans, 'bar', 'material')
    //    ->title('Total transactions by banks')
    //    ->elementLabel("Name of bank")
    // //    ->Width(0)
    //    ->responsive(true)
    //    ->Colors(['#4caf50'])
    //    ->groupBy('name');
       $customersindu = DB::table('customers')->where('occupation', 'industry')->count();
       $customersreal = DB::table('customers')->where('occupation', 'real_estate')->count();
       $customersagri = DB::table('customers')->where('occupation', 'agriculture')->count();
      
if (!empty($customersindu) && !empty($customersreal) && !empty($customersagri)){
       $pie1  =	 Charts::create('pie', 'highcharts')
       ->title('segmentation occuputioan')
       ->labels(['real_estate', 'industry','agriculture'])
       ->values([$customersreal,$customersindu,  $customersagri ])
       ->responsive(true);
}
else if (!empty($customersindu) && !empty($customersreal)){
$pie1  =	 Charts::create('pie', 'highcharts')
->title('segmentation occuputioan')
->labels(['real_estate', 'industry'])
->values([$customersreal,$customersindu])
->responsive(true);
}
else if (!empty($customersreal) && !empty($customersagri)){
    $pie1  =	 Charts::create('pie', 'highcharts')
    ->title('segmentation occuputioan')
    ->labels(['real_estate', 'agriculture'])
    ->values([$customersreal,$customersagri])
    ->responsive(true);
    }
    else if (!empty($customersindu) && !empty($customersagri)){
        $pie1  =	 Charts::create('pie', 'highcharts')
        ->title('segmentation occuputioan')
        ->labels(['industry', 'agriculture'])
        ->values([$customersindu,$customersagri])
        ->responsive(true);
        }
    
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

    $sumBrprotry = DB::table('clientdatas')
    ->select([DB::raw('sum(amount) as totalpro'),'designation'])
    ->where([['clientdatas.status', '=' ,'open'],['clientdatas.designation', '=' ,'Loan']])->orWhere([['clientdatas.status', '=' ,'open'],['clientdatas.designation', '=' ,'Realestate']])->orWhere([['clientdatas.status', '=' ,'open'],['clientdatas.designation', '=' ,'Discount']])
    ->groupBy('designation')
    ->get();
    
    $bar_toptry = Charts::create('bar', 'highcharts')
    ->title("Top 5 customer ")
    ->elementLabel('Sum of transactions','csd')
    ->labels($sumBrprotry->pluck('designation')->all())
    ->values($sumBrprotry->pluck('totalpro')->all())
    ->responsive(true);

    $oneYearOn = date('Y-m-d',strtotime(date("Y-m-d") . " - 12 month"));

    $transactions_year_month = DB::table('clientdatas')
    ->select([DB::raw('sum(amount) as totalpro'),DB::raw("DATE_FORMAT(deposit_date, '%m-%Y') new_date"),  DB::raw('YEAR(deposit_date) year,MONTH(deposit_date) as month')])
    ->where([['clientdatas.status', '=' ,'open'],[ 'deposit_date' ,'>=',  $oneYearOn]]) ->orWhere([['clientdatas.status', '=' ,'close'],[DB::raw('YEAR(deposit_date)') ,'=', now()->year]])
    ->groupBy('year','month')
    ->get();
    echo( $transactions_year_month );
    // echo(  date('Y-m-d ')+ INTERVAL 30 DAY);
    echo($oneYearOn);
    $date_tran = Charts::create('line', 'highcharts')
	->title("Sum deals per month")
	->elementLabel("Total Users")
    ->responsive(true)
    ->labels($transactions_year_month->pluck('new_date')->all())
    ->values($transactions_year_month->pluck('totalpro')->all())
    ->responsive(true);
    
    $discountpercent = DB::table('clientdatas')
    ->where([['clientdatas.status', '=' ,'open'],['clientdatas.designation', '=' ,'Discount']]) 
    ->sum('amount');
    $openpercent1 = DB::table('clientdatas')
    ->where([['clientdatas.status', '=' ,'open'],['clientdatas.designation', '=' ,'Loan']])->orWhere([['clientdatas.status', '=' ,'open'],['clientdatas.designation', '=' ,'Realestate']])->orWhere([['clientdatas.status', '=' ,'open'],['clientdatas.designation', '=' ,'Discount']])
    ->sum('amount');
  
    $discountopen =  $discountpercent/ $openpercent1;

    $opendiscount =  Charts::create('percentage', 'justgage')
    ->title('')
    ->elementLabel('Discount')
    ->values([$discountopen*100,0,100])
    ->responsive(false)
    ->height(150)
    ;
    $openloancalc = DB::table('clientdatas')
    ->where([['clientdatas.status', '=' ,'open'],['clientdatas.designation', '=' ,'Loan']]) 
    ->sum('amount');
    $loanopen =  $openloancalc/ $openpercent1;      
echo($openpercent1);

    $openloan =  Charts::create('percentage', 'justgage')
    ->title('')
    ->elementLabel('Loan')
    ->values([$loanopen*100,0,100])
    ->responsive(false)
    ->height(150)  ;
  
    $openrealestatecalc = DB::table('clientdatas')
    ->where([['clientdatas.status', '=' ,'open'],['clientdatas.designation', '=' ,'Realestate']]) 
    ->sum('amount');
    $realestateopen =  $openrealestatecalc/ $openpercent1; 
  
    $openrealestate =  Charts::create('percentage', 'justgage')
    ->title('')
    ->elementLabel('Real estate')
    ->values([$realestateopen*100,0,100])
    ->responsive(false)
    ->height(150) ;

        return view('charts.index',compact('bar_chart1','pie1','bar_top','bar_toptry','date_tran','opendiscount','openrealestate','openloan'));
    }
}
