<?php

namespace JoeCase\Interfaces;

interface AccountInterface
{
    public function deposit(int $amount): void;
    public function withdraw(int $amount): void;
    public function getBalance(): int;
    public function getAccountNumber(): string;
}
