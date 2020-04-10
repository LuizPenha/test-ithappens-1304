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

Route::get('/', function () {
    return view('initial');
});

Route::resource('posts', 'PostsController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//resources controler
Route::resource('branches', 'BranchController');
Route::resource('employees', 'EmployeeController');
Route::resource('items', 'ItemController');
Route::get('order', 'OrderController@create')->name('order.new');
Route::post('order/', 'OrderController@store')->name('orders.store');
Route::get('order/{order}/choice-products', ['uses' => 'OrderController@choiceProducts'])->name('choice.products');
Route::resource('payments', 'PaymentController');
Route::resource('products', 'ProductController');
Route::resource('stocks', 'StockController');
Route::resource('users', 'UserController');
Route::resource('types', 'TypeController');

//resources controler
// Route::resource('Api/branches', 'BranchController');
// Route::resource('Api/employees', 'EmployeeController');
// Route::resource('Api/items', 'ItemController');
// Route::resource('Api/orders', 'OrderController');
// Route::resource('Api/payments', 'PaymentController');
// Route::resource('Api/products', 'ProductController');
// Route::resource('Api/stocks', 'StockController');
// Route::resource('Api/users', 'UserController');

Route::post('orders','OrderController@search')->name('orders.search');
Route::post('orderss','OrderController@livesearch')->name('orders.livesearch');
//Route::post('order/{order}/choice-products','ProductController@productSearch')->name('product.search');
Route::post('order/choice-products','ProductController@productSearch')->name('product.search');
Route::post('users','UserController@SearchClientByName')->name('client.search');
Route::post('order/confirmation','ItemController@processItems')->name('process.items');


// Route::get('order/choice-products', function($order = null)
// {
//     //return $order;
//     $data = App\Order::where('id',$order)->first();
//     return view('ith.choice_products', ['order'=>$data]);    
// })->name('choice.products');