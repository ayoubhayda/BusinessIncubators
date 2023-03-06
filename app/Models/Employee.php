<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'first_name', 'last_name','phone', 'email', 'biography','birth_date','cin','image','speciality','position_id','company_id'
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function position(){
        return $this->belongsTo(Position::class);
    }


}
