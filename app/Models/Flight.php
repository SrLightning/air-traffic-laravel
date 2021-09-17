<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $with = [
        'Flight_type'
    ];

    protected $fillable = [
        'description',
        'Flight_type_id',
        'size',
        'is_active',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public static $rules = [
        'description' => 'string|required|max:100',
        'Flight_type_id' => 'integer|required|exists:Flight_types,id',
        'size' => 'string|required|min:1',
        'is_active' => 'boolean|required',
        'created_at' => 'datetime|nullable',
        'updated_at' => 'datetime|nullable',
    ];

    public function Flight_type()
    {
        return $this->belongsTo(FlightType::class, 'Flight_type_id');
    }
}
