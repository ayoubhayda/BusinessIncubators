<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Office extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'is_rented',
        'floor_id'
    ];

    public function floor()
    {
        return $this->belongsTo(Floor::class);
    }
    public function companies()
    {
        return $this->hasMany(Company::class);
    }



}
