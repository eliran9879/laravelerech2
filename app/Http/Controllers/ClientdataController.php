<?php

namespace App\Http\Controllers;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Clientdata;
use App\Customer;
use App\Http\Controllers\Carbon;
use App\Covenantshapoalim;
use App\Covenantsmizrahi;
use App\Covenantsibi;
use App\Bank;
class ClientdataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $clientbasic= DB::table('clientdatas')->latest('id')->take(1)->get();
        $clientdat = DB::table('clientdatas')->latest('id')->take(1)->value('end_date');
        $clientdatas = DB::table('clientdatas')->latest('id')->take(1)->value('deposit_date');
        $datetime1 = new DateTime($clientdatas);
        $datetime2 = new DateTime($clientdat);
        $clientdatas1 = $datetime2->diff($datetime1);
        $days = $clientdatas1->format('%a');
        // echo($days);
        $range = $days/30;
        // echo($range);//working until here
        foreach ($clientbasic as $clientbasic) {
            $client_des = $clientbasic->designation;
            $client_check = $clientbasic->type_check;
            $clientid =  $clientbasic->client_id;
            $clientamount = $clientbasic->amount;
        echo($client_des);
    }    
          if (($client_des == 'Loan' || $client_des == 'real_estate') & ($client_check == 'Salaried')) {
            $min_month =  DB::table('covenantshapoalims')->where([['total_month','>', $range],['designation','loan']])->min('total_month');  
            $client_month =  Covenantshapoalim::with('banks')->where([['designation','loan'],['total_month',$min_month]])->get(); 
            // echo($min_month);
            
            foreach ($client_month as $client_month1) {
                $client_poalim_aprroval = $client_month1->max_approval;
            }
           $sumamount =  DB::table('clientdatas')->where('client_id', $clientid)->sum('amount');
        //    echo($sumamount);
         if (($clientamount / $sumamount ) < $client_poalim_aprroval){
             $clientdatashapoalim = $client_month; 
            //  echo($clientdatas);
             return view('all.index',['clientdatashapoalim' => $clientdatashapoalim]);
            
         }
        }
      elseif (($client_des == 'Discount') & ($client_check == 'Salaried')) {
        $min_month_mizrahi =  DB::table('covenantsmizrahis')->where([['total_month','>', $range],['designation','discount']])->min('total_month');  
        $min_month_ibi =  DB::table('covenantsibis')->where([['total_month','>', $range],['designation','discount']])->min('total_month');  
        // echo(  $min_month_mizrahi);
        $min_month =  DB::table('covenantshapoalims')->where([['total_month','>', $range],['designation','discount']])->min('total_month');  
        if (!empty($min_month)){
            $client_month =  Covenantshapoalim::with('banks')->where([['designation','discount'],['total_month',$min_month]])->get(); 
        foreach ($client_month as $client_month1) {
            $client_poalim_aprroval = $client_month1->max_approval;
        }  
    
        $sumamount =  DB::table('clientdatas')->where('client_id', $clientid)->sum('amount');
        if (($clientamount / $sumamount ) < $client_poalim_aprroval){
            $clientdatashapoalim = $client_month; 
            // echo($clientdatashapoalim);
        }
    }
    if (!empty($min_month_ibi)){
        $client_month_ibi =  Covenantsibi::with('banks')->where([['designation','discount'],['total_month',$min_month_ibi]])->get(); 
        foreach ($client_month_ibi as $client_month1_ibi) {
            $client_ibi_aprroval = $client_month1_ibi->total_amount;
            $client_ibi_min = $client_month1_ibi->min_percentage_general;
            $client_ibi_max = $client_month1_ibi->max_percentage_general;
        }  
     $sumamount_discount_ibi =  DB::table('clientdatas')->where([['designation','discount'],['bank_id','3']])->sum('amount');
     $sumamount_ibi =  DB::table('clientdatas')->where('designation','discount')->sum('amount');
     if (($clientamount  < $client_ibi_aprroval) & (( $sumamount_discount_ibi/ $sumamount_ibi) < $client_ibi_max) & (( $sumamount_discount_ibi/ $sumamount_ibi) > $client_ibi_min))  {
            $clientdatasibi = $client_month_ibi; 
            echo($clientdatasibi);
        }    
    }
        if (!empty($min_month_mizrahi)){
            // echo(  $min_month_mizrahi);
            $client_month_mizrahi =  Covenantsmizrahi::with('banks')->where([['designation','discount'],['total_month',$min_month_mizrahi]])->get(); 
            foreach ($client_month_mizrahi as $client_month1_mizrahi) {
                $client_mizrahi_aprroval = $client_month1_mizrahi->max_approval;
            }
            if ($clientamount < $client_mizrahi_aprroval){
            $clientdatasmizrahi = $client_month_mizrahi; 
            // echo($clientdatasmizrahi);
        }
    }
}
        $id_last1 = DB::table('clientdatas')->latest('id')->take(1)->value('id');
        $id_last = DB::table('clientdatas')->latest('id')->take(1)->get();
        foreach ($id_last as $id_last) {
            $id_lastamount = $id_last->amount;
            $id_lastdeposit = $id_last->deposit_date;
            $id_lastend = $id_last->end_date;
            $id_lastid =  $id_last->client_id;
            $id_lastdesignation =  $id_last->designation;
            $id_lasttype_check =  $id_last->type_check;

        }  
        if ((!empty ($clientdatashapoalim )) & (!empty ($clientdatasmizrahi )) & (!empty ($clientdatasibi ))){
        DB::table('clientdatas')->where('id', $id_last1) ->update(
            ['bank_id' => '1']
           );
           DB::table('clientdatas')->insertOrIgnore([
            ['client_id' => $id_lastid, 'amount' => $id_lastamount,'deposit_date'=>  $id_lastdeposit,
            'end_date' =>  $id_lastend,'designation'=> $id_lastdesignation,'type_check' => $id_lasttype_check, 'bank_id' => '2'],
            ['client_id' => $id_lastid, 'amount' => $id_lastamount,'deposit_date'=>  $id_lastdeposit,
            'end_date' =>  $id_lastend,'designation'=> $id_lastdesignation,'type_check' => $id_lasttype_check, 'bank_id' => '2']  
           ]);
            return view('all.index',['clientdatashapoalim' => $clientdatashapoalim,'clientdatasmizrahi' => $clientdatasmizrahi,'clientdatasibi',$clientdatasibi,'id_last' => $id_last]);
       }  
        elseif ((!empty ($clientdatashapoalim )) & (!empty ($clientdatasibi ))){
        DB::table('clientdatas')->where('id', $id_last1) ->update(
            ['bank_id' => '1']
           );
           DB::table('clientdatas')->insertOrIgnore(
            ['client_id' => $id_lastid, 'amount' => $id_lastamount,'deposit_date'=>  $id_lastdeposit,
            'end_date' =>  $id_lastend,'designation'=> $id_lastdesignation,'type_check' => $id_lasttype_check, 'bank_id' => '3']  
        );
            return view('all.index',['clientdatashapoalim' => $clientdatashapoalim,'clientdatasibi' => $clientdatasibi,'id_last' => $id_last]);
                 }   
         
        elseif ((!empty ($clientdatasmizrahi )) & (!empty ($clientdatasibi ))){
        DB::table('clientdatas')->where('id', $id_last1) ->update(
            ['bank_id' => '3']
           );
           DB::table('clientdatas')->insertOrIgnore(
            ['client_id' => $id_lastid, 'amount' => $id_lastamount,'deposit_date'=>  $id_lastdeposit,
            'end_date' =>  $id_lastend,'designation'=> $id_lastdesignation,'type_check' => $id_lasttype_check, 'bank_id' => '2']  
        );
            return view('clientdatas.index',['clientdatasmizrahi' => $clientdatasmizrahi,'clientdatasibi' => $clientdatasibi,'id_last' => $id_last]);
        }
        
        elseif ((!empty($clientdatashapoalim)) & (!empty ($clientdatasmizrahi ))) {
            DB::table('clientdatas')->where('id', $id_last1) ->update(
                ['bank_id' => '1']
               );
               DB::table('clientdatas')->insertOrIgnore(
                ['client_id' => $id_lastid, 'amount' => $id_lastamount,'deposit_date'=>  $id_lastdeposit,
                'end_date' =>  $id_lastend,'designation'=> $id_lastdesignation,'type_check' => $id_lasttype_check, 'bank_id' => '2']  
            );
            return view('all.index',['clientdatashapoalim' => $clientdatashapoalim,'clientdatasmizrahi' => $clientdatasmizrahi,'id_last' => $id_last]);            
        }
        elseif (!empty ($clientdatasmizrahi )) {
        DB::table('clientdatas')->where('id', $id_last1) ->update(
            ['bank_id' => '2']
           );
            
        return view('all.index',['clientdatasmizrahi' => $clientdatasmizrahi,'id_last' => $id_last]);
    }
        elseif (!empty ($clientdatasibi)){
        DB::table('clientdatas')->where('id', $id_last1) ->update(
            ['bank_id' => '3']
           );
            return view('all.index',['clientdatasibi' => $clientdatasibi,'id_last' => $id_last]);
        }
            elseif (!empty ($clientdatashapoalim )){
        DB::table('clientdatas')->where('id', $id_last1) ->update(
            ['bank_id' => '1']
           );
            return view('all.index',['clientdatashapoalim' => $clientdatashapoalim,'id_last' => $id_last]);
        }
        
    }
   
    public function index()
    {
        $clientdatas= Clientdata::with('banks')->get();
        return view('clientdatas.index',['clientdatas' => $clientdatas]);
    }
   
    public function status1($id)
    {
        $clientdata = Clientdata::findOrFail($id);
        $clientdata->status= 'open';

      
        $clientdata->save();
        return redirect('client_data');
    }

    public function statusclose($id)
    {
        $clientdata = Clientdata::findOrFail($id);
        $clientdata->status= 'close';
        $clientdata->save();
        return redirect('client_data');
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
      echo($query);
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
    // $clientnames = DB::table('customers')->select('client_name')->get(); 
    // $idaccounts = DB::table('customers')
        // ->get();   
    // $idaccounts = Customer::where('payeee' , $query)->pluck('id_account');
        // return view('clientdatas.create',['clientnames'=>$clientnames,'idaccounts'=>$idaccounts]);
        $country_list = DB::table('customers')
        ->groupBy('client_name')
        ->get();
    return view('clientdatas.create')->with('country_list', $country_list);
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

        return redirect('client_data');
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
