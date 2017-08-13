<?php

namespace App\Http\Controllers\Tasks;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Task;
use App\Project;
use App\Repositories\TaskRepository;
use Auth;

class MyTasksController extends Controller
{
	protected $tasks;
    protected $currentproject;
    protected $currentProjectId;
    protected $userId;
    
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');

        $this->tasks = $tasks;
    }

    public function index(Request $request)
    {
        $userId = Auth::id();   
        $currentProjectId = $request->project ?? '1';
        $currentproject = Project::where('id', $currentProjectId)->get();
        $tasks = Task::with(['project','user'])->where([
                'user_id' => $userId,
                'project_id' => $currentProjectId
            ])->get();
        $projects = Project::all();

        return view('tasks.index', compact('tasks', 'projects', 'currentProjectId', 'currentproject', 'userId'));
    }


    public function newtask(Request $request)
    {
        $tasks = $this->tasks->forUser($request->user());
        //dd($tasks);

        return view('tasks.newtask', compact('tasks'));
    }
}
