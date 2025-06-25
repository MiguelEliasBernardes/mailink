<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailUserList extends Model
{
    protected $fillable = [
        'name',
        'email',
        'email_list_id'
    ];


}
