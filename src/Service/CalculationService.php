<?php
namespace App\Service;

use App\Dto\CalculationRequest;

class CalculationService
{
    public function calculate(CalculationRequest $request): float|string
    {
        $operand1 = $request->getOperand1();
        $operand2 = $request->getOperand2();
        $operation = $request->getOperation();

        return match ($operation) {
            'add' => $operand1 + $operand2,
            'subtract' => $operand1 - $operand2,
            'multiply' => $operand1 * $operand2,
            'divide' => $operand2 != 0 ? $operand1 / $operand2 : 'Error: Division by zero',
            default => 'Invalid operation',
        };
    }
}
