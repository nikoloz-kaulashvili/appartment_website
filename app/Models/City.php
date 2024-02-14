<?php

// app/Models/City.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name_ka','name_en'];

    public function districts()
    {
        return $this->hasMany(District::class);
    }

    public function appartment()
    {
        return $this->belongsTo(Appartment::class);
    }
}
