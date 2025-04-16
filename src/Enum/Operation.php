<?php

declare(strict_types=1);

namespace App\Enum;

/**
 * Represents the available operations to be performed in a calculation.
 */
enum Operation: string
{
    case ADD      = 'add';
    case SUBTRACT = 'subtract';
    case MULTIPLY = 'multiply';
    case DIVIDE   = 'divide';
}
