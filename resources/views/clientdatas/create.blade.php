@extends('layouts.sidebar2')
@section('content')
<h1>New Query</h1>
<form method = 'post' action = "{{action('ClientdataController@store')}}" >
{{csrf_field()}}      

<div class = "form-group">

<div class="col-md-2">
    <label class="control-label" for = "client_name"> Client's name </label></div>
    <div class="col-md-10">
    <select class="form-control" name = "client_name">
    @foreach($clientnames as $clientname)
  
  <option value="{{$clientname->client_name}}"> {{$clientname->client_name}}</option>

  @endforeach  
</select></div>
     <!-- <input type = "text" class = "form-control" name = "name" required> -->
     <!-- </div> -->
     <br>
     <div class="col-md-2">
    <label class="control-label" for = "payeee"> Payeee name </label></div>
    <div class="col-md-10">
    <select class="form-control" >
    @foreach($payeenames as $payeename)
  
  <option value="{{$payeename->client_name}}"> {{$payeename->payeee}}</option>
  @endforeach  
</select></div>
     <!-- <input type = "text" class = "form-control" name = "payeee" required> -->
     <!-- </div> -->
     <br>
     <div class="col-md-2">
    <label class="control-label" for = "title"> Id </label></div>
    <div class="col-md-10">
     <input type = "number" class = "form-control" name = "id" required>
     </div><br>
     <div class="col-md-2">
    <label class="control-label" for = "amount"> Amount </label></div>
    <div class="col-md-10">
     <input type = "number" class = "form-control" name = "amount" required>
     </div><br>
    <div class="col-md-2">
    <label class="control-label" for="date">Start date </label></div>
    
    <div class="col-md-10">
    <input type = "date" name="start_date" id="date" class="form-control" value="{{ date("Y-m-d") }}" required />
    </div><br>
    <div class="col-md-2">
    <label class="control-label" for="date">End date </label></div>
    
    <div class="col-md-10">
    <input type = "date" name="end_date" id="date" class="form-control" value="{{ date("Y-m-d") }}" required />
    </div><br>

    <div class="col-md-2">
    <label class="control-label" for="type">Type check </label></div>
    
    <div class="col-md-10">
    <input type = "radio" id="Salaried" name="type" value="Salaried" required />
    <label for="Salaried">Salaried</label><br>
    <input type="radio" id="Checked" name="type" value="Checked">
  <label for="Checked">Checked</label>
    </div><br>
  
    <div class="col-md-2">
    <label class="control-label" for="type">Transaction range </label></div>
    
    <div class="col-md-10">
    <input type = "radio" id="Loan" name="transaction" value="Loan">
    <label for="Loan">Loan</label><br>
    <input type="radio" id="Discount" name="transaction" value="Discount">
  <label for="Discount">Discount</label><br>
  <input type="radio" id="Real estate" name="transaction" value="Real estate">
  <label for="Real estate">Real estate</label>
    </div><br>

   <br>
    <div class="col-md-10">
    <button name="submit" type="submit" value="Save"> Search</button></div>
    </form></div>
    @endsection