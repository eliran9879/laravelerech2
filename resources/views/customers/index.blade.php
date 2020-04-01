

@extends('layouts.sidebar')
@section('content')

    
<div class="w3-sidebar w3-bar-block " style="margin: 0 0 5% 0;" >
         
         <div class="sidebar-module" style="font-family: Arial Black, Gadget, sans-serif;">
           <h2>My Customers</h2>
           <ol class="list-unstyled">
            
          </ol>
          </div>
       <div class="col">   
             <a href="{{ route('customers.create') }}"
               class="btn btn-sm btn-primary btn-create">
               @lang('Add a customer')</a>   
       </div>            
 </div>
                
 </div>

 <div class="panel panel-default">

<br>
<table class="table">
<thead>
<tr>
<th > Client Name</th>
<th > Address</th>
<th > Occupation</th>
<th > Payeee Name</th>
<th > Id Account</th>


</tr>
</thead>

<tbody>
@foreach($customers as $customer)
  <tr>
 
<td > {{$customer->client_name}}</td>
<td > {{$customer->adrress}}</td>
<td > {{$customer->occupation}}</td>
<td > {{$customer->id_account}}</td>
<td > {{$customer->payeee}}</td>

</tr>


@endforeach
</tbody>
</table>

</div>

</div>






    

 
 @endsection
<!-- <footer class="ttt">Website of EISS</footer> -->

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

