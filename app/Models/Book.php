<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = "books";
    protected $primaryKey = "id";

    protected $fillable = [
        'name', 
        'description',
        'category',
        'price',
        'quantity',
        'imageUrl'
    ];

    protected $hidden = [
        'imageUrl'
    ];
}
