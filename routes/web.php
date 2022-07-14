<?php

use App\Http\Controllers\Admin\SearchController as AdminSearchController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\CaravanController as AdminCaravanController;
use App\Http\Controllers\Admin\CaravanCategoryController as AdminCategoryCaravanController;
use App\Http\Controllers\Admin\SeasonController as AdminSeasonController;
use App\Http\Controllers\Admin\ReservationController as AdminReservationController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\DictionaryController as AdminDictionaryController;
use App\Http\Controllers\Admin\PostCategoryController as AdminPostCategoryController;
use App\Http\Controllers\Admin\FileController as AdminFileController;
use App\Http\Controllers\Admin\CalendarController as AdminCalendarController;
use App\Http\Controllers\Admin\RoleController as AdminRoleController;
use App\Http\Controllers\Admin\SliderController as AdminSliderController;
use App\Http\Controllers\Admin\CouponController as AdminCouponController;
use App\Http\Controllers\Admin\DiscountController as AdminDiscountController;
use App\Http\Controllers\Admin\LastminuteController as AdminLastminuteController;
use App\Http\Controllers\Admin\AccessoryController as AdminAccessoryController;
use App\Http\Controllers\Admin\StatusController as AdminStatusController;
use App\Http\Controllers\Admin\CaravanAttributeController as AdminCaravanAttributeController;
use App\Http\Controllers\Admin\CaravanAttributeCategoryController as AdminCaravanAttributeCategoryController;
use App\Http\Controllers\Admin\ExportController as AdminExportController;
use App\Http\Controllers\Admin\TabController as AdminTabController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\{CaravanCategoryController,CaravanTenerifeController,CaravanController,DictionaryController,
    FaqController,HomeController,LeaveFormController,LoginController,PageController,PostController,ReservationController,
    NotesController,RecenseController,UserController,TabController};

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

use App\Models\{User,Reservation,Status,Review};

use App\Notifications\{ReservationCancel,ReservationPayTotalPriceWithDepositCash,ReservationStoreAdmin,OrderShipped,ReservationDepositCash,ReservationDeposit};

use Illuminate\Support\Facades\{Notification,Redirect};
use Illuminate\Http\Request;

use App\Notifications\{Paid,RecenseSend,RestPayCz,RestPayTn,RestPayCzSecond,RestPayTnSecond,ReservationPayTotalPrice};
use Carbon\Carbon;
use TimeHunter\LaravelGoogleReCaptchaV3\Validations\GoogleReCaptchaV3ValidationRule;

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

// FE Routes


// Route::get('mail-test/{id}', function(Request $request, $id){
//     // $sign = hash_hmac('sha256', $id, env('HMAC_SECRET'), true);

//     // $sign = base64url_encode($sign);
//     $reservation = Reservation::find(220272);
//     $reservation->notify(new RecenseSend($reservation));
//     return (view('emails.recense.send',['reservation'=>$reservation ]));
// });

Route::get('/send-mail/{reservation}', function(Request $request)
{
    // $reservation = Reservation::find($request);
    // if ($reservation->status_id == 2 || $reservation->status_id == 5) {
    //     if($reservation->payment_method == 'cash') {
    //         $reservation->notify(new ReservationDepositCash($reservation));
    //     } elseif($reservation->payment_method == 'bankwire') {
    //         $reservation->notify(new ReservationDeposit($reservation));
    //     }
    // };
    // return (new Paid($reservation))->toMail($reservation);

    // $reservation = Reservation::where()->get();
});


Route::get('/pdf-test', [AdminDashboardController::class, 'pdf_test']);


// Route::get('/pdf-test-2', function(){
//     $reservation = Reservation::findOrFail(220267);
//     $dph = $reservation->base_deposit * 0.21;
//     $zaklad = $reservation->base_deposit - $dph;
//     $deposite = $reservation->base_deposit;
//     $price_total = $reservation->total_price;
//     $rest_price = $price_total - $deposite;
//     $path = 'images/logo-original.png';
//     $type = pathinfo($path, PATHINFO_EXTENSION);
//     $data = file_get_contents($path);
//     $logo = 'data:image/' . $type . ';base64,' . base64_encode($data);

//     return (view('admin.reservations.depositAccept',[
//         'reservation' => $reservation,
//         'deposite' => $deposite,
//         'price_total' => $price_total,
//         'rest_price' => $rest_price,
//         'dph' => $dph,
//         'zaklad' => $zaklad,
//         'logo' => $logo,

//         ]));



// });


// Route::get('/testCheck/{id}', function(Request $request, $id){

//     $sign = hash_hmac('sha256', $id, env('HMAC_SECRET'), true);

//     $sign = base64url_encode($sign);

//     // $reservation = Reservation::find(220272);
//     // $reservation->notify(new RecenseSend($reservation));
//     // return (view('emails.recense.send',['reservation'=>$reservation ]));
//     print_r($sign);
//     echo "<br>";
//     print_r($request->sign);
//     echo "<br>";
//     if ($sign === $request->sign) {
//         echo 'Good user';
//     }else{
//         echo 'Baad user';
//     }
//     // return response()->json([
//         // 'user' => auth()->user(),
//         // 'request' => $request->all()
//     // ]);
// });

//  function base64url_encode($data) {
//     return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
//   }

//    function base64url_decode($data) {
//     return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
//   }

// Route::get('recense', [App\Http\Controllers\RecenseController::class, 'index'])->name('recense.index');
// Route::post('recense/store', [App\Http\Controllers\RecenseController::class, 'store'])->name('recense.store');

// Route::post('/testCheck', [ReservationController::class, 'testCheck']);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/sitemap.xml', [HomeController::class, 'sitemap'])->name('sitemap');

Route::get('prihlaseni', [LoginController::class, 'login'])->name('prihlaseni.login');
Route::get('profil', [LoginController::class, 'profile'])->name('prihlaseni.profile');

Route::get('/kategorie', function() {
    return Redirect::to('/pujcovna-obytnych-vozu-praha', 302);
});
// pujcovna-obytnych-vozu-praha
Route::get('/pujcovna-obytnych-vozu-praha', [CaravanCategoryController::class, 'index'])->name('karavany-kategorie.index');
Route::get('/pujcovna-obytnych-vozu-tenerife', [CaravanTenerifeController::class, 'tenerife'])->name('karavany-kategorie.tenerife');
Route::get('vozidlo/{slug}', [CaravanController::class, 'show'])->name('karavany.show');
Route::get('stranka/{slug}', [PageController::class, 'show'])->name('stranky.show');
Route::post('stranka/contact', [PageController::class, 'contact'])->name('stranky.contact');
Route::get('aktuality', [PostController::class, 'index'])->name('aktuality.index');
Route::get('aktuality/{slug}', [PostController::class, 'show'])->name('aktuality.show');
Route::get('pojmy', [DictionaryController::class, 'index'])->name('pojmy.index');
Route::get('pojem/{slug}', [DictionaryController::class, 'show'])->name('pojmy.show');
Route::get('rady-a-informace', [TabController::class, 'index'])->name('otazky.index');
Route::get('cenik', [PageController::class, 'priceList'])->name('stranky.cenik');
Route::get('porovnani-vozu', [CaravanController::class, 'compare'])->name('porovnani');
// Route::get('production-last-minutes/index', [App\Http\Controllers\ProductionLastMinutesController::class, 'index'])->name('productionLastMinutes.index');

Route::get('/last-minute', [App\Http\Controllers\LastController::class, 'index'])->name('last.index');
Route::get('/last-minute/{slug}', [App\Http\Controllers\LastController::class, 'show'])->name('last.show');

Route::get('rezervace', [ReservationController::class, 'form'])->name('rezervace.form');
Route::post('objednat/store', [ReservationController::class, 'store'])->name('rezervace.store');
Route::get('objednat/{reservation}/potvrzeni', [ReservationController::class, 'confirmation'])->name('rezervace.confirmation');
Route::get('rezervace/test', [ReservationController::class, 'test'])->name('rezervace.test');
Route::post('reservation/getPrice', [ReservationController::class, 'getPrice'])->name('rezervace.getPrice');
Route::post('reservation/getDetailedPrice', [ReservationController::class, 'getDetailedPrice'])->name('rezervace.getDetailedPrice');
Route::post('rezervace/feedback', [LeaveFormController::class, 'store'])->name('rezervace.leave');

Route::resource('notes', App\Http\Controllers\NotesController::class);

Route::get('/podekovani', [App\Http\Controllers\ReviewController::class, 'thanks'])->name('reviews.thanks');
Route::get('recenze/{id}', [App\Http\Controllers\ReviewController::class, 'show'])->name('reviews.show');
Route::post('recenze/store', [App\Http\Controllers\ReviewController::class, 'store'])->name('review.store');

Route::get('/podekovani', [App\Http\Controllers\ClientGalleryController::class, 'thanks'])->name('client-gallery.thanks');
Route::get('client-gallery/{id}', [App\Http\Controllers\ClientGalleryController::class, 'show'])->name('client-gallery.show');
Route::post('client-gallery/store', [App\Http\Controllers\ClientGalleryController::class, 'store'])->name('client-gallery.store');



Route::get('test-acc/{reservation}', [AdminReservationController::class, 'test_acc']);

Route::get('/cron/send-cron-emails', [ReservationController::class, 'sendCronEmails']);


// BE Routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/options', [AdminDashboardController::class, 'options'])->name('admin.options');

    Route::get('/gallery', [AdminDashboardController::class, 'gallery'])->name('admin.gallery');
    Route::get('/gallery/{gallery}', [AdminDashboardController::class, 'galleryShow'])->name('admin.galleryShow');
    Route::post('/galleryUpdate', [AdminDashboardController::class, 'galleryUpdate'])->name('admin.galleryUpdate');
    Route::delete('/galleryDelete/{gallery}', [AdminDashboardController::class, 'galleryDelete'])->name('admin.galleryDelete');



    Route::get('/prereview', [AdminReviewController::class, 'preIndex'])->name('admin.preIndex');
    Route::get('/review', [AdminReviewController::class, 'review'])->name('admin.review');
    Route::get('/reviewShow/{review}', [AdminReviewController::class, 'reviewShow'])->name('admin.reviewShow');
    Route::post('/reviewUpdateServis/{review}', [AdminReviewController::class, 'reviewUpdateServis'])->name('admin.reviewUpdateServis');
    Route::post('/reviewUpdateCaravan/{review}', [AdminReviewController::class, 'reviewUpdateCaravan'])->name('admin.reviewUpdateCaravan');
    Route::delete('/reviewDelete/{review}', [AdminReviewController::class, 'reviewDelete'])->name('admin.reviewDelete');

    Route::post('vyhledavani', [AdminSearchController::class, 'search'])->name('admin.vyhledavani.search');
    Route::get('notifikace', [AdminDashboardController::class, 'readNotifications'])->name('admin.notifikace.read');

    Route::resource('uzivatele', UserController::class);
    Route::get('uzivatele/{id}/restore', [UserController::class, 'restore'])->name('uzivatele.restore');

    Route::resource('skupiny', AdminRoleController::class);

    Route::get('export/reservationList/{reservation}', [AdminReservationController::class, 'generateReservationList'])->name('admin.export.reservationList');
    Route::get('export/reservationInvoice/{reservation}', [AdminReservationController::class, 'generateReservationInvoice'])->name('admin.export.reservationInvoice');
    Route::get('export/depositeAccount/{reservation}', [AdminReservationController::class, 'generateReservationAccount'])->name('admin.export.depositeAccount');
    Route::get('export/accountTotal/{reservation}', [AdminReservationController::class, 'generateReservationAccounteTotal'])->name('admin.export.accountTotal');

    Route::get('rezervace', [AdminReservationController::class, 'index'])->name('admin.rezervace.index');
    Route::get('rezervace-nastaveni', [AdminReservationController::class, 'settings'])->name('admin.rezervace.settings');
    Route::get('rezervace/create', [AdminReservationController::class, 'create'])->name('admin.rezervace.create');
    Route::get('rezervace/{reservation}/create', [AdminReservationController::class, 'show'])->name('admin.rezervace.show');
    Route::post('rezervace', [AdminReservationController::class, 'store'])->name('admin.rezervace.store');
    Route::get('rezervace/{reservation}/edit', [AdminReservationController::class, 'edit'])->name('admin.rezervace.edit');
    Route::put('rezervace/{reservation}', [AdminReservationController::class, 'update'])->name('admin.rezervace.update');
    Route::delete('rezervace/{reservation}', [AdminReservationController::class, 'destroy'])->name('admin.rezervace.destroy');
    Route::put('rezervace/update/status', [AdminReservationController::class, 'updateStatus'])->name('admin.rezervace.updateStatus');
    Route::get('rezervace/{reservation}/add', [AdminReservationController::class, 'addAccessory'])->name('admin.rezervace.addAccessory');

    Route::get('rezervace/{id}', [AdminReservationController::class, 'reservationDeposite'])->name('admin.rezervace.reservationDeposite');
    Route::get('send/sendRecenseTest/{id}', [AdminReservationController::class, 'sendRecenseTest'])->name('admin.send.sendRecenseTest');
    Route::get('send/sendClientFotoTest/{id}', [AdminReservationController::class, 'sendClientFotoTest'])->name('admin.send.sendClientFotoTest');

    // Route::get('rezervace/{reservation}', [AdminReservationController::class, 'sendCronRecense'])->name('admin.rezervace.sendCronRecense');


    Route::get('odjezdy', [AdminReservationController::class, 'departure'])->name('admin.rezervace.departure');


    Route::get('kalendar', [AdminCalendarController::class, 'index'])->name('kalendar');

    Route::resource('karavany', AdminCaravanController::class, ['as' => 'admin']);
    Route::put('karavany/update/sortPhoto', [AdminCaravanController::class, 'updateSortPhoto'])->name('karavany.updateSortPhoto');
    Route::put('karavany/destroy/photo', [AdminCaravanController::class, 'destroyPhoto'])->name('karavany.destroyPhoto');
    Route::put('karavany/update/sort', [AdminCaravanController::class, 'updateSort'])->name('admin.karavany.updateSort');
    Route::get('karavan/copy', [AdminCaravanController::class, 'copy'])->name('admin.karavany.copy');
    Route::post('karavan/duplicate', [AdminCaravanController::class, 'duplicate'])->name('admin.karavany.duplicate');

    Route::get('karavany-kategorie', [AdminCategoryCaravanController::class, 'index'])->name('admin.karavany-kategorie.index');
    Route::get('karavany-kategorie/create', [AdminCategoryCaravanController::class, 'create'])->name('admin.karavany-kategorie.create');
    Route::post('karavany-kategorie', [AdminCategoryCaravanController::class, 'store'])->name('admin.karavany-kategorie.store');
    Route::get('karavany-kategorie/{accessory}/edit', [AdminCategoryCaravanController::class, 'edit'])->name('admin.karavany-kategorie.edit');
    Route::put('karavany-kategorie/{accessory}', [AdminCategoryCaravanController::class, 'update'])->name('admin.karavany-kategorie.update');
    Route::delete('karavany-kategorie/{accessory}', [AdminCategoryCaravanController::class, 'destroy'])->name('admin.karavany-kategorie.destroy');
    Route::put('karavany-kategorie/update/sort', [AdminCategoryCaravanController::class, 'updateSort'])->name('admin.karavany-kategorie.updateSort');

    Route::resource('karavany-vlasnosti', AdminCaravanAttributeCategoryController::class, ['as' => 'admin']);
    Route::resource('karavany-vlasnost', AdminCaravanAttributeController::class, ['as' => 'admin', 'except' => ['create']]);
    Route::get('karavany-vlasnost/{category}/create', [AdminCaravanAttributeController::class, 'create'])->name('admin.karavany-vlasnost.create');

    Route::get('prislusenstvi', [AdminAccessoryController::class, 'index'])->name('admin.prislusenstvi.index');
    Route::get('prislusenstvi/create', [AdminAccessoryController::class, 'create'])->name('admin.prislusenstvi.create');
    Route::post('prislusenstvi', [AdminAccessoryController::class, 'store'])->name('admin.prislusenstvi.store');
    Route::get('prislusenstvi/{accessory}/edit', [AdminAccessoryController::class, 'edit'])->name('admin.prislusenstvi.edit');
    Route::put('prislusenstvi/{accessory}', [AdminAccessoryController::class, 'update'])->name('admin.prislusenstvi.update');
    Route::delete('prislusenstvi/{accessory}', [AdminAccessoryController::class, 'destroy'])->name('admin.prislusenstvi.destroy');
    Route::put('prislusenstvi/update/sort', [AdminAccessoryController::class, 'updateSort'])->name('admin.prislusenstvi.updateSort');

    Route::resource('sezony', AdminSeasonController::class, ['as' => 'admin']);
    Route::resource('kupony', AdminCouponController::class);
    Route::resource('slevy', AdminDiscountController::class, ['as' => 'admin']);
    Route::resource('lastminute', AdminLastminuteController::class, ['as' => 'admin']);
    Route::get('lastminute/{id}/restore', [AdminLastminuteController::class, 'restore'])->name('admin.lastminute.restore');
    Route::delete('lastminute/{id}', [AdminLastminuteController::class, 'destroy'])->name('admin.lastminute.destroy');
    Route::resource('otazky', AdminTabController::class, ['as' => 'admin']);
    Route::put('otazky/update/sort', [AdminTabController::class, 'updateSort'])->name('admin.otazky.updateSort');
    Route::get('otazky/{id}/restore', [AdminTabController::class, 'restore'])->name('admin.otazky.restore');

    Route::get('statusy', [AdminStatusController::class, 'index'])->name('admin.statusy.index');

    Route::get('exporty', [AdminExportController::class, 'index'])->name('admin.exporty.index');
    Route::get('exporty/generate/{export}', [AdminExportController::class, 'export'])->name('admin.exporty.export');

    Route::resource('stranky', AdminPageController::class, ['as' => 'admin']);
    Route::get('stranky/{id}/restore', [AdminPageController::class, 'restore'])->name('admin.stranky.restore');

    Route::resource('aktuality', AdminPostController::class, ['as' => 'admin']);
    Route::get('aktuality/{id}/restore', [AdminPostController::class, 'restore'])->name('admin.aktuality.restore');
    Route::resource('aktuality-kategorie', AdminPostCategoryController::class);
    Route::get('aktuality-kategorie/{id}/restore', [AdminPostCategoryController::class, 'restore'])->name('aktuality-kategorie.restore');

    Route::resource('slovnik', AdminDictionaryController::class, ['as' => 'admin']);
    Route::get('slovnik/{id}/restore', [AdminDictionaryController::class, 'restore'])->name('admin.slovnik.restore');

    Route::resource('slider', AdminSliderController::class);

    Route::post('uploadImg', [AdminFileController::class, 'uploadImage'])
        ->name('upload.image');
});


require __DIR__.'/auth.php';
