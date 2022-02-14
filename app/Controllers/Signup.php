<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Signup extends BaseController
{
    public function index()
    {
    }

    public function new()
    {

        return view('/signup/new');
    }
    public function create()
    {
        $user = new \App\Entities\User($this->request->getPost());
        $model = new \App\Models\UserModel();
        $model->insert($user);
        echo "sign Up complet";
    }
}
