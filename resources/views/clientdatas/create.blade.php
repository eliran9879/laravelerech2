@extends('layouts.sidebar2')
@section('content')
<h1>New Query</h1>
<form method = 'post' action = "{{action('ClientdataController@store')}}" >
{{csrf_field()}}      
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   <!-- <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script> -->
   <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->
   <script
   src="https://code.jquery.com/jquery-3.5.1.slim.js"
   integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM="
   crossorigin="anonymous"></script>
      



<script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>
<!-- <div class="row"> -->
        <div class="col">
        <div id="addpayee">

             <a href="javascript:;" class="addAttrpayee btn btn-sm btn-primary btn-create" data-toggle="modal" data-target="#addModalpayee" id ="aaa">
               @lang('Add a payee')</a>  
   </div> 
   </div>
   <div class="col">
            <a href="javascript:;" class="addAttr btn btn-sm btn-primary btn-create" data-toggle="modal" data-target="#addModal"  id ="bbb">
               @lang('Add a withdrawer')</a>   
</div>       
<!-- </div> -->
<div class="form-group">
{{ csrf_field() }}

<div class="col-md-2" id = "ccc" >
    <label class="control-label" for="type"  >Transaction Type </label></div>

    <div class="col-md-10" name = "transaction" id="ddlPassport"> 
    <input type = "radio" id="Loan" name="transaction" value="Loan" required /> 
    <label for="Loan">Loan</label><br>
    <input type="radio" id="Discount" name="transaction" value="Discount">
  <label for="Discount">Discount</label><br>
  <input type="radio" id="Realestate" name="transaction" value="Realestate">
  <label for="Realestate">Real estate</label>
    </div><br>

    <div id="dvPassport" style="display: none">
    <div class="col-md-2">
    <label class="control-label" for = "client_name"  > Withdrawer Name </label></div>
    <div class="col-md-10">
     <input type = "text" class = "form-control" name = "client_name" id = "client_name" required>
     <div id="client_namelist">
    </div>
     </div><br>
</div>

<div id="dvPassportid" style="display: none">
   <div class="col-md-2">
    <label class="control-label" for = "id_account">  Withdrawer id </label></div>
    <div class="col-md-10">
    <input type = "number" class = "form-control" name = "id_account" id = "id_account" required >
    </div> <br>
</div>

<div id="dvPassportpayee" style="display: none">
<div class="col-md-2">
    <label class="control-label" for = "payeee">  Payeee </label></div>
    <div class="col-md-10">
    <input type = "text" class = "form-control "  name = "payeee" id = "payeee">
    <div id="payeeeList">
    </div>
     </div><br>
</div>
<div id="dvPassportidpayee" style="display: none">
     <div class="col-md-2">
    <label class="control-label" for = "id_payee">  Payeee id </label></div>
    <div class="col-md-10">
    <input type = "number" class = "form-control "  name = "id_payee" id = "id_payee">
     </div><br>
</div>

<div id="dvPassportamount" style="display: none">
     <div class="col-md-2">
    <label class="control-label" for = "amount"> Amount </label></div>
    <div class="col-md-10">
     <input type = "number" class = "form-control" name = "amount" required>
     </div><br>
</div>

<div id="dvPassportstart" style="display: none">
    <div class="col-md-2">
    <label class="control-label" for="date">Start date </label></div>
    <div class="col-md-10">
    <input type = "date" name="start_date" id="date" class="form-control" value="{{ date("Y-m-d") }}" required />
    </div><br>
</div>

<div id="dvPassportend" style="display: none">
    <div class="col-md-2">
    <label class="control-label" for="date">End date </label></div>
    <div class="col-md-10">
    <input type = "date" name="end_date" id="date" class="form-control" value="{{ date("Y-m-d") }}" required />
    </div><br>
</div>

<div id="dvPassporttype" style="display: none">
    <div class="col-md-2">
    <label class="control-label" for="type">Type check </label></div>    
    <div class="col-md-10">
    <input type = "radio" id="Salaried" name="type" value="Salaried" required />
    <label for="Salaried">Salaried</label><br>
    <input type="radio" id="Checked" name="type" value="Checked">
  <label for="Checked">Checked</label>
    </div><br>
    </div>

<div id = "aa" style="display: none">
   <div class="col-md-2">
    <label class="control-label" for = "bonds duration">  Bond's duration </label></div>
    <div class="col-md-10" >
    <input type = "Number" class = "form-control" name = "bondsduration" id="bondsduration" >
   </div><br>
   </div>



    <div class="col-md-10">
    <button name="submit" class = "form-control" type="submit" value="Save"> Search</button></div>
    </form></div>
 <script>
 $(document).ready(function(){

   $('#client_name').keyup(function(){ 
       var query = $(this).val();
       if(query != '')
       {
        var _token = $('input[name="_token"]').val();
        $.ajax({
         url:"{{ route('autocomplete.fetchwithdrawer') }}",
         method:"POST",
         data:{query:query, _token:_token},
         success:function(data){
          $('#client_namelist').fadeIn();  
          $('#client_namelist').html(data);
         }
        });
       }
   });


   $('#client_namelist').on('click', 'li', function(){  
        $('#client_name').val($(this).text());
        //op = $(this).data('');
        // לפצל את זה מ , 
        // להוסיף את זה ל
        //let options = '';
        // foreach
        //options += `<option value="${val}"> ${val} <options>`;
        //$('#client_id').html(options);
        $('#client_namelist').fadeOut();  
    });  

    /*Payeee*/

   $('#payeee').keyup(function(){ 
       var query = $(this).val();
       if(query != '')
       {
        var _token = $('input[name="_token"]').val();
        $.ajax({
         url:"{{ route('autocomplete.fetchwithdrawer') }}",
         method:"POST",
         data:{query:query, _token:_token},
         success:function(data){
          $('#payeeeList').fadeIn();  
          $('#payeeeList').html(data);
         }
        });
       }
   });


   $('#payeeeList').on('click', 'li', function(){  
        $('#payeee').val($(this).text());  
        $('#payeeeList').fadeOut();  
   });  

});
 </script>
 
 


<script type="text/javascript">
$(function () {
  $("input[name='transaction']").click(function () {
            if ($("#Realestate").is(":checked")) {
                $("#dvPassport").show();
                $("#dvPassportid").show();
                $("#dvPassportamount").show();
                $("#dvPassportstart").show();
                $("#dvPassportend").show();
                $("#dvPassporttype").show();
                $("#aa").show();
                $("#dvPassportpayee").hide();
                $("#dvPassportidpayee").hide();
                $("#dvdiscount").hide();
                $("#addpayee").hide();
               //  $("#addwithdrawer").hide();

            } else  if ($("#Discount").is(":checked")) {
               $("#dvPassport").show();
               $("#dvPassportpayee").show();
                $("#dvPassportidpayee").show();
               $("#dvPassportid").show();
                $("#dvPassportamount").show();
                $("#dvPassportstart").show();
                $("#dvPassportend").show();
                $("#dvPassporttype").show();
               $("#aa").hide();
               $("#addpayee").show();              
          
            } else  if ($("#Loan").is(":checked")) {
               $("#dvPassport").show();
               $("#dvPassportid").show();
                $("#dvPassportamount").show();
                $("#dvPassportstart").show();
                $("#dvPassportend").show();
                $("#dvPassporttype").show();
                $("#dvPassportpayee").hide();
                $("#dvPassportidpayee").hide();
               $("#aa").hide();
               $("#addpayee").hide();
               $("#dvdiscount").hide();

            }
        });
    });
     
</script>



<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">New Withdrawer</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
          </div>
          <form action = "{{action('CustomerController@store1')}}" method="POST">
            {{ csrf_field() }}
             <div class="modal-body">

                <div class="form-group">
                   <label for="exampleInputEmail1">Withdrawer name</label>
                   <input type="text" class="form-control" id="client_name" name="client_name" autocomplete="false"  required>
                </div>
                
                <div class="form-group">
                   <label for="exampleInputEmail1">Id account </label>
                   <input type="number" class="form-control" id="id_account" name="id_account" value="" required >
                </div>
                <div class="form-group">
                   <label for="exampleInputEmail1"> Adrress</label>
                   <input type="text" class="form-control" id="adrress" name="adrress"  required>
                </div>
                <div class="form-group">
                   <label for="exampleInputEmail1">Occupation </label>
                   <input type="text" class="form-control" id="occupation" name="occupation" value="" required >
                </div>
               
               
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit"  class="btn btn-primary">Add</button>
             </div>
          </form>
       </div>
    </div>
 </div>
<div class="modal fade payee" id="addModalpayee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
          <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">New Payee</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button>
          </div>
          <form action = "{{action('PayeeController@store1')}}" method="POST">
            {{ csrf_field() }}
             <div class="modal-body">

                <div class="form-group">
                   <label for="exampleInputEmail1">Payee name</label>
                   <input type="text" class="form-control" id="name" name="name"  required>
                </div>
                
                <div class="form-group">
                   <label for="exampleInputEmail1">Id account </label>
                   <input type="number" class="form-control" id="id_account" name="id_account" value="" required >
                </div>
                <div class="form-group">
                   <label for="exampleInputEmail1"> Adrress</label>
                   <input type="text" class="form-control" id="adrress" name="adrress"  required>
                </div>
                <div class="form-group">
                   <label for="exampleInputEmail1">Occupation </label>
                   <input type="text" class="form-control" id="occupation" name="occupation" value="" required >
                </div>
               
               
             </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit"  class="btn btn-primary">Add</button>
             </div>
          </form>
       </div>
    </div>
 </div>
 
 <!-- <script>
$(document).ready(function(){

 $('#payeee').keyup(function(){ 
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         
         $.ajax({
          url:"{{ route('autocomplete.fetchpayee') }}",
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
      var select = $(this).attr("id");
        $('#payeee').val($(this).text());
      console.log( select);
        $('#payeeeList').fadeOut();  
    });  

    
//     $(document).on('click', 'li', function(){  
//         $('#payeee').val($(this).text());  
//         $('#payeeeList').fadeOut();  
//     });  
  
//     $(document).ready(function(){

// $('.dynamic').change(function(){
//  if($(this).val() != '')
//  {
//   var select = $(this).attr("id");
//   var value = $(this).val();
//   var dependent = $(this).data('dependent');
//   var _token = $('input[name="_token"]').val();
//   $.ajax({
//    url:"{{ route('ClientdataController.fetch1') }}",
//    method:"POST",
//    data:{select:select, value:value, _token:_token, dependent:dependent},
//    success:function(result)
//    {
//     $('#'+dependent).html(result);
//    }

//   })
//  }
// });

// $('#client_name').change(function(){
//  $('#id_account').val('');
//  $('#payeee').val('');
// });

// $('#id_account').change(function(){
//  $('#payeee').val('');
// });


// });
 


});

</script> -->



    @endsection
   
    <style>
@media (min-width:1000px){
    #aaa{
      position: absolute;
       right: 300px;
       top:5px;
    }
}
    @media (min-width:1000px){
    #bbb{
    position: absolute;
  right: 175px;
   top:5px;
}
    }
    @media (min-width:1000px){
    #ccc{
    top:5px; 
    height:40px;
    }
    }
</style>