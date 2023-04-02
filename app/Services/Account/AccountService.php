<?php

namespace App\Services\Account;

use App\Entities\Account\Account;
use App\Repositories\Repository;

class AccountService
{
    /** @var Repository */
    private Repository $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Retrieve all Accounts
     *
     * @return iterable<Account>
     */
    public function getAllAccounts(): iterable
    {
        return $this->repository->all();
    }
}