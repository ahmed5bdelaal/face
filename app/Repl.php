<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repl extends Model
{
    //
    protected $fillable = [
    	'comment_id',
    	'name',
    	'reply',
    	'user_id'
	];
	protected $casts = [
        'user_id' => 'int',
        'comment_id'=>'int',
    ];
	public function comment()
    {
        return $this->belongsTo(comment::class);
	}
	
}