<?php

namespace App\DTO;

use App\DataTypes\AmountWithCoints;

class TransactionData extends BaseData
{
    /**
     * @var string
     */
    public string $comment;

    /**
     * @var AmountWithCoints
     */
    public AmountWithCoints $amount;

    /**
     * @var string
     */
    public string $due_date;

    public function __construct(string $comment, AmountWithCoints $amount, string $due_date)
    {
        $this->comment = $comment;
        $this->amount = $amount;
        $this->due_date = $due_date;
    }
}