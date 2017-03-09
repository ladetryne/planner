<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use app\Task;

class Comment extends Model
{
	    protected $fillable = ['body', 'task_id'];

	/**    protected $casts = [
	    	'task_id' => 'int',
	    ];

	*/
		public function task()
		{
			return $this->belongsto(Task::class);
		}	

}

