<?php

namespace App\Http\Controllers;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
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
    public function all(Request $request)
    {
        if (Gate::denies('manager')){  
            if (Gate::denies('worker')) {
                abort(403,"Are you a hacker or what?");} }
        $clientbasic= DB::table('clientdatas')->latest('id')->take(1)->get();
        $clientdat = DB::table('clientdatas')->latest('id')->take(1)->value('end_date');
        $clientdatas = DB::table('clientdatas')->latest('id')->take(1)->value('deposit_date');
        // $clientdataamonaration = DB::table('clientdatas')->latest('id')->take(1)->value('amonaration_board');
    //  if ($clientdataamonaration = 'equal fund'){
        //   $fund_return = $clientamount / $range; 
    //  }
        $datetime1 = new DateTime($clientdatas);
        $datetime2 = new DateTime($clientdat);
        $clientdatas1 = $datetime2->diff($datetime1);
        $days = $clientdatas1->format('%a');
        // echo($days);
     if ($request->bondsduration){
        $rangeibi=$request->bondsduration;
        // echo( $rangeibi);
     }
     
     if ($request->id_payee){
        $id_payee=$request->id_payee;
        echo( $id_payee);
     }
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
               if (($client_des == 'real_estate') & ($client_check == 'Salaried')) {
                $min_month =  DB::table('covenantshapoalims')->where([['total_month','>', $range],['designation','loan']])->min('total_month');  
                $min_month_ibi =  DB::table('covenantsibis')->where([['total_month','>', $rangeibi],['designation','realestate']])->min('total_month');  
                if (!empty($min_month)){
                    $client_month =  Covenantshapoalim::with('banks')->where([['designation','loan'],['total_month',$min_month]])->get(); 
                    foreach ($client_month as $client_month1) {
                        $client_poalim_aprroval = $client_month1->max_approval;
                    }
                   $sumamount =  DB::table('clientdatas')->where('client_id', $clientid)->sum('amount');
                //    echo($sumamount);
                 if (($clientamount / $sumamount ) < $client_poalim_aprroval){
                     $clientdatashapoalim = $client_month; 
                    //  echo($clientdatas);
                 }
                }
                 if (!empty($min_month_ibi)){
                    $client_month_ibi =  Covenantsibi::with('banks')->where([['designation','realestate'],['total_month',$min_month_ibi]])->get(); 
                    foreach ($client_month_ibi as $client_month1_ibi) {
                            $client_ibi_aprroval = $client_month1_ibi->total_amount;
                            $client_ibi_min = $client_month1_ibi->min_percentage_general;
                            $client_ibi_max = $client_month1_ibi->max_percentage_general;
                        }  
                    $sumamount_loan_ibi =  DB::table('clientdatas')->where([['designation','realestate'],['bank_id','3']])->sum('amount');
                    $sumamount_ibi =  DB::table('clientdatas')->where('designation','realestate')->sum('amount');
                //    echo($sumamount);
                if (($clientamount  < $client_ibi_aprroval) & (( $sumamount_loan_ibi/ $sumamount_ibi) < $client_ibi_max) & (( $sumamount_discount_ibi/ $sumamount_ibi) > $client_ibi_min))  {
                    $clientdatasibi = $client_month_ibi; 
                    //  echo($clientdatas);
                 }
                }
                    
            }
        else {
          $min_month =  DB::table('covenantshapoalims')->where([['total_month','>', $range],['designation','loan']])->min('total_month');  
          $min_month_ibi =  DB::table('covenantsibis')->where([['total_month','>', $range],['designation','loan']])->min('total_month');  
          if (!empty($min_month)){
            $client_month =  Covenantshapoalim::with('banks')->where([['designation','loan'],['total_month',$min_month]])->get(); 
            foreach ($client_month as $client_month1) {
                $client_poalim_aprroval = $client_month1->max_approval;
            }
           $sumamount =  DB::table('clientdatas')->where('client_id', $clientid)->sum('amount');
        
         if (($clientamount / $sumamount ) < $client_poalim_aprroval){
             $clientdatashapoalim = $client_month; 
            //  echo($clientdatashapoalim);
         }
        }
         if (!empty($min_month_ibi)){
            $client_month_ibi =  Covenantsibi::with('banks')->where([['designation','loan'],['total_month',$min_month_ibi]])->get(); 
            foreach ($client_month_ibi as $client_month1_ibi) {
                    $client_ibi_aprroval = $client_month1_ibi->total_amount;
                    $client_ibi_min = $client_month1_ibi->min_percentage_general;
                    $client_ibi_max = $client_month1_ibi->max_percentage_general;
                }  
            $sumamount_loan_ibi =  DB::table('clientdatas')->where([['designation','loan'],['bank_id','3']])->sum('amount');
            $sumamount_ibi =  DB::table('clientdatas')->where('designation','loan')->sum('amount');
        //    echo($sumamount);
        if (($clientamount  < $client_ibi_aprroval) & (( $sumamount_loan_ibi/ $sumamount_ibi) < $client_ibi_max) & (( $sumamount_loan_ibi/ $sumamount_ibi) > $client_ibi_min))  {
            $clientdatasibi = $client_month_ibi; 
            //  echo($clientdatas);
         }
        }
            
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
    
        $sumamount =  DB::table('clientdatas')->where('client_id', $clientid)->orWhere('client_id', $id_payee)->sum('amount');
        $sumamountpayee =  DB::table('clientdatas')->where('payee_id', $clientid)->orWhere('payee_id', $id_payee)->sum('amount');

        if ((($clientamount / $sumamount ) < $client_poalim_aprroval) & (($clientamount / $sumamountpayee ) < $client_poalim_aprroval)){
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
        else
        $nodata = 'no data'; 
        return view('all.index',compact('nodata'));
        
    }
   
    public function index()
    {
        if (Gate::denies('manager')){  
            if (Gate::denies('worker')) {
                abort(403,"Are you a hacker or what?");} }
        if (request()->has('status')){
        $clientdatas= Clientdata::with('banks')->where('status',request('status'))->paginate(5);
        }
        else{
            $todayDate = date("Y-m-d");
            echo($todayDate);
            $clientdatas= Clientdata::with('banks')->where('bank_id','!=','NULL')->paginate(5);

        }
        return view('clientdatas.index',['clientdatas' => $clientdatas,'todayDate' => $todayDate]);
    }
   
    public function status1($id)
    {
        if (Gate::denies('manager')){  
            if (Gate::denies('worker')) {
                abort(403,"Are you a hacker or what?");} }
        $clientdata = Clientdata::findOrFail($id);
        $clientdata->status= 'open';
        $clientdata->save();
        return redirect('client_data');
    }

    public function statusclose($id)
    {
        if (Gate::denies('manager')){  
            if (Gate::denies('worker')) {
                abort(403,"Are you a hacker or what?");} }
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
        if (Gate::denies('manager')){  
            if (Gate::denies('worker')) {
                abort(403,"Are you a hacker or what?");} }
     if($request->get('query'))
     {
      $query = $request->get('query');
      echo($query);
      $data = DB::table('payees')
        ->where('name', 'LIKE', "%{$query}%")
        ->get();
        $output = '';
      
      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
      foreach($data as $row)
      {
       $output .= '
       <li style="cursor:pointer;color:blue">'.$row->name.'</li>
       ';
      }
      $output .= '</ul>';
      if(count($data))
      echo $output;
        else
            return ' Chosen But No Result Found, add new customer';
   
      
     }
    }

    function fetchwithdrawer(Request $request)
    {
        if (Gate::denies('manager')){  
            if (Gate::denies('worker')) {
                abort(403,"Are you a hacker or what?");} }
     if($request->get('query'))
     {
      $query = $request->get('query');
      echo($query);
      $data = DB::table('customers')
        ->where('client_name', 'LIKE', "%{$query}%")
        ->get();
        $output1 = '';
      
      $output1 = '<ul class="dropdown-menu" style="display:block; position:relative">';
      foreach($data as $row)
      {
       $output1 .= '
       <li style="cursor:pointer;color:blue">'.$row->client_name.'</li>
       ';
      }
      $output1 .= '</ul>';
      if(count($data))
      echo $output1;
        else
            return ' Chosen But No Result Found, add new customer';
   
      
     }
    }

    function fetch1(Request $request)
    {
        if (Gate::denies('manager')){  
            if (Gate::denies('worker')) {
                abort(403,"Are you a hacker or what?");} }
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
        if (Gate::denies('manager')){  
            if (Gate::denies('worker')) {
                abort(403,"Are you a hacker or what?");} }
    // $clientnames = Customer::where('payeee' , $request->payeee)->get('client_name'); 
    //    $query= $request->input('payeee');
    // $clientnames = DB::table('customers')->select('client_name')->get(); 
    // $idaccounts = DB::table('customers')
        // ->get();   
    $idaccounts = Customer::where('client_name' , $request->client_name)->pluck('id_account');
    echo($idaccounts);
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
        if (Gate::denies('manager')){  
            if (Gate::denies('worker')) {
                abort(403,"Are you a hacker or what?");} }
        $query = new ClientData();
        $id =Auth::id();
        
        $query->client_id = $request->id_account ;
        $query->payee_id = $request->id_payee ;
        $query->amount = $request->amount;
        $query->deposit_date = $request->start_date;
        $query->end_date = $request->end_date;
        $query->designation = $request->transaction;
        $query->type_check = $request->type;

        $query->save();

        return redirect('all');
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

    // public function searchResponse(Request $request){
    //     $query = $request->get('term','');
    //     $countries=\DB::table('payees');
    //     if($request->type=='countryname'){
    //         $countries->where('name','LIKE','%'.$query.'%');
    //     }
    //     if($request->type=='country_code'){
    //         $countries->where('id_account','LIKE','%'.$query.'%');
    //     }
    //        $countries=$countries->get();        
    //     $data=array();
    //     foreach ($countries as $country) {
    //             $data[]=array('name'=>$country->name,'sortname'=>$country->sortname);
    //     }
    //     if(count($data))
    //          return $data;
    //     else
    //         return ['name'=>'','sortname'=>''];
    // }
}
