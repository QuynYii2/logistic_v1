
@extends('layouts.app')

@section('list_shipment')
    <a href="{{route('shipments.creat')}}">
        <input type="button" class="btn btn-danger" value="Thêm mới">
    </a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Mã đơn vận</th>
            <th scope="col">Nơi gửi</th>
            <th scope="col">Tên người nhận</th>
            <th scope="col">Địa chỉ người nhận</th>
            <th scope="col">Tiền thu hộ</th>
            <th scope="col">Nhân viên ship</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Ngày tạo đơn</th>
            <th scope="col">Hành động</th>
        </tr>
        </thead>
        <tbody>
{{--        @dd($shipping);--}}
        @foreach($shipment as $key => $value)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <th scope="row">{{$value->bill_code}}</th>
                <th scope="row">{{$value->add_take}}</th>
                <th scope="row">{{$value->contact_name_send}}</th>
                <th scope="row">{{$value->add_send}}</th>
                <th scope="row">{{$value->collection_fee}}</th>
                <th scope="row">
                    @if($value->shipping == Null)
                        Chưa giao nhân viên ship
                    @else
                        @foreach($shipping as $values)
                            {{$value->shipping == $values->id ? $values->name : ''}}
                        @endforeach
                    @endif
                </th>
                <th scope="row">
                @foreach($status as $key => $values)
                        {{$value->status == $values ? $key : ''}}
                    @endforeach
                </th>
                <th scope="row">{{$value->created_at}}</th>
                <td>
                    <a href="{{route('shipments.edit',['id'=>$value->id])}}">
                        <input type="button" class="btn btn-primary" value="Sửa">
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
{{--    <div style="border:1px solid black; margin-left: 300px; margin-right: 300px;">--}}
{{--            <p>Click the button to get your coordinates.</p>--}}

{{--            <button onclick="getLocation()">Try It</button>--}}

{{--            <p id="demo"></p>--}}

{{--            <script>--}}
{{--                var x = document.getElementById("demo");--}}
{{--                function showPosition(position) {--}}
{{--                    var latlon = position.coords.latitude + "," + position.coords.longitude;--}}
{{--                    // console.log(latlon);--}}
{{--                    // var img_url = "https://maps.googleapis.com/maps/api/staticmap?center="--}}
{{--                    //     +latlon+"&zoom=14&size=400x300&key=AIzaSyCgILKp0Gjer3Jpo3qqgbQoeDL-4IE9jik";--}}
{{--                    //--}}
{{--                    // document.getElementById("demo").innerHTML = "<img src='"+img_url+"'>";--}}
{{--                }--}}
{{--                function getLocation() {--}}

{{--                    if (navigator.geolocation) {--}}
{{--                        console.log(navigator.geolocation.getCurrentPosition(a))--}}
{{--                        navigator.geolocation.getCurrentPosition(showPosition);--}}
{{--                    } else {--}}
{{--                        x.innerHTML = "Geolocation is not supported by this browser.";--}}
{{--                    }--}}
{{--                }--}}
{{--            </script>--}}
{{--    </div>--}}
@endsection
