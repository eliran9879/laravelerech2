

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
<th > Designation</th>
<th > Range</th>
<th > Approval</th>
<th > Max amount</th>
<th > Max general</th>
<th > Min general</th>


</tr>
</thead>

<tbody>
@foreach($covenantsibis as $covenantibi)
  <tr>
 
<td >{{$covenantibi->banks->name}} </td>
<td > {{$covenantibi->designation}}</td>
<td > {{$covenantibi->total_month}}</td>
<td > {{$covenantibi->total_amount}}</td>
<td > {{$covenantibi->approval}}</td>
<td > {{$covenantibi->max_percentage_general}}</td>
<td > {{$covenantibi->min_percentage_general}}</td>

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

