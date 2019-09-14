<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login','LoginController@login');
Route::group(['middleware' =>[ 'cors','jwt.auth']], function() { 
     //User
    Route::post('add_user','UsersController@store');
    Route::get('get_members/{id}','UsersController@index');
    Route::get('get_member/{id}','UsersController@show');
	//Ledger
	Route::post('add_ledger','LedgerController@store');
	//Shares
	Route::post('buy_share','SharesController@store');
	Route::get('get_shares','SharesController@index');
	//Loans
	Route::post('grant_loan','LoansController@store');
	Route::get('get_member_loan','LoansController@index');
	Route::get('get_member_loan_installments','LoansController@getLoanInstallments');
	//Groups
	Route::post('add_group','GroupController@store');
	Route::get('get_groups/{id}','GroupController@index');
	Route::get('get_member_loan_installments','LoansController@getLoanInstallments');
	//Heir
	Route::post('add_heir','HeirController@store');

});






