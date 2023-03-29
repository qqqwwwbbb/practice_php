<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class NumberValidator extends AbstractValidator
{
    protected string $message = 'Только цифры!';

    public function rule(): bool
    {
        return is_numeric($this->value);
    }
}