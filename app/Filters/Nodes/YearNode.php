<?php
namespace App\Filters\Nodes;

use App\Filters\Contracts\FilterNode;

class YearNode implements FilterNode
{
    public function __construct(private $year) {}

    public function apply($query, string $field)
    {
        return $query->whereYear($field, $this->year);
    }
}