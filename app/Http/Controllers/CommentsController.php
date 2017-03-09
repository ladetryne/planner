<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Comment;



class CommentsController extends Controller
{


	public function store(Task $task)
    {
        

        Comment::create([
	    	'body' => request('body'),
	    	'task_id' => $task->id,
	    ]);
        return view('task.comments', compact('task'));
    }
/**
    public funtion store(Request $request, Task $task)
    {
    	Comment::create([
	    	'body' => request('body'),
	    	'task_id' => $task->id,
	    ]);
	    return view('task.comments', compact('task')); 
    }
*/
}
