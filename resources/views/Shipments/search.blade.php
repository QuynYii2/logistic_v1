@extends('layouts.app')

@section('search_shipment')
    <?php $result = ''; ?>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group row">
            <div class="col-sm-12">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Nhập mã đơn vận" name="key" id="mdh">
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="button" id="search">
                            <i class="fa fa-search" ></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--    <form method="POST" action="{{route('shipments.r_search')}}">--}}
{{--        @csrf--}}
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Thời gian</th>
                <th scope="col">Hoạt động</th>
                <th scope="col">Vị trí hiện tại</th>
                <th scope="col">Nhân viên</th>
                <th scope="col">Số điện thoại</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
{{--        @if((isset($shipment)))--}}
{{--            @foreach($shipment as $value)--}}
{{--                <div class="row">--}}
{{--                    <div class="col-sm-6">--}}
{{--                        <div class="label">--}}
{{--                            <b>Ngày gửi:</b> {{$date_send}}<br>--}}
{{--                            <b>Điểm đi: </b>{{$value['name_reminiscent_take']}}<br>--}}
{{--                            <b>Phương thức Thanh--}}
{{--                                toán: </b>@foreach($payment_methods as $key => $values){{$value['payment_methods'] == $key ? $values : ''}} @endforeach--}}
{{--                            <br>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-6">--}}
{{--                        <div class="label">--}}
{{--                            <b>Dịch vụ: </b>@foreach($commodities as $key => $values){{$value['commodities'] == $key ? $values : ''}} @endforeach<br>--}}
{{--                            <b>Hàng hóa: </b>{{$value['content_goods']}}<br>--}}
{{--                            <b>Người nhận: </b>{{$value['contact_name_send']}}<br>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                --}}
{{--            @endforeach--}}
{{--        @endif--}}
{{--    </form>--}}
    <script type="text/javascript">
        $(document).ready(function(){
            $('#search').click(function() {
                // console.log(1)
                // console.log(shipmentsDetail)
                let query = $("#mdh").val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                if (query != '') {
                    $.ajax({
                        type:"post",
                        url:'/r_search/',
                        data:{key:query},
                        dataType: 'json',
                        success:function(data){
                            // console.log(data);
                            var res='';
                            console.log('https://maps.googleapis.com/maps/api/geocode/json?latlng=40.714224,-73.961452&key=AIzaSyCgILKp0Gjer3Jpo3qqgbQoeDL-4IE9jik')
                            $.each(data.shipment, function (key, value) {
                                // console.log(value.name_reminiscent_take)
                                    res +=
                                        '<tr>'+
                                        '<td>'+data.date_creat+'</td>'+
                                        '<td>'+data.statu[value.status]+'</td>'+
                                        '<td>'+value.name_reminiscent_take+'</td>'+
                                        '<td>'+data.phone_shipping.name+'</td>'+
                                        '<td>'+data.phone_shipping.phone+'</td>'+
                                        +'</tr>';

                            });
                            $('tbody').html(res);
                        }
                    });
                }
            });
        });
    </script>
@endsection
