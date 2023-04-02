<?php

namespace App\Entities\Account;

use App\Entities\Transaction\Transaction;
use App\Helpers\Arr;
use App\Helpers\Finance;

class Account
{
    private float|int $balance;

    /**
     * @var array<mixed>
     */
    private array $transctions = [];

    /**
     * Set account balance
     *
     * @param float|int $balance
     * @return void
     */
    public function setBalance(float|int $balance): void
    {
        $this->balance = $balance;
    }

    /**
     * Retrieve account balance
     *
     * @return float|int
     */
    public function getBalance(): float|int
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
        $this->transctions[] = $transaction;
    }

    /**
     * Retrieve account transactions
     *
     * @return iterable<Transaction|mixed>
     */
    public function getTransactions(): iterable
    {
        return $this->transctions;
    }

    /**
     * Retrieve sorted account transactions
     *
     * @param string|null $sortedBy
     * @param bool $desc
     * @return iterable<Transaction|mixed>
     */
    public function getSortedTransactions(string $sortedBy = null, bool $desc = false): iterable
    {
        $transactions = $this->transctions;

        if ($sortedBy === Transaction::SORT_BY_COMMENT) {

            if ($desc) {
                $transactions = Arr::usortBinaryStringsDesc($transactions, $sortedBy);
            } else {
                $transactions = Arr::usortBinaryStringsAsc($transactions, $sortedBy);
            }
        }

        if ($sortedBy === Transaction::SORT_BY_DATE) {
            if ($desc) {
                $transactions = Arr::usortDateStringsDesc($transactions, $sortedBy);
            } else {
                $transactions = Arr::usortDateStringsAsc($transactions, $sortedBy);
            }
        }

        return $transactions;
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