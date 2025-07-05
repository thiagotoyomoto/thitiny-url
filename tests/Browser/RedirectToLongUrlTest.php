<?php

namespace Tests\Browser;

use App\Models\Url;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use PHPUnit\Framework\Attributes\Test;
use Tests\DuskTestCase;

class RedirectToLongUrlTest extends DuskTestCase
{
    use DatabaseTruncation;

    #[Test]
    public function GivenValidShortUrl_WhenRequestShortUrl_ThenRedirectToLongUrl(): void
    {
        $url = Url::factory()->create([
            'long_url' => 'https://www.google.com'
        ]);

        $this->browse(
            function (Browser $browser) use ($url) {
                $browser
                    ->visit("/{$url->short_code}")
                    ->assertUrlIs('https://www.google.com/');
            }
        );
    }

    #[Test]
    public function GivenInvalidShortUrl_WhenRequestShortUrl_ThenRedirectToLongUrl(): void
    {
        $this->browse(
            function (Browser $browser) {
                $browser
                    ->visit("/invalid-short-code")
                    ->assertPathIs('/')
                    ->assertPresent("#error")
                    ->assertSee('Short code not found.');
            }
        );
    }
}
