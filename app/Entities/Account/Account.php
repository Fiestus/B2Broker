<?php

namespace App\Entities\Account;

use App\Entities\Transaction\Transaction;
use App\Helpers\Finance;

class Account
{
    private int $balance;

    private iterable $transctions;

    /**
     * Set account balance
     *
     * @param int $balance
     * @return void
     */
    public function setBalance(int $balance): void
    {
        $this->balance = $balance;
    }

    /**
     * Retrieve account balance
     *
     * @return int
     */
    public function getBalance(): int
    {
        return $this->balance;
    }

    /**
     * Add transaction
     *
     * @param Transaction $transaction
     * @return void
     */
    public function addTransaction(Transaction $transaction): void
    {
        // TODO: We should use Helper here
        $this->transctions[] = $transaction;
    }

    /**
     * Retrieve account transactions
     *
     * @return iterable<Transaction>
     */
    public function getTransactions(): iterable
    {
        return $this->transctions;
    }

    /**
     * Save Account to storage
     *
     * @return void
     */
    public function save(): void
    {
         // $this->balance = Finance::addCoins($this->balance);
    }
}