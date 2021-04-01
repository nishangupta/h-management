<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\IncomeController;
use App\Http\Controllers\Admin\BillingController;
use App\Http\Controllers\Admin\ExpenseController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SummaryController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\RoomTypeController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\QuotationController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\AdminPasswordController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\ProductCategoryController;

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

  /* old */

  // Route::get('/customer/filter',[CustomerController::class,'filter'])->name('customer.filter');
  // Route::resource('/customer',CustomerController::class);

  // Route::resource('/category',CategoryController::class); //expense category
  
  // Route::get('/supplier/filter',[SupplierController::class,'filter'])->name('supplier.filter');
  // Route::resource('/supplier',SupplierController::class);
  
  // Route::resource('/summary',SummaryController::class);
  
  // Route::resource('/product-category',ProductCategoryController::class);
  
  // Route::get('/product/search',[ProductController::class,'search'])->name('product.search');
  // Route::resource('/product',ProductController::class);

  // Route::get('/sale/filter',[SaleController::class,'filter'])->name('sale.filter');
  // Route::get('/sale/printInvoice/{id}',[SaleController::class,'printInvoice'])->name('sale.printInvoice');
  // Route::resource('/sale',SaleController::class);

  // Route::get('/quotation/filter',[QuotationController::class,'filter'])->name('quotation.filter');
  // Route::resource('/quotation',QuotationController::class);
  // Route::get('/quotation/printInvoice/{id}',[QuotationController::class,'printInvoice'])->name('quotation.printInvoice');
  // Route::get('/quotation/mail/{id}',[QuotationController::class,'mail'])->name('quotation.mail');

  // Route::get('/purchase/filter',[PurchaseController::class,'filter'])->name('purchase.filter');
  // Route::resource('/purchase',PurchaseController::class);

  // Route::get('/expense/filter',[ExpenseController::class,'filter'])->name('expense.filter');
  // Route::resource('/expense',ExpenseController::class);

  Route::post('/setting/upload',[SettingController::class,'upload'])->name('setting.upload');
  Route::resource('/setting',SettingController::class);

  Route::get('/admin-password',[AdminPasswordController::class,'index'])->name('admin-password.index');
  Route::patch('/admin-password',[AdminPasswordController::class,'update'])->name('admin-password.update');
});
