@extends('layouts.sidebar3')
@section('content')
  

<h1>Edit Hapoalim's Covenants </h1>
<form method = 'post' action="{{action('CovenantshapoalimController@update', $covenantshapoalims->id)}}">
@csrf
@method('PATCH')
<div class="col-md-10">
<div class = "form-group">
    <label for = "title">Designation:</label>
    <input type= "text" class = "form-control" name= "designation" value = "{{$covenantshapoalims->designation}}">
</div>

<div class = "form-group">
    <label for = "title">Range:</label>
    <input type= "text" class = "form-control" name= "total_month" value = "{{$covenantshapoalims->total_month}}">
</div>

<div class = "form-group">
    <label for = "title">Approval:</label>
    <input type= "text" class = "form-control" name= "approval" value = "{{$covenantshapoalims->approval}}">
</div>

<div class = "form-group">
    <label for = "title">Max Aprroval:</label>
    <input type= "text" class = "form-control" name= "max_approval" value = "{{$covenantshapoalims->max_approval}}">
</div>

<div class = "form-group">
    <label for = "title">Type check:</label>
    <input type= "text" class = "form-control" name= "type_check" value = "{{$covenantshapoalims->type_check}}">
</div>


<div class = "form-group">
    <input type ="submit" class = "form-control" name="submit" value ="Just Do It">
</div>

</div>

</form>

@endsection