<?php

namespace Bilyiv\Restful\Traits\Eloquent;

use Illuminate\Database\Eloquent\Builder;

/**
 * Class EmbedAttributes
 *
 * @package Bilyiv\Restful\Traits\Eloquent
 * @author Vladyslav Bilyi <beliyvladislav@gmail.com>
 */
trait EmbedAttributes
{
    /**
     * The attributes that are embeddable.
     *
     * @var array
     */
    protected $embeddable = [];

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