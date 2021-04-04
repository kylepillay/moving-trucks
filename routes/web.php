<?php

use App\Http\Livewire\CostTiersCrud;
use App\Http\Livewire\InventoryCrud;
use App\Http\Livewire\QuotesCrud;
use App\Http\Livewire\UpdateQuote;
use App\Mail\NewQuoteRequest;
use App\Models\User;
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

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/mailable-admin', function () {
    $quoteRequest = App\Models\QuoteRequest::findOrFail(1);
    return new App\Mail\NewQuoteRequest($quoteRequest);
});

Route::get('/send-test', function () {
    $quoteRequest = App\Models\QuoteRequest::findOrFail(1);
    \Mail::to(User::findOrFail(1))->send(new NewQuoteRequest($quoteRequest));
});

Route::redirect('admin', 'admin/quotes');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function() {
    Route::get('/quotes', QuotesCrud::class)->name('quotes');
    Route::get('/quotes/{quote}', UpdateQuote::class)->name('quote');
    Route::get('/cost-tiers', CostTiersCrud::class)->name('cost-tiers');
    Route::get('/inventory', InventoryCrud::class)->name('inventory');
});

Route::get('/mailable', function () {
    $quote = App\Models\QuoteRequest::find(1);

    return new App\Mail\NewQuoteRequest($quote);
});

