<?php

namespace Bilyiv\Restful;

use Bilyiv\Restful\Traits\Eloquent\{
    EmbedAttributes,
    FilterAttributes,
    SortAttributes
};
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model as BaseModel;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class Model
 *
 * @package Bilyiv\Restful
 * @author Vladyslav Bilyi <beliyvladislav@gmail.com>
 */
class Model extends BaseModel
{
    use FilterAttributes, SortAttributes, EmbedAttributes;

    /**
     * Number of items per page.
     *
     * @var int
     */
    protected $limit = 100;

    /**
     * Scope a query to paginate models both with with filter, sort and embed scopes.
     *
     * @param Builder $query
     * @param array $params
     * @return Paginator
     */
    public function scopePaginateWithParams($query, array $params)
    {
        return $query->scopes([
                'filter' => [
                    $params['filter'] ?? []
                ],
                'sort' => [
                    $params['sort'] ?? []
                ],
                'embed' => [
                    $params['embed'] ?? []
                ]
            ])
            ->simplePaginate($params['limit'] ?? $this->limit)
            ->appends($params);
    }
}