<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function new()
    {
        return view('login/new');
    }
    public function create()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // $auth = \config\Services::auth();
        $auth = service('auth');

        if ($auth->login($email, $password)) {
            return redirect()
                ->to('/')
                ->with('info', 'Login Successfull');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with('warning', 'Username Or Password is wrong');
        }
    }

    public function delete()
    {
        // service('auth')->logout();
        $auth = service('auth');
        $auth->logout();
        return redirect()
            ->to(site_url())
            ->with('info', 'Logout successfull');
    }
}
