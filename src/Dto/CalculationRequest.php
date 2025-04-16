<?php

declare(strict_types=1);

namespace App\Dto;

class CalculationRequest
{
    public function __construct(private float $operand1, private float $operand2, private string $operation)
    {
    }

    public function getOperand1(): mixed
    {
        return $this->operand1;
    }

    public function setOperand1(mixed $operand1): self
    {
        $this->operand1 = $operand1;

        return $this;
    }

    public function getOperand2(): mixed
    {
        return $this->operand2;
    }

    public function setOperand2(mixed $operand2): self
    {
        $this->operand2 = $operand2;

        return $this;
    }

    public function getOperation(): ?string
    {
        return $this->operation;
    }

    public function setOperation(?string $operation): self
    {
        $this->operation = $operation;

        return $this;
    }
}
