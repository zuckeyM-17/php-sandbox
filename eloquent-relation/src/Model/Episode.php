<?php
namespace App;

use \Illuminate\Database\Eloquent\Model;

/**
 * key
 * title
 * description
 * url
 * published_at
 */
class Episode extends Model
{
    public $timestamps = false;

    public function contents()
    {
        return $this->hasMany('App\Comment');
    }
}