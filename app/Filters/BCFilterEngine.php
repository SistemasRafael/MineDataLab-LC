<?php
namespace App\Filters;

use App\Filters\Parser\BCFilterParser;

class BCFilterEngine
{
    public static function apply($query, string $field, string $filter)
    {
        $parser = new BCFilterParser();

        $node = $parser->parse($filter);

        return $node->apply($query, $field);
    }
}