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


//order routes
Route::get('orders', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return App\Order::all();
});
 
Route::get('orders/{id}', function($id) {
    return App\Order::find($id);
});

Route::post('orders', function(Request $request) {
    return App\Order::create($request->all);
});

Route::put('orders/{id}', function(Request $request, $id) {
    $order = App\Order::findOrFail($id);
    $order->update($request->all());

    return $order;
});

Route::delete('orders/{id}', function($id) {
    App\Order::find($id)->delete();

    return 204;
});

//stock routes
Route::get('stocks', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return App\Stock::all();
});
 
Route::get('stocks/{id}', function($id) {
    return App\Stock::find($id);
});

Route::post('stocks', function(Request $request) {
    return App\Stock::create($request->all);
});

Route::put('stocks/{id}', function(Request $request, $id) {
    $stock = App\Stock::findOrFail($id);
    $stock->update($request->all());

    return $stock;
});

Route::delete('stocks/{id}', function($id) {
    App\Stock::find($id)->delete();

    return 204;
});


//stock products
Route::get('products', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return App\Product::all();
});
 
Route::get('products/{id}', function($id) {
    return App\Product::find($id);
});

Route::post('products', function(Request $request) {
    return App\Product::create($request->all);
});

Route::put('products/{id}', function(Request $request, $id) {
    $product = App\Product::findOrFail($id);
    $product->update($request->all());

    return $product;
});

Route::delete('product/{id}', function($id) {
    App\Product::find($id)->delete();

    return 204;
});

//stock branches
Route::get('branches', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return App\Branch::all();
});
 
Route::get('branches/{id}', function($id) {
    return App\Branch::find($id);
});

Route::post('branches', function(Request $request) {
    return App\Branch::create($request->all);
});

Route::put('branches/{id}', function(Request $request, $id) {
    $branch = App\Branch::findOrFail($id);
    $branch->update($request->all());

    return $branch;
});

Route::delete('branches/{id}', function($id) {
    App\Branch::find($id)->delete();

    return 204;
});

//stock items
Route::get('items', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return App\Item::all();
});
 
Route::get('items/{id}', function($id) {
    return App\Item::find($id);
});

Route::post('items', function(Request $request) {
    return App\Item::create($request->all);
});

Route::put('items/{id}', function(Request $request, $id) {
    $item = App\Item::findOrFail($id);
    $item->update($request->all());

    return $item;
});

Route::delete('items/{id}', function($id) {
    App\Item::find($id)->delete();

    return 204;
});

//stock users
Route::get('users', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return App\User::all();
});
 
Route::get('users/{id}', function($id) {
    return App\User::find($id);
});

Route::post('users', function(Request $request) {
    return App\User::create($request->all);
});

Route::put('users/{id}', function(Request $request, $id) {
    $user = App\User::findOrFail($id);
    $user->update($request->all());

    return $user;
});

Route::delete('users/{id}', function($id) {
    App\User::find($id)->delete();

    return 204;
});

//stock types
Route::get('types', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return App\Type::all();
});
 
Route::get('types/{id}', function($id) {
    return App\Type::find($id);
});

Route::post('types', function(Request $request) {
    return App\Type::create($request->all);
});

Route::put('types/{id}', function(Request $request, $id) {
    $type = App\Type::findOrFail($id);
    $type->update($request->all());

    return $Type;
});

Route::delete('types/{id}', function($id) {
    App\Type::find($id)->delete();

    return 204;
});

//stock Payments
Route::get('Payments', function() {
    // If the Content-Payment and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return App\Payment::all();
});
 
Route::get('Payments/{id}', function($id) {
    return App\Payment::find($id);
});

Route::post('Payments', function(Request $request) {
    return App\Payment::create($request->all);
});

Route::put('Payments/{id}', function(Request $request, $id) {
    $payment = App\Payment::findOrFail($id);
    $payment->update($request->all());

    return $payment;
});

Route::delete('Payments/{id}', function($id) {
    App\Payment::find($id)->delete();

    return 204;
});

//stock employees
Route::get('employees', function() {
    // If the Content-Employee and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return App\Employee::all();
});
 
Route::get('employees/{id}', function($id) {
    return App\Employee::find($id);
});

Route::post('employees', function(Request $request) {
    return App\Employee::create($request->all);
});

Route::put('employees/{id}', function(Request $request, $id) {
    $employee = App\Employee::findOrFail($id);
    $employee->update($request->all());

    return $employee;
});

Route::delete('employees/{id}', function($id) {
    App\Employee::find($id)->delete();

    return 204;
});

//stock statuses
Route::get('statuses', function() {
    // If the Content-Status and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return App\Status::all();
});
 
Route::get('statuses/{id}', function($id) {
    return App\Status::find($id);
});

Route::post('statuses', function(Request $request) {
    return App\Status::create($request->all);
});

Route::put('statuses/{id}', function(Request $request, $id) {
    $status = App\Status::findOrFail($id);
    $status->update($request->all());

    return $status;
});

Route::delete('statuses/{id}', function($id) {
    App\Status::find($id)->delete();

    return 204;
});


