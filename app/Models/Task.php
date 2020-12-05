<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Relations\BelongsTo;

class Task extends Eloquent
{
    use HasFactory;

	protected $collection = 'tasks';
    

    protected $fillable = [
        'name', 'detail', 'done'
    ];

    //by default "done" is set to false
    protected $attributes = [
        'done' => 0,
     ];

     /**
     * The relationship to the owning user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
