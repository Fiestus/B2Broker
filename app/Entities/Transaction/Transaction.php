<?php

namespace App\Entities\Transaction;

use App\Trates\MagicGet;

class Transaction
{
    use MagicGet;

    public const SORT_BY_COMMENT = 'comment';

    public const SORT_BY_DATE = 'dueDate';

    private string $comment;

    private int $amount;

    private string $due_date;

    public function __construct(string $comment, int $amount)
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
}