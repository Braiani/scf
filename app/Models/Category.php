<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends BaseModel
{
    protected $fillable = ['title', 'description', 'active', 'entry'];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function getIdFormattedAttribute()
    {
        return str_split($this->id, 8)[0];
    }

    public function getActiveColorAttribute()
    {
        return $this->active ? 'text-green-500 bg-green-100' : 'text-red-600 bg-red-100';
    }

    public function getEntryColorAttribute()
    {
        return $this->entry === 'revenue' ? 'text-green-500' : 'text-red-500';
    }
}
