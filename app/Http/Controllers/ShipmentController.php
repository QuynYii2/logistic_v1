<?php

namespace App\Http\Controllers;

use App\Interfaces\RoleInterface;
use App\Interfaces\SendInterface;
use App\Interfaces\ShipmentInterface;
use App\Interfaces\TakeInterface;
use App\Interfaces\UserInterface;
use App\Shipments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Stevebauman\Location\Facades\Location;

class ShipmentController extends Controller
{
    private $role, $user, $shipment , $take, $send;

    public function __construct( RoleInterface $role, UserInterface $user, ShipmentInterface $shipment, TakeInterface $take, SendInterface $send){
        $this->role = $role;
        $this->user = $user;
        $this->shipment = $shipment;
        $this->take = $take;
        $this->send = $send;
    }

    public function index(Request $request){
        $shipment = $this->shipment->getAll();
        $shippingStaffs = $this->user->get_role(4);
        $status = array(
            'Đang giao hàng' => 1,
            'Chờ giao hàng' => 2,
            'Đang nhập kho' => 3,
            'Đã nhập kho' => 4,
            'Đã nhận hàng' => 5,
            'Đã hủy' => 6,
        );
        return view('Shipments/list', ['shipment' => $shipment, 'status' => $status, 'shipping' => $shippingStaffs]);
    }

    public function add(){
        $take = $this->take->getAll();
        $send =$this->send->getAll();
        $shipping = $this->user->get_role(4);
        if(Auth::user()->id_role == 1 || Auth::user()->id_role == 2 || Auth::user()->id_role == 3){
            return view('Shipments/add', ['take' => $take, 'send' => $send, 'shipping' => $shipping]);
        }
        else{
            return view('Shipments/add', ['take' => $take, 'send' => $send]);
        }
    }

    public function save(Request $request){

        $input = $request->all();
        $send = $input['send_available'];
        $take = $input['take_available'];
        $billCode = Str::random(9);
        $attributes = [
          'name_reminiscent_take' => $input['tengoinho_take'],
          'contact_name_take' => $input['tenlienhe_take'],
          'add_take' => $input['add_take'],
          'phone_take' => $input['sdt_take'],
          'name_reminiscent_send' => $input['tengoinho_send'],
          'contact_name_send' => $input['tenlienhe_send'],
          'add_send' => $input['add_send'],
          'phone_send' => $input['sdt_send'],
          'payment_methods' => $input['phuongthucthanhtoan'],
          'commodities' => $input['loaihanghoa'],
          'quantity' => $input['sokien'],
          'mass' => $input['khoiluong'],
          'longs' => $input['dai'],
          'wide' => $input['rong'],
          'high' => $input['Cao'],
          'value_goods' => $input['giatrihanghoa'],
          'collection_fee' => $input['sotienthuho'],
          'vehicle' => $input['yecaulayhang'],
          'date' => $input['ngay'] ,
          'hours' => $input['gio'],
          'minute' => $input['phut'],
          'content_goods' => $input['noidunghanghoa'],
          'note' => $input['note'],
          'status' => 1,
          'bill_code' => $billCode,
          'curent_location' => '',
          'shipping' => $input['shipping']
        ];
        $shipment = $this->shipment->create($attributes);
        if($shipment){
            return redirect()->route('shipments.list');
        }
    }

    public function edit(Request $request, $id){
        $role = Auth::user()->id_role;
        $shipping = $this->user->get_role(4);
        $dataShipment = $this->shipment->find($id);
        $take = $this->take->getAll();
        $send =$this->send->getAll();
        $paypalMethod = array(
            1 => 'Người Gửi Thanh Toán Ngay ',
            2 => 'Người Nhận Thanh Toán Ngay '
        );
        $commodities = array(
            1 => 'Chứng từ',
            2 => 'Hàng hóa'
        );
        $status = array(
            1 => 'Đang giao hàng',
            2 => 'Chờ giao hàng',
            3 => 'Đang nhập kho',
            4 => 'Đã nhập kho',
            5 => 'Đã nhận hàng',
            6 => 'Đã hủy',
        );
        return view('Shipments/edit', [
            'shipment' => $dataShipment,
            'statu' => $status,
            'take' => $take,
            'send' => $send,
            'role' => $role,
            'paypalMethod' => $paypalMethod,
            'commodities' => $commodities,
            'shipping' => $shipping
        ]);
    }

    public function search(){
        return view('Shipments/search');
    }

    public function rsearch(Request $request){
        $key = $request->key;
        $result = $this->shipment->search($key);
        $cret = $this->shipment->search($key)->toArray();
        $creat = $cret[0]['created_at'];
        $dateSend  = date('d-m-Y', strtotime($creat));
        $phoneShipping = $this->user->find($result[0]['shipping'])->toArray();
        $payment_methods = array(
            1 => 'Người Gửi Thanh Toán Ngay ',
            2 => 'Người Nhận Thanh Toán Ngay '
        );
        $status = array(
            1 => 'Đang giao hàng',
            2 => 'Chờ giao hàng',
            3 => 'Đang nhập kho',
            4 => 'Đã nhập kho',
            5 => 'Đã nhận hàng',
            6 => 'Đã hủy',
        );
        $shippingStaffs = $this->user->get_role(4);
        $commodities = array(
            1 => 'Chứng từ',
            2 => 'Hàng hóa'
        );
        return response()->json([
            'date_creat' =>$dateSend, 'shipment' => $result, 'payment_methods' => $payment_methods, 'commodities' => $commodities,   'statu' => $status, 'shipping' => $shippingStaffs, 'phone_shipping' => $phoneShipping
        ]);
    }

    public function update (Request $request){
        $id = $request['id'];
        $input = $request->all();
        if(Auth::user()->id_role == 1 || Auth::user()->id_role == 2 || Auth::user()->id_role == 3){
            $attributes = [
                'name_reminiscent_take' => $input['tengoinho_take'],
                'contact_name_take' => $input['tenlienhe_take'],
                'add_take' => $input['add_take'],
                'phone_take' => $input['sdt_take'],
                'name_reminiscent_send' => $input['tengoinho_send'],
                'contact_name_send' => $input['tenlienhe_send'],
                'add_send' => $input['add_send'],
                'phone_send' => $input['sdt_send'],
                'payment_methods' => $input['phuongthucthanhtoan'],
                'commodities' => $input['loaihanghoa'],
                'quantity' => $input['sokien'],
                'mass' => $input['khoiluong'],
                'longs' => $input['dai'],
                'wide' => $input['rong'],
                'high' => $input['Cao'],
                'value_goods' => $input['giatrihanghoa'],
                'collection_fee' => $input['sotienthuho'],
                'vehicle' => $input['yecaulayhang'],
                'date' => $input['ngay'] ,
                'hours' => $input['gio'],
                'minute' => $input['phut'],
                'content_goods' => $input['noidunghanghoa'],
                'note' => $input['note'],
                'status' => $input['status'],
                'curent_location' => '',
                'shipping' => $input['shipping']
            ];
//            dd($attributes);
        }
        else{
            $attributes = [
                'status' => $input['status'],
            ];
        }
        $this->shipment->update($id, $attributes);
        return redirect()->route('shipments.list');
    }
}
