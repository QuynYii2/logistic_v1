<?php

namespace App\Http\Controllers;

use App\Interfaces\RoleInterface;
use App\Interfaces\UserInterface;
use App\Interfaces\WarehouseInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $user, $role , $warehouse;

    public function __construct( UserInterface $user, RoleInterface $role , WarehouseInterface $warehouse){
        $this->user = $user;
        $this->role = $role;
        $this->warehouse = $warehouse;
    }

    public function index()
    {
        $user = $this->user->getAll();
        $role = $this->role->getAll();
        $warehouse = $this->warehouse->getAll();
        return view('auth/list', ['list_user' => $user, 'list_role' => $role, 'list_warehouse' => $warehouse]);
    }

    public function add(){
        $role = $this->role->getAll();
        $warehouse = $this->warehouse->getAll();
        $status = array(
            1 => 'Đã kích hoạt',
            2 => 'Chưa kích hoạt',
            3 => 'Bị khóa',
        );
        return view('auth/add', ['list_role' => $role, 'warehouse' => $warehouse, 'status' => $status]);

    }

    public function save(Request $request)
    {
        $input = $request->all();
        $attributes = [
            'name' => $input['name'],
            'email'  => $input['email'],
            'password' => Hash::make($input['password']),
            'id_role' => $input['role'],
            'id_warehouse' => $input['restaurant'],
            'add' => $input['add'],
            'phone' => $input['phone'],
            'status' => 2
        ];
        $user = $this->user->create($attributes);
        if ($user){
            return redirect()->route('user.list');
        }
    }

}
