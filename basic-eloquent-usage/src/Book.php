<?php
require_once dirname(__FILE__).'/database.php';
use Illuminate\Database\Eloquent\Model;
class Book extends Model {}    protected static function boot()
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new BookScope);
    }