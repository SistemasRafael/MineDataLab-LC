<?php
namespace App\Filters\Nodes;

use App\Filters\Contracts\FilterNode;
use App\Helpers\Helpers;

class NotEqualNode implements FilterNode
{
    public function __construct(private $value) {}

    public function apply($query, string $field)
    {
        $date = Helpers::parseDate($this->value);

        return $query->where(function ($q) use ($field, $date) {
            $q->where($field, '<', $date->startOfDay())
              ->orWhere($field, '>', $date->endOfDay());
        });
    }
}