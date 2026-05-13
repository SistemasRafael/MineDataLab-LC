<?php
namespace App\Filters\Nodes;

use App\Filters\Contracts\FilterNode;
use App\Helpers\Helpers;

class ExactNode implements FilterNode
{
    public function __construct(private $value) {}

    public function apply($query, string $field)
    {
        $date = Helpers::parseDate($this->value);

        return $query->whereBetween($field, [
            $date->startOfDay(),
            $date->endOfDay()
        ]);
    }
}
