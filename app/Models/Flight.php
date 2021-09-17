<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $with = [
        'flight_type'
    ];

    protected $fillable = [
        'description',
        'flight_type_id',
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
        'flight_type_id' => 'integer|required|exists:flight_types,id',
        'size' => 'string|required|min:1',
        'is_active' => 'boolean|required',
        'created_at' => 'datetime|nullable',
        'updated_at' => 'datetime|nullable',
    ];

    public function flight_type()
    {
        return $this->belongsTo(FlightType::class, 'flight_type_id');
    }
}
