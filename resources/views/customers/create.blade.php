@extends('layouts.sidebar2')
@section('content')

<h1>Create a new customer</h1>
<form method = 'post' action = "{{action('CustomerController@store')}}" >
{{csrf_field()}}      

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
  <link rel="stylesheet" href="/resources/demos/style.css">

  

<div class = "form-group">
<div class="col-md-2">
    <label class="control-label" for = "title"> Client name </label></div>
    <div class="col-md-10">
     <input type = "text" class = "form-control" name = "title" required>
     </div>
    
     <div class="col-md-2">
    <label class="control-label" for="payeee">Payeee</label></div>
    <div class="col-md-10">
     <input type = "text" class = "form-control" name = "payeee"  required>
     
     </div>

     <div class="col-md-2">
    <label class="control-label" for="account">Id Account</label></div>
    <div class="col-md-10">
     <input type = "number" class = "form-control" name = "account" required>
     </div>

     <div class="col-md-2">
    <label class="control-label" for="occupation">Occupation</label></div>
    <div class="col-md-10">
     <input type = "text" class = "form-control" name = "occupation" required>
     </div>

    <div class="col-md-2">
    <label class="control-label" for="adrress">Address</label></div>
    <div class="col-md-10">
     <input type = "text" class = "form-control" name = "adrress" required>
     </div>  
       
    <br>
    <div class="col-md-10">
    <button name="submit" type="submit" value="Save"> Add</button></div>
    </form>
    </div>
  
@endsection