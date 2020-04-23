


@extends('layouts.sidebar3')
@section('content')
    
<div class="w3-sidebar w3-bar-block " style="margin: 0 0 5% 0;" >
         
         <div class="sidebar-module" style="font-family: Arial Black, Gadget, sans-serif;">
           <h2>Client data</h2>
           <ol class="list-unstyled">
            
           
             
          </ol>
        
                
 </div>

 <div class="panel panel-default">

<br>
<table class="table">
<thead>
<tr>
<th >  bank name</th>
<th > client id</th>
<th > amount</th>
<th > deposit date</th>
<th > end date</th>
<th > disignation</th>
<th > Type check</th>
<th >  Action</th>


</tr>
</thead>

<tbody>
@foreach($clientdatas as $clientdata)
  <tr>

<td > {{$clientdata->banks->name}}</td>
<td >{{$clientdata->client_id}} </td>
<td > {{$clientdata->amount}}</td>
<td > {{$clientdata->deposit_date}}</td>
<td > {{$clientdata->end_date}}</td>
<td > {{$clientdata->designation}}</td>
<td > {{$clientdata->type_check}}</td>
@if (!empty($clientdata->status))
   @if ($clientdata->status == 'open'))
   <td>  <a href="{{route('statusclose', $clientdata->id)}}" class="btn btn-success">@lang('Close loan')</a> </td>
   @else
<td > {{$clientdata->status}}</td>
    @endif
    @else
    
    <td>  <a href="{{route('status1', $clientdata->id)}}">@lang('Open loan')</a> </td>
@endif

</tr>


@endforeach
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