<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //

    protected $fillable = array(
        'name',
        'comment',
        'user_id',
        'task_id'
    );
    protected $casts = [
        'user_id' => 'int',
        'task_id'=>'int',
    ];
    public function replies(){
    	return $this->hasMany(Repl::class);
    }
    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}