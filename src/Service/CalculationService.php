<?php
declare(strict_types=1);

namespace App\Service;

use App\Dto\CalculationRequest;
use App\Enum\Operation;

class CalculationService
{
    public function calculate(CalculationRequest $request): float|string
    {
        $operand1 = $request->getOperand1();
        $operand2 = $request->getOperand2();
        $operation = Operation::from($request->getOperation());

        return match ($operation) {
            Operation::ADD => $operand1 + $operand2,
            Operation::SUBTRACT => $operand1 - $operand2,
            Operation::MULTIPLY => $operand1 * $operand2,
            Operation::DIVIDE => $operand2 != 0 ? $operand1 / $operand2 : 'Error: Division by zero',
        };
    }
}
