<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ContactUsController;
use App\Http\Controllers\backend\CustomerController;
use App\Http\Controllers\backend\DeliveryManController;
use App\Http\Controllers\backend\DeliveryOrderTrackingController;
use App\Http\Controllers\backend\PaymentController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\ReportController;
use App\Http\Controllers\backend\SubCategoryController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\FOReceiptController;
use App\Http\Controllers\frontend\FrontUserController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\LanguageController;
use App\Http\Controllers\frontend\PageController;
use App\Http\Controllers\frontend\SearchController;
use App\Http\Controllers\frontend\ShopController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\SupportController;
use Faker\Guesser\Name;
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

//////////////////////////frontend///////////////////////////

//Frontend_all
Route::get('/', [HomeController::class, 'frontendHome'])->name('home');

///////////////frontend reg & login////////////////////

Route::post('/register-submit-front', [HomeController::class, 'registerSubmitForm'])->name('register.submit.front');
Route::post('/login-submit-front', [HomeController::class, 'loginSubmitForm'])->name('login.submit.front');
Route::get('/frontlogout', [HomeController::class, 'frontLogout'])->name('front.logout');
Route::post('/front-pass-update', [HomeController::class, 'frontPassUpdate'])->name('front.pass.update');

Route::get('/switch-language/{lang}', [LanguageController::class, 'changeLanguage'])->name('switch.language');

//////////////////------------front search-----------/////////////////

Route::get('/search', [SearchController::class, 'search'])->name('search');

/////////////////////-----frontend Category routes-----//////////////////////////

Route::get('/shop', [ShopController::class, 'shopPage'])->name('shop.page');

Route::get('/product/-under-category/{category_id}', [HomeController::class, 'productUnderCategory'])->name('product.under.catagory');

/////////////////////------- Shop Details -------//////////////////////////////

Route::get('/pages-shop-details/{id}', [PageController::class, 'pagesShopDetails'])->name('pages.shop.details');

Route::get('/cart', [CartController::class, 'cartDetails'])->name('cart.details');
Route::get('/add-cart/{id}', [CartController::class, 'addCartPage'])->name('add.cart.page');
Route::get('/delete-cart-item/{id}', [CartController::class, 'deleteCartItem'])->name('delete.cart.item');
Route::post('/cart-update/{id}', [CartController::class, 'updateCartItem'])->name('update.cart.item');

/////////////----------Front Support---------//////////
//support
Route::get('/frontend-support', [SupportController::class, 'support'])->name('frontend.support.support');
Route::post('/frontend-support-message', [SupportController::class, 'message'])->name('frontend.support.message');

///////////////////////-----------front user         &&&&&&     Check-out--------------///////////////////////

Route::group(['middleware' => ['auth:customer']], function () {

    Route::get('/frontUser-profile', [FrontUserController::class, 'frontUserProfile'])->name('frontuser.profile');
    Route::get('/frontUser-order-track/{id}', [FrontUserController::class, 'frontUserOrderTrack'])->name('frontuser.order.track');
    Route::post('/frontUser-profile-update', [FrontUserController::class, 'frontUserProfileUpdate'])->name('frontuser.profile.update');

    Route::get('/front-order-receipt/{id}', [FOReceiptController::class, 'frontOrderReceipt'])->name('front.order.receipt');

    Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');

    Route::get('/cancel-order/{id}', [FrontUserController::class, 'cancelOrder'])->name('cancel.order');

//////////---------- ssl commerz-----------//////////

    Route::post('/pay', [SslCommerzPaymentController::class, 'index'])->name("pay.now");
//Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

    Route::post('/success', [SslCommerzPaymentController::class, 'success'])->name('payment.success');
    Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
    Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);
});

/////////////////Blog Page////////////////////////
Route::get('/blog', [BlogController::class, 'blog'])->name('blog');
Route::get('/blog-details', [BlogController::class, 'blogDetails'])->name('blog.details');

//////////////////////Contact//////////////////////////////
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::get('/contact-submit', [ContactController::class, 'contactSubmit'])->name('contact.submit');

///////////////Backend////////////////

//login

Route::get('/register', [AuthController::class, 'registerForm'])->name('register.form');
Route::post('/register-submit', [AuthController::class, 'registerSubmitForm'])->name('register.submit.form');

//////------Reset Password-------///////

Route::get('/forgot-password-link', [ForgotPasswordController::class, 'forgotPass'])->name('forgot.pass.link');
Route::post('/submit-forgot-password', [ForgotPasswordController::class, 'submitForgotPass'])->name('submit.forgot.pass');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'newPass'])->name('reset.pass.link');
Route::post('/submit-reset-password', [ForgotPasswordController::class, 'submitResetPassword'])->name('submit.reset.pass');

//all_routes

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login-submit', [AuthController::class, 'loginSubmitForm'])->name('login.submit');

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    /////////-----Dashboard-----/////////

    Route::get('/master-dashboard', [AdminController::class, 'master']);
    Route::get('/dashboard', [AdminController::class, 'newPage'])->name('admin.newPage');

    ////////////-----User Profile-----/////////////
    Route::get('/my-profile', [ProfileController::class, 'myProfile'])->name('my.profile');
    Route::put('/profile-update', [ProfileController::class, 'profileUpdate'])->name('profile.update');

    Route::get('/category-list', [CategoryController::class, 'list'])->name('category.list');
    Route::get('/category-create-from', [CategoryController::class, 'createForm'])->name('create.form');
    Route::post('/category-submit-from', [CategoryController::class, 'submitForm'])->name('submit.form');
    Route::get('/edit-category/{id}', [CategoryController::class, 'editCategory'])->name('edit.category');
    Route::put('/update-category/{id}', [CategoryController::class, 'updateCategory'])->name('update.category');
    Route::get('/delete-category/{id}', [CategoryController::class, 'deleteCategory'])->name('delete.category');
    Route::get('/view-category/{id}', [CategoryController::class, 'viewCategory'])->name('view.category');

    Route::get('/sub-category-list', [SubCategoryController::class, 'list'])->name('sub.category.list');
    Route::get('/sub-category-create-form', [SubCategoryController::class, 'createForm'])->name('sub.category.create.form');
    Route::post('/sub-category-submit-form', [SubCategoryController::class, 'submitForm'])->name('sub.category.submit.form');
    Route::get('/sub-category-edit/{id}', [SubCategoryController::class, 'editSubCategory'])->name('edit.sub.category');
    Route::put('/sub-category-update/{id}', [SubCategoryController::class, 'updateSubCategory'])->name('update.sub.category');
    Route::get('/delete-sub-category/{id}', [SubCategoryController::class, 'deleteSubCategory'])->name('delete.sub.category');
    Route::get('/sub-category-view/{id}', [SubCategoryController::class, 'viewSubCategory'])->name('view.sub.category');

    Route::get('/brand-list', [BrandController::class, 'list'])->name('brand.list');
    Route::get('/brand-create-form', [BrandController::class, 'createForm'])->name('brand.create.form');
    Route::post('/brand-submit-form', [BrandController::class, 'submitForm'])->name('brand.submit.form');
    Route::get('/brand-edit/{id}', [BrandController::class, 'editBrand'])->name('edit.brand');
    Route::put('/update-brand/{id}', [BrandController::class, 'updateBrand'])->name('update.brand');
    Route::get('/delete-brand/{id}', [BrandController::class, 'deleteBrand'])->name('delete.brand');
    Route::get('/brand-view/{id}', [BrandController::class, 'viewBrand'])->name('view.brand');

    Route::get('/product-list', [ProductController::class, 'list'])->name('product.list');
    Route::get('/product-create-form', [ProductController::class, 'createForm'])->name('product.create.form');
    Route::post('/product-submit-form', [ProductController::class, 'submitForm'])->name('product.submit.form');
    Route::get('/product-edit/{id}', [ProductController::class, 'editProduct'])->name('edit.product');
    Route::put('/product-update/{id}', [ProductController::class, 'updateProduct'])->name('update.product');
    Route::get('/delete-product/{id}', [ProductController::class, 'deleteProduct'])->name('delete.product');
    Route::get('/product-view/{id}', [ProductController::class, 'viewProduct'])->name('view.product');

    Route::get('/customer-list', [CustomerController::class, 'list'])->name('customer.list');
    Route::get('/customer-create-form', [CustomerController::class, 'createForm'])->name('customer.create.form');
    Route::post('/customer-submit-form', [CustomerController::class, 'submitForm'])->name('customer.submit.form');
    Route::get('/customer-edit/{id}', [CustomerController::class, 'editCustomer'])->name('edit.customer');
    Route::put('/customer-update/{id}', [CustomerController::class, 'updateCustomer'])->name('update.customer');
    Route::get('/delete-customer/{id}', [CustomerController::class, 'deleteCustomer'])->name('delete.customer');
    Route::get('/customer-view/{id}', [CustomerController::class, 'viewCustomer'])->name('view.customer');

    /////////////////------Order--------////////////////////

    Route::get('/order-list', [AdminController::class, 'orderList'])->name('order.list');
    Route::get('/order-reciept/{id}', [AdminController::class, 'orderReciept'])->name('order.reciept');
    Route::get('/order-edit/{id}', [AdminController::class, 'orderEdit'])->name('order.edit');
    Route::get('/order-update/{id}', [AdminController::class, 'orderUpdate'])->name('order.update');

    Route::get('/todays-order', [AdminController::class, 'todaysOrder'])->name('todays.order');

    /////////////-------User-------////////////////

    Route::get('/user-list', [UserController::class, 'userList'])->name('user.list');

    ///////////-------Delivery Man--------///////////
    Route::get('/delivery-man-list', [DeliveryManController::class, 'dManList'])->name('delivery.man.list');
    Route::get('/delivery-man-create', [DeliveryManController::class, 'dManCreate'])->name('delivery.man.create');
    Route::post('/delivery-man-submit', [DeliveryManController::class, 'dManSubmit'])->name('delivery.man.submit');
    Route::get('/delivery-man-edit/{id}', [DeliveryManController::class, 'dManEdit'])->name('delivery.man.edit');
    Route::put('/delivery-man-update/{id}', [DeliveryManController::class, 'dManUpdate'])->name('delivery.man.update');
    Route::get('/delivery-man-delete/{id}', [DeliveryManController::class, 'dManDelete'])->name('delivery.man.delete');

    //////////----------Order Tracking------------//////////////

    //    Route::get('/dot-list', [DeliveryOrderTrackingController::class, 'dOrderTracking'])->name('dot.list');
    //    Route::get('/dot-create', [DeliveryOrderTrackingController::class, 'dOTCreate'])->name('dot.create');
    //    Route::post('/dot-submit', [DeliveryOrderTrackingController::class, 'dOTSubmit'])->name('dot.submit');
    //    Route::get('/dot-edit/{id}', [DeliveryOrderTrackingController::class, 'dOTEdit'])->name('dot.edit');

    //////////----------Order Tracking------------//////////////

    Route::get('/edit-order/{id}', [DeliveryOrderTrackingController::class, 'editOrder'])->name('order.edit');
    Route::put('/update-order/{id}', [DeliveryOrderTrackingController::class, 'updateOrder'])->name('order.update');

    ////////////////----------------payment list----------------////////////////

    Route::get('/payment', [PaymentController::class, 'paymentList'])->name('payment.list');

    //////////-------------contact us-------------//////////////////

    Route::get('/contact-us-list', [ContactUsController::class, 'contactUsList'])->name('contact.us');
    Route::get('/contact-edit/{id}', [ContactUsController::class, 'contactEdit'])->name('edit.contact');
    Route::post('/contact-reply-submit/{id}', [ContactUsController::class, 'contactReplySubmit'])->name('contact.reply.submit');

    ////////////////-------------Support------------////////////////
    Route::get('/backend-support-list', [SupportController::class, 'list'])->name('backend.support.list');
    Route::get('/backend-suport-reply/{id}', [SupportController::class, 'reply'])->name('backend.support.reply');
    Route::post('/backend-support-send', [SupportController::class, 'send'])->name('backend.support.send');

    //////////////-------Report------////////////////

    Route::get('/report', [ReportController::class, 'report'])->name('order.report');
    Route::get('/report-search', [ReportController::class, 'reportSearch'])->name('order.report.search');
});

//////////////////////////// SSLCOMMERZ Start ////////////////////////////

//Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
// Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

//if mobile transection happens then this route will work//

//Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END