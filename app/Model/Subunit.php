<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subunit extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'id',
        'title',
        'type_subunit_id'
    ];
}
