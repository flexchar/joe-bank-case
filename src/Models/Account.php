<?php

namespace JoeCase\Models;

use JoeCase\Models\Transaction;
use JoeCase\Types\TransactionType;
use JoeCase\Foundation\AbstractAccount;

/**
 * Represents a bank account.
 *
 * A bank account has the following main features:
 *  - Must have a unique account_number
 *  - Knows its current balance
 *  - Keeps track of its transaction history (withdrawals and deposits)
 */
class Account extends AbstractAccount
{
    /** @var Transaction[] */
    public array $transactions = [];

    public function __construct(
        public readonly string $accountNumber,
        public int $balance,
    ) {
        // Optionally perform a check here to ensure that the account number is unique.
    }

    public function getCountOfWithdrawals(): int
    {
        $ofTypeWithdraw = array_filter(
            $this->transactions,
            fn(Transaction $t) => $t->type === TransactionType::WITHDRAW,
        );

        return count($ofTypeWithdraw);
    }

    public function getCountOfDeposits(): int
    {
        $ofTypeDeposit = array_filter(
            $this->transactions,
            fn(Transaction $t) => $t->type === TransactionType::DEPOSIT,
        );

        return count($ofTypeDeposit);
    }

    public function getBalance(): int
    {
        // Typically a database query would be done here summing up all transactions...
        // Possibly with caching but that is risky business in the context of a bank account.

        return $this->balance;
    }

    public function deposit(int $amount): void
    {
        $transaction = new Transaction(
            type: TransactionType::DEPOSIT,
            amount: $amount,
            timestamp_sec: time(),
        );

        $this->transactions[] = $transaction;
        $this->balance += $amount;
    }

    public function withdraw(int $amount): void
    {
        $transaction = new Transaction(
            type: TransactionType::WITHDRAW,
            amount: $amount,
            timestamp_sec: time(),
        );

        $this->transactions[] = $transaction;
        $this->balance -= $amount;
    }

    // This is a bad place for this method because it is not the responsibility of the Account to transfer money.
    protected function doInternalTransaction(
        Account $sourceAccount,
        Account $destinationAccount,
        int $amount,
    ): void {
        $sourceAccount->withdraw($amount);
        $destinationAccount->deposit($amount);
    }
}
