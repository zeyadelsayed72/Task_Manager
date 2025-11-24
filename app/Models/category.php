<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
     public function tasks()
    {
        return $this ->belongsToMany(Task::class,'category_task');
    }
}
