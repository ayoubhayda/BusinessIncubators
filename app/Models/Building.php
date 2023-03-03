<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Building extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'name', 'address','phone', 'logo', 'city_id'
    ];

    public function city(){
        return $this->belongsTo(City::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
