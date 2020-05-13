@extends('layouts.sidebar')
@section('content')
    
<div class="w3-sidebar w3-bar-block " style="margin: 0 0 5% 0;" >
         
         <div class="sidebar-module" style="font-family: Arial Black, Gadget, sans-serif;">
           <h2>Covanants Hapoalim</h2>
           <ol class="list-unstyled">
            
           
             
          </ol>
        
                
 </div>

 <div class="panel panel-default">

<br>
<table class="table">
<thead>
<tr>
<th >Name</th>
<th >Designation</th>
<th >Range</th>
<th >Approval</th>
<th >Max Aprroval</th>
<th >Type check</th>
<th >Action</th>


</tr>
</thead>

<tbody>
@foreach($covenantshapoalims as $covenanthapoalim)
  <tr>
 
<td >{{$covenanthapoalim->banks->name}} </td>
<td > {{$covenanthapoalim->designation}}</td>
<td > {{$covenanthapoalim->total_month}}</td>
<td > {{$covenanthapoalim->approval}}</td>
<td > {{$covenanthapoalim->max_approval}}</td>
<td > {{$covenanthapoalim->type_check}}</td>
<td ><a href= "{{route('covenants_hapoalim.edit', $covenanthapoalim->id )}}"><img src="https://image.flaticon.com/icons/png/512/84/84380.png" style = "width:30px; height:30px; margin-left: auto; margin-right: auto;"> </a> </td>
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