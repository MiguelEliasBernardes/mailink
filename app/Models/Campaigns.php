<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Campaigns extends Model
{
    protected $fillable = ['name', 'subject','email_list_id','template_id'];

    public function emailList()
    {
        return $this->belongsTo(EmailList::class);
    }

    public function template()
    {
        return $this->belongsTo(Template::class);
    }



}
