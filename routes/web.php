<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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



//filter margin route

Route::get("/search-Data", [App\Http\Controllers\ProcessController::class, 'search'])->name('search');
Route::get("/search", [App\Http\Controllers\ProcessController::class, 'result'])->name('result');

///

Route::get("marginUser-of-product/{id}", [App\Http\Controllers\MarginUerController::class, 'marginUserOfProduct'])->name('marginUserOfProduct');


Route::get("status/chart", [App\Http\Controllers\StockController::class, 'statusChart']);
Route::get("marginPer", [App\Http\Controllers\StockController::class, 'marginPer']);

Route::get("marginUser/chart", [App\Http\Controllers\StockController::class, 'marginUser']);

//proccess Statistics Route
Route::get("proccessStatistics/{id}", [App\Http\Controllers\ProcessController::class, 'proccessStatistics'])->name('proccessStatistics');

//project statistics Route
Route::get("projectStatistics", [App\Http\Controllers\ProcessController::class, 'projectStatistics'])->name('projectStatistics');


//Product Statistics Route
Route::get("productStatistics", [App\Http\Controllers\prodStatisticController::class, 'productStatistics'])->name('productStatistics');
Route::get("Statistics", [App\Http\Controllers\prodStatisticController::class, 'Statistics'])->name('Statistics');
Route::get("Statistics1", [App\Http\Controllers\prodStatisticController::class, 'Statistics1'])->name('Statistics1');
Route::get("Statistics2", [App\Http\Controllers\prodStatisticController::class, 'Statistics2'])->name('Statistics2');
Route::get("Statistics3", [App\Http\Controllers\prodStatisticController::class, 'Statistics3'])->name('Statistics3');
Route::get("Statistics4", [App\Http\Controllers\prodStatisticController::class, 'Statistics4'])->name('Statistics4');
Route::get("Statistics5", [App\Http\Controllers\prodStatisticController::class, 'Statistics5'])->name('Statistics5');
Route::get("Statistics6", [App\Http\Controllers\prodStatisticController::class, 'Statistics6'])->name('Statistics6');
Route::get("Statistics7", [App\Http\Controllers\prodStatisticController::class, 'Statistics7'])->name('Statistics7');
Route::get("Statistics8", [App\Http\Controllers\prodStatisticController::class, 'Statistics8'])->name('Statistics8');
Route::get("Statistics9", [App\Http\Controllers\prodStatisticController::class, 'Statistics9'])->name('Statistics9');
Route::get("Statistics10", [App\Http\Controllers\prodStatisticController::class, 'Statistics10'])->name('Statistics10');








//Localization Route
Route::get("locale/{lange}", [App\Http\Controllers\LocalizationController::class, 'setLang'])->name('lang');

Auth::routes();



Route::get('/', function () {
    return view('auth.login');
});
//for logout
// Route::view('/logout', '/');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');


Route::get('/table', function () {
    return view('table-data');
});
Route::get('/insert', function () {
    return view('insert');
});


//a route for the test
Route::get('/test', function () {
});

Route::get('/home/index', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::post('project/fetch', [App\Http\Controllers\HomeController::class, 'fetch'])->name('project.fetch');

Route::group(
    ['prefix' => 'home'],
    function () {
    }
);

Route::get('/download/{id}', [App\Http\Controllers\PDFController::class, 'download'])->name('download');
Route::get('/doownload/{id}', [App\Http\Controllers\PDFController::class, 'doownload'])->name('doownload');

Route::resource('add', App\Http\Controllers\AddadminController::class);

// WetWipes
Route::resource('product', App\Http\Controllers\ProductController::class);
Route::post('product/create2', [App\Http\Controllers\ProductController::class, 'create2'])->name('product.create2');
Route::resource('product/PaperBox', App\Http\Controllers\PaperBoxController::class);
Route::resource('product/PaperCup', App\Http\Controllers\PaperCupController::class);
Route::resource('product/PaperWrap', App\Http\Controllers\PaperWrapController::class);
Route::resource('product/PaperNabkins', App\Http\Controllers\PaperNabkinsController::class);
Route::resource('product/PlasticCups', App\Http\Controllers\PlasticCupsController::class);
Route::resource('product/HandlePaperBag', App\Http\Controllers\HandlePaperBagController::class);
Route::resource('product/SosWithoutHandleBag', App\Http\Controllers\SosWithoutHandleBagController::class);
Route::resource('product/PlasticBag', App\Http\Controllers\PlasticBagController::class);
Route::resource('product/SachelBag', App\Http\Controllers\SachelBagController::class);
Route::resource('product/CorrugatedBox', App\Http\Controllers\CorrugatedBoxController::class);
Route::resource('product/Other', App\Http\Controllers\OtherController::class);
Route::resource('product/PaperBox', App\Http\Controllers\PaperBoxController::class);


// Route::get("product/CorrugatedBox", [App\Http\Controllers\CorrugatedBoxController::class, 'store'])->name('create_CorrugatedBox');
// Route::put("product/CorrugatedBox/{id}", [App\Http\Controllers\CorrugatedBoxController::class, 'update'])->name('update_CorrugatedBox');
// edit
Route::resource('product/WetWipes', App\Http\Controllers\Wet_WipesController::class);
Route::resource('product/cartonbox', App\Http\Controllers\CartonBoxController::class);

// Route::put("WetWipes/{id}", [App\Http\Controllers\Wet_WipesController::class, 'update'])->name('update-Wet_Wipes');


Route::resource('file', App\Http\Controllers\FileController::class);
// edited section
Route::resource('process', App\Http\Controllers\ProcessController::class);
//////////////////////// Customized
Route::resource('project', App\Http\Controllers\ProjectController::class);
Route::post('project/projectCreate', [App\Http\Controllers\ProjectController::class, 'projetCreate'])->name('projectCreate');
Route::get('project/processIndex/{id}', [App\Http\Controllers\ProjectController::class, 'processIndex'])->name('processIndex');
Route::post('process/createProcess', [App\Http\Controllers\ProcessController::class, 'createProcess'])->name('createProcess');
////////////////////////
Route::resource('supplier', App\Http\Controllers\SupplierController::class);
Route::resource('customer', App\Http\Controllers\CustomersController::class);

Route::get('/{page}', [AdminController::class, 'index']);
