@extends('layouts.app')

@section('add_shipment')
    <form method="POST" action="{{route('shipments.save')}}" >
        @csrf
        @if(isset($shipping))
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <select class="form-control noigui selectpicker" id="exampleFormControlSelect1" name="status" title="Colors">
                                <option value="0">--Trạng thái vận đơn--</option>
                                <option value="1">Đang giao hàng</option>
                                <option value="2">Chờ giao hàng</option>
                                <option value="3">Đã nhận hàng</option>
                                <option value="4">Đang nhập kho</option>
                                <option value="5">Đã nhập kho</option>
                                <option value="6">Đã hủy</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <select class="form-control noigui selectpicker" id="exampleFormControlSelect1" name="shipping" title="Colors">
                                <option value="">--Nhân viên vận chuyển--</option>
                                @foreach($shipping as $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-sm-6">
                <h5  style="background-color: #ffdc19; padding: 10px; font-size: 20px;" class="title-info">Thông tin người gửi</h5>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <select class="form-control noigui selectpicker" id="exampleFormControlSelect1" name="take_available" title="Colors">
                            <option value="0">--Chọn điểm lấy hàng--</option>
                            @foreach($take as $value)
                                <option value="{{$value->id}}">{{$value->name_reminiscent}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="tengoinho" placeholder="Tên gợi nhớ" name="tengoinho_take">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="tenlienhe" placeholder="Tên người gửi" name="tenlienhe_take">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="sdt" placeholder="Số điện thoại liên hệ" name="sdt_take">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <textarea class="form-control" id="add" rows="3" name="add_take" placeholder="Địa chỉ"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <h5 style="background-color: #ffdc19; padding: 10px; font-size: 20px;" class="title-info">Thông tin người nhận</h5>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <select class="form-control" id="exampleFormControlSelect1" name="send_available">
                            <option value="0">--Chọn điểm nhận hàng--</option>
                            @foreach($send as $value)
                                <option value="{{$value->id}}">{{$value->name_reminiscent}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="tengoinho" placeholder="Tên gợi nhớ" name="tengoinho_send">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="tenlienhe" placeholder="Tên người nhận" name="tenlienhe_send">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="sdt" placeholder="Số điện thoại liên hệ" name="sdt_send">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <textarea class="form-control" id="add" rows="3" name="add_send" placeholder="Địa chỉ"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h5  style="background-color: #ffdc19; padding: 10px; font-size: 20px;"  class="title-info">Thông tin hàng hóa/ dịch vụ</h5>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <select class="form-control" id="exampleFormControlSelect1" name="phuongthucthanhtoan">
                            <option value="0">--Chọn phương thức thanh toán--</option>
                            <option value="1">Người Gửi Thanh Toán Ngay </option>
                            <option value="2">Người Nhận Thanh Toán Ngay </option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <select class="form-control" id="exampleFormControlSelect1" name="loaihanghoa">
                            <option value="0">--Chọn loại hàng hóa--</option>
                            <option value="1">Chứng từ</option>
                            <option value="2">Hàng hóa</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="tengoinho" placeholder="Số kiện" name="sokien">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="tengoinho" placeholder="Khối lượng (kg)" name="khoiluong">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="tengoinho" placeholder="Dài (cm)" name="dai">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="tengoinho" placeholder="Rộng (cm)" name="rong">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="tengoinho" placeholder="Cao (cm)" name="Cao">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="tengoinho" placeholder="Giá trị hàng hóa" name="giatrihanghoa">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="tengoinho" placeholder="Số tiền thu hộ" name="sotienthuho">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <select class="form-control" id="exampleFormControlSelect1" name="yecaulayhang">
                            <option disabled="true">Yêu cầu lấy hàng</option>
                            <option value="1">Xe máy</option>
                            <option value="2">Ô tô</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="tengoinho" placeholder="Thời gian lấy" name="ngay">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="tengoinho" placeholder="Giờ" name="gio">
                    </div>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="tengoinho" placeholder="Phút" name="phut">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <textarea type="text" class="form-control" id="tengoinho" placeholder="Nội dung hàng hóa" name="noidunghanghoa"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <textarea type="text" class="form-control" id="tengoinho" placeholder="Ghi chú" name="note"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary px-4 float-right">Save</button>
    </form>
    </script>
@endsection
