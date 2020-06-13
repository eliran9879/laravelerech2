<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Gate;
use App\Covenantsmizrahi;
use App\Bank;

class CovenantsmizrahiController extends Controller
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
        $covenantsmizrahis= Covenantsmizrahi::with('banks')->get();
        return view('covenantsmizrahis.index',['covenantsmizrahis' => $covenantsmizrahis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('covenantsmizrahis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $covenantsmizrahis = new Covenantsmizrahi();
        $id = 2;
        $covenantsmizrahis->bank_id = $id;
        $covenantsmizrahis->designation = $request->designation;
        $covenantsmizrahis->total_month = $request->total_month;
        $covenantsmizrahis->approval = $request->approval;
        $covenantsmizrahis->max_approval = $request->max_approval;
        $covenantsmizrahis->type_check = $request->type_check;
        $covenantsmizrahis->save();
        return redirect('covenants_mizrahi');
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
        $covenantsmizrahis = Covenantsmizrahi::find($id);
        return view('covenantsmizrahis.edit', compact('covenantsmizrahis'));
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
        $covenantsmizrahis = Covenantsmizrahi::find($id);
        $covenantsmizrahis -> update($request->all());
        return redirect('covenants_mizrahi');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $covenantsmizrahis = Covenantsmizrahi::find($id);
        $covenantsmizrahis->delete();
        return redirect('covenants_mizrahi');
    }
}
