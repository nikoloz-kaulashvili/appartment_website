<?php

// app/Models/District.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = ['name_ka', 'name_ge', 'city_id'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}

