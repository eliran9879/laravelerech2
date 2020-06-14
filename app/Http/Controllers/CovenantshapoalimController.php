<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Gate;
use App\Covenantshapoalim;
use App\Bank;

class CovenantshapoalimController extends Controller
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
        $covenantshapoalims= Covenantshapoalim::with('banks')->get();
        return view('covenantshapoalims.index',['covenantshapoalims' => $covenantshapoalims]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('covenantshapoalims.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $covenantshapoalim = new Covenantshapoalim();
        $id = 1;
        //$covenantshapoalim->title = $request->title;
        $covenantshapoalim->bank_id = $id;
        $covenantshapoalim->designation = $request->designation;
        $covenantshapoalim->total_month = $request->total_month;
        $covenantshapoalim->max_approval = $request->max_approval;
        $covenantshapoalim->approval = $request->approval;
        $covenantshapoalim->type_check = $request->type_check;
        $covenantshapoalim->save();
        return redirect('covenants_hapoalim');
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
        $covenantshapoalims= Covenantshapoalim::find($id);
        return view('covenantshapoalims.edit', compact('covenantshapoalims'));
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
        $covenantshapoalims= Covenantshapoalim::find($id);
        $covenantshapoalims -> update($request->all());
        return redirect('covenants_hapoalim');
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
       
        $covenantshapoalims = Covenantshapoalim::find($id);
        $covenantshapoalims->delete();
        return redirect('covenants_hapoalim');
    }
}
