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

Route::post('login', 'API\UsersController@login');
Route::post('register', 'API\UsersController@register');
Route::post('checNumberOrEmailExistance', 'API\UsersController@checNumberOrEmailExistance');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('changePhoneFirstStep', 'API\UsersController@changePhoneFirstStep');
Route::post('changeEmail', 'API\UsersController@changeEmail');

//Auth Routes
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('activeAccount', 'API\UsersController@activeAccount');
    Route::post('updateUserPhoto', 'API\UsersController@updateUserPhoto');
    Route::get('reSendCode', 'API\UsersController@reSendCode');
    Route::post('changePassword', 'API\UsersController@changePassword');
    Route::post('resendOnForgetPassword', 'API\UsersController@resendOnForgetPassword');
    Route::post('ratingApp', 'API\statitcPagesController@ratingApp');
    Route::post('insertComplaint', 'API\statitcPagesController@insertComplaint');

    //setting or account page
    Route::post('editAccount', 'API\UsersController@editAccount'); //edit Account
    Route::post('changePhoneLastStep', 'API\UsersController@changePhoneLastStep'); //edit Account

    // make order 
    Route::post('makeOrder', 'API\OrdersController@makeOrder');
    Route::get('getOrderStatus/{id}', 'API\OrdersController@getOrderStatus');
    Route::get('trackYourOrder/{id}', 'API\OrdersController@trackYourOrder');
    Route::get('previousOrders', 'API\OrdersController@previousOrders');
    Route::get('last3SuccessOrders', 'API\OrdersController@last3SuccessOrders');
    Route::get('getOlumPercent', 'API\OrdersController@getOlumPercent');
    
});

Route::get('rejectHoldingOrders', 'API\OrdersController@rejectHoldingOrders');
Route::get('page/{id}/{web_mobile}', 'API\statitcPagesController@page');
Route::get('mobileStaticPagesList', 'API\statitcPagesController@mobileStaticPagesList');
Route::get('faq', 'API\statitcPagesController@faqs');
Route::post('rateFqa', 'API\statitcPagesController@rateFqa');
Route::get('olumFeatures', 'API\StaticController@olumFeatures');

// start Application home routes
Route::get('getTypes', 'API\ApplicationHomeController@getTypes');
Route::get('sugestedRestorants', 'API\ApplicationHomeController@sugestedRestorants');
Route::get('sugestedProducts', 'API\ApplicationHomeController@sugestedProducts');
Route::post('searchForRestorant', 'API\ApplicationHomeController@searchForRestorant');
// end Application home routes

// start web app home routs
Route::get('mainVedioLink', 'API\StaticController@mainVedioLink');
Route::get('getSocialLinks', 'API\StaticController@getSocialLinks');
Route::get('getAppStoreGooglePlayLinks', 'API\StaticController@getAppStoreGooglePlayLinks');
Route::post('sendFollwerMail', 'API\StaticController@sendFollwerMail');
Route::get('getRegions', 'API\RegionsController@getRegions');
Route::get('getAreasByRegionId/{regionId}', 'API\RegionsController@getAreasByRegionId');
Route::post('searchForAreas', 'API\RegionsController@searchForAreas');
// end web app home routs

// start search result routes
Route::post('searchRestorantsByArea', 'API\RestorantsController@searchRestorantsByArea');
Route::post('searchRestorantsByLocation', 'API\RestorantsController@searchRestorantsByLocation');
Route::post('getBranchesByareasOrLatLon', 'API\RestorantsController@getBranchesByareasOrLatLon');
Route::get('getRestorantBranches/{restorantId}', 'API\RestorantsController@getRestorantBranches');
Route::post('restorantsApp', 'API\ApplicationHomeController@restorantsApp');
Route::post('notificationList', 'API\ApplicationHomeController@notificationList')->middleware('auth:api');
Route::get('markNotificationAsRead/{id}', 'API\ApplicationHomeController@markNotificationAsRead')->middleware('auth:api');
// end search result routes

// start restorant page routes
Route::post('RestorantPage', 'API\RestorantsController@RestorantPage');
Route::post('BranchPageApp', 'API\RestorantsController@BranchPageApp');
Route::post('getProductsByBrancheIdMealId', 'API\ProductsController@getProductsByBrancheIdMealId');
Route::post('getOneProduct', 'API\ProductsController@getOneProduct');
// end restorant page routes

//start offers page 
Route::get('restorantsHasOffers', 'API\ProductsController@restorantsHasOffers');
Route::get('restorantsHasOffersApp', 'API\ProductsController@restorantsHasOffersApp');
Route::post('getBranchesHasOffers', 'API\ProductsController@getBranchesHasOffers');
Route::post('getBranchOffers', 'API\ProductsController@getBranchOffers');
//end offers page
//register your restorant
Route::post('registerRestorant', 'API\UsersController@registerRestorant');

//about us page 
Route::get('getAppReviews', 'API\StaticController@getAppReviews');

//all restorants Page
Route::get('allRestorants', 'API\RestorantsController@allRestorants');
Route::get('allRestorantsApp', 'API\RestorantsController@allRestorantsApp');
Route::get('getAllCategories', 'API\RestorantsController@getAllCategories');

//all categories
Route::get('getRestorantCategories', 'API\RestorantsController@getRestorantCategories');
Route::get('branchReOrderDataToReorder/{branch_id}', 'API\RestorantsController@branchReOrderDataToReorder');

// contact us page
Route::post('contactUs', 'API\StaticController@contactUs')->name('contactUs');
Route::get('getContactPageInfo', 'API\StaticController@getContactPageInfo')->name('getContactPageInfo');
Route::get('whatOlum', 'API\StaticController@whatOlum')->name('whatOlum');
Route::post('useCobon', 'API\StaticController@useCobon')->middleware('auth:api');
Route::get('orderRecived/{id}/{status}', 'API\OrdersController@orderRecived')->middleware('auth:api');
Route::post('rateOrder', 'API\OrdersController@rateOrder')->middleware('auth:api');
Route::get('olumReviews', 'API\StaticController@olumReviews')->name('olumReviews');
