<?php

namespace App\Repositories;

use App\Entities\Account\Account;
use App\Helpers\AccountFaker;

class FakeDataRepository extends Repository
{
    /**
     * Retrieve all Accounts
     *
     * @return iterable<Account>
     */
    public function all(): iterable
    {
        $count = rand(5, 15);
        $accounts = [];

        while ($count >= 0) {
            $accounts[] = AccountFaker::createAccount();
            $count--;
        }

        return $accounts;
    }
}