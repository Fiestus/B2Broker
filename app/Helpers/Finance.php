<?php

namespace App\Helpers;

class Finance
{
    /**
     * Used when saving amounts to the storage
     *
     * @param float|int $amount
     * @return int
     */
    public static function addCoins(float|int $amount): int
    {
        return $amount * 100;
    }

    /**
     * Used when retrieving amounts from the storage
     *
     * @param float|int $amount
     * @return int
     */
    public static function substractCoins(float|int $amount): int
    {
        return $amount / 100;
    }
}