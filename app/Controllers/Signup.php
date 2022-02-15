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
        if ($model->insert($user)) {

            return redirect()->to('signup/success');
        } else {
            return redirect()->back()->with('errors', $model->errors())->withInput();
        }
    }
    public function success()
    {   
        
        return view('signup/success');
    }
}
