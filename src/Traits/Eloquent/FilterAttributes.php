<?php

namespace Bilyiv\Restful\Traits\Eloquent;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class FilterAttributes
 *
 * @package Bilyiv\Restful\Traits\Eloquent
 * @author Vladyslav Bilyi <beliyvladislav@gmail.com>
 */
trait FilterAttributes
{
    /**
     * The attributes that are filterable.
     *
     * @var array
     */
    protected $filterable = [];

    /**
     * Scope a query to filter models.
     *
     * @param Builder $query
     * @param array $params
     * @return Builder
     */
    public function scopeFilter($query, array $params): Builder
    {
        $filterAttributes = $this->filterableFromArray($params);

        return $query->where($filterAttributes);
    }

    /**
     * Get the filterable attributes of a given array.
     *
     * @param  array $attributes
     * @return array
     */
    protected function filterableFromArray(array $attributes)
    {
        return array_intersect_key($attributes, array_flip($this->filterable));
    }
}