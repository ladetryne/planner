<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Task;
use App\Repositories\TaskRepository;

class TaskController extends Controller
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
        $tasks = Task::all();
        //dd($tasks);

        return view('tasks.index', compact('tasks'));
    }
    public function myindex(Request $request)
    {
        $tasks = $this->tasks->forUser($request->user());
        //dd($tasks);

        return view('tasks.mytasks', compact('tasks'));
    }
    public function newtask(Request $request)
    {
        $tasks = $this->tasks->forUser($request->user());
        //dd($tasks);

        return view('tasks.newtask', compact('tasks'));
    }







    /**
     *  lag ny oppgave
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        

        $this->validate($request, [
        'name' => 'required|max:255',
        'viktighet' => 'required|max:255',   // 'viktighet' => 'required|between:1,3'     
        'info' => 'required|max:255',   //  between:1,3 er for Integer
        ]);
      //   dd($request->viktighet);
        $request->user()->tasks()->create([
        'name' => $request->name,
        'viktighet' => $request->viktighet,
        'info' => $request->info,
        ]);


        return redirect('/tasks'); 
    }
        // prøv å finn ut av denne: Session::flash('flash_message', 'Task successfully added!');

    


    /**
     * Slett oppgave
     * @param  request  $request
     * @param  task  $task
     * @return response
     */
    public function destroy(Request $request, Task $task)
    {
     

        $task->delete();

        return redirect('/tasks');
    }


    /**
     * Rediger Oppgave
     * 
     * 
     * 
     */    
    public function edit(Task $task)
    {
      //  dd($request->kommentar);
        return view('task.edit', compact('task'));
    }
    


     /**
     * Lagre endringer
     * 
     *  
     * 
     */
    public function update(Request $request, Task $task)
    {
    //    dd($request->kommentar);
        $task->update([
            'name' => $request->name,
            'info' => $request->info,
            ]);
      //      dd($request->kommentar);
            return redirect('/tasks');
    }
     
    public function comments(Task $task)
    {
      //  dd($request->kommentar);
        return view('task.comments', compact('task'));
    }
 /*    
    public function update(Request $request, Task $task)
    {
     //  dd($request->kommentar);
        $this->authorize('edit', $task);
        $this->validate($request, [
            'kommentar' => 'required|max:255',
        ]);
        $task = Task::findOrFail($id); 
        $task->update([
            'kommentar' => $request->kommentar, 
        ]);
        return redirect('/tasks');
    }
   */ 
}
