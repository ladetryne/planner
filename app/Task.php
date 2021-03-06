<?php

namespace App;

use App\User;
use App\Comment;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Auth;

class Task extends Model
{
    /**
     * mass assignable attributes
     * @var array
     */
    protected $fillable =   
        [
            'name',
            'viktighet',
            'info',
            'arbeidstimer',
            'milestone',
            'slutt_dato',
            'start_dato',
            'ferdig',
        ];
//    protected $fillable = ['viktighet'];    
    
    /**
     * attributes that should be cast to native types
     * @var array
     */
    protected $casts = [
        'user_id' => 'int',
        'project_id' => 'int',
    ];

    /**
     * Hent brukeren som eier oppgaven
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * hent frem alle oppgavene til brukeren
     * @param  User  $user
     * @return Collection
     */
/*    public function forUser(User $user)
    {
        return Task::where('user_id', $user->id)
                    ->orderBy('created_at', 'asc')
                    ->get();
    }

*/
}
