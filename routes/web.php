<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\MarketingMediaController;
use App\Http\Controllers\admin\TestimonialController;
use App\Http\Controllers\admin\CarController;
use App\Http\Controllers\CarDetailsController;
use App\Http\Controllers\admin\FaqController;
use App\Http\Controllers\admin\SubscribeController;
use App\Http\Controllers\admin\SettingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('send-test-email', function () {
    Mail::raw('This is a test email.', function ($message) {
        $message->to('faizan.devpro@gmail.com')
            ->subject('Test Email');
    });

    return 'Test email sent!';
});

////Static Pages
Route::get('/', [PageController::class, 'home'])->name('index');
Route::post('car-details/store', [CarDetailsController::class, 'storeCarInfo'])->name('car-details.store');
Route::get('/car-makes', [PageController::class, 'getMakes']);
Route::get('/car-years/{makeId}', [PageController::class, 'getYears']);
Route::get('/car-models/{makeId}/{yearId}', [PageController::class, 'getModels']);
// Route::get('/get-models', [PageController::class, 'getModelsByCarType'])->name('car-types.getModels');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::post('/store-car-names', [PageController::class, 'storeCarNames']);
Route::post('/store-car-data', [PageController::class, 'storeCarData']);

//Blog
Route::get('/blog/view/{id}/{name}', [PageController::class, 'blog_view']);

//Subscribe
Route::post('/subscribe/store', [PageController::class, 'subscribe']);

//Auth Routes
Auth::routes(['register' => false]);

Route::get('/home', function () {
    return redirect('dashboard');
});
Route::get('/admin', function () {
    return redirect('dashboard');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');

    //Banners
    Route::get('/banners', [AdminController::class, 'banners'])->name('banners');
    Route::post('/store_banner', [AdminController::class, 'store_banner'])->name('store-banner');
    Route::delete('/delete-banners/{id}', [AdminController::class,'destroy'])->name('banners.destroy');

    //MarketingMedia
    Route::get('/admin/marketing-media', [MarketingMediaController::class, 'index'])->name('admin.marketing-media.index');
    Route::get('/admin/marketing-media/create', [MarketingMediaController::class, 'create'])->name('admin.marketing-media.create');
    Route::post('/admin/marketing-media', [MarketingMediaController::class, 'store'])->name('admin.marketing-media.store');
    Route::get('/admin/marketing-media/{id}', [MarketingMediaController::class, 'show'])->name('admin.marketing-media.show');
    Route::get('/admin/marketing-media/{id}/edit', [MarketingMediaController::class, 'edit'])->name('admin.marketing-media.edit');
    Route::put('/admin/marketing-media/{id}', [MarketingMediaController::class, 'update'])->name('admin.marketing-media.update');
    Route::delete('/admin/marketing-media/{id}', [MarketingMediaController::class, 'destroy'])->name('admin.marketing-media.destroy');

    //Blog
    Route::get('admin/blog', [BlogController::class, 'index'])->name('admin.blog.index');
    Route::get('admin/blog/create', [BlogController::class, 'create'])->name('admin.blog.create');
    Route::post('admin/blog', [BlogController::class, 'store'])->name('admin.blog.store');
    Route::get('admin/blog/{id}/edit', [BlogController::class, 'edit'])->name('admin.blog.edit');
    Route::post('admin/blog/{id}', [BlogController::class, 'update'])->name('admin.blog.update');
    Route::delete('admin/blog/{id}', [BlogController::class, 'destroy'])->name('admin.blog.destroy');
    Route::post('/upload-image', [BlogController::class, 'image_store']);

    //Settings
    Route::get('/admin/settings', [SettingController::class, 'settings'])->name('admin.settings');
    Route::post('/admin/settings/create', [SettingController::class, 'create'])->name('admin.settings.create');

    //Car
    Route::get('/admin/cars', [CarController::class, 'index'])->name('admin.cars.index');
    Route::get('/admin/cars/create', [CarController::class, 'create'])->name('admin.cars.create');
    Route::post('/admin/cars', [CarController::class, 'store'])->name('admin.cars.store');
    Route::get('/admin/cars/{car}/edit', [CarController::class, 'edit'])->name('admin.cars.edit');
    Route::put('/admin/cars/{car}', [CarController::class, 'update'])->name('admin.cars.update');
    Route::delete('/admin/cars/{car}', [CarController::class, 'destroy'])->name('admin.cars.destroy');


    //Car-Details
    Route::get('/admin/car_detail', [CarDetailsController::class, 'index'])->name('admin.car_detail.index');
    Route::get('/admin/car_detail/{car}', [CarDetailsController::class, 'show'])->name('admin.car_detail.show');
    Route::delete('/admin/car_detail/{car}', [CarDetailsController::class, 'destroy'])->name('admin.car_detail.destroy');

    Route::get('admin/testimonial', [TestimonialController::class, 'index'])->name('admin.testimonial.index');
    Route::get('admin/testimonial/create', [TestimonialController::class, 'create'])->name('admin.testimonial.create');
    Route::post('admin/testimonial', [TestimonialController::class, 'store'])->name('admin.testimonial.store');
    Route::get('admin/testimonial/{id}/edit', [TestimonialController::class, 'edit'])->name('admin.testimonial.edit');
    Route::post('admin/testimonial/{id}', [TestimonialController::class, 'update'])->name('admin.testimonial.update');
    Route::delete('admin/testimonial/{id}', [TestimonialController::class, 'destroy'])->name('admin.testimonial.destroy');

    //faqs
    Route::get('/admin/faqs', [FaqController::class, 'index'])->name('admin.faqs.index');
    Route::get('/admin/faqs/create', [FaqController::class, 'create'])->name('admin.faqs.create');
    Route::post('/admin/faqs', [FaqController::class, 'store'])->name('admin.faqs.store');
    Route::get('/admin/faqs/{faq}', [FaqController::class, 'show'])->name('admin.faqs.show');
    Route::get('/admin/faqs/{faq}/edit', [FaqController::class, 'edit'])->name('admin.faqs.edit');
    Route::put('/admin/faqs/{faq}', [FaqController::class, 'update'])->name('admin.faqs.update');
    Route::delete('/admin/faqs/{faq}', [FaqController::class, 'destroy'])->name('admin.faqs.destroy');

    //Subscriber
    Route::get('/admin/subscribe', [SubscribeController::class, 'index'])->name('admin.subscribe');
    Route::delete('/admin/subscribe/{id}', [SubscribeController::class, 'destroy'])->name('admin.subscribe.destroy');


    //Change Password
    Route::get('/password-reset', [AdminController::class, 'password_reset'])->name('password-reset');
    Route::post('/password-post', [AdminController::class, 'password_post'])->name('changepassword');


    //About
    Route::get('admin/about', [AboutController::class, 'index'])->name('admin.about.index');
    Route::get('admin/about/create', [AboutController::class, 'create'])->name('admin.about.create');
    Route::post('admin/about', [AboutController::class, 'store'])->name('admin.about.store');
    Route::get('admin/about/edit', [AboutController::class, 'edit'])->name('admin.about.edit');
    Route::get('admin/about/view', [AboutController::class, 'view'])->name('admin.about.view');
    Route::post('admin/about/{id}', [AboutController::class, 'update'])->name('admin.about.update');
    Route::delete('admin/about/{id}', [AboutController::class, 'destroy'])->name('admin.about.destroy');
});


