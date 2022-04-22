<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'prefix',
    ];

    public function getRouteKeyName()
    {
        return 'token';
    }

    public function resources(){
        return $this->hasMany(Resource::class);
    }
}
