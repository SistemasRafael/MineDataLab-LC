<?php
namespace App\Filters\Nodes;

use App\Filters\Contracts\FilterNode;

class AndNode implements FilterNode
{
    public function __construct(private array $children) {}

    public function apply($query, string $field)
    {
        foreach ($this->children as $child) {
            $child->apply($query, $field);
        }

        return $query;
    }
}