<?php

namespace JoeCase\Exceptions;

use Exception;

class DuplicateAccountAdded extends Exception
{
    public function __construct(string $accountNumber)
    {
        parent::__construct(
            "Account with account number '$accountNumber' already exists in this bank",
        );
    }
}
