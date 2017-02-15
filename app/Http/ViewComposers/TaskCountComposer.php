<?php
namespace App\Http\ViewComposers;

use App\Repositories\TasksRepository;
use Illuminate\View\View;

class TaskCountComposer
{
	protected $Task;

	public function __construct(TasksRepository $task)
	{
		$this->Task = $task;
	}

	public function compose(View $view)
	{
		$task = $this->Task;
		$view->with([
			'total'     => $task->total(),
			'toDoCount' => $task->toDoCount(),
			'doneCount' => $task->doneCount()
		]);
	}
}
