<?php

namespace JoeCase\Foundation;

use JoeCase\Models\Account;
use JoeCase\Interfaces\AccountInterface;

abstract class AbstractAccount implements AccountInterface
{
    /**
     * @deprecated Lukas on 2024-05-07: I deprecated this method since I believe this is not the right place.
     * If this remains unused for a while, this will be removed.
     */
    abstract protected function doInternalTransaction(
        Account $sourceAccount,
        Account $destinationAccount,
        int $amount,
    ): void;
}
