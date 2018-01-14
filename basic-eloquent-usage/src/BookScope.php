<?php

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class BookScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('id', '>', 2);
    }
}