<?php

use PHPUnit\Framework\TestCase;
use SimpleSAML\Configuration;

class ConfigurationForPsalmStuffTest extends TestCase
{

    public function testPsalmDoesNotComplainAboutNullDefaults(): void
    {
        $config = Configuration::loadFromArray([
            'option' => 'value'
        ]);

        $value = $config->getOptionalString('someOption', null);
        $this->assertNull($value);
    }
}