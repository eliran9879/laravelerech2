@extends('layouts.sidebar')
@section('content')
    
<div class="w3-sidebar w3-bar-block " style="margin: 0 0 5% 0;" >
         
         <div class="sidebar-module" style="font-family: Arial Black, Gadget, sans-serif;">
           <h2>Client data</h2>
           Filter:
           <a href ="client_data/?status=Open">Open</a>|
           <a href ="client_data/?status=Close">Close</a>|
           <a href ="client_data">Reset</a>
           <br>
           {{ date('Y-m-d H:i:s') }} <br>
           {{ date("d-m-Y H:i:s", strtotime("now -3 GMT")) }}
           <ol class="list-unstyled">
          </ol>                   
 </div>

 <div class="panel panel-default">
<br>
<table class="table">
<thead>
<tr>
<th > bank name</th>
<th > client id</th>
<th > amount</th>
<th > deposit date</th>
<th > end date</th>
<th > disignation</th>
<th > Type check</th>
<th > Action</th>


</tr>
</thead>

<tbody>
@foreach($clientdatas as $clientdata)
  <tr>

<td class="@if ($clientdata->status != 'open' && $clientdata->status != 'close' && $clientdata->end_date >=  date('Y-m-d H:i:s') ) nullStatus 
            @elseif ($clientdata->status == 'open' && $clientdata->end_date >=  date('Y-m-d H:i:s')) openStatus 
            @elseif ($clientdata->status == 'close') closeStatus
            @else overTime @endif"> {{$clientdata->banks->name}}</td>

<td class="@if ($clientdata->status != 'open' && $clientdata->status != 'close' && $clientdata->end_date >=  date('Y-m-d H:i:s') ) nullStatus 
            @elseif ($clientdata->status == 'open' && $clientdata->end_date >=  date('Y-m-d H:i:s')) openStatus 
            @elseif ($clientdata->status == 'close') closeStatus
            @else overTime @endif"> {{$clientdata->client_id}}</td>

<td class="@if ($clientdata->status != 'open' && $clientdata->status != 'close' && $clientdata->end_date >=  date('Y-m-d H:i:s') ) nullStatus 
            @elseif ($clientdata->status == 'open' && $clientdata->end_date >=  date('Y-m-d H:i:s')) openStatus 
            @elseif ($clientdata->status == 'close') closeStatus
            @else overTime @endif"> {{$clientdata->amount}}</td>

<td class="@if ($clientdata->status != 'open' && $clientdata->status != 'close' && $clientdata->end_date >=  date('Y-m-d H:i:s') ) nullStatus 
            @elseif ($clientdata->status == 'open' && $clientdata->end_date >=  date('Y-m-d H:i:s')) openStatus 
            @elseif ($clientdata->status == 'close') closeStatus
            @else overTime @endif"> {{$clientdata->deposit_date}}</td>

<td class="@if ($clientdata->status != 'open' && $clientdata->status != 'close' && $clientdata->end_date >=  date('Y-m-d H:i:s') ) nullStatus 
            @elseif ($clientdata->status == 'open' && $clientdata->end_date >=  date('Y-m-d H:i:s')) openStatus 
            @elseif ($clientdata->status == 'close') closeStatus
            @else overTime @endif">{{$clientdata->end_date}}</td>

<td class="@if ($clientdata->status != 'open' && $clientdata->status != 'close' && $clientdata->end_date >=  date('Y-m-d H:i:s') ) nullStatus 
            @elseif ($clientdata->status == 'open' && $clientdata->end_date >=  date('Y-m-d H:i:s')) openStatus 
            @elseif ($clientdata->status == 'close') closeStatus
            @else overTime @endif">{{$clientdata->designation}}</td>
            
            <td class="@if ($clientdata->status != 'open' && $clientdata->status != 'close' && $clientdata->end_date >=  date('Y-m-d H:i:s') ) nullStatus 
            @elseif ($clientdata->status == 'open' && $clientdata->end_date >=  date('Y-m-d H:i:s')) openStatus 
            @elseif ($clientdata->status == 'close') closeStatus
            @else overTime @endif"> {{$clientdata->type_check}}</td>

@if (!empty($clientdata->status))
   @if ($clientdata->status == 'open')
   <td> <a href="{{route('statusclose', $clientdata->id)}}" class="btn btn-success" onClick="alert('Are you sure?')"
>@lang('Close loan')</a> </td>
   @else
<td > {{$clientdata->status}} </td>
    @endif
    @else
    
    <td>  <a href="{{route('status1', $clientdata->id)}}">@lang('Open loan')</a> </td>
@endif

</tr>

@endforeach
</tbody>
</table>
{{$clientdatas->links()}}
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

<style>
.nullStatus {background:#F8F8FF}
.openStatus {background:#7FFFD4}
.overTime {background:#DC143C}
.closeStatus {background:#00BFFF}
</style>
