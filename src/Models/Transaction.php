<?php

namespace JoeCase\Models;

use JoeCase\Types\TransactionType;

/**
 * Represents a bank transaction.
 *
 * Having a dedicated class allows strict types and validation to be enforced.
 */
final class Transaction
{
    public function __construct(
        public readonly TransactionType $type,
        public readonly int $amount,
        public readonly int $timestamp_sec,
    ) {
    }
}
