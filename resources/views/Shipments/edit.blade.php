@extends('layouts.app')

@section('edit_shipment')
    @if($role == 4)
        <form method="POST" action="{{route('shipments.update')}}" >
            @csrf
            <input hidden  type="text" class="form-control"  name="id" value="{{$shipment->id}}">
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <select class="form-control noigui selectpicker" id="exampleFormControlSelect1" name="status" title="Colors">
                                @foreach($statu as $key => $valueStatus)
                                    <option value="{{$key}}" {{$shipment->status == $key ? 'selected' : ''}}>
                                        {{$valueStatus}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <h5  style="background-color: #ffdc19; padding: 10px; font-size: 20px;" class="title-info">Thông tin người gửi</h5>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <select class="form-control noigui selectpicker" id="exampleFormControlSelect1" name="take_available" title="Colors" disabled>
                                <option value="0">--Chọn điểm lấy hàng--</option>
                                @foreach($take as $value)
                                    <option value="{{$value->id}}">{{$value->name_reminiscent}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input disabled type="text" class="form-control" id="tengoinho" placeholder="Tên gợi nhớ" name="tengoinho_take" value="{{$shipment->name_reminiscent_take}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input disabled  type="text" class="form-control" id="tenlienhe" placeholder="Tên người gửi" name="tenlienhe_take" value="{{$shipment->contact_name_take}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input disabled  type="text" class="form-control" id="sdt" placeholder="Số điện thoại liên hệ" name="sdt_take" value="{{$shipment->phone_take}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <textarea disabled  class="form-control" id="add" rows="3" name="add_take" placeholder="Địa chỉ">{{$shipment->add_take}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <h5 style="background-color: #ffdc19; padding: 10px; font-size: 20px;" class="title-info">Thông tin người nhận</h5>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <select class="form-control" id="exampleFormControlSelect1" name="send_available" disabled>
                                <option value="0">--Chọn điểm nhận hàng--</option>
                                @foreach($send as $value)
                                    <option value="{{$value->id}}">{{$value->name_reminiscent}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input disabled   type="text" class="form-control" id="tengoinho" placeholder="Tên gợi nhớ" name="tengoinho_send" value="{{$shipment->name_reminiscent_send}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input disabled   type="text" class="form-control" id="tenlienhe" placeholder="Tên người nhận" name="tenlienhe_send" value="{{$shipment->contact_name_send}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input disabled   type="text" class="form-control" id="sdt" placeholder="Số điện thoại liên hệ" name="sdt_send" value="{{$shipment->phone_send}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <textarea disabled   class="form-control" id="add" rows="3" name="add_send" placeholder="Địa chỉ"> {{$shipment->add_send}}</textarea>
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
                                @foreach ($paypalMethod as $key => $valuess)
                                    <option value="{{$key}}" {{$shipment->payment_methods == $key ? 'selected' : ''}}>{{$valuess}}</option>
                                @endforeach
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
                            <input disabled type="text" class="form-control" id="tengoinho" placeholder="Số kiện" name="sokien" value="{{$shipment->quantity}}">
                        </div>
                        <div class="col-sm-6">
                            <input disabled type="text" class="form-control" id="tengoinho" placeholder="Khối lượng (kg)" name="khoiluong" value="{{$shipment->mass}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <input disabled type="text" class="form-control" id="tengoinho" placeholder="Dài (cm)" name="dai" value="{{$shipment->longs}}">
                        </div>
                        <div class="col-sm-4">
                            <input disabled type="text" class="form-control" id="tengoinho" placeholder="Rộng (cm)" name="rong" value="{{$shipment->wide}}">
                        </div>
                        <div class="col-sm-4">
                            <input disabled type="text" class="form-control" id="tengoinho" placeholder="Cao (cm)" name="Cao" value="{{$shipment->high}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <input disabled type="text" class="form-control" id="tengoinho" placeholder="Giá trị hàng hóa" name="giatrihanghoa" value="{{$shipment->value_goods}}">
                        </div>
                        <div class="col-sm-6">
                            <input disabled type="text" class="form-control" id="tengoinho" placeholder="Số tiền thu hộ" name="sotienthuho" value="{{$shipment->collection_fee}}">
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
                            <input disabled type="text" class="form-control" id="tengoinho" placeholder="Thời gian lấy" name="ngay" value="{{$shipment->date}}">
                        </div>
                        <div class="col-sm-4">
                            <input disabled type="text" class="form-control" id="tengoinho" placeholder="Giờ" name="gio" value="{{$shipment->hours}}">
                        </div>
                        <div class="col-sm-4">
                            <input disabled type="text" class="form-control" id="tengoinho" placeholder="Phút" name="phut" value="{{$shipment->minute}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <textarea disabled type="text" class="form-control" id="tengoinho" placeholder="Nội dung hàng hóa" name="noidunghanghoa">{{$shipment->content_goods}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <textarea disabled type="text" class="form-control" id="tengoinho" placeholder="Ghi chú" name="note">{{$shipment->note}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary px-4 float-right">Save</button>
        </form>
        @else
{{--        @dd($shipping)--}}

        <form method="POST" action="{{route('shipments.update')}}" >
                @csrf
                <input hidden  type="text" class="form-control"  name="id" value="{{$shipment->id}}">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <select class="form-control noigui selectpicker" id="exampleFormControlSelect1" name="status" title="Colors">
                                    @foreach($statu as $key => $valueStatus)
                                        <option value="{{$key}}" {{$shipment->status == $key ? 'selected' : ''}}>
                                            {{$valueStatus}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <select class="form-control noigui selectpicker" id="exampleFormControlSelect1" name="shipping" title="Colors">
                                    @foreach($shipping as $key => $valueStatus)
                                        <option value="{{$valueStatus->id}}" {{$shipment->shipping == $key ? 'selected' : ''}}>
                                            {{$valueStatus->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <h5  style="background-color: #ffdc19; padding: 10px; font-size: 20px;" class="title-info">Thông tin người gửi</h5>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <select class="form-control noigui selectpicker" id="exampleFormControlSelect1" name="take_available" title="Colors" >
                                    <option value="0">--Chọn điểm lấy hàng--</option>
                                    @foreach($take as $value)
                                        <option value="{{$value->id}}">{{$value->name_reminiscent}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input  type="text" class="form-control" id="tengoinho" placeholder="Tên gợi nhớ" name="tengoinho_take" value="{{$shipment->name_reminiscent_take}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input   type="text" class="form-control" id="tenlienhe" placeholder="Tên người gửi" name="tenlienhe_take" value="{{$shipment->contact_name_take}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input   type="text" class="form-control" id="sdt" placeholder="Số điện thoại liên hệ" name="sdt_take" value="{{$shipment->phone_take}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <textarea   class="form-control" id="add" rows="3" name="add_take" placeholder="Địa chỉ">{{$shipment->add_take}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <h5 style="background-color: #ffdc19; padding: 10px; font-size: 20px;" class="title-info">Thông tin người nhận</h5>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <select class="form-control" id="exampleFormControlSelect1" name="send_available" disabled>
                                    <option value="0">--Chọn điểm nhận hàng--</option>
                                    @foreach($send as $value)
                                        <option value="{{$value->id}}">{{$value->name_reminiscent}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input    type="text" class="form-control" id="tengoinho" placeholder="Tên gợi nhớ" name="tengoinho_send" value="{{$shipment->name_reminiscent_send}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input    type="text" class="form-control" id="tenlienhe" placeholder="Tên người nhận" name="tenlienhe_send" value="{{$shipment->contact_name_send}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <input    type="text" class="form-control" id="sdt" placeholder="Số điện thoại liên hệ" name="sdt_send" value="{{$shipment->phone_send}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <textarea    class="form-control" id="add" rows="3" name="add_send" placeholder="Địa chỉ"> {{$shipment->add_send}}</textarea>
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
                                    @foreach ($paypalMethod as $key => $valuess)
                                        <option value="{{$key}}" {{$shipment->payment_methods == $key ? 'selected' : ''}}>{{$valuess}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <select class="form-control" id="exampleFormControlSelect1" name="loaihanghoa">
                                    @foreach ($commodities as $key => $valuess)
                                        <option value="{{$key}}" {{$shipment->commodities == $key ? 'selected' : ''}}>{{$valuess}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input  type="text" class="form-control" id="tengoinho" placeholder="Số kiện" name="sokien" value="{{$shipment->quantity}}">
                            </div>
                            <div class="col-sm-6">
                                <input  type="text" class="form-control" id="tengoinho" placeholder="Khối lượng (kg)" name="khoiluong" value="{{$shipment->mass}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <input  type="text" class="form-control" id="tengoinho" placeholder="Dài (cm)" name="dai" value="{{$shipment->longs}}">
                            </div>
                            <div class="col-sm-4">
                                <input  type="text" class="form-control" id="tengoinho" placeholder="Rộng (cm)" name="rong" value="{{$shipment->wide}}">
                            </div>
                            <div class="col-sm-4">
                                <input  type="text" class="form-control" id="tengoinho" placeholder="Cao (cm)" name="Cao" value="{{$shipment->high}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input  type="text" class="form-control" id="tengoinho" placeholder="Giá trị hàng hóa" name="giatrihanghoa" value="{{$shipment->value_goods}}">
                            </div>
                            <div class="col-sm-6">
                                <input  type="text" class="form-control" id="tengoinho" placeholder="Số tiền thu hộ" name="sotienthuho" value="{{$shipment->collection_fee}}">
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
                                <input  type="text" class="form-control" id="tengoinho" placeholder="Thời gian lấy" name="ngay" value="{{$shipment->date}}">
                            </div>
                            <div class="col-sm-4">
                                <input  type="text" class="form-control" id="tengoinho" placeholder="Giờ" name="gio" value="{{$shipment->hours}}">
                            </div>
                            <div class="col-sm-4">
                                <input  type="text" class="form-control" id="tengoinho" placeholder="Phút" name="phut" value="{{$shipment->minute}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <textarea  type="text" class="form-control" id="tengoinho" placeholder="Nội dung hàng hóa" name="noidunghanghoa">{{$shipment->content_goods}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <textarea  type="text" class="form-control" id="tengoinho" placeholder="Ghi chú" name="note">{{$shipment->note}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary px-4 float-right">Save</button>
            </form>
            @endif
    </script>
@endsection
