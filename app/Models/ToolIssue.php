<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToolIssue extends Model
{
    protected $fillable = [
        'user_id',
        'tool_id',
        'quantity',
        'issue_date',
        'return_date',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tool()
    {
        return $this->belongsTo(Tool::class);
    }
}