@extends('layouts.sidebar3')
@section('content')
    
<div class="w3-sidebar w3-bar-block " style="margin: 0 0 5% 0;" >
         
         <div class="sidebar-module" style="font-family: Arial Black, Gadget, sans-serif;">
           <h2>all daata</h2>
           <ol class="list-unstyled">
            
           
             
          </ol>
        
                
 </div>

 <div class="panel panel-default">

<br>
<div class="table-responsive">
<table  class="table table-striped table-bordered">
       <thead>
        <tr>
         <th style="text-align:center">Customer Name</th>
         <th style="text-align:center">Address</th>
         <th style="text-align:center">Occupation</th>
         <th style="text-align:center">Id Account</th>
         <th style="text-align:center">Payeee</th>
         <th style="text-align:center">Status</th>
       
        </tr>
       </thead>
       <tbody>
    
  <tr>
 
<td >{{$customers->client_name}} </td>
<td > {{$customers->adrress}}</td>
<td > {{$customers->occupation}}</td>
<td > {{$customers->id_account}}</td>
<td > {{$customers->payeee}}</td>
<td > {{$customers->status}}</td>
</tr>


       </tbody>
      </table>
</div>
</div>

</div>

 
 @endsection
<!-- <footer class="ttt">Website of EISS</footer> 

<style>

 

  .col {
    position: absolute;
    top: 87px;
    left: 750px;
  }

.ttt{
   position:absolute;
   bottom:0;
   width:100%;
   height:30px;   
   background:#6cf;
   text-align:center;
}

</style>

-->