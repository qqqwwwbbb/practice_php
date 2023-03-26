<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'id',
        'surname',
        'name',
        'last_name',
        'date_of_Birth',
        'subunit_id',
        'room_id'
    ];
}