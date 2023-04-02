<?php

namespace App\Entities\Transaction;

class Transaction
{
    private string $comment;

    private int $amount;

    private string $due_date;

    public function __construct(string $comment, int $amount)
    {
        $this->comment = $comment;
        $this->amount = $amount;
        $this->due_date = (new \DateTime('now'))->format('Y-m-d H:i:s');
    }
}