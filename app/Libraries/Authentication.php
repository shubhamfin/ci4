<?php

namespace App\Libraries;

class Authentication
{
    private $user;
    public function login($email, $password)
    {
        $model = new \App\Models\UserModel;
        $result =  $model->findByEmail($email);

        if ($result === null) {
            return false;
        }

        if (!$result->verifyPassword($password)) {
            return false;
        }

        //initilize seeion and session regenerete new hash
        $session  = session();
        $session->regenerate();
        $session->set('user_id', $result->id);
        return true;
    }

    public function logout()
    {
        session()->destroy();
    }

    public function getCurrentUser()
    {
        if (!$this->isLoggedIn()) {
            return null;
        }
        if ($this->user === null) {
            $model = new \App\Models\UserModel;
            $this->user =  $model->findByuserID(session()->get('user_id'));
        }
        return $this->user;
    }

    public function isLoggedIn()
    {
        return session()->has('user_id');
    }
}
