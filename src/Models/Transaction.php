<?php

namespace JoeCase\Models;

use JoeCase\Types\TransactionType;

final class Transaction
{
    public function __construct(
        public readonly TransactionType $type,
        public readonly int $amount,
    ) {
    }
}
