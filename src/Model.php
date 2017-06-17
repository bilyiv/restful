<?php

namespace Bilyiv\Restful;

use Illuminate\Database\Eloquent\{
    Builder,
    Model as BaseModel
};

/**
 * Class Model
 *
 * @package Bilyiv\Restful
 * @author Vladyslav Bilyi <beliyvladislav@gmail.com>
 */
class Model extends BaseModel
{
    /**
     * The attributes that are filterable.
     *
     * @var array
     */
    protected $filterable = [];

    /**
     * The attributes that are sortable.
     *
     * @var array
     */
    protected $sortable = [];

    /**
     * The attributes that are embeddable.
     *
     * @var array
     */
    protected $embeddable = [];

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
     * Scope a query to embed models.
     *
     * @param Builder $query
     * @param array $params
     * @return Builder
     */
    public function scopeEmbed($query, array $params): Builder
    {
        $embedAttributes = $this->embeddableFromArray($params);

        return $query->with($embedAttributes);
    }

    /**
     * Get the filterable attributes of a given array.
     *
     * @param  array $attributes
     * @return array
     */
    protected function filterableFromArray(array $attributes)
    {
        return array_intersect_key($attributes, $this->filterable);
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

    /**
     * Get the embeddable attributes of a given array.
     *
     * @param array $attributes
     * @return array
     */
    protected function embeddableFromArray(array $attributes)
    {
        return array_intersect($attributes, $this->embeddable);
    }
}