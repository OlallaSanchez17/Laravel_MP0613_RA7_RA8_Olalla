<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;




    protected $fillable = [
        'name',
        'surname',
        'birthdate',
        'country',
        'agency',
        'img_url',
    ];

    /**
     * The films that belong to the actor.
     */
    public function films()
    {
        return $this->belongsToMany(Film::class);
    }
}

