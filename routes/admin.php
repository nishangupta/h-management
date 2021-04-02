<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\IncomeController;
use App\Http\Controllers\Admin\BillingController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\RoomTypeController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\AdminPasswordController;
use App\Http\Controllers\Admin\UserManagementController;

//Admin routes exits here
Route::group(['prefix'=>'/admin','middleware'=>['auth','role:admin|staff']],function(){
  
  Route::get('/',[AdminController::class,'index'])->name('admin.index');

  Route::resource('/menu',MenuController::class);

  Route::get('/food/search',[FoodController::class,'search'])->name('food.search');
  Route::resource('/food',FoodController::class);

  Route::resource('/usermanagement',UserManagementController::class);

  Route::get('/feedback',[FeedbackController::class,'index'])->name('feedback.index');
  Route::delete('/feedback/{feedback}',[FeedbackController::class,'destroy'])->name('feedback.destroy');

  Route::resource('/roomType',RoomTypeController::class);

  Route::get('/room/filter',[RoomController::class,'filter'])->name('room.filter');
  Route::resource('/room',RoomController::class);

  Route::get('/reservation/filter',[ReservationController::class,'filter'])->name('reservation.filter');
  Route::resource('/reservation',ReservationController::class);

  Route::get('/order',[OrderController::class,'index'])->name('order.index');
  Route::get('/order/create/{reservation}',[OrderController::class,'create'])->name('order.create');
  Route::post('/order',[OrderController::class,'store'])->name('order.store');
  Route::get('/order/{order}',[OrderController::class,'show'])->name('order.show');
  Route::get('/order/{order}/edit',[OrderController::class,'edit'])->name('order.edit');
  Route::put('/order/{order}',[OrderController::class,'update'])->name('order.update');
  Route::delete('/order/{order}',[OrderController::class,'destroy'])->name('order.destroy');
  Route::get('/order/printInvoice/{id}',[OrderController::class,'printInvoice'])->name('order.printInvoice');
  
  Route::get('/billing/create/{reservation}',[BillingController::class,'create'])->name('billing.create');
  Route::post('/billing',[BillingController::class,'store'])->name('billing.store');
  Route::put('/billing/{reservation}',[BillingController::class,'update'])->name('billing.update');

  Route::get('/income/filter',[IncomeController::class,'filter'])->name('income.filter');
  Route::resource('/income',IncomeController::class);

  Route::post('/setting/upload',[SettingController::class,'upload'])->name('setting.upload');
  Route::resource('/setting',SettingController::class);

  Route::get('/admin-password',[AdminPasswordController::class,'index'])->name('admin-password.index');
  Route::patch('/admin-password',[AdminPasswordController::class,'update'])->name('admin-password.update');
});
