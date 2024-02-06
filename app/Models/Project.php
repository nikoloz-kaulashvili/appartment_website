<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'developer_id',
        'name_ge',
        'name_en',
        'address_ka',
        'address_en',
        'description_ka',
        'description_en',
        'image',
    ];
}
