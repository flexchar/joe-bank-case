<?php

namespace JoeCase\Interfaces;

use JoeCase\Foundation\AbstractAccount;

interface BankInterface
{
    public function transferMoney(
        AbstractAccount $sourceAccount,
        AbstractAccount $destinationAccount,
        int $amount,
    ): void;

    public function getPostalAddress(): string;
}
