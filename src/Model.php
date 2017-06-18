<?php

namespace Bilyiv\Restful;

use Bilyiv\Restful\Traits\Eloquent\{
    EmbedAttributes,
    FilterAttributes,
    SortAttributes
};
use Illuminate\Database\Eloquent\Model as BaseModel;

/**
 * Class Model
 *
 * @package Bilyiv\Restful
 * @author Vladyslav Bilyi <beliyvladislav@gmail.com>
 */
class Model extends BaseModel
{
    use FilterAttributes, SortAttributes, EmbedAttributes;
}