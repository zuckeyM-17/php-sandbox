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

    public function episodeContents()
    {
        return $this->hasMany('App\EpisodeContent');
    }

    public function casts()
    {
        return $this->belongsToMany('App\Cast', 'episode_casts');
    }
}