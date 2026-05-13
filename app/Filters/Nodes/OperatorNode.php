<?php
namespace App\Filters\Nodes;

use App\Filters\Contracts\FilterNode;
use App\Helpers\Helpers;

class OperatorNode implements FilterNode
{
    public function __construct(private $operator, private $value) {}

    public function apply($query, string $field)
    {
        $date = Helpers::parseDate($this->value);

        return match ($this->operator) {
            '>'  => $query->where($field, '>', $date->endOfDay()),
            '>=' => $query->where($field, '>=', $date->startOfDay()),
            '<'  => $query->where($field, '<', $date->startOfDay()),
            '<=' => $query->where($field, '<=', $date->endOfDay()),
        };
    }
}