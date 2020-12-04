<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Task extends Eloquent
{
    use HasFactory;

	protected $collection = 'tasks';
    

    protected $fillable = [
        'name', 'detail', 'done'
    ];

    protected $attributes = [
        'done' => 0,
     ];
}
