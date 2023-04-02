<?php

namespace App\Repositories;

use App\Entities\Account\Account;
use App\Helpers\AccountFaker;
use App\Helpers\Finance;

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
            $account = AccountFaker::createAccount();

            $accounts[] = $this->prepareRetrievedAmount($account);
            $count--;
        }

        return $accounts;
    }

    /**
     * Remove coins from amount
     *
     * @param Account $account
     * @return Account
     */
    private function prepareRetrievedAmount(Account $account): Account
    {
        $balance = Finance::substractCoins($account->getBalance());
        $account->setBalance($balance);

        return $account;
    }
}