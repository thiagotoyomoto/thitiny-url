<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseTruncation;
use Laravel\Dusk\Browser;
use PHPUnit\Framework\Attributes\Test;
use Tests\DuskTestCase;

class ShortenUrlTest extends DuskTestCase
{
    use DatabaseTruncation;

    #[Test]
    public function GivenCorrectLongUrl_WhenLongUrlAreShortened_ThenReturnTheShortUrl(): void
    {
        $this->browse(
            function (Browser $browser) {
                $browser->visit('/')
                    ->type('#long_url', 'https://www.google.com')
                    ->press('Encurtar')
                    ->assertPathIs('/')
                    ->assertPresent("#short_url");
            }
        );
    }

    #[Test]
    public function GivenLongUrlWithoutSchema_WhenLongUrlAreShortened_ThenThrowAnError(): void
    {
        $this->browse(
            function (Browser $browser) {
                $browser->visit('/')
                    ->type('#long_url', 'www.google.com')
                    ->press('Encurtar')
                    ->assertPathIs('/')
                    ->assertPresent("#error");
            }
        );
    }
}
