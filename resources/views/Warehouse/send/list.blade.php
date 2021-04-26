
@extends('layouts.app')

@section('list_send')
    <a href="{{route('send.creat')}}">
        <input type="button" class="btn btn-danger" value="Thêm mới">
    </a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên gợi nhớ</th>
            <th scope="col">Tên liên hệ</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">SĐT liên lạc</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Hành động</th>
        </tr>
        </thead>
        <tbody>
        @foreach($send as $key => $value)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <th scope="row">{{$value->name_reminiscent}}</th>
                <th scope="row">{{$value->contact_name}}</th>
                <th scope="row">{{$value->add}}</th>
                <th scope="row">{{$value->phone}}</th>
                <th scope="row">
                    @foreach($status as $key => $values)
                        {{$value->status == $values ? $key : ''}}
                    @endforeach
                </th>
                <td>
                    <a href="{{route('take.edit',['id'=>$value->id])}}">
                        <input type="button" class="btn btn-primary" value="Sửa">
                    </a>
                    <a href="{{route('take.delete', ['id'=>$value->id])}}">
                        <input type="button" class="btn btn-danger" value="Xóa">
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
