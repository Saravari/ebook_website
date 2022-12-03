<?php

namespace App\EloquentFilters\Book;

use Fouladgar\EloquentBuilder\Support\Foundation\Contracts\Filter;
use Illuminate\Database\Eloquent\Builder;

class NameMoreThanFilter extends Filter
{
    /**
     * Apply the condition to the query.
     *
     * @param Builder $builder
     * @param mixed $value
     *
     * @return Builder
     */

    public function apply(Builder $builder, $value): Builder
    {
        return $builder->where('name', $value);
    }
}
