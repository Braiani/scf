<?php

namespace App\Models;

class EntryType extends BaseModel
{
    protected $fillable = ['title', 'description', 'active'];

    public function getIdFormattedAttribute()
    {
        return str_split($this->id, 8)[0];
    }
}
