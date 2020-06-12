@extends('layouts.sidebar')
@section('content')
<body>
   
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
        Import Export Excel to database
        </div>
        <div class="card-body">
            <form action="{{ route('import2') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import Transaction Data</button>
                <a  class="btn btn-warning" href="{{ route('export1') }}"> 
                <!-- <img src="https://www.pngitem.com/pimgs/m/179-1791169_export-to-excel-icons-transparent-excel-icon-png.png"
style = "width:30px; height:30px; margin-left:40px; margin-right: auto;"> -->
Export Transaction Data
          </a>
            </form>
        </div>
    </div>
</div>
   
</body>    
<div class="w3-sidebar w3-bar-block " style="margin: 0 0 5% 0;" >
         
         <div class="sidebar-module" style="font-family: Arial Black, Gadget, sans-serif;">
           <h2>Client data</h2>
           Filter:
           <a href ="client_data/?status=Open">Open</a>|
           <a href ="client_data/?status=Close">Close</a>|
           <a href ="client_data">All</a>
           <br>
           <!-- {{ date('Y-m-d H:i:s') }} <br> -->
           <!-- {{ date("d-m-Y H:i:s", strtotime("now -3 GMT")) }} -->
           <ol class="list-unstyled">
          </ol>                   
 </div>

 <div class="panel panel-default">
<br>
<div class="table-responsive">
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
<th > Action 
<!-- <a  href="{{ route('export1') }}"> <img src="https://www.pngitem.com/pimgs/m/179-1791169_export-to-excel-icons-transparent-excel-icon-png.png"
style = "width:30px; height:30px; margin-left:40px; margin-right: auto;"> -->

</th>


</tr>
</thead>

<tbody>
@foreach($clientdatas as $clientdata)
  <tr>
  @if ($clientdata->status == NULL )
<td style ="background:#ff9966;"  > {{$clientdata->banks->name}}</td>

<td style ="background:#ff9966;"  > {{$clientdata->client_id}}</td>

<td style ="background:#ff9966;"  > {{$clientdata->amount}}</td>

<td style ="background:#ff9966;"  >{{$clientdata->deposit_date}} </td>

<td style ="background:#ff9966;"  >{{$clientdata->end_date}}</td>

<td style ="background:#ff9966;"  >{{$clientdata->designation}}</td>
            
<td style ="background:#ff9966;"> {{$clientdata->type_check}}</td>

@elseif ($clientdata->status == 'open'  && $clientdata->end_date <  $todayDate )

<td style ="background:#ff5050"  > {{$clientdata->banks->name}}</td>

<td style ="background:#ff5050"  > {{$clientdata->client_id}}</td>

<td style ="background:#ff5050"  > {{$clientdata->amount}}</td>

<td style ="background:#ff5050"  >{{$clientdata->deposit_date}} </td>

<td style ="background:#ff5050"  >{{$clientdata->end_date}}</td>

<td style ="background:#ff5050"  >{{$clientdata->designation}}</td>
            
<td style ="background:#ff5050"> {{$clientdata->type_check}}</td>
@else

<td   > {{$clientdata->banks->name}}</td>

<td   > {{$clientdata->client_id}}</td>

<td  > {{$clientdata->amount}}</td>

<td >{{$clientdata->deposit_date}} </td>

<td  >{{$clientdata->end_date}}</td>

<td  >{{$clientdata->designation}}</td>
            
<td > {{$clientdata->type_check}}</td>
@endif

@if (!empty($clientdata->status))
   @if ($clientdata->status == 'open')
   <td> <a href="{{route('statusclose', $clientdata->id)}}" class="btn btn-success" onClick="alert('Are you sure?')"
>@lang('Close a loan')</a> </td>
   @else
<td > {{$clientdata->status}} </td>
    @endif
    @else
    
    <td>  <a href="{{route('status1', $clientdata->id)}}">@lang('Open a loan')</a> </td>
@endif

</tr>

@endforeach
</tbody>
</table>
</div>
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
.nullStatus {background:#ff9966}
.openStatus {background:white}
.closeSta {background:#DC143C}
.closeStatus {background:#00BFFF}
</style>
