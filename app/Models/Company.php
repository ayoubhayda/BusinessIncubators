<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasSlug;

    protected $fillable = [
        'name',
        'stage',
        'type',
        'logo',	
        'meta_description',	
        'description',	
        'founded_at',	
        'slogan',	
        'address',	
        'email',	
        'phone',	
        'website',	
        'facebook',	
        'instagram',	
        'linkedin',	
        'youtube',	
        'twitter',
        'video',	
        'visibility',	
        'office_id',
    ];


    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function office(){
        return $this->belongsTo(Office::class);
    }
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function domains()
    {
        return $this->belongsToMany(Domain::class);
    }
}
