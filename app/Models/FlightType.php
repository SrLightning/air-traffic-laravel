<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightType extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'is_active',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public static $rules = [
        'description' => 'string|required|max:30',
        'is_active' => 'boolean|required',
        'created_at' => 'datetime|nullable',
        'updated_at' => 'datetime|nullable',
    ];
    
}
