<?php

use App\Repositories\FakeDataRepository;
use App\Services\Account\AccountService;
use App\Services\Transaction\DepositTransactionService;
use App\DTO\DepositTransactionData;
use App\DataTypes\AmountWithCoints;

require __DIR__.'/../vendor/autoload.php';

/**
 * Create Account Service
 */
$accountService = new AccountService(new FakeDataRepository());

/**
 * Get all accounts in the system
 */
$accounts = $accountService->getAllAccounts();

/**
 * Get the balance of a specific account
 */
$accountBalance = $accounts[0]->getBalance();

/**
 * Perform an operation
 */

echo '<pre>';
var_dump($accounts[0]);

// Refill account balance
$amount = (new AmountWithCoints(200.75));
$depositTransactionData = new DepositTransactionData('For me', $amount, '31.03.2023 18:03');

$depositTransactionService = new DepositTransactionService($accounts[0], $depositTransactionData);
$depositTransactionService->performOperation();

//echo '<pre>';
var_dump($accounts[0]);
//print_r($accountBalance);
//print_r($accounts);