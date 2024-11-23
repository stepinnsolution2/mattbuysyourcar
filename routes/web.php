<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\admin\DonationController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\TeamController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\MarketingMediaController;
use App\Http\Controllers\admin\AdminContactController;
use App\Http\Controllers\admin\NurseryController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\TransporterController;
use App\Http\Controllers\admin\CarController;
use App\Http\Controllers\CarDetailsController;
use App\Http\Controllers\admin\FaqController;

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
Route::get('/get-models', [PageController::class, 'getModelsByCarType'])->name('car-types.getModels');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/act', [PageController::class, 'act'])->name('act');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/gallery', [PageController::class, 'gallery'])->name('gallery');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/transportor', [PageController::class, 'transportor'])->name('transportor');
Route::get('/nursery', [PageController::class, 'nursery'])->name('nursery');
Route::get('/projects', [PageController::class, 'projects'])->name('projects');
Route::get('/nursery_detail/{id}', [PageController::class, 'nursery_detail'])->name('nursery.detail');
Route::get('/service_detail/{id}', [PageController::class, 'services_detail'])->name('service.detail');
Route::get('/team', [PageController::class, 'team'])->name('team');
Route::get('/events', [PageController::class, 'event'])->name('events');
Route::get('/events/event/{id}', [PageController::class, 'event_detail'])->name('event.detail');
Route::get('/event_detail2', [PageController::class, 'event_detail2'])->name('event_detail2');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/donationmodel', [PageController::class, 'donationmodel'])->name('donationmodel');
Route::get('/nursery_donation/{id}', [PageController::class, 'nursery_donation'])->name('nursery_donation');
Route::get('/seed_donation/{id}', [PageController::class, 'seed_donation'])->name('seed_donation');
Route::get('/envelop_donation/{id}', [PageController::class, 'envelop_donation'])->name('envelop_donation');
Route::get('/transport_donation/{id}', [PageController::class, 'transport_donation'])->name('transport_donation');
Route::post('/contact_store', [ContactController::class, 'store'])->name('store.contact');
Route::post('/store_donation', [DirectDonationController::class, 'store_donation'])->name('store_donation');
Route::post('/nursery_donation', [NurseryDonationController::class, 'store'])->name('nursery_donation_store');
Route::post('/seed_donation', [SeedDonationController::class, 'store'])->name('store_seed_donation');
Route::post('/envelop_donation', [EnvelopDonationController::class, 'store'])->name('store_envelop_donation');
Route::post('/nursery_donation', [NurseryDonationController::class, 'store'])->name('store_nursery_donation');
Route::post('/transport_donation', [TransporterDonationController::class, 'store'])->name('store_transport_donation');
// Route::get('/cloudinary/test', [EventController::class, 'testCloudinary']);
// Route::get('/config-check', function () {
//     return response()->json([
//         'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
//         'api_key' => env('CLOUDINARY_API_KEY'),
//         'api_secret' => env('CLOUDINARY_API_SECRET'),
//         'upload_preset' => env('CLOUDINARY_UPLOAD_PRESET'),
//         'notification_url' => env('CLOUDINARY_NOTIFICATION_URL'),
//         'url' => env('CLOUDINARY_URL'),
//     ]);
// });

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

    //Gallery
    Route::get('/admin/gallery', [GalleryController::class, 'gallery'])->name('admin.gallery');
    Route::post('/store_gallery', [GalleryController::class, 'store_gallery'])->name('admin.store.gallery');
    Route::delete('/delete-gallery/{id}', [GalleryController::class,'destroy'])->name('admin.gallery.destroy');

    //Donation
    Route::get('/admin/directdonation', [DirectDonationController::class, 'index'])->name('admin.directdonation');
    Route::delete('/admin/donations/{id}', [DirectDonationController::class, 'destroy'])->name('admin.donations.destroy');
    Route::get('/admin/donations/view/{id}', [DirectDonationController::class, 'view'])->name('admin.donations.view');


    //Nursery donation
    Route::get('/admin/nurserydonation', [NurseryDonationController::class, 'index'])->name('admin.nurserydonation');
    Route::delete('/admin/nurserydonation/{id}', [NurseryDonationController::class, 'destroy'])->name('admin.nurserydonation.destroy');
    Route::get('/admin/nurserydonation/view/{donation}/{nursery}', [NurseryDonationController::class, 'view'])->name('admin.nurserydonation.view');

    //Seeds donation
    Route::get('/admin/seedsdonation', [SeedDonationController::class, 'index'])->name('admin.seedsdonation');
    Route::delete('/admin/seedsdonation/{id}', [SeedDonationController::class, 'destroy'])->name('admin.seedsdonation.destroy');
    Route::get('/admin/seedsdonation/view/{donation}/{seed}', [SeedDonationController::class, 'view'])->name('admin.seedsdonation.view');

    //Envelops donation
    Route::get('/admin/envelopsdonation', [EnvelopDonationController::class, 'index'])->name('admin.envelopsdonation');
    Route::delete('/admin/envelopsdonation/{id}', [EnvelopDonationController::class, 'destroy'])->name('admin.envelopsdonation.destroy');
    Route::get('/admin/envelopsdonation/view/{donation}/{envelop}', [EnvelopDonationController::class, 'view'])->name('admin.envelopsdonation.view');

     //Transporters donation
     Route::get('/admin/transporterdonation', [TransporterDonationController::class, 'index'])->name('admin.transporterdonation');
     Route::delete('/admin/transporterdonation/{id}', [TransporterDonationController::class, 'destroy'])->name('admin.transporterdonation.destroy');
     Route::get('/admin/transporterdonation/view/{donation}/{transporter}', [TransporterDonationController::class, 'view'])->name('admin.transporterdonation.view');

    //Contact
    Route::get('/admin/contact', [AdminContactController::class, 'index'])->name('admin.contact');
    Route::delete('/admin/contact/{id}', [AdminContactController::class, 'destroy'])->name('admin.contact.destroy');

    //Change Password
    Route::get('/password-reset', [AdminController::class, 'password_reset'])->name('password-reset');
    Route::post('/password-post', [AdminController::class, 'password_post'])->name('changepassword');

    //Settings
    Route::get('/admin/settings', [SettingController::class, 'settings'])->name('admin.settings');
    Route::post('/admin/settings/create', [SettingController::class, 'create'])->name('admin.settings.create');

    //Team
    Route::get('admin/team', [TeamController::class, 'index'])->name('admin.team.index');
    Route::get('admin/team/create', [TeamController::class, 'create'])->name('admin.team.create');
    Route::post('admin/team', [TeamController::class, 'store'])->name('admin.team.store');
    Route::get('admin/team/{id}/edit', [TeamController::class, 'edit'])->name('admin.team.edit');
    Route::post('admin/team/{id}', [TeamController::class, 'update'])->name('admin.team.update');
    Route::delete('admin/team/{id}', [TeamController::class, 'destroy'])->name('admin.team.destroy');

    //Volunteer
    Route::get('admin/volunteer', [VolunteerController::class, 'index'])->name('admin.volunteer.index');
    Route::get('admin/volunteer/create', [VolunteerController::class, 'create'])->name('admin.volunteer.create');
    Route::post('admin/volunteer', [VolunteerController::class, 'store'])->name('admin.volunteer.store');
    Route::get('admin/volunteer/{id}/edit', [VolunteerController::class, 'edit'])->name('admin.volunteer.edit');
    Route::post('admin/volunteer/{id}', [VolunteerController::class, 'update'])->name('admin.volunteer.update');
    Route::delete('admin/volunteer/{id}', [VolunteerController::class, 'destroy'])->name('admin.volunteer.destroy');

   //Project
    Route::get('admin/project', [ProjectController::class, 'index'])->name('admin.project.index');
    Route::get('admin/project/create', [ProjectController::class, 'create'])->name('admin.project.create');
    Route::post('admin/project', [ProjectController::class, 'store'])->name('admin.project.store');
    Route::get('admin/project/{id}/edit', [ProjectController::class, 'edit'])->name('admin.project.edit');
    Route::post('admin/project/{id}', [ProjectController::class, 'update'])->name('admin.project.update');
    Route::delete('admin/project/{id}', [ProjectController::class, 'destroy'])->name('admin.project.destroy');

    //About
    Route::get('admin/about', [AboutController::class, 'index'])->name('admin.about.index');
    Route::get('admin/about/create', [AboutController::class, 'create'])->name('admin.about.create');
    Route::post('admin/about', [AboutController::class, 'store'])->name('admin.about.store');
    Route::get('admin/about/edit', [AboutController::class, 'edit'])->name('admin.about.edit');
    Route::get('admin/about/view', [AboutController::class, 'view'])->name('admin.about.view');
    Route::post('admin/about/{id}', [AboutController::class, 'update'])->name('admin.about.update');
    Route::delete('admin/about/{id}', [AboutController::class, 'destroy'])->name('admin.about.destroy');
    //Event
    Route::get('admin/event', [EventController::class, 'index'])->name('admin.event.index');
    Route::get('admin/event/create', [EventController::class, 'create'])->name('admin.event.create');
    Route::post('admin/event', [EventController::class, 'store'])->name('admin.event.store');
    Route::get('admin/event/{id}/edit', [EventController::class, 'edit'])->name('admin.event.edit');
    Route::post('admin/event/{id}', [EventController::class, 'update'])->name('admin.event.update');
    Route::delete('admin/event/{id}', [EventController::class, 'destroy'])->name('admin.event.destroy');
    Route::delete('/admin/event-delete-image/{event}', [EventController::class, 'destroy_image'])->name('admin.event.delete_image');
    Route::delete('/admin/event-delete-video/{event}', [EventController::class, 'destroy_video'])->name('admin.event.delete_video');

    //Event
    Route::get('admin/Nursery', [NurseryController::class, 'index'])->name('admin.nursery.index');
    Route::get('admin/Nursery/create', [NurseryController::class, 'create'])->name('admin.nursery.create');
    Route::post('admin/Nursery', [NurseryController::class, 'store'])->name('admin.nursery.store');
    Route::get('admin/Nursery/{id}/edit', [NurseryController::class, 'edit'])->name('admin.nursery.edit');
    Route::post('admin/Nursery/{id}', [NurseryController::class, 'update'])->name('admin.nursery.update');
    Route::delete('admin/Nursery/{id}', [NurseryController::class, 'destroy'])->name('admin.nursery.destroy');
    Route::delete('/admin/Nursery-delete-image/{Nursery}', [NurseryController::class, 'destroy_image'])->name('admin.nursery.delete_image');

    Route::get('admin/service', [ServiceController::class, 'index'])->name('admin.service.index');
    Route::get('admin/service/create', [ServiceController::class, 'create'])->name('admin.service.create');
    Route::post('admin/service', [ServiceController::class, 'store'])->name('admin.service.store');
    Route::get('admin/service/{id}/edit', [ServiceController::class, 'edit'])->name('admin.service.edit');
    Route::post('admin/service/{id}', [ServiceController::class, 'update'])->name('admin.service.update');
    Route::delete('admin/service/{id}', [ServiceController::class, 'destroy'])->name('admin.service.destroy');


    Route::get('admin/transporter', [TransporterController::class, 'index'])->name('admin.transporter.index');
    Route::get('admin/transporter/create', [TransporterController::class, 'create'])->name('admin.transporter.create');
    Route::post('admin/transporter', [TransporterController::class, 'store'])->name('admin.transporter.store');
    Route::get('admin/transporter/{id}/edit', [TransporterController::class, 'edit'])->name('admin.transporter.edit');
    Route::post('admin/transporter/{id}', [TransporterController::class, 'update'])->name('admin.transporter.update');
    Route::delete('admin/transporter/{id}', [TransporterController::class, 'destroy'])->name('admin.transporter.destroy');

    //seed provider
    Route::get('admin/seed', [SeedController::class, 'index'])->name('admin.seed.index');
    Route::get('admin/seed/create', [SeedController::class, 'create'])->name('admin.seed.create');
    Route::post('admin/seed', [SeedController::class, 'store'])->name('admin.seed.store');
    Route::get('admin/seed/{id}/edit', [SeedController::class, 'edit'])->name('admin.seed.edit');
    Route::post('admin/seed/{id}', [SeedController::class, 'update'])->name('admin.seed.update');
    Route::delete('admin/seed/{id}', [SeedController::class, 'destroy'])->name('admin.seed.destroy');

    //Envelops Provider
    Route::get('admin/envelop', [EnvelopController::class, 'index'])->name('admin.envelop.index');
    Route::get('admin/envelop/create', [EnvelopController::class, 'create'])->name('admin.envelop.create');
    Route::post('admin/envelop', [EnvelopController::class, 'store'])->name('admin.envelop.store');
    Route::get('admin/envelop/{id}/edit', [EnvelopController::class, 'edit'])->name('admin.envelop.edit');
    Route::post('admin/envelop/{id}', [EnvelopController::class, 'update'])->name('admin.envelop.update');
    Route::delete('admin/envelop/{id}', [EnvelopController::class, 'destroy'])->name('admin.envelop.destroy');
});


