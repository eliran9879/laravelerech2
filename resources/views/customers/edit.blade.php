@extends('layouts.sidebar3')
@section('content')

<h1>Edit a customer</h1>
<form method = 'post' action = "{{action('CustomerController@update', $customer ->id)}}">
@csrf
@method('PATCH')   
  

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">  

<div class = "form-group">
<div class="col-md-2">
    <label class="control-label" for = "client_name"> Client name </label></div>
    <div class="col-md-10">
     <input type = "text" class = "form-control" name = "client_name" value = "{{$customer->client_name}}">
</div>
<br>    
<div class="col-md-2">
  <label class="control-label" for="payeee">Payeee</label></div>
  <div class="col-md-10">
  <input type = "text" class = "form-control" name = "payeee"  value = "{{$customer->payeee}}">     
 </div>
 <br>    

<div class="col-md-2">
  <label class="control-label" for="id_account">Id Account</label></div>
  <div class="col-md-10">
  <input type = "number" class = "form-control" name = "id_account" value = "{{$customer->id_account}}">
</div>
<br>    

     <div class="col-md-2">
    <label class="control-label" for="occupation">Occupation</label></div>
    <div class="col-md-10">
     <input type = "text" class = "form-control" name = "occupation" value = "{{$customer->occupation}}">
     </div>
     <br>    

    <div class="col-md-2">
      <label class="control-label" for="adrress">Address</label></div>
      <div class="col-md-10">
      <input type = "text" class = "form-control" name = "adrress" value = "{{$customer->adrress}}">
    </div>  
    <br>    

    <div class="col-md-2">
      <label class="control-label" for="status">Status</label></div>
      
     @if ($customer->status = 'blocked') 
     <div class="col-md-10" name = "status" id="status">
    <input type = "radio"  name="status" value="{{$customer->status}}" checked="checked">
    {{$customer->status}}
    <br>
    <input type="radio" name="status" value="authorized">authorized
  <br>
  </div><br>
  @else
  <input type = "radio"  name="status" value="authorized" checked="checked">
    {{$customer->status}}
    <br>
    <input type="radio" name="status" value="blocked">blocked
  <br> 
  
    </div><br>
    @endif

    </div>     
   
   <div class="col-md-8">
      <div class = "form-group">
      <input type ="submit" class = "btn btn-md btn-primary" name="submit" value ="Save Changes">
      </div>
  </div>
</form>




@endsection

