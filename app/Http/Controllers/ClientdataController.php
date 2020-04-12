<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Clientdata;
use App\Customer;

class ClientdataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $last_id = DB::table('clientdatas')->order_by('id', 'desc')->first();
       $range = ($last_id->end_date - $last_id->deposit_date) / 30;
       if (($last_id->designation == 'Loan' || $last_id->designation == 'real_estate') & ($last_id->type_check = 'Salaried')) {
        $clientdata = DB::table('covenantshapoalims')->where('designation','loan')->get(); 
        $clientrange = DB::table('covenantshapoalims')->where( $range ,'<', $clientdata->total_month)->get(); 
        $clientrangemin =  $clientrange->min('total_month')->get();
        // $sumamount =  App\Clientdata::where([['payeee' , $request->payeee],['client_name' , $request->client_name]])->sum('amount');
        $clientid =  $last_id->client_id;
        $sumamount =  App\Clientdata::where('client_id', $clientid)->sum('amount');
         if ((($last_id->amount) / $sumamount ) < $clientrangemin->max_approval)
             $clientdatas = $clientrangemin; 
             return view('clientdatas.index',['clientdatas' => $clientdatas]);
       }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    function fetch(Request $request)
    {
     if($request->get('query'))
     {
      $query = $request->get('query');
      error_log($query);
      $data = DB::table('customers')
        ->where('payeee', 'LIKE', "%{$query}%")
        ->get();
        $output = '';
      
      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
      foreach($data as $row)
      {
       $output .= '
       <li><a href="#">'.$row->payeee.'</a></li>
       ';
      }
      $output .= '</ul>';
      if(count($data))
      echo $output;
        else
            return 'No Result Found, add new customer';
   
      
     }
    }
    function fetch1(Request $request)
    {
     $select = $request->get('select');
     $value = $request->get('value');
     $dependent = $request->get('dependent');
     $data = DB::table('customers')
       ->where($select, $value)
       ->groupBy($dependent)
       ->get();
     $output = '<option value="">Select '.ucfirst($dependent).'</option>';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
     }
     echo $output;
    }




    public function create(Request $request)
    { 
    // $clientnames = Customer::where('payeee' , $request->payeee)->get('client_name'); 
    //    $query= $request->input('payeee');
    $clientnames = DB::table('customers')->select('client_name')->get(); 
    $idaccounts = DB::table('customers')
        ->get();   
    // $idaccounts = Customer::where('payeee' , $query)->pluck('id_account');
        return view('clientdatas.create',['clientnames'=>$clientnames,'idaccounts'=>$idaccounts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $query = new ClientData();
        $id =Auth::id();
        $name_client =DB::table('customers')->where('client_name' , $request->client_name)->value('payeee');
        $id_client = DB::table('customers')->where('payeee' , $request->payeee)->value('payeee');
        if ($name_client == $id_client) {
            $id_client = DB::table('customers')->where([['payeee' , $request->payeee],['client_name' , $request->client_name]])->value('id_account'); 
            $client_id = $id_client;
        }
        $query->client_id = $client_id;
        
        $query->amount = $request->amount;
        $query->deposit_date = $request->start_date;
        $query->end_date = $request->end_date;
        $query->designation = $request->transaction;
        $query->type_check = $request->type;

        $query->save();

        return redirect('client_data/create');
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
