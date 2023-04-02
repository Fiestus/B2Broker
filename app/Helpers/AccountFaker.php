<?php

namespace App\Helpers;

use App\Entities\Account\Account;

class AccountFaker
{
    /**
     * Create fake account
     *
     * @return Account
     */
    public static function createAccount(): Account
    {
        $account = new Account();
        $amount = rand(0, 1500000);
        $account->setBalance(Finance::addCoins($amount));

        return $account;
    }
}