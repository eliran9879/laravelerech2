@extends('layouts.sidebar')

@section('content')
<div class="w3-sidebar w3-bar-block " style="margin: 0 0 5% 0;" >
                
                <div class="sidebar-module">
                <h4>Users</h4>
                                </div>
     
    

      
 </div>
 
    <table >   

<thead><tr>
<th > Name</th>
<th > Email</th>
<th > Role</th>
<th > Code organization</th>
</tr> </thead>
<tbody>
@foreach($users as $user)
<td > {{$user->name}}</td>
<td > {{$user->email}}</td>
<td > {{$user->role}}</td>
@if ($user->codesubmit == 0)
<td>  <a href="{{route('code', $user->id)}}">@lang('submit')</a> </td>
    @else
    <td > {{$user->code}}</td>
@endif
<td> 
<form method = 'post' action = "{{action('UserController@destroy',$user->id)}}" >
@csrf   
@method('DELETE')   
<div style="margin:0">    
<button type="submit" class="btn btn-danger" onClick="alert('Are you sure?')">@lang('delete')</button>
</div>
</form></td> 
</tr>
 @endforeach
</tbody>
</table>
</div>
@endsection
<style>
.ttt{
   position:absolute;
   bottom:0;
   width:100%;
   height:30px;   /* Height of the footer */
   background:#6cf;
   text-align:center;
}
.rr{
    background-color: green;
}
.rrr{
    background-color: green;
}
table,th,td{
     border: 1px solid black;
     height: 10vh;
      margin: 0;
      
}
.el{
   
    margin-bottom: 10px;
}
.try{
    padding: 0 25px ! important;
    font-size: 50px ! important;
}
th,td{
    padding: 0 25px ! important;
}
.r{
    font-weight:bold ;
}

</style>

