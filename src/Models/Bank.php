<?php

namespace JoeCase\Models;

use JoeCase\Interfaces\BankInterface;
use JoeCase\Foundation\AbstractAccount;
use JoeCase\Exceptions\DuplicateAccountAdded;

/**
 * The Bank class represents a bank.
 *
 * This class has the following main features:
 *  - It can have zero or more bank accounts.
 *  - It must have an address.
 *  - It must have a name.
 *  - It can perform a money transfer between accounts in the bank.
 *  - It can return a "Postal Address" created from the name of the bank and the address.
 */
class Bank implements BankInterface
{
    /** @var AbstractAccount[] */
    public array $accounts = [];

    public function __construct(
        public readonly string $name,
        public readonly string $address,
    ) {
    }

    public function addBankAccount(AbstractAccount $account): void
    {
        // Validate that the account number is unique in the existing accounts
        $existingAccountNumbers = array_map(
            fn(AbstractAccount $account) => $account->getAccountNumber(),
            $this->accounts,
        );

        if (
            in_array(
                $account->getAccountNumber(),
                $existingAccountNumbers,
                true,
            )
        ) {
            throw new DuplicateAccountAdded($account->getAccountNumber());
        }

        $this->accounts[] = $account;
    }

    /** @return AbstractAccount[] */
    public function getAccounts(): array
    {
        return $this->accounts;
    }

    public function transferMoney(
        AbstractAccount $sourceAccount,
        AbstractAccount $destinationAccount,
        int $amount,
    ): void {
        // Typically a database transaction would be done here...

        // Can only transfer money between accounts in this bank
        if (!in_array($sourceAccount, $this->accounts, true)) {
            throw new \Exception('Source account is not in this bank');
        }

        if (!in_array($destinationAccount, $this->accounts, true)) {
            throw new \Exception('Destination account is not in this bank');
        }

        $sourceAccount->withdraw($amount);
        $destinationAccount->deposit($amount);
    }

    public function getPostalAddress(): string
    {
        return "{$this->name}\n{$this->address}";
    }
}
