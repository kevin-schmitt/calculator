<?php

namespace App\Calculator;

use App\Model\CalculatorDTO;
use Exception;

class CalculatorService
{
    public function evaluate(CalculatorDTO $calculatorDto): ?int
    {
        $operator = $calculatorDto->operator;
        $val1 = $calculatorDto->firstValue;
        $val2 = $calculatorDto->secundValue;

        switch ($operator) {
            case '/':
                if (0 === $val2) {
                    return 0;
                }

                return $val1 / $val2;
            case '+':
                return $val1 + $val2;
            case '-':
                return $val1 - $val2;
            case '*':
                return $val1 - $val2;
            default:
                throw new Exception('This operation is not found', 404);
        }
    }
}
