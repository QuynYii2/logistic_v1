<?php
    namespace App\Repositories;
    use App\Interfaces\UserInterface;
    use App\User;

    class UserRepository extends EloquentRepository implements UserInterface{

        public function getModel(): string
        {
            return User::class;
        }

        public function get_role($id)
        {
            return $this->_model->where('id_role' , $id)->get();
        }
    }
