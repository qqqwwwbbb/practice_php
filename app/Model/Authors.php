<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_room extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'id',
        'book_id',
        'name',
        'surname'
    ];
}
