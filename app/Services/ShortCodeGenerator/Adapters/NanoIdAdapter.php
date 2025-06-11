<?php

namespace App\Services\ShortCodeGenerator\Adapters;

use App\Services\ShortCodeGenerator;
use Hidehalo\Nanoid\Client;

class NanoIdAdapter implements ShortCodeGenerator
{
    private static string $alphabet = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    private Client $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function generate(): string
    {
        return $this->client->generateId(8);
    }
}
