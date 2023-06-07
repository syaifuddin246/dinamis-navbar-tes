<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\KatMenuController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\SubMenuController;
use App\Http\Controllers\SubMenuItem1Controller;
use App\Http\Controllers\SubMenuItemController;
use Illuminate\Support\Facades\Route;

Route::get('/',[FrontController::class,'index'])->name('fhome');
// Route::get('/{slug}',[FrontController::class,'detailsubmenu'])->name('detailsub');
// Route::get('/sub-menu/{slug}',[FrontController::class,'katsubmenu'])->name('katsubmenu');
Route::get('/kontak',[FrontController::class,'kontak'])->name('fkontak');
Auth::routes();

// backend route
Route::resource('/admin/katmenu',KatMenuController::class);
Route::resource('/admin/submenu',SubMenuController::class);
Route::resource('/admin/menuitem',MenuItemController::class);
Route::resource('/admin/submenuitem',SubMenuItemController::class);
Route::resource('/admin/submenuitem1',SubMenuItem1Controller::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
