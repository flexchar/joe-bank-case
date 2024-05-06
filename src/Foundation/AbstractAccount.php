<?php

namespace JoeCase\Foundation;

use JoeCase\Models\Account;
use JoeCase\Interfaces\AccountInterface;

abstract class AbstractAccount implements AccountInterface
{
    abstract protected function doInternalTransaction(
        Account $sourceAccount,
        Account $destinationAccount,
        int $amount,
    );
}
