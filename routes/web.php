<?php

use Illuminate\Support\Facades\Route;
// for auth
use App\Http\Controllers\AuthController;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartController;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\AdminController;




// *********** Index - domov - novinky pre men *************
Route::get('/{gender?}', [IndexController::class, 'index'])
    ->where('gender', 'men|women|kids')     // men, women, kids or null (= men)
    ->name('home');

// *********** Products - produkty *************
// /products/{gender}/{category?}
Route::get('/products/{gender}/{category?}', [ProductsController::class, 'filter'])
    ->where('gender', 'men|women|kids')
    ->where('category', 'Clothes|Sport|Streetwear|Accessories|Sales')
    ->name('products.filter');



// *********** Products Detail *************
// send id of product to ProductDetailController in show method
Route::get('/product_detail/{id}', [ProductDetailController::class, 'show'])
    ->name('product.detail');

// *********** Shopping_cart*************
Route::get('/cart', [CartController::class, 'load'])
    ->name('shopping_cart');

// *********** Shopping_cart cez add product*************
Route::post('/add-to-cart', [\App\Http\Controllers\CartController::class, 'addToCart'])
    ->name('cart.add');

// *********** Shopping_cart cez remove product*************
Route::post('/remove-from-cart', [\App\Http\Controllers\CartController::class, 'removeFromCart'])
    ->name('cart.remove');

// *********** Shopping_cart cez update quantity*************
Route::post('/cart/update-quantity', [CartController::class, 'updateQuantity'])
    ->name('cart.updateQuantity');

// *********** Address *************
Route::get('/address' , [\App\Http\Controllers\AddressController::class, 'index'])
    ->name('address.index');

Route::post('/address', [\App\Http\Controllers\AddressController::class, 'store'])
    ->name('address.store');

// *********** Shippin *************
Route::get('/shipping' , [\App\Http\Controllers\ShippingController::class, 'index'])
    ->name('shipping.index');

Route::post('/shipping', [\App\Http\Controllers\ShippingController::class, 'store'])
    ->name('shipping.store');

// *********** Choosing-payment *************
Route::get('/choosing-payment' , [\App\Http\Controllers\PaymentController::class, 'loadPaymentOptions'])
    ->name('payment.loadPaymentOptions');

// *********** Payment(card_info) *************
Route::get('/payment' , [\App\Http\Controllers\PaymentController::class, 'loadPayment'])
    ->name('payment.loadPayment');
// post
Route::post('/payment', [\App\Http\Controllers\PaymentController::class, 'processPayment'])
    ->name('payment.process');

// *********** Order confirmed *************
Route::get('/confirmed' , [\App\Http\Controllers\OrderConfirmedController::class, 'index'])
    ->name('confirmed.index');


// ****************************************************
// ********************* Authorization *********************

// show login form - we go to localhost:8000/login
// it triggers showLoginForm() method in AuthController
// and it returns view('auth.login-page')
Route::get('login', [AuthController::class, 'showLoginForm'])
    ->name('login');

// send login form
Route::post('login', [AuthController::class, 'login']);

// logout - only with post
Route::post('logout', [AuthController::class, 'logout'])
    ->name('logout');

// show registration form
Route::get('register', [AuthController::class, 'showRegistrationForm'])
    ->name('register');

// send registtration form
Route::post('register', [AuthController::class, 'register']);

// profile for logged in users
Route::middleware('auth')->get('profile', [AuthController::class, 'profile'])
    ->name('profile.show');

// // ********************* end of authorization *********************
// ****************************************************



// ****************** profile *****************
Route::middleware('auth')->put('/profile', [AuthController::class, 'updateProfile'])
    ->name('profile.update');
// ****************** end of profile *****************



// alias
Route::aliasMiddleware('is_admin', IsAdmin::class);

// ****************** Admin login *****************
Route::middleware(['auth', 'is_admin'])      // auth = prihlasnie, is_admin = tvoj alias
->prefix('admin_dashboard')                      // URL: /admin/…
->name('admin.')                       // nazvy rout zacinaju 'admin.'
->group(function () {
    Route::get('/', [IndexController::class, 'index'])
        ->name('index');              //  route('admin.index')


    Route::get('/add-product', [AdminController::class, 'addProduct'])
        ->name('add_product');        //  route('admin.add_product')

    // store  -  POST /admin_dashboard/add-product
    Route::post('/add-product', [AdminController::class, 'storeProduct'])
        ->name('store_product');

    // EDIT
    Route::get ('/edit-product/{product}',   [AdminController::class,'editProduct'])->name('edit_product');
    Route::put ('/edit-product/{product}',   [AdminController::class,'updateProduct'])->name('update_product');



});
// **************** End of admin ************************************
