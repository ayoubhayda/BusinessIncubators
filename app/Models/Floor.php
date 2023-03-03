<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Floor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'order',
        'building_id'
    ];

    public function building()
    {
        return $this->belongsTo(Building::class);
    }
    public function offices()
    {
        return $this->hasMany(Office::class);
    }

}
