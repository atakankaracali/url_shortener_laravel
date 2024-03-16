<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortenedUrl;
use Illuminate\Support\Str;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class UrlShortenerController extends Controller
{
    public function shortenUrl(Request $request)
    {
        $originalUrl = $request->input('url');

        // Google Safe Browsing API key
        $apiKey = env('GOOGLE_SAFE_BROWSING_API_KEY');

        // Google Safe Browsing API URL
        $apiUrl = 'https://safebrowsing.googleapis.com/v4/threatMatches:find?key=' . $apiKey;

        try {
            $response = Http::post($apiUrl, [
                'client' => [
                    'clientId' => 'UrlShortener',
                    'clientVersion' => '1.0.0'
                ],
                'threatInfo' => [
                    'threatTypes' => ['MALWARE', 'SOCIAL_ENGINEERING', 'THREAT_TYPE_UNSPECIFIED'],
                    'platformTypes' => ['ANY_PLATFORM'],
                    'threatEntryTypes' => ['URL'],
                    'threatEntries' => [
                        ['url' => $originalUrl],
                    ],
                ],
            ]);

            $body = $response->json();

            if (isset($body['matches']) && count($body['matches']) > 0) {
                // Eğer bir tehdit varsa
                $error = 'A security threat has been detected. Please try another URL.';
                return back()->with('error', $error);
            } else {
                // Tehdit yoksa kısa URL oluşturma işlemine devam et
                $shortUrl = $this->generateShortUrl($originalUrl);
                return view('shorten-url-result', ['shortUrl' => $shortUrl]);
            }
        } catch (\Exception $e) {
            Log::error('Error while connecting to the Google Safe Browsing API: ' . $e->getMessage());
            $error = 'An error occurred while connecting to the Google Safe Browsing API.';
            return back()->with('error', $error);
        }
    }

    private function generateShortUrl($originalUrl)
    {
        $existingShortUrl = ShortenedUrl::where('short_url', $originalUrl)->first();
    
        if ($existingShortUrl) {
            return $existingShortUrl->original_url;
        }
    
        do {
            $shortUrl = 'example.com/' . Str::random(6);
        } while (ShortenedUrl::where('short_url', $shortUrl)->exists());
    
        ShortenedUrl::create([
            'original_url' => $originalUrl,
            'short_url' => $shortUrl,
        ]);
    
        return $shortUrl;
    }
    

    public function redirectShortUrl($shortUrl)
    {
        $url = ShortenedUrl::where('short_url', $shortUrl)->first();
    
        if ($url) {
            return redirect($url->original_url);
        } else {
            abort(404);
        }
    }

}
