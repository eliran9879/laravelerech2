@extends('layouts.sidebar3')
@section('content')
  

<h1>Edit IBI's Covenants </h1>
<form method = 'post' action="{{action('CovenantsibiController@update', $covenantsibis->id)}}">
@csrf
@method('PATCH')
<div class = "form-group">
    <label for = "title">Designation:</label>
    <input type= "text" class = "form-control" name= "designation" value = "{{$covenantsibis->designation}}">
</div>

<div class = "form-group">
    <label for = "title">Range:</label>
    <input type= "text" class = "form-control" name= "total_month" value = "{{$covenantsibis->total_month}}">
</div>

<div class = "form-group">
    <label for = "title">Max Amount:</label>
    <input type= "text" class = "form-control" name= "total_amount" value = "{{$covenantsibis->total_amount}}">
</div>

<div class = "form-group">
    <label for = "title">Approval:</label>
    <input type= "text" class = "form-control" name= "approval" value = "{{$covenantsibis->approval}}">
</div>

<div class = "form-group">
    <label for = "title">Max General:</label>
    <input type= "text" class = "form-control" name= "max_percentage_general" value = "{{$covenantsibis->max_percentage_general}}">
</div>

<div class = "form-group">
    <label for = "title">Min General:</label>
    <input type= "text" class = "form-control" name= "min_percentage_general" value = "{{$covenantsibis->min_percentage_general}}">
</div>


<div class = "form-group">
    <input type ="submit" class = "form-control" name="submit" value ="Just Do It">
</div>

</form>




@endsection
