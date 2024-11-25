<?php
use App\Http\Controllers\DonationController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\MasbiaDonationController;
use App\Http\Controllers\MasbiaBlogsController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\VolunteerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MediaController;
use App\Models\campaign;

// Route::middleware('guest')->group(function () {
    Route::get('/', [FrontendController::class, 'index'])->name('home');
    Route::get('/thank-you/{donationID}', [FrontendController::class, 'thank_you'])->name('general.thank-you');

    Route::get('/emailView', function () {
        return view('emails.donor-notification');
    });

    $campaignSlug = campaign::pluck('slug')->toArray();

    Route::get('/{campaign}/{team?}', [FrontendController::class, 'raffle'])
        ->name('raffle')->middleware('visitor')
        ->where('campaign', implode('|',$campaignSlug));

    Route::get('/load-more-donations', [DonationController::class, 'loadMoreDonations']);
    Route::get('/load-more-teams', [DonationController::class, 'loadMoreTeams']);
    Route::get('/load-more-team-donations', [DonationController::class, 'loadMoreTeamDonations']);
    
    Route::post('/payment/{campaign}', [PaymentController::class, 'processPayment'])->name('payment.process');
    Route::post('/campaign/create_team', [FrontendController::class, 'create_team'])->name('campaign.create_team');

    Route::get('donation', [MasbiaDonationController::class, 'index'])->name('donation.index');
    Route::get('blogs', [MasbiaBlogsController::class, 'index'])->name('blogs.index');
    Route::get('blog/{title}', [MasbiaBlogsController::class, 'view'])->name('blogs.view');
    Route::get('blogs/get-blogs', [MasbiaBlogsController::class, 'getBlogs'])->name('blogs.get-blogs');

    //_MEDIA_ROUTES
    Route::get('media/{title}', [MediaController::class, 'view'])->name('media.view');

    //__ VOLUNTEER_ROUTES
    Route::get('volunteer', [VolunteerController::class, 'index'])->name('volunteer.index');
    Route::post('volunteer/save', [VolunteerController::class, 'save'])->name('volunteer.save');

// });

Route::middleware('auth')->group(function () {
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profileupdate', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('notification', [NotificationController::class, 'edit'])->name('notification.edit');
    Route::post('notification-update', [NotificationController::class, 'update'])->name('notification.update');
    Route::get('billing', [BillingController::class, 'index'])->name('profile.billing');
    Route::get('donation/get-detail', [BillingController::class, 'donationDetail'])->name('donation.get');
    Route::get('donation/get-data', [BillingController::class, 'getDonationList'])->name('donation.list');
});

// Route::domain('{organization}/{slug}')->group(function () {
// Route::get('/campaign/{organization}/{slug}', [FrontendController::class, 'raffle'])->name('raffle');
// });

