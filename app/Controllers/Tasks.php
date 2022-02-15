<?php

namespace App\Controllers;

use App\Entities\Task;
use App\Entities\User;

class Tasks extends BaseController
{
	private $model;
	private $user;

	public function __construct()
	{
		$this->user =	 service('auth')->getCurrentUser();
		$this->model = new \App\Models\TaskModel;
	}

	public function index()
	{

		$user_id = $this->user->id;
		//	dd(	$auth->getCurrentUser()->id);
		$data = $this->model->paginateTasksByUserID($user_id);

		return view("Tasks/index", [
			'tasks' => $data,
			'pager' => $this->model->pager
		]);
	}

	public function show($id)
	{
		$task = $this->getTaskOr404($id);

		return view('Tasks/show', [
			'task' => $task
		]);
	}

	public function new()
	{
		$task = new Task;

		return view('Tasks/new', [
			'task' => $task
		]);
	}

	public function create()
	{
		$task = new Task();
		$task->fill($this->request->getPost());
		$task->user_id = $this->user->id;

		if ($this->model->addTaskWithUserID($task)) {

			return redirect()->to("/tasks/show/{$this->model->insertID}")
				->with('info', 'Task created successfully');
		} else {
			return redirect()->back()
				->with('errors', $this->model->errors())
				->with('warning', 'Invalid data')
				->withInput();
		}
	}

	public function edit($id)
	{
		$task = $this->getTaskOr404($id);

		return view('Tasks/edit', [
			'task' => $task
		]);
	}

	public function update($id)
	{
		$task = $this->getTaskOr404($id);
		$data = $this->request->getPost();
		unset($data['user_id']);
		$task->fill($data);

		if (!$task->hasChanged()) {

			return redirect()->back()
				->with('warning', 'Nothing to update')
				->withInput();
		}

		if ($this->model->save($task)) {

			return redirect()->to("/tasks/show/$id")
				->with('info', 'Task updated successfully');
		} else {

			return redirect()->back()
				->with('errors', $this->model->errors())
				->with('warning', 'Invalid data')
				->withInput();
		}
	}

	public function delete($id)
	{
		$task = $this->getTaskOr404($id);

		if ($this->request->getMethod() === 'post') {

			$this->model->delete($id);

			return redirect()->to('/tasks')
				->with('info', 'Task deleted');
		}

		return view('Tasks/delete', [
			'task' => $task
		]);
	}

	private function getTaskOr404($id)
	{
		$task = $this->model->getTaskByUserID($id, $this->user->id);

		if ($task === null) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException("Task with id $id not found");
		}

		return $task;
	}
}
