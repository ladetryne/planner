<?php

namespace App\Http\Controllers\Tasks;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Task;
use App\Project;
use App\Repositories\TaskRepository;

class TasksController extends Controller
{
    /**
     * @var TaskRepository
     */
    protected $tasks;

    /**
     *  create a new controller instance
     *  @param  TaskRepository  $tasks
     *  @return void
     */
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');

        $this->tasks = $tasks;
    }

    /**
     * vi liste over brukerens oppgaver
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        $page_title = 'Tasks';
        $currentProjectId = $request->project ?? '1';
        //Auth::user()->tasks()->with(['project','user'])->where('project_id', $currentProjectId)->get();
        $tasks = Task::with(['project','user'])->where('project_id', $currentProjectId)->get();
        $projects = Project::all();
        $currentproject = Project::where('id', $currentProjectId)->get();
        //dd($tasks);

        return view('tasks.index', compact('tasks', 'projects', 'currentProjectId', 'currentproject'));
    }
}
