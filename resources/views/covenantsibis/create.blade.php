@extends('layouts.sidebar2')
@section('content')

<h1>Add a new covanant by IBI</h1>
<form method='post' action="{{action('CovenantsibiController@store')}}">
    {{csrf_field()}}
    <div class="col-md-10">
        <div class="form-group">
            <label for="designation">Designation</label>
            <input type="text" class="form-control" name="designation">
        </div>

        <div class="form-group">
            <label for="total_month">Range</label>
            <input type="text" class="form-control" name="total_month">
        </div>

        <div class="form-group">
            <label for="total_amount">Max amount</label>
            <input type="text" class="form-control" name="total_amount">
        </div>

        <div class="form-group">
            <label for="approval">Approval</label>
            <input type="text" class="form-control" name="approval">
        </div>

        <div class="form-group">
            <label for="max_percentage_general">Max general</label>
            <input type="text" class="form-control" name="max_percentage_general">
        </div>

        <div class="form-group">
            <label for="min_percentage_general">Min general</label>
            <input type="text" class="form-control" name="min_percentage_general">
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-success btn-block" name="submit" value="Save">
        </div>
    </div>
</form>
@endsection