<?php

namespace Bilyiv\Restful\Traits\Eloquent;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class SortAttributes
 *
 * @package Bilyiv\Restful\Traits\Eloquent
 * @author Vladyslav Bilyi <beliyvladislav@gmail.com>
 */
trait SortAttributes
{
    /**
     * The attributes that are sortable.
     *
     * @var array
     */
    protected $sortable = [];

    /**
     * Scope a query to sort models.
     *
     * @param Builder $query
     * @param array $params
     * @return Builder
     */
    public function scopeSort($query, array $params): Builder
    {
        $sortAttributes = $this->sortableFromArray($params);

        foreach ($sortAttributes as $column => $direction) {
            $query->orderBy($column, $direction);
        }

        return $query;
    }

    /**
     * Get the sortable attributes of a given array.
     *
     * @param  array $attributes
     * @return array
     */
    protected function sortableFromArray(array $attributes)
    {
        return array_intersect_key($attributes, $this->sortable);
    }
}