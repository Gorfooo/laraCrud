<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class contact extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'photo_path',
        'observation',
        'name',
        'zip_code',
        'public_place',
        'number',
        'state',
        'city',
        'phone_number',
        'country',
        'complement'
    ];
}
