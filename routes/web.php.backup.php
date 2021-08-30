<?php

use Illuminate\Foundation\Auth\User;
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
Route::get('/', 'HomeController@index')->name('home');
    Route::get('/products', 'HomeController@products')->name('products');
Auth::routes();
Route::group(['middleware' => [
    App\Http\Middleware\FrontLanguage::class
]], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/products', 'HomeController@products')->name('products');
});


//Admin
Route::get('/adminlogin', 'AdminLoginController@login')->name('adminlogin'); //login
Route::post('/adminlogin', 'AdminLoginController@postlogin');
Route::get('/country', 'Admin\CountriesController@index');
Route::group([
    'prefix' => 'admin', 'middleware' => [
        App\Http\Middleware\AdminAccess::class,
        App\Http\Middleware\AdminLanguage::class,
        App\Http\Middleware\FrontLanguage::class,
        'auth',
    ]

], function () {
    Route::get('/', 'AdminIndexController@index');
    Route::resource('models', 'Admin\VechiclesModelsController');
    Route::resource('users', 'Admin\UsersController');
    Route::resource('pages', 'Admin\PagesController');
    Route::resource('faq', 'Admin\FaqController');
    Route::resource('branches', 'Admin\BranchesController');

    Route::resource('articles', 'Admin\articlesController');
    Route::resource('brands', 'Admin\brandsController');
    Route::resource('products', 'Admin\productsController');
    Route::resource('vehicles', 'Admin\vehiclesController');
    Route::resource('settings', 'Admin\settingsController');
    Route::resource('generals', 'Admin\generalsController');
    //roles
    Route::resource('roles', 'RolesController');
    Route::resource('nc', 'NewController');
    Route::get('permissions', 'PermissionsController@index');
    Route::post('permissions', 'PermissionsController@indexPost');
    Route::post('controllersactions', 'PermissionsController@controllersactions');
    //Route::get('/permissiontesing',function(){
    //$user = Auth::user();
    /*$role = Role::findByName('admin');
        $role->givePermissionTo('edit articles');
        $user->assignRole('admin');
        return $user;//$user;*/
    //$role = Role::create(['name' => 'new_admin']);
    //$permission = Permission::create(['name' => 'edit articles admin']);
    //$role->givePermissionTo($permission);
    //$user->assignRole('admin');
    //$user->assignRole('new_admin');
    //return $user;
    //return $user->getAllPermissions();
    //return view('admin.index.index');
    //});
});

//Ajax Calls
Route::post('/loadmodels', 'Admin\VechiclesController@loadmodels'); //load car models
//upload
Route::POST('imageuploads', 'Admin\VechiclesController@imageuploads');
Route::delete('imageuploadsdelete/{id}', 'Admin\VechiclesController@imageuploadsdelete');
Route::get('getuploadedImages/{id?}', 'Admin\VechiclesController@getuploadedimages');
Route::POST('cities', 'Admin\UsersController@cities');//users
