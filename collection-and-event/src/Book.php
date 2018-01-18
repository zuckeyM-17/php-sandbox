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
    }

    public function scopeRecent($query)
    {
        return $query->where('id', '>', 3);
    }

    public function scopeOfId($query, $id)
    {
        return $query->where('id', $id);
    }
}