<?php

use App\Models\HomepageStructure;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\ReferencesController;
use App\Http\Controllers\NewsStructureController;
use App\Http\Controllers\OfferCategoryController;
use App\Http\Controllers\HomepageStructureController;
use App\Http\Controllers\AboutpageStructureController;
use App\Http\Controllers\ContactpageStructureController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\SearchController;

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

Route::get('/', [HomepageStructureController::class, 'index'])->name('welcome');
Route::get('/offers', [OfferController::class, 'index'])->name('offer.index');
Route::get('/offers/{offer}/offerCategories', [OfferCategoryController::class, 'index'])->name('offerCategories.index');
Route::get('/offers/{offer}/offerCategories/{offerCategory}/acts', [ActController::class, 'index'])->name('acts.index');
Route::get('/act/{offer}/{offerCategory}/{act}', [ActController::class, 'show'])->name('actdetail');
Route::get('add-to-favourites/{id}', [FavouriteController::class, 'addToFavourites'])->name('addFavourite');
Route::get('remove-from-favourites/{id}', [FavouriteController::class, 'removeFromFavourites'])->name('removeFavourite');
Route::get('/nieuws', [NewsController::class, 'index'])->name('news.index');
Route::get('/contact', [ContactpageStructureController::class, 'index'])->name('contact.index');
Route::get('/wie-zijn-we', [AboutpageStructureController::class, 'index'])->name('about.index');
Route::get('/favorieten', [FavouriteController::class, 'index'])->name('favorieten.index');

// zoeken
Route::get('/search', [SearchController::class, 'search'])->name('search');

// Mail links
Route::get('/mailtest',[MailController::class, 'sendCustomEmail']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/dashhomepage', [HomepageStructureController::class, 'dashboardindex'])->middleware(['auth', 'verified'])->name('dashboard-welcome');
Route::delete('/homepage/image/{id}', [HomepageStructureController::class, 'deleteimage'])->middleware(['auth', 'verified'])->name('homepage.image.delete');
Route::put('/homepage/update/{id}', [HomepageStructureController::class, 'update'])->middleware(['auth', 'verified'])->name('homepage.update');
Route::put('/homepage/quality/update/{id}', [HomepageStructureController::class, 'updateQuality'])->middleware(['auth', 'verified'])->name('homepage.quality.update');
Route::get('/dashnews', [NewsStructureController::class, 'dashboardindex'])->middleware(['auth', 'verified'])->name('dashboard-news');

Route::middleware('auth')->group(function () {
    Route::get('/dashnews', [NewsStructureController::class, 'dashboardindex'])->name('dashboard-news');
    Route::get('/dashboard/news/create', [NewsController::class, 'create'])->name('dashboard-news.create');
    Route::post('/admin/news', [NewsController::class, 'store'])->name('news.store');
    Route::get('/dashboard/news/{id}/edit', [NewsController::class, 'edit'])->name('dashboard-news.edit');
    Route::put('/dashboard/news/{id}', [NewsController::class, 'update'])->name('dashboard-news.update');
    Route::delete('/dashboard/news/{id}', [NewsController::class, 'destroy'])->name('dashboard-news.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard/references', [ReferencesController::class, 'index'])->name('references.index');

    // Formulier voor het maken van een nieuwe referentie weergeven
    Route::get('/dashboard/references/create', [ReferencesController::class, 'create'])->name('references.create');

    // Een nieuwe referentie opslaan
    Route::post('/dashboard/references/store', [ReferencesController::class, 'store'])->name('references.store.try');

    // Een specifieke referentie weergeven
    Route::get('/dashboard/references/{reference}', [ReferencesController::class, 'show'])->name('references.show');

    // Formulier voor het bewerken van een bestaande referentie weergeven
    Route::get('/dashboard/references/{reference}/edit', [ReferencesController::class, 'edit'])->name('references.edit');

    // Een bestaande referentie bijwerken
    Route::put('/dashboard/references/{reference}', [ReferencesController::class, 'update'])->name('references.update');

    // Een bestaande referentie verwijderen
    Route::delete('/dashboard/references/{reference}', [ReferencesController::class, 'destroy'])->name('references.destroy');
});

// Routes voor OfferController
Route::middleware('auth')->group(function () {
    Route::get('/dashboard/offers/create', [OfferController::class, 'create'])->name('create.offer');
    Route::post('/dashboard/offers', [OfferController::class, 'store'])->name('offers.store');
    Route::get('/dashboard/offers/{offer}', [OfferController::class, 'show']);
    Route::get('/dashboard/offers/{offer}/edit', [OfferController::class, 'edit'])->name('offers.edit');
    Route::put('/dashboard/offers/{offer}', [OfferController::class, 'update'])->name('offers.update');
    Route::delete('/dashboard/offers/{offer}', [OfferController::class, 'destroy'])->name('offers.destroy');
});

// Routes voor OfferCategoryController
Route::middleware('auth')->group(function () {
    Route::get('/dashboard/offers/{offer}/offerCategories/create', [OfferCategoryController::class, 'create'])->name('create.offerCategories');
    Route::post('/dashboard/offers/{offer}/offerCategories', [OfferCategoryController::class, 'store'])->name('dashboard.offers.offerCategories.store');
    Route::get('/dashboard/offers/{offer}/offerCategories/{offerCategory}', [OfferCategoryController::class, 'show']);
    Route::get('/dashboard/offers/{offer}/offerCategories/{offerCategory}/edit', [OfferCategoryController::class, 'edit'])->name('dashboard.offers.offerCategories.edit');
    Route::put('/dashboard/offers/{offer}/offerCategories/{offerCategory}', [OfferCategoryController::class, 'update'])->name('offerCategories.update');
    Route::delete('/dashboard/offers/{offer}/offerCategories/{offerCategory}', [OfferCategoryController::class, 'destroy'])->name('dashboard.offers.offerCategories.destroy');
});

// Routes voor ActController
Route::middleware('auth')->group(function () {
    Route::get('/dashboard/offers/{offer}/offerCategories/{offerCategory}/acts/create', [ActController::class, 'create'])->name('create.acts');
    Route::post('/dashboard/offers/{offer}/offerCategories/{offerCategory}/acts', [ActController::class, 'store'])->name('acts.store');
    Route::get('/dashboard/offers/{offer}/offerCategories/{offerCategory}/acts/{act}', [ActController::class, 'show']);
    Route::get('/dashboard/offers/{offer}/offerCategories/{offerCategory}/acts/{act}/edit', [ActController::class, 'edit'])->name('acts.edit');
    Route::put('/dashboard/offers/{offer}/offerCategories/{offerCategory}/acts/{act}', [ActController::class, 'update'])->name('acts.update');
    Route::delete('/dashboard/offers/{offer}/offerCategories/{offerCategory}/acts/{act}', [ActController::class, 'destroy'])->name('acts.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes for Teams
Route::middleware('auth')->group(function () {
    Route::post('dashboard-teams', [TeamController::class, 'store'])->name('teams.store');
    Route::get('dashboard-teams/{team}', [TeamController::class, 'edit'])->name('dashboard-teams.edit');
    Route::put('dashboard-teams/{team}', [TeamController::class, 'update'])->name('dashboard-teams.update');
    Route::delete('dashboard-teams/{team}', [TeamController::class, 'destroy'])->name('dashboard-teams.destroy');
});
// Routes for AboutpageStructure
Route::middleware('auth')->group(function () {
    Route::get('aboutpage_structure', [AboutpageStructureController::class, 'cmsindex'])->name('aboutpage_structure.index');
    Route::put('aboutpage_structure/{aboutpage_structure}', [AboutpageStructureController::class, 'update'])->name('aboutpage_structure.update');
});

// Routes for AboutpageStructure
Route::middleware('auth')->group(function () {
    Route::get('/dashboard/contactpage', [ContactpageStructureController::class, 'cmsindex'])->name('contactpage_structure.cmsindex');
    Route::put('/contactpage_structure/{id}', [ContactpageStructureController::class, 'update'])->name('contactpage_structure.update');
});
require __DIR__.'/auth.php';
