<?php

namespace App\Services\Transaction;

use App\DTO\TransactionData;
use App\DTO\WithdrawalTransactionData;
use App\Entities\Account\Account;

class WithdrawalTransactionService extends TransactionService
{
    private Account $account;

    private TransactionData $transactionData;

    public function __construct(Account $account, WithdrawalTransactionData $transactionData)
    {
        $this->account = $account;
        $this->transactionData = $transactionData;
    }

    public function performOperation()
    {
        $currentAmount = $this->account->getBalance();
        $withdrawalAmount = $this->transactionData->amount->getAmount();

        // TODO: Maybe Exception?
        if ($currentAmount >= $withdrawalAmount) {
            $amount = $currentAmount - $withdrawalAmount;
            // TODO: What about transaction?
            $this->account->setBalance($amount);
        }
    }
}