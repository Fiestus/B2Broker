<?php

namespace App\Entities\Account;

class Account
{
    private int $balance;

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
}