<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rentdetail extends Model {
    use HasFactory;

    protected $fillable = [
        'rentDate',
        'expirationDate',
        'renovationDate',
        'book',
        'user',
        'active'
    ];

    public function user() {
        return  $this->belongsTo(User::class, 'user', 'uniqueCode');
    }

    public function books() {
        return $this->belongsTo(Book::class, 'book', 'id');
    }
}
