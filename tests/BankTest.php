<?php

namespace Tests;

use JoeCase\Models\Bank;
use JoeCase\Models\Account;
use PHPUnit\Framework\TestCase;

class BankTest extends TestCase
{
    public function getBankAccount(): Bank
    {
        $name = 'JOE & THE BANK';
        $address = "Joe Street,\nCopenhagen";

        $bank = new Bank(name: $name, address: $address);

        return $bank;
    }

    public function test_bank_can_print_postal_address(): void
    {
        $bank = $this->getBankAccount();

        $postalAddress = $bank->getPostalAddress();

        $this->assertEquals(
            "JOE & THE BANK\nJoe Street,\nCopenhagen",
            $postalAddress,
        );
    }

    public function test_bank_can_add_accounts(): void
    {
        $bank = $this->getBankAccount();

        $first_account_number = 'ab01';
        $first_account = new Account(
            accountNumber: $first_account_number,
            balance: 0,
        );

        $second_account_number = 'qj42';
        $second_account = new Account(
            accountNumber: $second_account_number,
            balance: 0,
        );

        $bank->addBankAccount($first_account);
        $bank->addBankAccount($second_account);

        $this->assertCount(2, $bank->getAccounts());
    }


    public function test_bank_can_transfer_money(): void
    {
        $bank = $this->getBankAccount();

        $first_account_number = 'ab01';
        $firstAccount = new Account(
            accountNumber: $first_account_number,
            balance: 150,
        );

        $second_account_number = 'qj42';
        $secondAccount = new Account(
            accountNumber: $second_account_number,
            balance: 0,
        );

        $bank->addBankAccount($firstAccount);
        $bank->addBankAccount($secondAccount);

        $bank->transferMoney(
            sourceAccount: $firstAccount,
            destinationAccount: $secondAccount,
            amount: 100,
        );

        $this->assertEquals(1, $firstAccount->getCountOfWithdrawals());
        $this->assertEquals(50, $firstAccount->getBalance());

        $this->assertEquals(1, $secondAccount->getCountOfDeposits());
        $this->assertEquals(100, $secondAccount->getBalance());
    }
}
