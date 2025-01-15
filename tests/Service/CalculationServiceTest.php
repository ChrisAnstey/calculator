<?php

namespace App\Tests\Service;

use App\Service\CalculationService;
use App\Dto\CalculationRequest;
use PHPUnit\Framework\TestCase;

class CalculationServiceTest extends TestCase
{
    private CalculationService $calculationService;

    protected function setUp(): void
    {
        $this->calculationService = new CalculationService();
    }

    /**
     * @dataProvider calculationProvider
     */
    public function testCalculations(float $operand1, float $operand2, string $operation, float|string $expected): void
    {
        $request = new CalculationRequest($operand1, $operand2, $operation);
        $result = $this->calculationService->calculate($request);
        $this->assertEquals($expected, $result);
    }

    /** @return array<string, array{float, float, string, float|string}> */
    public function calculationProvider(): array
    {
        return [
            'addition' => [5, 3, 'add', 8],
            'subtraction' => [5, 3, 'subtract', 2],
            'multiplication' => [5, 3, 'multiply', 15],
            'division' => [6, 3, 'divide', 2],
            'division by zero' => [6, 0, 'divide', 'Error: Division by zero'],
            'invalid operation' => [6, 3, 'invalid', 'Invalid operation'],
        ];
    }
}
