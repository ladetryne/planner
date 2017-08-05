<?php

namespace App;

use App\User;
use App\Comment;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * mass assignable attributes
     * @var array
     */
    protected $fillable = ['name','viktighet','info','arbeidstimer','slutt_dato','start_dato'];
//    protected $fillable = ['viktighet'];    
    
    /**
     * attributes that should be cast to native types
     * @var array
     */
    protected $casts = [
        'user_id' => 'int',
    ];

    /**
     * Hent brukeren som eier oppgaven
     */
    public function user()
    {
        return $this->belongsTo(User::class);
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
