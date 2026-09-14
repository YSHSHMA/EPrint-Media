<?php

namespace Tests\Feature;

use Tests\TestCase;

class ConfigFallbackTest extends TestCase
{
    public function test_config_data_returns_a_fallback_object_when_the_config_row_is_missing(): void
    {
        $config = configData();

        $this->assertIsObject($config);
        $this->assertSame(0, (int) $config->maintenance_mode);
        $this->assertSame('EPrint Media', $config->name);
    }
}
