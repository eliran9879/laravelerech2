<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use App\Customer;
use DataTables;
use DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $customers= Customer::all()->paginate(2);
         $customers = DB::table('customers')->simplePaginate(2);
         return view('customers.index',['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = new Customer();
        $id =Auth::id();

      
        
        $customer->client_name = $request->title;
        $customer->id_account = $request->account;
        $customer->payeee = $request->payeee;
        $customer->occupation = $request->occupation;
        $customer->adrress = $request->adrress;
        
        $customer->save();
        return redirect('customers');
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
        $customer = Customer::find($id);
        return view('customers.edit', compact('customer'));
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
        $customer = Customer::find($id);
        $customer -> update($request->all());
        return redirect('customers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Customer::find($id);
        $data->delete();
         return redirect('customers');
    }

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('customers')
         ->where('client_name', 'like', '%'.$query.'%')
         ->orWhere('adrress', 'like', '%'.$query.'%')
         ->orWhere('occupation', 'like', '%'.$query.'%')
         ->orWhere('id_account', 'like', '%'.$query.'%')
         ->orWhere('payeee', 'like', '%'.$query.'%')
         ->orderBy('id', 'desc')
         ->get();
         
      }
      else
      {
       $data = DB::table('customers')
         ->orderBy('id', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->client_name.'</td>
         <td>'.$row->adrress.'</td>
         <td>'.$row->occupation.'</td>
         <td>'.$row->id_account.'</td>
         <td>'.$row->payeee.'</td> 
         <td> 
            <a href="customers/'.$row->id.'/edit"> <img src="https://image.flaticon.com/icons/png/512/84/84380.png" 
            style = "width:30px; height:30px; display:block; margin-left: auto; margin-right: auto;"> </a>
         </td>
         <td>
          <button type="button" name="edit" id="'.$row->id.'" class="delete btn btn-danger btn-sm">Delete</button>
         </td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
}
