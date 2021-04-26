<?php

namespace App\Interfaces;

interface UserInterface extends AbstractInterface {
    public function get_role($id);
}
