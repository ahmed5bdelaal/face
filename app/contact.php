<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    protected $fillable = ['firstname' , 'subject','lastname','contact_id'];

    protected $casts = [
        'contact_id' => 'int',
     ];

}
