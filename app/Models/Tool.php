<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    protected $fillable = [
        'tool_name',
        'category',
        'image',
        'quantity',
    ];

    public function issues()
    {
        return $this->hasMany(ToolIssue::class);
    }
}