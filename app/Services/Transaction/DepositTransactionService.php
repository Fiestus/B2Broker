<?php

namespace App\Services\Transaction;

use App\DTO\TransactionData;
use App\Entities\Account\Account;
use App\DTO\DepositTransactionData;
use App\Entities\Transaction\DepositTransaction;
use App\Exceptions\TransactionServiceException;

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
        $depositAmount = $this->transactionData->amount->getAmount();

        try {
            $amount = $this->account->getBalance() + $depositAmount;
            $transaction = new DepositTransaction($this->transactionData->comment, $depositAmount);
            $this->account->addTransaction($transaction);
            $this->account->setBalance($amount);
            $this->account->save();
        } catch (\Throwable $exception) {
            $message = $exception->getMessage();
            throw new TransactionServiceException($message);
        }
    }
}