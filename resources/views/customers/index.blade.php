@extends('layouts.sidebar')

@section('content')
<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
  <div class="w3-sidebar w3-bar-block " style="margin: 0 0 5% 0;" >
         <div class="sidebar-module" style="font-family: Arial Black, Gadget, sans-serif;">
           
       <div class="col">   
             <a href="{{ route('customers.create') }}"
               class="btn btn-sm btn-primary btn-create">
               @lang('Add a customer')</a>   
       </div>            
    </div>          
    </div>

  <div class="container box">
   <h3 align="center">My Customers</h3><br />
   <div class="panel panel-default">
    <div class="panel-heading">Search Customer Data</div>
    <div class="panel-body">
     <div class="form-group">
      <input type="text" name="search" id="search" class="form-control" placeholder="Search" />
     </div>
     <div class="table-responsive">
      <h3 align="center">Total Data : <span id="total_records"></span></h3>
      <table class="table table-striped table-bordered">
       <thead>
        <tr>
         <th>Customer Name</th>
         <th>Address</th>
         <th>Occupation</th>
         <th>Id Account</th>
         <th>Payeee</th>
        </tr>
       </thead>
       <tbody>

       </tbody>
      </table>
     </div>
    </div>    
   </div>
  </div>

</html>

<script>
$(document).ready(function(){

 fetch_customer_data();

 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:"{{ route('customers.action') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data.table_data);
    $('#total_records').text(data.total_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_customer_data(query);
 });
});
</script>


@endsection

<!-- <footer class="ttt">Website of EISS</footer> -->

<style>

 

  .col {
    position: absolute;
    top: 87px;
    left: 750px;
  }

.ttt{
   position:absolute;
   bottom:0;
   width:100%;
   height:30px;   
   background:#6cf;
   text-align:center;
}


</style>

