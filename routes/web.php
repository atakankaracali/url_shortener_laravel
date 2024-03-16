<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlShortenerController;
use App\Models\ShortenedUrl;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/shorten', function () {
    return view('shorten-url');
})->name('shorten.form');

Route::get('/{shortUrl}', [UrlShortenerController::class, 'redirectShortUrl'])->where('shortUrl', '[A-Za-z0-9]+');

Route::post('/shorten', [UrlShortenerController::class, 'shortenUrl'])->name('shorten');

Route::get('/{shortUrl}', function ($shortUrl) {
    $url = ShortenedUrl::where('short_url', $shortUrl)->first();

    if ($url) {
        return redirect($url->original_url);
    } else {
        abort(404);
    }
})->where('shortUrl', '.*');
