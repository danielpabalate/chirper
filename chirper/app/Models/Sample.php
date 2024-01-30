<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    use HasFactory;

    protected $fillable = [
        'number1',
        'number2',
        'solution',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    
}


