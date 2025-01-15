<?php
namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class CalculationRequest
{
    #[Assert\NotNull(message: 'Operand 1 cannot be null.')]
    #[Assert\Type(type: 'numeric', message: 'Operand 1 must be a number.')]
    private mixed $operand1;

    #[Assert\NotNull(message: 'Operand 2 cannot be null.')]
    #[Assert\Type(type: 'numeric', message: 'Operand 2 must be a number.')]
    private mixed $operand2;

    #[Assert\NotNull(message: 'Operation cannot be null.')]
    #[Assert\Choice(choices: ['add', 'subtract', 'multiply', 'divide'], message: 'Invalid operation.')]
    private ?string $operation;

    public function __construct(mixed $operand1, mixed $operand2, ?string $operation)
    {
        $this->operand1 = $operand1;
        $this->operand2 = $operand2;
        $this->operation = $operation;
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
