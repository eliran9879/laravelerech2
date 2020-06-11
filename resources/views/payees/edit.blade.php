@extends('layouts.sidebar3')
@section('content')

<h1>Edit a Payee</h1>
<form method='post' action="{{action('PayeeController@update', $payee ->id)}}">
  @csrf
  @method('PATCH')


  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">

  <div class="form-group">
    <div class="col-md-2">
      <label class="control-label" for="name"> Payee name </label></div>
    <div class="col-md-10">
      <input type="text" class="form-control" name="name" value="{{$payee->name}}">
    </div>
    <br>


    <div class="col-md-2">
      <label class="control-label" for="id_account">Id Account</label></div>
    <div class="col-md-10">
      <input type="number" class="form-control" name="id_account" value="{{$payee->id_account}}">
    </div>
    <br>

    <div class="col-md-2">
      <label class="control-label" for="occupation">Occupation</label></div>
    <div class="col-md-10">
      <input type="text" class="form-control" name="occupation" value="{{$payee->occupation}}">
    </div>
    <br>

    <div class="col-md-2">
      <label class="control-label" for="adrress">Address</label></div>
    <div class="col-md-10">
      <input type="text" class="form-control" name="adrress" value="{{$payee->adrress}}">
    </div>
    <br>

    <div class="col-md-2">
      <label class="control-label" for="status">Status</label></div>

    @if ($payee->status == 'blocked')
    <div class="col-md-10" name="status" id="status">
      <input type="radio" name="status" value="{{$payee->status}}" checked="checked">
      {{$payee->status}}
      <br>
      <input type="radio" name="status" value="authorized">Authorized
      <br>
    </div><br>
    @else
    <div class="col-md-10" name="status" id="status">
      <input type="radio" name="status" value="authorized" checked="checked">
      {{$payee->status}}
      <br>
      <input type="radio" name="status" value="blocked">Blocked
      <br>

    </div><br>
    @endif

  </div>

  <div class="col-md-8">
    <div class="form-group">
      <input type="submit" class="btn btn-md btn-primary" name="submit" value="Save Changes">
      <!-- <input type ="submit" class = "btn btn-md btn-second" name="submit" value ="back"> -->

    </div>
  </div>
</form>




@endsection