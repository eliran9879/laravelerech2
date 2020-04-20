@extends('layouts.sidebar')
@section('content')

<div class="w3-sidebar w3-bar-block " style="margin: 0 0 5% 0;" >
         
         <div class="sidebar-module" style="font-family: Arial Black, Gadget, sans-serif;">
           <h2>Covanants Ibi</h2>
           <ol class="list-unstyled">
            
           
             
          </ol>
        
                
 </div>

 <div class="panel panel-default">

<br>
<table class="table">
<thead>
<tr>
<th > Name</th>
<th > Range</th>
<th > Approval</th>

</tr>
</thead>

<tbody>
@if(!empty($clientdatas))
@foreach($clientdatas as $clientdata)
<tr>
 
<td >{{$clientdata->banks->name}} </td>
<td > {{$clientdata->total_month}}</td>
<td > {{$clientdata->approval}}</td>
</tr>

@endforeach
@endif

@if(!empty($clientdatasmizrahi))
@foreach($clientdatasmizrahi as $clientdatami)
<tr>
 
<td >{{$clientdatami->banks->name}} </td>
<td > {{$clientdatami->total_month}}</td>
<td > {{$clientdatami->approval}}</td>

</tr>
@endforeach


@endif
</tbody>
</table>

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