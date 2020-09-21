<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Routes for Traders-income-fund project


Route::get('/', function () {
    return view('index');
});

//custom logout method
Route::get('logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

//Authentication routes
Auth::routes();

//dashobard route
Route::get('/dashboard/home', 'HomeController@index')->name('home');


//site routes
Route::group(['prefix' => 'traders-Income'], function () {
    Route::get('/contact-us', 'PagesController@contact')->name('contact');
    Route::get('/about-us', 'PagesController@about')->name('about');
    Route::get('/support', 'PagesController@support')->name('support');
    Route::post('contact-message', 'PagesController@sendContactMessage')->name('sendContactMessage');
});

Route::post('/veriy/activate-account', 'PagesController@verifyPayment')->name('verifyUser');

//users notifications route
Route::get('/my-notifications', 'PagesController@notifications')->name('notifications');




//Admin Routes
Route::group(['prefix' => 'admin', 'middleware' =>
'admin'], function () {


    //admin dashboard route
    Route::get('/', 'AdminController@admin')->name('admin')->middleware('admin');

    //approving and declining of activation payments
    Route::get('proofs/show/{id}', 'AdminController@showProof')->name('showProof');
    Route::get('proofs/approve/{id}', 'AdminController@approveProof')->name('approve');
    Route::get('proofs/decline/{id}', 'AdminController@declineProof')->name('decline');

    //admin referrals
    Route::get('/downlines', 'AdminController@downlines')->name('adminDownlines');

    //route to add admin bank details
    // Route::get('/admin/create-bank-account', 'AdminController@createBankDetails')->name('addAdminBankDetails');
    Route::post('/make-admin/{id}', 'AdminController@makeAdmin')->name('makeAdmin');


    //route to show all first investments of users
    Route::get('/users/first-investments', 'AdminController@userInvestments')->name('userInvestments');


    //route to show all users that uploaded a proof of payment and are waiting for confirmation
    Route::get('/users/pending-activations', 'AdminController@userActivations')->name('userActivations');


    //route to show all users recommitments
    Route::get('/users/recommitments', 'AdminController@userRecommitments')->name('userRecommitments');


    //route to show all admin bank details
    Route::get('/admin-bank-details', 'AdminController@showBankDetails')->name('adminBankDetails');


    //route to show users single investments
    Route::get('/users/investments/show/{id}', 'AdminController@showInvestment')->name('usersInvestment.show');


    //route to change admin password
    Route::get('/change-password', 'AdminController@changePassword')->name('changePassword');


    //route to store admin password
    Route::post('/change-password/store', 'AdminController@storePassword')->name('storePassword');


    //route to show users single recommitments
    Route::get('/users/recommitments/show/{id}', 'AdminController@showRecommitment')->name('usersRecommitment.show');


    //route to approve investments
    Route::get('/users/investments/approve/{id}/{user}', 'AdminController@approveInvestment')->name('approveInvestment');


    //route to decline investments
    Route::get('/users/investments/decline/{id}/{user}', 'AdminController@declineInvestment')->name('declineInvestment');


    //route to approve recommitments
    Route::get('/users/recommitments/approve/{id}/{user}', 'AdminController@approveRecommitment')->name('approveRecommitment');


    //route to decline recommitments
    Route::get('/users/recommitments/decline/{id}/{user}', 'AdminController@declineRecommitment')->name('declineRecommitment');


    //route to show users withdrawals
    Route::get('/users/withdrawals', 'AdminController@withdrawals')->name('userWithdrawals');


    //route to show  all users
    Route::get('/users/registered', 'AdminController@users')->name('users');
    Route::get('/users/{id}', 'AdminController@showUsers')->name('showUsers');


    //route to show user withdrawals
    Route::get('/users/withdrawals/{id}', 'AdminController@showWithdrawals')->name('showUserWithdrawals');


    //route to update users withdrawal status
    Route::post('/users/withdrawals/update/{id}', 'AdminController@updateUsersWithdrawalStatus')->name('updateUsersWithdrawalStatus');
});




//Authenticated Users Dashboard routes
Route::group(['prefix' => 'dashboard', 'middleware' => 'verifiedUsers'], function () {

    Route::get('/investments', 'PagesController@donations')->name('investments');
    Route::resource('investment', 'InvestmentController');
    Route::resource('withdrawals', 'WithdrawalsController');
    Route::resource('recommitments', 'RecommitmentController');
    Route::get('/invest', 'PagesController@invest')->name('invest');
    Route::post('/invest', 'PagesController@saveInvest')->name('saveinvest');
    Route::get('/guider', 'PagesController@guider')->name('guider');
    Route::get('/withdrawals', 'PagesController@withdrawals')->name('withdrawals');
    Route::get('/profile', 'PagesController@profile')->name('profile');
    Route::get('/downlines', 'PagesController@downlines')->name('downlines');
    Route::get('/testimony', 'PagesController@testimony')->name('testimony');
    Route::get('/withdraw', 'PagesController@withdraw')->name('withdraw');
});
