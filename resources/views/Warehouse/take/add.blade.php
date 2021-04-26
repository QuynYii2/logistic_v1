@extends('layouts.app')

@section('add_take')
<form method="POST" action="{{route('take.save')}}" >
    @csrf
    <div class="form-group row">
        <div class="col-sm-12">
            <label for="inputFirstname">Tên gợi nhớ:</label>
            <input type="text" class="form-control" id="tengoinho" placeholder="Tên gợi nhớ" name="tengoinho">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12">
            <label for="inputLastname">Tên liên hệ:</label>
            <input type="text" class="form-control" id="tenlienhe" placeholder="Tên liên hệ" name="tenlienhe">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12">
            <label for="inputAddressLine1">Số điện thoại liên hệ:</label>
            <input type="text" class="form-control" id="sdt" placeholder="Số điện thoại liên hệ" name="sdt">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-12">
            <label for="inputAddressLine2">Địa chỉ:</label>
            <textarea class="form-control" id="add" rows="3" name="add"></textarea>
        </div>
    </div>
    <button type="submit" class="btn btn-primary px-4 float-right">Save</button>
</form>
@endsection
