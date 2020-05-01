@extends('layouts.sidebar2')
@section('content')
<h1>New Query</h1>
<form method = 'post' action = "{{action('ClientdataController@store')}}" >
{{csrf_field()}}      

<div class="form-group">
<div class="col-md-2">
    <label class="control-label" for = "client_name"> Client name </label></div>
    <div class="col-md-10">
    <select name="country" id="client_name" class="form-control  dynamic" data-dependent="id_account" >
     <option value="">Select clientname</option>
     @foreach($country_list as $client_name)
     <option value="{{ $client_name->client_name}}">{{ $client_name->client_name }}</option>
     @endforeach
    </select>
    </div>
   <br />
   <div class="col-md-2">
    <label class="control-label" for = "id_account">  Id account </label></div>
    <div class="col-md-10">
    <select name="id_account" id="id_account" class="form-control  dynamic" data-dependent="payeee">
     <option value="">Select Id</option>
    </select> </div>
   <br />
   <div class="col-md-2">
    <label class="control-label" for = "payeee">  payeee </label></div>
    <div class="col-md-10">
    <select name="payeee" id="payeee" class="form-control ">
     <option value="">Select payeee</option>
    </select>
    </div>
   {{ csrf_field() }}
<br>
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
    <label class="control-label" for="Amortization_table ">Amortization table </label></div>
    
    <div class="col-md-10" >

<select  class="form-control" name = "Amortization_table"> 
  <option value="volvo">Spizer</option>
  <option value="saab">Balon</option>
  <option value="mercedes">Equal fund</option>
  
  </select>
    </div><br>

    <div class="col-md-2">
    <label class="control-label" for = "Interest"> Interest </label></div>
    <div class="col-md-10">
     <input type = "number" class = "form-control" name = "Interest" required>
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
    <script>
$(document).ready(function(){

 $('#payeee').keyup(function(){ 
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('autocomplete.fetch') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#payeeeList').fadeIn();  
                    $('#payeeeList').html(data);
          }
         });
        }
    });

    $(document).on('click', 'li', function(){  
        $('#payeee').val($(this).text());  
        $('#payeeeList').fadeOut();  
    });  
  
    $(document).ready(function(){

$('.dynamic').change(function(){
 if($(this).val() != '')
 {
  var select = $(this).attr("id");
  var value = $(this).val();
  var dependent = $(this).data('dependent');
  var _token = $('input[name="_token"]').val();
  $.ajax({
   url:"{{ route('ClientdataController.fetch1') }}",
   method:"POST",
   data:{select:select, value:value, _token:_token, dependent:dependent},
   success:function(result)
   {
    $('#'+dependent).html(result);
   }

  })
 }
});

$('#client_name').change(function(){
 $('#id_account').val('');
 $('#payeee').val('');
});

$('#id_account').change(function(){
 $('#payeee').val('');
});


});
});
</script>

    @endsection
   
