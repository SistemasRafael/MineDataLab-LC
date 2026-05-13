<?php
namespace App\Filters\Nodes;

use App\Filters\Contracts\FilterNode;
use App\Helpers\Helpers;

class MonthNode implements FilterNode
{
    public function __construct(private $value) {}

    public function apply($query, string $field)
    {
        $start = Helpers::parseDate($this->value)->startOfMonth();
        $end = $start->copy()->endOfMonth();

        return $query->whereBetween($field, [$start, $end]);
    }
}