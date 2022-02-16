<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\User;

class Users extends BaseController
{
    private $model;
    public function __construct()
    {
        $this->model = new \App\Models\UserModel;
    }
    public function index()
    {
        $data = $this->model->paginateUserList();

        return view('Admin/Users/index', [
            'users' => $data,
            'pager' => $this->model->pager
        ]);
    }
    public function show($id)
    {
        $data = $this->getUserOr404($id);

        return view('Admin/Users/show', ['user' => $data]);
    }
    public function new()
    {
        $user = new User();

        return view('Admin/Users/new', [
            'user' => $user
        ]);
    }

    public function create()
    {
        $user = new User();
        $user->fill($this->request->getPost());


        if ($this->model->addUser($user)) {

            return redirect()->to("/admin/users/show/{$this->model->insertID}")
                ->with('info', 'User created successfully');
        } else {
            return redirect()->back()
                ->with('errors', $this->model->errors())
                ->with('warning', 'Invalid data')
                ->withInput();
        }
    }

    public function edit($id)
    {
        $user = $this->getUserOr404($id);

        return view('Admin/Users/edit', [
            'user' => $user
        ]);
    }

    public function update($id)
    {
        $user = $this->getUserOr404($id);
        $data = $this->request->getPost();

        if (empty($data['password'])) {
            $this->model->disablePasswordValidation();
            unset($data['password']);
            unset($data['password_cnf']);
        }

        $user->fill($data);

        if (!$user->hasChanged()) {

            return redirect()->back()
                ->with('warning', 'Nothing to update')
                ->withInput();
        }

        if ($this->model->save($user)) {

            return redirect()->to("/admin/users/show/$id")
                ->with('info', 'User updated successfully');
        } else {

            return redirect()->back()
                ->with('errors', $this->model->errors())
                ->with('warning', 'Invalid data')
                ->withInput();
        }
    }

    public function delete($id)
    {
        $user = $this->getUserOr404($id);

        if ($this->request->getMethod() === 'post') {

            $this->model->delete($id);

            return redirect()->to('/admin/users/')
                ->with('info', 'Task deleted');
        }

        return view('Admin/Users/delete', [
            'user' => $user
        ]);
    }
    private function getUserOr404($id)
    {
        $user = $this->model->findByuserID($id);

        if ($user === null) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Task with id $id not found");
        }

        return $user;
    }
}
