<?php

namespace App\Http\Controllers;

use App\Models\Url;
use App\Services\ShortCodeGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UrlController
{
    public function __construct(
        private ShortCodeGenerator $shortCodeGenerator
    ) {}

    public function redirect(string $short_code)
    {
        $url = Url::where('short_code', $short_code)->first();

        if (!$url) {
            Log::error("Short code not found: {$short_code}");
            return redirect()->route('home')->withErrors('Short code not found.');
        }

        return redirect()->away(
            $url->long_url,
            302
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'long_url' => 'required | url'
        ]);

        $longUrl = $request->input('long_url');

        $url = Url::where('long_url', $longUrl)->first();
        if ($url != null) {
            $shortCode = $url->short_code;
        } else {
            $shortCode = $this->shortCodeGenerator->generate();
        }

        Url::create([
            'short_code' => $shortCode,
            'long_url' => $longUrl,
        ]);

        $shortUrl = "{$request->root()}/{$shortCode}";

        return redirect()->route('home')->with('short_url', $shortUrl);
    }
}
