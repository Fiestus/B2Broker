<?php

namespace App\Services\Transaction;

use App\DTO\TransactionData;
use App\DTO\TransferTransactionData;
use App\Entities\Account\Account;

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

        // TODO: Maybe Exception?
        if ($senderBalance >= $transferAmount) {
            $this->sender->setBalance($senderBalance - $transferAmount);
            $this->recipient->setBalance($recipientBalance + $transferAmount);
            // TODO: What about transaction?
        }
    }
}