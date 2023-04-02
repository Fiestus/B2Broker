<?php

namespace App\DataTypes;

use App\Helpers\Finance;

class AmountWithCoints
{
    private int $amount;

    public function __construct(float $amount)
    {
        $this->setAmount($amount);
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return void
     */
    private function setAmount(float $amount): void
    {
        $this->amount = Finance::addCoins($amount);
    }
}