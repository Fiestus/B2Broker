<?php

namespace App\Entities\Transaction;

use App\Trates\MagicGet;

class Transaction
{
    use MagicGet;

    public const SORT_BY_COMMENT = 'comment';

    public const SORT_BY_DATE = 'dueDate';

    private string $comment;

    private float|int $amount;

    private string $due_date;

    public function __construct(string $comment, float|int $amount)
    {
        $this->comment = $comment;
        $this->amount = $amount;
        $this->due_date = (new \DateTime('now'))->format('Y-m-d H:i:s');
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function getDueDate(): string
    {
        return $this->due_date;
    }

    /**
     * @return float|int
     */
    public function getAmount(): float|int
    {
        return $this->amount;
    }
}