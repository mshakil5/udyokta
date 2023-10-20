<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ExpenseTypeController;
use App\Http\Controllers\Admin\TransactionMethodController;
use App\Http\Controllers\Admin\ExpenseController;
use App\Http\Controllers\Admin\IncomeTypeController;
use App\Http\Controllers\Admin\IncomeController;
use App\Http\Controllers\Admin\ChartOfAccountController;
use App\Http\Controllers\Admin\VoucherController;


/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::group(['prefix' =>'admin/', 'middleware' => ['auth', 'is_admin']], function(){
  
    Route::get('/dashboard', [HomeController::class, 'adminHome'])->name('admin.dashboard');
    //profile
    Route::get('/profile', [AdminController::class, 'profile'])->name('profile');
    Route::put('profile/{id}', [AdminController::class, 'adminProfileUpdate']);
    Route::post('changepassword', [AdminController::class, 'changeAdminPassword']);
    Route::put('image/{id}', [AdminController::class, 'adminImageUpload']);
    //profile end
    
    Route::get('/new-admin', [AdminController::class, 'getAdmin'])->name('alladmin');
    Route::post('/new-admin', [AdminController::class, 'adminStore']);
    Route::get('/new-admin/{id}/edit', [AdminController::class, 'adminEdit']);
    Route::post('/new-admin-update', [AdminController::class, 'adminUpdate']);
    Route::get('/new-admin/{id}', [AdminController::class, 'adminDelete']);

    
    Route::get('/expense-type', [ExpenseTypeController::class, 'index'])->name('admin.expenseType');
    Route::post('/expense-type', [ExpenseTypeController::class, 'store']);
    Route::get('/expense-type/{id}/edit', [ExpenseTypeController::class, 'edit']);
    Route::post('/expense-type-update', [ExpenseTypeController::class, 'update']);
    Route::get('/expense-type/{id}', [ExpenseTypeController::class, 'delete']);
    
    Route::get('/expense', [ExpenseController::class, 'index'])->name('admin.expense');
    Route::post('/expense', [ExpenseController::class, 'store']);
    Route::get('/expense/{id}/edit', [ExpenseController::class, 'edit']);
    Route::post('/expense-update', [ExpenseController::class, 'update']);
    Route::get('/expense/{id}', [ExpenseController::class, 'delete']);
    
    Route::get('/transaction-method', [TransactionMethodController::class, 'index'])->name('admin.transactionMethod');
    Route::post('/transaction-method', [TransactionMethodController::class, 'store']);
    Route::get('/transaction-method/{id}/edit', [TransactionMethodController::class, 'edit']);
    Route::post('/transaction-method-update', [TransactionMethodController::class, 'update']);
    Route::get('/transaction-method/{id}', [TransactionMethodController::class, 'delete']);

    
    Route::get('/income-type', [IncomeTypeController::class, 'index'])->name('admin.incomeType');
    Route::post('/income-type', [IncomeTypeController::class, 'store']);
    Route::get('/income-type/{id}/edit', [IncomeTypeController::class, 'edit']);
    Route::post('/income-type-update', [IncomeTypeController::class, 'update']);
    Route::get('/income-type/{id}', [IncomeTypeController::class, 'delete']);
    
    Route::get('/income', [IncomeController::class, 'index'])->name('admin.income');
    Route::post('/income', [IncomeController::class, 'store']);
    Route::get('/income/{id}/edit', [IncomeController::class, 'edit']);
    Route::post('/income-update', [IncomeController::class, 'update']);
    Route::get('/income/{id}', [IncomeController::class, 'delete']);


    Route::get('/chart-of-account', [ChartOfAccountController::class, 'index'])->name('admin.coa');
    Route::post('/chart-of-account', [ChartOfAccountController::class, 'store']);
    Route::get('/chart-of-account/{id}/edit', [ChartOfAccountController::class, 'edit']);
    Route::post('/chart-of-account-update', [ChartOfAccountController::class, 'update']);
    Route::get('/chart-of-account/{id}', [ChartOfAccountController::class, 'delete']);


    Route::get('/debit-voucher', [VoucherController::class, 'debitVoucher'])->name('admin.debitVoucher');
    Route::post('/debit-voucher', [VoucherController::class, 'debitVoucherstore']);
    Route::get('/debit-voucher/{id}/edit', [VoucherController::class, 'debitVoucheredit']);
    Route::post('/debit-voucher-update', [VoucherController::class, 'debitVoucherupdate']);
    Route::get('/debit-voucher/{id}', [VoucherController::class, 'debitVoucherdelete']);

    Route::get('/credit-voucher', [VoucherController::class, 'creditVoucher'])->name('admin.creditVoucher');
    Route::post('/credit-voucher', [VoucherController::class, 'creditVoucherstore']);
    Route::get('/credit-voucher/{id}/edit', [VoucherController::class, 'creditVoucheredit']);
    Route::post('/credit-voucher-update', [VoucherController::class, 'creditVoucherupdate']);
    Route::get('/credit-voucher/{id}', [VoucherController::class, 'creditVoucherdelete']);

});
  