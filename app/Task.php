<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * mass assignable attributes
     * @var array
     */
    protected $fillable = ['name','viktighet','kommentar'];
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
