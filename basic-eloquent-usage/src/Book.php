<?php
require_once dirname(__FILE__).'/database.php';
require_once dirname(__FILE__).'/BookScope.php';

use Illuminate\Database\Eloquent\Model;
class Book extends Model {
    protected $fillable = [
        'isbn',
        'name',
        'author',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new BookScope);
