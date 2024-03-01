<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    // Define the table name for the model
    protected $table = 'items';

    // Define the fillable fields for the model
    protected $fillable = [
        'name',
        'price',
        // Add any other fields that you want to be mass-assignable
    ];
}
