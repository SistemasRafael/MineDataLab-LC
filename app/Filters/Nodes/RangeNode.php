<?php
namespace App\Filters\Nodes;

use App\Filters\Contracts\FilterNode;
use App\Helpers\Helpers;

class RangeNode implements FilterNode
{
    public function __construct(private $start, private $end) {}

    public function apply($query, string $field)
    {
        $start = $this->start
            ? Helpers::parseDate($this->start)->startOfDay()
            : null;

        $end = $this->end
            ? Helpers::parseDate($this->end)->endOfDay()
            : null;

        if ($start && $end) {
            return $query->whereBetween($field, [$start, $end]);
        }

        if ($start) {
            return $query->where($field, '>=', $start);
        }

        if ($end) {
            return $query->where($field, '<=', $end);
        }

        return $query;
    }
}