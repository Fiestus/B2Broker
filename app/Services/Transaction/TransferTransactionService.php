<?php

namespace App\Services\Transaction;

use App\DTO\TransactionData;
use App\DTO\TransferTransactionData;
use App\Entities\Account\Account;
use App\Entities\Transaction\TransferTransaction;
use App\Exceptions\TransactionServiceException;

class TransferTransactionService extends TransactionService
{
    private Account $sender;

    private Account $recipient;

    private TransactionData $transactionData;

    public function __construct(Account $sender, Account $recipient, TransferTransactionData $transactionData)
    {
        $this->sender = $sender;
        $this->recipient = $recipient;
        $this->transactionData = $transactionData;
    }

    public function performOperation()
    {
        $transferAmount = $this->transactionData->amount->getAmount();
        $senderBalance = $this->sender->getBalance();
        $recipientBalance = $this->recipient->getBalance();

        if ($senderBalance >= $transferAmount) {
            try {
                $transaction = new TransferTransaction($this->transactionData->comment, $transferAmount);
                $this->sender->addTransaction($transaction);
                $this->sender->setBalance($senderBalance - $transferAmount);

                $this->recipient->addTransaction($transaction);
                $this->recipient->setBalance($recipientBalance + $transferAmount);

                $this->sender->save();
                $this->recipient->save();
            } catch (\Throwable $exception) {
                $message = $exception->getMessage();
                throw new TransactionServiceException($message);
            }

        }
    }
}