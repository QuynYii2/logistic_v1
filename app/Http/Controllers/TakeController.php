<?php

namespace App\Http\Controllers;

use App\Interfaces\RoleInterface;
use App\Interfaces\TakeInterface;
use App\Interfaces\UserInterface;
use Illuminate\Http\Request;
use App\Take;

class TakeController extends Controller
{
    private $user, $role, $take;

    public function __construct(UserInterface $user, RoleInterface $role, TakeInterface $take){
        $this->user = $user;
        $this->role = $role;
        $this->take = $take;
    }

    public function index(){
        $take = $this->take->getAll();
        $status = array('Đang hoạt động' => 1, 'Dừng hoạt động' => 0);
        return view('Warehouse/take/list', ['take' => $take, 'status' => $status]);
    }

    public function add(){
        return view('Warehouse/take/add');
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
        $take = $this->take->create($attributes);
        if ($take){
            return redirect()->route('take.list');
        }
    }
}
