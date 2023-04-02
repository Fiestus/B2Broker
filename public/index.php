<?php

use App\Repositories\FakeDataRepository;
use App\Services\Account\AccountService;
use App\Services\Transaction\DepositTransactionService;
use App\Services\Transaction\WithdrawalTransactionService;
use App\Services\Transaction\TransferTransactionService;
use App\DTO\DepositTransactionData;
use App\DTO\WithdrawalTransactionData;
use App\DTO\TransferTransactionData;
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
$depositTransactionData = new DepositTransactionData('Savings', $amount);

$depositTransactionService = new DepositTransactionService($accounts[0], $depositTransactionData);
$depositTransactionService->performOperation();

var_dump($accounts[0]);

// Withdrawal from account balance
$amount = (new AmountWithCoints(120));
$withdrawalTransactionData = new WithdrawalTransactionData('Going to a restaurant', $amount);

$depositTransactionService = new WithdrawalTransactionService($accounts[0], $withdrawalTransactionData);
$depositTransactionService->performOperation();

var_dump($accounts[0]);

// Transfer account balance
$amount = (new AmountWithCoints(90.75));
$transferTransactionData = new TransferTransactionData('Loan to a friend', $amount);

$depositTransactionService = new TransferTransactionService($accounts[0], $accounts[1], $transferTransactionData);
$depositTransactionService->performOperation();

var_dump($accounts[0]);

/**
 * Get all account transactions
 * sorted by comment in alphabetical order
 */

