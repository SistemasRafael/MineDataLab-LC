<?php
namespace App\Filters\Parser;

use App\Filters\Nodes\{
    AndNode, OrNode, RangeNode, OperatorNode,
    ExactNode, MonthNode, YearNode, NotEqualNode
};

class BCFilterParser
{
    public function parse(string $input)
    {
        // OR
        if (str_contains($input, '|')) {
            return new OrNode(
                array_map(fn($p) => $this->parse(trim($p)), explode('|', $input))
            );
        }

        // AND
        if (str_contains($input, '&')) {
            return new AndNode(
                array_map(fn($p) => $this->parse(trim($p)), explode('&', $input))
            );
        }

        // RANGE
        if (str_contains($input, '..')) {
            [$start, $end] = explode('..', $input);
            return new RangeNode(trim($start), trim($end));
        }

        // OPERADORES
        if (preg_match('/^(>=|<=|>|<|<>)(.+)$/', $input, $m)) {
            if ($m[1] === '<>') {
                return new NotEqualNode(trim($m[2]));
            }

            return new OperatorNode($m[1], trim($m[2]));
        }

        // MES
        if (preg_match('/^\d{2}\/\d{2}$/', $input)) {
            return new MonthNode($input);
        }

        // AÑO
        if (preg_match('/^\d{4}$/', $input)) {
            return new YearNode($input);
        }

        // EXACTO
        return new ExactNode($input);
    }
}