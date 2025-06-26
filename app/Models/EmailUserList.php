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

    public function scopeUsersByList($query, $id): mixed
    {
        return $query->where('email_list_id', $id);
    }

    public function scopeCustomersSearch($query, $search,$list_id)
    {
        return $query
        ->where('name', 'like', '%' . $search . '%')
        ->where('email_list_id', '=' , $list_id);
    }
}
