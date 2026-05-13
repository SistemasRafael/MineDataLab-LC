<?php
namespace App\Filters\Contracts;

interface FilterNode
{
    public function apply($query, string $field);
}