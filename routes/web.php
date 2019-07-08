<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', function () {
    return view('users.login');
});
/*Auth::routes(); */

Route::get('/home', 'HomeController@index')->name('home');
//login/out
Route::get('/login', 'Users\LoginController@create'); 
Route::post('/login', 'Users\LoginController@store'); 
Route::get('/logout', 'Users\LoginController@destroy'); 

Route::get('/company', 'CompanyController@create'); //register
Route::post('/company', 'CompanyController@store'); //save
Route::get('/company/list', 'CompanyController@index'); //save
Route::post('/branch', 'BranchController@store'); //save
Route::get('/branch', 'BranchController@create'); //register
Route::get('/branches/list', 'BranchController@index'); //save

Route::get('dashboard', 'DashboardController@index');

//users
Route::get('users/register', 'Users\RegisterUserController@create'); //register
Route::post('users', 'Users\RegisterUserController@store'); //save	
Route::get('users/list', 'Users\RegisterUserController@index'); //all	
                                                          //
//customers
Route::get('customers/register', 'CustomerController@create'); //register
Route::post('customers', 'CustomerController@store'); //save	
Route::get('customers/list', 'CustomerController@index'); //all	
Route::get('customers/importation', 'CustomerController@importCustomersForm'); //import	
Route::post('customers/importation', 'CustomerController@import'); //import	
Route::get('customers/{customer}', 'CustomerController@show');// find specific	
Route::get('customers/{id}/edit', 'CustomerController@edit');//edit	
Route::patch('customers/{id}/edit', 'CustomerController@update');//edit	
Route::delete('customers/{id}/delete', 'CustomerController@destroy');//delete	
//Route::get('customers/newpage', 'Customers\CustomersController@newlayout');	
 	 
 //loan product routes	 //loan product routes\
Route::get('loan-product', 'LoanProductsController@create');
Route::post('loan-product', 'LoanProductsController@store');
Route::get('loan-products/list', 'LoanProductsController@index');
 //Loans
 //Route::get('loan-applications/register', 'LoansApplicationController@create');
Route::get('loan-application', 'LoanApplicationController@create');
Route::get('loan-applications/{customer}/apply',
	 'LoanApplicationController@create');
Route::get('loan-application/list', 'LoanApplicationController@index');
Route::post('loan-application', 'LoanApplicationController@store');
//Route::get(loan-applications/{id}', 'LoansApplicationController@show');
Route::get('loan-applications/{id}/approve', 'LoansApplicationController@loan_approval');
Route::get('loan-applications/{id}/disburse', 'LoansApplicationController@loan_disbursement');
Route::get('loan-applications/{id}/pay', 'LoanApplicationController@loan_payment');
Route::get('loan-applications/{id}/reject', 'LoanApplicationController@reject_loan_application');
Route::get('loan-applications/{id}/edit', 'LoanApplicationController@edit');
Route::post('loan-actions/{id}/approve', 'LoanActionController@approval');
Route::get('loan/{loan}/schedule', 'LoanApplicationController@schedule');
Route::get('loan-appraisal', 'LoanAppraisalController@index');
Route::get('loan-approval', 'LoanApprovalController@index');
Route::get('loan-disbursement', 'LoanDisbursementController@index');
Route::post('/loan/{loan}/approval','LoanApprovalController@store');
Route::get('/loan/{loan}/approve','LoanApprovalController@create');
Route::get('/loan/{loan}/appraise','LoanAppraisalController@create');
Route::post('/loan/{loan}/appraisal','LoanAppraisalController@store');
Route::get('/loan/{loan}/disburse','LoanDisbursementController@create');
Route::post('/loan/{loan}/disbursement','LoanDisbursementController@store');
Route::get('loans/importation', 'LoanDisbursementController@importLoansForm'); //import	
Route::post('loans/importation', 'LoanDisbursementController@import'); //import

Route::get('guarantor/{loan}/register', 'GuarantorsController@create'); //register
Route::post('guarantors', 'GuarantorsController@store'); //save	
Route::get('guarantors', 'GuarantorsController@index'); //all	
Route::get('guarantors/{id}', 'GuarantorsController@show');// find specific	
Route::get('guarantors/{id}/edit', 'GuarantorsController@edit');//edit	
Route::patch('guarantors/{id}/edit', 'GuarantorsController@update');//edit	
Route::delete('guarantors/{id}/delete', 'GuarantorsController@destroy');//delete

//Collaterals
Route::get('loan/{loan}/collaterals', 'CollateralsController@collaterals'); //register
Route::post('/loan/{loan}/collateral', 'CollateralsController@store'); //save	
Route::get('/loan/{loan}/add-collaterals', 'CollateralsController@create'); //all
//payments
Route::get('payments/{loan}/register', 'PaymentController@create');
Route::get('payments', 'PaymentController@index');
Route::get('loan/{loan}/payment', 'PaymentController@createManualPayment');
Route::post('loan/payment', 'PaymentController@storeManualPayment');
Route::post('payments/{loan}/automatic', 'PaymentController@automaticPayments');
Route::get('payments/importation', 'PaymentController@importPaymentsForm');
Route::post('payments/importation', 'PaymentController@importPayments');

// loan reports
Route::get('/loan-application-report', 'LoanReportsController@loanApplicationReport');
Route::get('/loan-appraisal-report', 'LoanReportsController@loanAppraisalReport');
Route::get('/loan-approval-report', 'LoanReportsController@loanApprovalReport');
Route::get('/loan-disbursement-report', 'LoanReportsController@loanDisbursementReport');
// payment reports
Route::get('/payments-report', 'PaymentsReportController@index');
Route::get('/due-payments-report', 'PaymentsReportController@duePaymentsReport');
Route::get('/outstanding-balance-report', 'PaymentsReportController@outstandingBalanceReport');
Route::get('/arrears-report', 'PaymentsReportController@arrearsReport');
