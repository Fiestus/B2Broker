<?php

namespace App\Services\Transaction;

abstract class TransactionService
{
    abstract public function performOperation();
}