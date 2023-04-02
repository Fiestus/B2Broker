<?php

namespace App\Services\Transaction;

use App\DTO\TransactionData;
use App\DTO\WithdrawalTransactionData;
use App\Entities\Account\Account;
use App\Exceptions\TransactionServiceException;
use App\Entities\Transaction\WithdrawalTransaction;

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

        if ($currentAmount >= $withdrawalAmount) {
            try {
                $amount = $currentAmount - $withdrawalAmount;
                $transaction = new WithdrawalTransaction($this->transactionData->comment, $withdrawalAmount);
                $this->account->addTransaction($transaction);
                $this->account->setBalance($amount);
                $this->account->save();
            } catch (\Throwable $exception) {
                $message = $exception->getMessage();
                throw new TransactionServiceException($message);
            }
        }
    }
}