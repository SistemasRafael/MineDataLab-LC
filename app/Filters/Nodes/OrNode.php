<?php
namespace App\Filters\Nodes;

use App\Filters\Contracts\FilterNode;

class OrNode implements FilterNode
{
    public function __construct(private array $children) {}

    public function apply($query, string $field)
    {
        return $query->where(function ($q) use ($field) {
            foreach ($this->children as $child) {
                $q->orWhere(function ($sub) use ($child, $field) {
                    $child->apply($sub, $field);
                });
            }
        });
    }
}