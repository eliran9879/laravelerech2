<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Gate;
use App\Payee;
use DataTables;
//use DB;
use Illuminate\Support\Facades\DB;

class PayeeController extends Controller
{
    public function index()
    {
        if (Gate::denies('manager')) {
            if (Gate::denies('worker')) {
                abort(403, "Are you a hacker or what?");
            }
        }

        $payees = DB::table('payees')->simplePaginate(2);
        return view('payees.index', ['payees' => $payees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('manager')) {
            if (Gate::denies('worker')) {
                abort(403, "Are you a hacker or what?");
            }
        }
        return view('payees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::denies('manager')) {
            if (Gate::denies('worker')) {
                abort(403, "Are you a hacker or what?");
            }
        }
        $payee = new Payee();
        $id = Auth::id();

        $payee->name = $request->name;
        $payee->id_account = $request->account;
        $payee->status = 'Authorized';
        $payee->occupation = $request->occupation;
        $payee->adrress = $request->adrress;
        $ifexist = DB::table('payees')->where([['name', $request->name], ['id_account', $request->account]])->get();
        //     echo ( $ifexist );
        if (DB::table('payees')->where([['name', $request->name], ['id_account', $request->account]])->exists()) {
            return abort(403, "sorry, you have this customer");
        } else {
            $payee->save();
            return redirect('payees');
        }
    }

    public function store1(Request $request)
    {
        if (Gate::denies('manager')) {
            if (Gate::denies('worker')) {
                abort(403, "Are you a hacker or what?");
            }
        }
        $payee = new Payee();
        $id = Auth::id();



        $payee->name = $request->name;
        $payee->id_account = $request->id_account;

        $payee->occupation = $request->occupation;
        $payee->adrress = $request->adrress;
        $ifexist = DB::table('payees')->where([['name', $request->name], ['id_account', $request->id_account]])->get();
        //     echo ( $ifexist );
        if (DB::table('payees')->where([['name', $request->name], ['id_account', $request->id_account]])->exists()) {
            return abort(403, "sorry, you have this customer");
        } else {
            $payee->save();
            return redirect('client_data/create')->with('success', 'Data saved');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     if (Gate::denies('manager')){  
    //         if (Gate::denies('worker')) {
    //             abort(403,"Are you a hacker or what?");} }
    //     //  $customers= Customer::all()->paginate(2);
    //      $customers = Customer::findOrFail($id);
    //      return view('customers.show',['customers' => $customers]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::denies('manager')) {
            if (Gate::denies('worker')) {
                abort(403, "Are you a hacker or what?");
            }
        }

        $payee = Payee::find($id);
        return view('payees.edit', compact('payee'));
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
        if (Gate::denies('manager')) {
            if (Gate::denies('worker')) {
                abort(403, "Are you a hacker or what?");
            }
        }
        $payee = Payee::find($id);
        $payee->status = $request->status;
        $payee->update($request->all());
        return redirect('payees');
    }

    // public function update1(Request $request,$id)
    // {
    //     if (Gate::denies('manager')){  
    //         if (Gate::denies('worker')) {
    //             abort(403,"Are you a hacker or what?");} }
    //             $customer = Customer::find($id);
    //             $customer->status = $request->status;

    //             $customer -> save();
    //             return redirect('customers');


    // }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */




    public function destroy($id)
    {
        if (Gate::denies('manager')) {
            if (Gate::denies('worker')) {
                abort(403, "Are you a hacker or what?");
            }
        }
        $data = Payee::find($id);
        $data->delete();
        return redirect('payees');
    }

    function action1(Request $request)
    {
        if (Gate::denies('manager')) {
            if (Gate::denies('worker')) {
                abort(403, "Are you a hacker or what?");
            }
        }
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {

                $data = DB::table('payees')
                    ->where('name', 'like', '%' . $query . '%')
                    ->orWhere('adrress', 'like', '%' . $query . '%')
                    ->orWhere('occupation', 'like', '%' . $query . '%')
                    ->orWhere('id_account', 'like', '%' . $query . '%')
                    ->orWhere('status', 'like', '%' . $query . '%')
                    ->orderBy('id', 'desc')
                    ->get();
            } else {
                $data = DB::table('payees')
                    ->orderBy('id', 'desc')
                    ->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
        <tr style = "text-align:center;">

        <td style = "vertical-align: middle;">' . $row->name . '</td>
        <td style = "vertical-align: middle;">' . $row->adrress . '</td>
        <td style = "vertical-align: middle;">' . $row->occupation . '</td>
        <td style = "vertical-align: middle;">' . $row->id_account . '</td>';

                    if ($row->status == "Blocked") {
                        $output .= '<td style="background-color:red; vertical-align: middle; width: 10%; height: 10%; font-weight: bold;">' . $row->status . '</td>';
                    } else if ($row->status == "Authorized") {
                        $output .= '<td style="background-color:MediumSeaGreen; vertical-align: middle; width: 10%; height: 10%; font-weight: bold;">' . $row->status . '</td>';
                    }
                    $output .= ' <td> 
            <a href="payees/' . $row->id . '/edit"> <img src="https://image.flaticon.com/icons/png/512/84/84380.png" 
            style = "width:30px; height:30px; display:block; margin-left: auto; margin-right: auto;"> </a>
         </td>
         <td>
         <a href="#"  name="edit" id="' . $row->id . '" class="delete">
          <img src="data:image/png;base64,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"
          style = "width:30px; height:30px; display:block; margin-left: auto; margin-right: auto;">
          </a>
         </td>';

                    '</tr>';
                }
            } else {
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

    function fetch1(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            echo ($query);
            $data = DB::table('payees')
                ->where('name', 'LIKE', "%{$query}%")
                ->get();
            $output = '';

            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach ($data as $row) {
                $output .= '
       <li><a href="#">' . $row->name . '</a></li>
       ';
            }
            $output .= '</ul>';
            if (count($data))
                echo $output;

            else
                return ' has chosen, continue the process';
        }
    }
}
