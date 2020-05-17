<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
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
         if (Gate::denies('manager')) {
             abort(403,"Are you a hacker or what?");}
            // $users=User::all();
          $id=Auth::id();
          
         $org =  DB::table('users')->where('id',$id)->pluck('code');
         $use =  User::where('code' , $org)->get('id');
    
       //  $users =  DB::table('users')->where('id',$use->user_id)->get();
         $users =  User::find($use);
        
      
          return view('users.index', compact('users'));
      }
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user = User::find($id);
        if (Gate::denies('manager')) {
            abort(403,"Are you a hacker or what?");}
      if ($user->role != 'manager'){
        $user->delete();}
        else
        {
            abort(403,"Soory,You are a manager");
        }
        return redirect('users');
    }
    public function code($id)
    {
        $user = User::findOrFail($id);
        $user->codesubmit='1';
        $user->save();
        return redirect('users');
    }

}
