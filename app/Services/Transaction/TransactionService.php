<?php

namespace App\Services\Transaction;

abstract class TransactionService
{
    /**
     * @return mixed
     */
    abstract public function performOperation();
}