<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EmailList extends Model
{
    protected $fillable = [
        'name'
    ];


    public function email_users(): HasMany
    {
        return $this->hasMany(EmailUserList::class, 'email_list_id');
    }

}
