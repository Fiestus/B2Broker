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
        $account->setBalance(Finance::addCoins(rand(0, 1500000)));

        return $account;
    }
}