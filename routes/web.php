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


Route::get('/','HomeController@index');

Route::get('/home', function () {
    return response()->redirectTo('/');
});

Auth::routes();


Route::get('/activate-account','UserController@getActivateAccount');
Route::post('/activate-account','UserController@postActivateAccount');

Route::resource('reviews', 'ReviewController');
Route::resource('users', 'UserController');
Route::resource('user-types', 'UserTypeController');


Route::group(['prefix'=>'admin','middleware'=>['auth','full_name','admin']], function () {
    Route::get('dashboard','AdminController@getDashboard');
    Route::get('categories','AdminController@getCategories');
    Route::post('categories','AdminController@postCategories');
    Route::get('categories/{hashed_id}/delete','AdminController@deleteCategory');
    Route::get('categories/{hashed_id}/edit','AdminController@editCategory');
    Route::post('categories/edit','AdminController@postEditCategory');

    Route::get('items','AdminController@getItems');
    Route::get('items/{hashed_id}/delete','AdminController@deleteItem');

    Route::get('users','AdminController@getUsers');
    Route::get('users/{hashed_id}/delete','AdminController@deleteUser');
    Route::post('make','AdminController@makeUserAdmin');
    Route::post('remove','AdminController@removeAdmin');

    Route::get('transactions','AdminController@getTransactions');
});

Route::group(['middleware'=> ['auth','full_name']],function(){
    Route::get('items/post', 'ItemController@create');
    Route::post('items/post', 'ItemController@store');


    Route::post('reviews', 'ReviewController@store');
/*    Route::get('items/swap', 'ItemController@create');
    Route::post('items/swap', 'ItemController@store');*/
    Route::get('items/{hashed_id}/edit', 'ItemController@edit');
    Route::get('items/{hashed_id}/delete', 'ItemController@destroy');
    Route::post('items/update', 'ItemController@update');

    Route::get('/profile', 'UserController@getProfile');
    Route::post('/profile', 'UserController@postProfile');
    Route::post('/profile/avatar', 'UserController@postAvatar');

    Route::get('/password/change', 'UserController@getChangePassword');
    Route::post('/password/change', 'UserController@postChangePassword');
    Route::get('/my-items', 'UserController@getUserItems');

});

////////////////Routes needing no user auth///////////////////////////
Route::get('reviews', 'ReviewController@index');
Route::get('items/{hashed_id}/details', 'ItemController@show');
Route::get('categories/{hashed_id}/items', 'ItemController@getItemsByCategory');
Route::get('/search', 'ItemController@getItemSearchResult');
Route::get('/faqs', 'HomeController@getFaqs');
Route::get('/how-it-works', 'HomeController@getHowItWorks');
Route::get('/contact-us', 'HomeController@getContactUs');
Route::post('/contact-us', 'HomeController@postContactUs');
Route::get('/about-us', 'HomeController@getAboutUs');
Route::get('/privacy-policy', 'HomeController@getPrivacyPolicy');