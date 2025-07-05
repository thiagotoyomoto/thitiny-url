<?php

use App\Services\ShortCodeGenerator\Adapters\NanoIdAdapter;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class NanoIdAdapterTest extends TestCase
{
    #[Test]
    public function GivenNanoIdAdapter_WhenCallGenerate_ThenReturnStringWithLength8()
    {
        $adapter = new NanoIdAdapter();
        $shortCode = $adapter->generate();

        $this->assertNotNull($shortCode);
        $this->assertIsString($shortCode);
        $this->assertNotEmpty($shortCode);
        $this->assertEquals(8, strlen($shortCode));
    }
}
