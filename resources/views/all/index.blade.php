@extends('layouts.sidebar')
@section('content')

<div class="w3-sidebar w3-bar-block " style="margin: 0 0 5% 0;" >
         
         <div class="sidebar-module" style="font-family: Arial Black, Gadget, sans-serif;">
           <h2>Query Results</h2>
           <ol class="list-unstyled">
            
           
             
          </ol>
        
                
 </div>

 <div class="panel panel-default">

<br>
<table class="table">
<thead>
<tr>
<th style="text-align:center"> Name Of Bank</th>
<th style="text-align:center"> Designation</th>
@if(!empty($clientdatasibi))
@foreach($clientdatasibi as $clientdataibi)
@if ($clientdataibi->designation == 'realestate')
<th style="text-align:center"> Range (B.D)</th>
@endif
@endforeach

@else
<th style="text-align:center"> Range (M)</th>
@endif
<th style="text-align:center"> Approval (%)</th>
</tr>
</thead>

<tbody style="text-align:center;">
@if(!empty($clientdatashapoalim))
@foreach($clientdatashapoalim as $clientdata)
<tr>
 
<td >{{$clientdata->banks->name}} </td>
<td > {{$clientdata->designation}}</td>              

<td > {{$clientdata->total_month}}</td>
<td > {{$clientdata->approval}}</td>
</tr>

@endforeach
@endif

@if(!empty($clientdatasmizrahi))
@foreach($clientdatasmizrahi as $clientdatami)
<tr>
 
<td >{{$clientdatami->banks->name}} </td>
<td > {{$clientdatami->designation}}</td>              

<td > {{$clientdatami->total_month}}</td>
<td > {{$clientdatami->approval}}</td>

</tr>
@endforeach

@endif


@if(!empty($clientdatasibi))
@foreach($clientdatasibi as $clientdataibi)
<tr>
 
<td >{{$clientdataibi->banks->name}} </td>
<td > {{$clientdataibi->designation}}</td>              

<td > {{$clientdataibi->total_month}}</td>
<td > {{$clientdataibi->approval}}</td>

</tr>
@endforeach

@endif

@if (!empty($nodata ))
<h1>
sorry, D'ont have possible bank to this transaction
</h1>

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