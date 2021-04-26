<?php

namespace App\Http\Controllers;

use App\Interfaces\RoleInterface;
use App\Interfaces\SendInterface;
use App\Interfaces\UserInterface;
use Illuminate\Http\Request;

class SendController extends Controller
{
    private $user, $role, $send;

    public function __construct(UserInterface $user, RoleInterface $role, SendInterface $send){
        $this->user = $user;
        $this->role = $role;
        $this->send = $send;
    }

    public function index(){
        $send = $this->send->getAll();
        $status = array('Đang hoạt động' => 1, 'Dừng hoạt động' => 0);
        return view('Warehouse/send/list', ['send' => $send, 'status' => $status]);
    }

    public function add(){
        return view('Warehouse/send/add');
    }
    public function save(Request $request)
    {
        $input = $request->all();
        $attributes = [
            'name_reminiscent' => $input['tengoinho'],
            'contact_name' => $input['tenlienhe'],
            'phone' => $input['sdt'],
            'add' => $input['add'],
            'status' => 1
        ];
        $send = $this->send->create($attributes);
        if ($send){
            return redirect()->route('send.list');
        }
    }
}
