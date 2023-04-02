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

    public function __construct(string $comment, AmountWithCoints $amount)
    {
        $this->comment = $comment;
        $this->amount = $amount;
    }
}