<?php

namespace App\DataTypes;

use App\Helpers\Finance;

class AmountWithoutCounts
{
    private float|int $amount;

    public function __construct(float $amount)
    {
        $this->setAmount($amount);
    }

    /**
     * @return float|int
     */
    public function getAmount(): float|int
    {
        return $this->amount;
    }

    /**
     * @param float|int $amount
     * @return void
     */
    private function setAmount(float|int $amount): void
    {
        $this->amount = Finance::substractCoins($amount);
    }
}