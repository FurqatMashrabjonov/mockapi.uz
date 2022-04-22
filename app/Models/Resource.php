<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    public function many_data()
    {
        return $this->hasMany(Data::class);
    }

    public function one_data()
    {
        return $this->hasOne(Data::class);
    }

}

