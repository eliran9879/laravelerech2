<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Illuminate\Support\Facades\Auth;
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
        $users = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
                    ->get();
        $chart = Charts::database($users, 'bar', 'highcharts')
			      ->title("Monthly new Register Users")
			      ->elementLabel("Total Users")
			      ->dimensions(1000, 500)
			      ->responsive(false)
                  ->groupByMonth(date('Y'), true);
        $tasks = DB::table('customers') ->get();
        foreach   ($tasks as $customer) {
        $customer_occup = $customer->occupation;
        }
        $loans = DB::table('banks')
        ->join('clientdatas', 'banks.id', '=', 'clientdatas.bank_id') 
         ->where('clientdatas.status', '=' ,'open') ->orWhere('clientdatas.status', '=' ,'close') ->get();
       $bar_chart = Charts::database( $tasks, 'bar', 'material')
       ->title('segmentation occuputioan')
       ->elementLabel("Total Customers")
       ->Width(0)
       ->responsive(true)
       ->Colors(['#4caf50'])
       ->groupBy('occupation');
       $bar_chart1 = Charts::database( $loans, 'bar', 'material')
       ->title('segmentation occuputioan')
       ->elementLabel("Total transactions by banks")
       ->Width(0)
       ->responsive(true)
       ->Colors(['#4caf50'])
       ->groupBy('name');
    
        return view('charts.index',compact('bar_chart','bar_chart1'));
    }
}
