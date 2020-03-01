<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function task()
    {
        return $this->belongsTo('App\Task');
    }
}

//Task.php
// <?php
// namespace App;
// use Illuminate\Database\Eloquent\Model;
// class Task extends Model
// {
//     public function comments()
//     {
//         return $this->hasMany('App\Comment');
//     }
// }
