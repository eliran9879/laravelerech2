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
    
<div class="col-md-2">
  <label class="control-label" for="payeee">Payeee</label></div>
  <div class="col-md-10">
  <input type = "text" class = "form-control" name = "payeee"  value = "{{$customer->payeee}}">     
 </div>

<div class="col-md-2">
  <label class="control-label" for="id_account">Id Account</label></div>
  <div class="col-md-10">
  <input type = "number" class = "form-control" name = "id_account" value = "{{$customer->id_account}}">
</div>

     <div class="col-md-2">
    <label class="control-label" for="occupation">Occupation</label></div>
    <div class="col-md-10">
     <input type = "text" class = "form-control" name = "occupation" value = "{{$customer->occupation}}">
     </div>

    <div class="col-md-2">
      <label class="control-label" for="adrress">Address</label></div>
      <div class="col-md-10">
      <input type = "text" class = "form-control" name = "adrress" value = "{{$customer->adrress}}">
    </div>  
       
   <br>
   <div class="col-md-8">
      <div class = "form-group">
      <input type ="submit" class = "btn btn-md btn-primary" name="submit" value ="Save Changes">
      </div>
  </div>
</form>

<!--
<form method = 'post' action = "{{action('CustomerController@destroy', $customer ->id)}}">
  @csrf
  @method('DELETE')
  <div class = "form-group">
      <input type ="submit" name="submit" onclick="return confirm('Are you sure?')" value ="Delete Customer">
  </div>
</form>
-->


    
<!-- Delete Customer -->
    <p class="font-weight-bold"></p>
    <section class="border border-light p-3 mb-4">
      <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#centralModal">Delete Customer</button>
      </section>
    
<!-- Central Modal Medium -->
    <div class="modal fade" id="centralModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content">
          <!--Header-->
          <div class="modal-header">
            <h4 class="modal-title w-100" id="myModalLabel">Warning!</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <!--Body-->
          <div class="modal-body">
            <div class="alert alert-danger" role="alert">
               Are you sure to delete {{$customer->client_name}}?
            </div>
          </div>
          <!--Footer-->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form method = 'post' action = "{{action('CustomerController@destroy', $customer ->id)}}">
              @csrf
              @method('DELETE')
              <div class = "modal-footer">
                <button type="submit" class="btn btn-danger" name="submit">Delete Customer</button>
              </div>
            </form>
          </div>
        </div>
        <!--/.Content-->
      </div>
    </div>
    <!-- Central Modal Medium -->


@endsection

