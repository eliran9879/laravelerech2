@extends('layouts.sidebar3')
@section('content')

<h1>Edit Hapoalim's Covenants </h1>
<!-- <form method='post' action="{{action('CovenantshapoalimController@destroy', $covenantshapoalims->id)}}"> -->
    <!-- @csrf -->
    <!-- @method('DELETE') -->
    <!-- <div class="form-group"> -->
        <!-- <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')" name="submit" value="Delete Covenants"> -->
    <!-- </div> -->
<!-- </form> -->

<form method='post' action="{{action('CovenantshapoalimController@update', $covenantshapoalims->id)}}">
    @csrf
    @method('PATCH')
    <div class="col-md-10">
        <div class="form-group">
            <label for="title">Designation:</label>
            <input type="text" class="form-control" name="designation" value="{{$covenantshapoalims->designation}}">
        </div>

        <div class="form-group">
            <label for="title">Range:</label>
            <input type="text" class="form-control" name="total_month" value="{{$covenantshapoalims->total_month}}">
        </div>

        <div class="form-group">
            <label for="title">Approval:</label>
            <input type="text" class="form-control" name="approval" value="{{$covenantshapoalims->approval}}">
        </div>

        <div class="form-group">
            <label for="title">Max Aprroval:</label>
            <input type="text" class="form-control" name="max_approval" value="{{$covenantshapoalims->max_approval}}">
        </div>

        <div class="form-group">
            <label for="title">Check's type:</label>
            <br>
            <input type="radio" name="type_check" value="salaried" checked value="{{$covenantshapoalims->type_check}}"> Salaried
            <input type="radio" name="type_check" value="checked" value="{{$covenantshapoalims->type_check}}"> Checked
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-success btn-block" name="submit" value="Save">
        </div>
    </div>

</form>

@endsection