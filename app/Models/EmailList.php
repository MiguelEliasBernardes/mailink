<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailList extends Model
{
    protected $fillable = [
        'name'
    ];


    public function email_users()
    {
        return $this->hasMany(EmailUserList::class);
    }

}
