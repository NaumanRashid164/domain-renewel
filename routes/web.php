<?php

use App\Http\Controllers\ContactDetailController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DocusignController;
use App\Http\Controllers\DurationController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\NameController;
use App\Http\Controllers\VatRateController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'artisan'], function () {
    Route::get('clear', function () {
        Artisan::call('view:clear');
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        return 'Successfully Cleared !';
    });
});


Route::get('/', function () {
    return view('login');
})->name('/');


Route::middleware('auth')->group(function () {

    Route::name('module.')->prefix('setup')->group(function () {

        Route::get('/', [ModuleController::class, 'index'])->name('index');
    });


    //------------------------------ Project Setup----------------------------------

    Route::name("duration.")->prefix("duration")->group(function () {

        Route::get("/", [DurationController::class, "index"])->name("index");

        Route::get('/list', [DurationController::class, 'list'])->name('ajax.list');

        Route::get('/addfrom', [DurationController::class, 'addfrom'])->name('ajax.addfrom');

        Route::post('/addDuration', [DurationController::class, 'addDuration'])->name('ajax.addDuration');

        Route::get('/edit/{id}', [DurationController::class, 'edit'])->name('ajax.edit');

        Route::get('/delete/{id}', [DurationController::class, 'delete'])->name('ajax.delete');
    });

    Route::name("name.")->prefix("name")->group(function () {

        Route::get("/{type}", [NameController::class, "index"])->name("index");

        Route::get('/list/{type}', [NameController::class, 'list'])->name('ajax.list');

        Route::get('/addfrom/{type}', [NameController::class, 'addfrom'])->name('ajax.addfrom');

        Route::post('/addName', [NameController::class, 'addName'])->name('ajax.addName');

        Route::get('/edit/{id}', [NameController::class, 'edit'])->name('ajax.edit');

        Route::get('/delete/{id}', [NameController::class, 'delete'])->name('ajax.delete');
    });

    Route::name("vat.")->prefix("vat")->group(function () {

        Route::get("/", [VatRateController::class, "index"])->name("index");

        Route::get('/list', [VatRateController::class, 'list'])->name('ajax.list');

        Route::get('/addfrom', [VatRateController::class, 'addfrom'])->name('ajax.addfrom');

        Route::post('/addVat', [VatRateController::class, 'addVat'])->name('ajax.addVat');

        Route::get('/edit/{id}', [VatRateController::class, 'edit'])->name('ajax.edit');

        Route::get('/delete/{id}', [VatRateController::class, 'delete'])->name('ajax.delete');
    });

    // -----------------------------Sidebar Customer(registrant,hosting,email)----------------

    Route::name("customer.")->prefix("customer")->group(function () {

        Route::get("/", [CustomerController::class, "index"])->name("index");

        Route::get('/list', [CustomerController::class, 'list'])->name('ajax.list');

        Route::get('/addfrom', [CustomerController::class, 'addform'])->name('ajax.addfrom');

        Route::post('/addCustomer', [CustomerController::class, 'addCustomer'])->name('ajax.addCustomer');

        Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('ajax.edit');

        Route::get('/delete/{id}', [CustomerController::class, 'delete'])->name('ajax.delete');

        Route::get('/status/update', [CustomerController::class, 'status'])->name('ajax.status');

        Route::get('/detail/{id}', [CustomerController::class, 'detail'])->name('ajax.detail');
    });

    // -----------------------------Sidebar Contact Detail----------------

    Route::name("contact.")->prefix("contact")->group(function () {

        Route::get("/", [ContactDetailController::class, "index"])->name("index");

        Route::get("/list", [ContactDetailController::class, "list"])->name("ajax.list");

        Route::get("/addform", [ContactDetailController::class, "addform"])->name("ajax.addfrom");

        Route::post('/addCustomer', [ContactDetailController::class, 'addCustomer'])->name('ajax.addCustomer');

        Route::get('/edit/{id}', [ContactDetailController::class, 'edit'])->name('ajax.edit');

        Route::get('/delete/{id}', [ContactDetailController::class, 'delete'])->name('ajax.delete');

        Route::get('/status', [ContactDetailController::class, 'status'])->name('ajax.status');
    });

    // -----------------------------Customer Mail(Registrant,Hosting,Email)--------------------------

    Route::name("mail.")->prefix("mail")->group(function () {

        Route::get("/", [MailController::class, "index"])->name("index");
    });


    // -------------------------Practice Docusign--------------------------------


});

require __DIR__ . '/auth.php';
