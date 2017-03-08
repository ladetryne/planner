<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use app\Task;

class Comment extends Model
{
	    protected $fillable = ['body'];

		public function task()
		{
			return $this->belongsto(Task::class);
		}	

}

