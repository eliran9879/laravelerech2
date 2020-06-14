<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Gate;
use App\Covenantsibi;
use App\Bank;
class CovenantsibiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('manager')){  
            if (Gate::denies('worker')) {
                abort(403,"Are you a hacker or what?");} }
        // $covenantsibis= Covenantsibi::all();
        $covenantsibis= Covenantsibi::with('banks')->get();
        return view('covenantsibis.index',['covenantsibis' => $covenantsibis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('covenantsibis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $covenantsibis = new Covenantsibi();
        $id = 3;
        //$covenantshapoalim->title = $request->title;
        $covenantsibis->bank_id = $id;
        $covenantsibis->designation = $request->designation;
        $covenantsibis->total_month = $request->total_month;
        $covenantsibis->total_amount = $request->total_amount;
        $covenantsibis->approval = $request->approval;
        $covenantsibis->max_percentage_general = $request->max_percentage_general;
        $covenantsibis->min_percentage_general = $request->min_percentage_general;
        $covenantsibis->save();
        return redirect('covenants_ibi');
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
        $covenantsibis= Covenantsibi::find($id);
        return view('covenantsibis.edit', compact('covenantsibis'));
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
        $covenantsibis = Covenantsibi::find($id);
        $covenantsibis -> update($request->all());
        return redirect('covenants_ibi');
    }

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
        $covenantsibis = Covenantsibi::find($id);
        $covenantsibis->delete();
        return redirect('covenants_ibi');
    }
}
