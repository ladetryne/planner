<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Project;
use App\Task;



use App\Repositories\TaskRepository;

class TimelineController extends Controller
{
    //protected $tasks;
    protected $currentproject;
    protected $currentProjectId;
    protected $projects;
    protected $tasks;

    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');

        $this->tasks = $tasks;
    }

    public function index(Request $request)
    {
        $javatest = ['item1', 'item2', 'item3'];
 



        $currentProjectId = $request->project ?? '1';
        $currentproject = Project::where('id', $currentProjectId)->get();
        $projects = Project::all();
        $tasks = Task::with(['project','user'])->where('project_id', $currentProjectId)->get();
      //  $tasks = Task::with(['project','user'])->where('project_id', $currentProjectId)->get();

    	return view('pages.timeline', compact('projects', 'currentProjectId', 'currentproject', 'javatest', 'tasks'));
    }
}
 