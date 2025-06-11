<?php

namespace App\Services;

interface ShortCodeGenerator
{
    /**
     * Generate a random short code.
     *
     * @return string
     */
    public function generate(): string;
}
