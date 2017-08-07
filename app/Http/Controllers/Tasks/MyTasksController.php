<?php

namespace App\Http\Controllers\Tasks;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Task;
use App\Project;
use App\Repositories\TaskRepository;

class MyTasksController extends Controller
{
	protected $tasks;
    
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');

        $this->tasks = $tasks;
    }

    public function index(Request $request)
    {
        $tasks = $this->tasks->forUser($request->user());
        $projects = Project::all();
        //dd($tasks);


        return view('tasks.mytasks', compact('tasks', 'projects'));
    }
    public function newtask(Request $request)
    {
        $tasks = $this->tasks->forUser($request->user());
        //dd($tasks);

        return view('tasks.newtask', compact('tasks'));
    }
}
