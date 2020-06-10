@extends('layouts.sidebar')
@section('content')

<!DOCTYPE html>
<html>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <div class="w3-sidebar w3-bar-block " style="margin: 0 0 5% 0;" >
         <div class="sidebar-module" style="font-family: Arial Black, Gadget, sans-serif;">
           
       <div class="col">   
             <a href="{{ route('payees.create') }}"
               class="btn btn-sm btn-primary btn-create">
               @lang('Add a payee')</a>   
       </div>            
    </div>          
    </div>

  <div class="container box">
   <h3 align="center">My Payees</h3><br />
   <div class="panel panel-default">
    <div class="panel-heading">Search Payee Data</div>
    <div class="panel-body">
     <div class="form-group">
      <input type="text" name="search" id="search" class="form-control" placeholder="Search" />
     </div>
     <div class="table-responsive">
      <h3 align="center">Total Data : <span id="total_records"></span></h3>
      <table  class="table table-striped table-bordered">
       <thead>
        <tr>
         <th style="text-align:center">Payee Name</th>
         <th style="text-align:center">Address</th>
         <th style="text-align:center">Occupation</th>
         <th style="text-align:center">Status</th>
         <th style="text-align:center">Edit</th>
         <th style="text-align:center">Delete</th>
        </tr>
       </thead>
       <tbody>

       </tbody>
      </table>
     </div>
    </div>    
   </div>
  </div>
 
<!-- Central Modal Medium -->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content">
          <!--Header-->
          <div class="modal-header">
            <h4 class="modal-title w-100" id="myModalLabel">Warning!</h4>
            <button type="button" class="close" data-dismiss="modal" >
               &times;
            </button>
          </div>
          <!--Body-->
          <div class="modal-body">
            <div class="alert alert-danger" role="alert">
               Are you sure to delete ?
            </div>
          </div>
          <!--Footer-->
          <div class="modal-footer">
          <div class="modal-footer">
             <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
             <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
             </div>
 </div>
 </div>
 </div>
 </div>


</html>

<script>
$(document).ready(function(){

 fetch_payee_data();

 function fetch_payee_data(query = '')
 {
  $.ajax({
   url:"{{ route('payees.action') }}",
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
  fetch_payee_data(query);
 });

 var user_id;

$(document).on('click', '.delete', function(){
 user_id = $(this).attr('id');
 $('#confirmModal').modal('show');
});

$('#ok_button').click(function(){
 $.ajax({
  url:"payees/destroy/"+user_id,
  beforeSend:function(){
   $('#ok_button').text('Deleting...');
  },
  success:function(data)
  {
   setTimeout(function(){
    $('#confirmModal').modal('hide');
    location.reload();
    // $('#user_table').data().ajax.reload();
    //  $("#result").load($data);
    alert('Data Deleted');
   }, 2000);
  }
 })
});

});
</script>


@endsection

