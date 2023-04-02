<?php

namespace App\Services\Transaction;

use App\DTO\TransactionData;
use App\Entities\Account\Account;
use App\DTO\DepositTransactionData;

class DepositTransactionService extends TransactionService
{
    private Account $account;

    private TransactionData $transactionData;

    public function __construct(Account $account, DepositTransactionData $transactionData)
    {
        $this->account = $account;
        $this->transactionData = $transactionData;
    }

    public function performOperation()
    {
        var_dump($this->account->getBalance(), $this->transactionData->amount->getAmount());

        $amount = $this->account->getBalance() + $this->transactionData->amount->getAmount();
        // TODO: What about transaction?
        $this->account->setBalance($amount);
    }
}