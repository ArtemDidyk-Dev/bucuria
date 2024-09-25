<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\IngradientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;

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

Route::get('/sitemap.xml', [SitemapController::class, 'index']);

Route::group([
	'prefix' => Lang::prefix(),
	'middleware' => [
		\App\FastAdminPanel\Middleware\Convertor::class,
		//\App\FastAdminPanel\Middleware\RedirectSEO::class,
	]
], function () {

	Route::get('/', [PageController::class, 'index'])->name('home');
	Route::get('/ingradients', [IngradientController::class, 'ingradients'])->name('ingradients');
	Route::get('/ingradients/{slug}', [IngradientController::class, 'ingradient'])->name('ingradient');
	Route::get('/aboutus', [PageController::class, 'aboutus'])->name('aboutus');
	Route::get('/find-us', [PageController::class, 'findus'])->name('findus');
	Route::get('/history', [PageController::class, 'history'])->name('history');
	Route::get('/career', [PageController::class, 'career'])->name('career');
	Route::get('/contact', [PageController::class, 'contact'])->name('contact');
	Route::get('/certificates', [PageController::class, 'certificates'])->name('certificates');
	Route::any('/search', [SearchController::class, 'search'])->name('search');
	Route::any('/catalog/{category:slug?}', [CatalogController::class, 'catalog'])->name('catalog');
	Route::any('/product/{slug}', [ProductController::class, 'product'])->name('product');
	Route::any('/shops', [ShopController::class, 'shops'])->name('shops');
	Route::any('/account', [AccountController::class, 'account'])->name('account');
	Route::get('/suppliers', [PageController::class, 'suppliers'])->name('suppliers');

	Route::post('/api/register', [AuthController::class, 'register'])->name('api-register');
	Route::post('/api/register-loyalty', [AuthController::class, 'registerLoyalty'])->name('api-register-loyalty');
	Route::post('/api/login', [AuthController::class, 'login'])->name('api-login');
	Route::post('/api/logout', [AuthController::class, 'logout'])->name('api-logout');
	Route::post('/api/sendcode', [AuthController::class, 'sendCode'])->name('api-sendcode');
	Route::post('/api/checkcode', [AuthController::class, 'checkCode'])->name('api-checkcode');
	Route::post('/api/changepassword', [AuthController::class, 'changePassword'])->name('api-changepassword');

	Route::post('/send-contact', [PageController::class, 'send_contact'])->name('send-contact');

	Route::post('/api/search', [SearchController::class, 'apiSearch'])->name('api-search');

	Route::post('/api/user-edit', [AccountController::class, 'edit'])->name('api-user-edit');

    Route::get('/development', function () {
        return response()->view("errors.development");
    })->name('development');

    Route::post('access/{standart}', [PageController::class, 'access'])->name('access.page');

    Route::get('/{slug}', [PageController::class, 'standart'])->name('standart');

	Route::fallback(function () {
		return response()->view("errors.404")->setStatusCode(404);
	});
});
