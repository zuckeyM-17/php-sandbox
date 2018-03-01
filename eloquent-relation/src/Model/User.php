<?php

use \Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name',
        'screan_name',
        'created_at',
        'updated_at',
    ];
}