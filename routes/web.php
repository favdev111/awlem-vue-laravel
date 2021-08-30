<?php

use Illuminate\Foundation\Auth\User;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => [
    App\Http\Middleware\FrontLanguage::class,
    App\Http\Middleware\FrontData::class,
]], function () {
    Route::post('follwers', 'Admin\FollowersController@store');
    Route::post('sendMail', 'HomeController@sendMail')->name('sendMail');
});


//Admin
Route::get('/forbidden', 'AdminIndexController@forbidden');
Route::get('/', 'AdminLoginController@login')->name('/'); //login
Route::post('/adminlogin', 'AdminLoginController@postlogin');
Route::group([
    'prefix' => 'admin', 'middleware' => [
        App\Http\Middleware\AdminAccess::class,
        App\Http\Middleware\AdminLanguage::class,
        'auth'
    ]

], function () {
    Route::get('mail', function () {
        $user = App\User::find(1);

        return (new App\Notifications\UserCreated($user))
            ->toMail($user->name);
    });
    Route::get('/', 'AdminIndexController@index');
    Route::get('/getLabelsYearly', 'AdminIndexController@getLabelsYearly');
    Route::get('/getLabelsMonthly', 'AdminIndexController@getLabelsMonthly');
    Route::get('/getLabelsWeekly', 'AdminIndexController@getLabelsWeekly');
    Route::get('/getLabelsDaily', 'AdminIndexController@getLabelsDaily');
    Route::get('/getUsersMonthly/{type}', 'Admin\UsersController@getUsersMonthly');
    Route::get('/getUsersDaily/{type}', 'Admin\UsersController@getUsersDaily');
    Route::get('/getUsersWeekly/{type}', 'Admin\UsersController@getUsersWeekly');
    Route::get('/getUsersYearly/{type}', 'Admin\UsersController@getUsersYearly');

    Route::get('/getRestorantsYearly', 'Admin\RestorantsController@getRestorantsYearly');
    Route::get('/getRestorantsWeekly', 'Admin\RestorantsController@getRestorantsWeekly');
    Route::get('/getRestorantsMonthly', 'Admin\RestorantsController@getRestorantsMonthly');
    Route::get('/getRestorantsDaily', 'Admin\RestorantsController@getRestorantsDaily');

    Route::get('/getBranchesYearly', 'Admin\BranchesController@getBranchesYearly');
    Route::get('/getBranchesMonthly', 'Admin\BranchesController@getBranchesMonthly');
    Route::get('/getBranchesWeekly', 'Admin\BranchesController@getBranchesWeekly');
    Route::get('/getBranchesDaily', 'Admin\BranchesController@getBranchesDaily');

    Route::get('/getOrdersYearly', 'Admin\OrdersController@getOrdersYearly');
    Route::get('/getOrdersMonthly', 'Admin\OrdersController@getOrdersMonthly');
    Route::get('/getOrdersWeekly', 'Admin\OrdersController@getOrdersWeekly');
    Route::get('/getOrdersDaily', 'Admin\OrdersController@getOrdersDaily');

    Route::post('storeFromRestorant/{restorantId}', 'Admin\MealsController@storeFromRestorant');
    Route::get('editRestorantUser/{id}/{restorantId}', 'Admin\UsersController@editRestorantUser');
    Route::Patch('updateRestorantUser/{id}', 'Admin\UsersController@updateRestorantUser');
    Route::get('creatFromRestorant/{restorantId}', 'Admin\ProductsController@creatFromRestorant');
    Route::get('creatFromBranch/{restorantId}/{branchId}', 'Admin\ProductsController@creatFromBranch');
    Route::get('creatBranchFromRestorant/{restorantId}', 'Admin\BranchesController@creatBranchFromRestorant');
    Route::post('storeFromRestorant', 'Admin\ProductsController@storeFromRestorant');
    Route::post('storeFromBranch', 'Admin\ProductsController@storeFromBranch');
    Route::get('addRestorantEmployee/{restorantId}', 'Admin\UsersController@addRestorantEmployee');
    Route::post('storeRestorantEmployee', 'Admin\UsersController@storeRestorantEmployee');
    Route::resource('clients', 'Admin\ClientsController');
    Route::resource('users', 'Admin\UsersController');
    Route::resource('pages', 'Admin\PagesController');
    Route::resource('faq', 'Admin\FaqController');
    //olum
    Route::resource('activities', 'Admin\ActivitiesController');
    Route::resource('areaRestorants', 'Admin\AreaRestorantsController');
    Route::resource('areas', 'Admin\AreasController');
    Route::resource('branches', 'Admin\BranchesController');
    Route::get('ordersCategory/{branch_id}', 'Admin\BranchesController@ordersCategory')->name('branches.ordersCategory');
    Route::get('branchOrdersMobile/{branch_id}/{orders_type}', 'Admin\BranchesController@branchOrdersMobile')->name('branches.branchOrdersMobile');
    Route::resource('branchPhotos', 'Admin\BranchPhotosController');
    Route::resource('restorantRatings', 'Admin\RestorantRatingsController');
    Route::resource('categories', 'Admin\CategoriesController');
    Route::resource('features', 'Admin\FeaturesController');
    Route::resource('complaints', 'Admin\ComplaintsController');
    Route::resource('discountCobons', 'Admin\DiscountCobonsController');
    Route::resource('meals', 'Admin\MealsController');
    Route::resource('orderProducts', 'Admin\OrderProductsController');
    Route::resource('orderRatings', 'Admin\OrderRatingsController');
    Route::resource('orders', 'Admin\OrdersController');
    Route::get('branchOrders/{branch_id}/{filter}/{search_key}', 'Admin\OrdersController@branchOrders');
    Route::get('print_inv/{id}', 'Admin\OrdersController@print_inv')->name('Orders.print_inv');
    Route::get('print_inv_test/{id}', 'Admin\OrdersController@print_inv_test')->name('Orders.print_inv_test');
    Route::resource('productGroupOptions', 'Admin\ProductGroupOptionsController');
    Route::resource('productGroups', 'Admin\ProductGroupsController');
    Route::resource('productMeals', 'Admin\ProductMealsController');
    Route::resource('products', 'Admin\ProductsController');
    Route::get('products/delete/{id}', 'Admin\ProductsController@delete');
    Route::resource('ratings', 'Admin\RatingsController');
    Route::resource('regions', 'Admin\RegionsController');
    Route::resource('restorants', 'Admin\RestorantsController');
    Route::Patch('updatePriority/{id}', 'Admin\RestorantsController@updatePriority');
    Route::resource('typeRestorants', 'Admin\TypeRestorantsController');
    Route::resource('types', 'Admin\TypesController');
    //olum

    Route::resource('settings', 'Admin\settingsController');
    //roles
    Route::resource('roles', 'RolesController');
    Route::resource('nc', 'NewController');
    Route::get('permissions', 'PermissionsController@index');
    Route::post('permissions', 'PermissionsController@indexPost');
    Route::post('controllersactions', 'PermissionsController@controllersactions');
    Route::post('synkBranches', 'Admin\ProductsController@synkBranches');
    Route::post('storeOffer', 'Admin\ProductsController@storeOffer');
    Route::post('updateOffer', 'Admin\ProductsController@updateOffer');
    Route::get('deleteOffer/{product_id}/{branch_id}', 'Admin\ProductsController@deleteOffer');
    Route::get('EditOffer/{restorant_id}/{product_id}/{branch_id}/{amount}/{percent}/{active}/{offer_end_date}', 'Admin\ProductsController@EditOffer');

    Route::get('getBranchesWithPages', 'Admin\BranchesController@getBranchesWithPages');
    Route::get('getClientsArivals', 'Admin\OrdersController@getClientsArivals');
});

//Ajax Calls
//upload

Route::POST('getProductsByMealId', 'Admin\ProductsController@getProductsByMealId');
Route::POST('getProductsByMealIdForAddOffer', 'Admin\ProductsController@getProductsByMealIdForAddOffer');
Route::POST('imageuploads', 'Admin\BranchesController@imageuploads');
Route::delete('imageuploadsdelete/{id}', 'Admin\BranchesController@imageuploadsdelete');
Route::get('getuploadedImages/{id?}', 'Admin\BranchesController@getuploadedimages');
Route::POST('ajaxChangeBusyStatus', 'Admin\BranchesController@ajaxChangeBusyStatus');
Route::POST('makeBranchProductUnAvailable', 'Admin\ProductsController@makeBranchProductUnAvailable');

Route::get('customer_invoice_download/{order_id}', 'Admin\ProductsController@customer_invoice_download')->name('customer.invoice.download');;
