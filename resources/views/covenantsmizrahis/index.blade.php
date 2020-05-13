@extends('layouts.sidebar')
@section('content')

    
<div class="w3-sidebar w3-bar-block " style="margin: 0 0 5% 0;" >
         
         <div class="sidebar-module" style="font-family: Arial Black, Gadget, sans-serif;">
           <h2>Covanants Mizrahi</h2>
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
@foreach($covenantsmizrahis as $covenantmizrahi)
  <tr>
 
<td >{{$covenantmizrahi->banks->name}} </td>
<td >{{$covenantmizrahi->designation}}</td>
<td >{{$covenantmizrahi->total_month}}</td>
<td >{{$covenantmizrahi->approval}}</td>
<td >{{$covenantmizrahi->max_approval}}</td>
<td >{{$covenantmizrahi->type_check}}</td>
<td ><a href= "{{route('covenants_mizrahi.edit', $covenantmizrahi->id )}}"><img src="https://image.flaticon.com/icons/png/512/84/84380.png" style = "width:30px; height:30px; margin-left: auto; margin-right: auto;"> </a></td>
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
