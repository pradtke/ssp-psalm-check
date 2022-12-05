<?php

use PHPUnit\Framework\TestCase;
use SimpleSAML\Configuration;

class ConfigurationForPsalmStuffTest extends TestCase
{
    private string $otherValue;

    public function testPsalmDoesNotComplainAboutNullDefaults(): void
    {
        $config = Configuration::loadFromArray([
            'option' => 'value'
        ]);

        $value = $config->getOptionalString('someOption', null);
        /**
         * Psalm wrongly complains about this since it thinks $value can never be null
         */
        $this->assertNull($value);

        /**
         * Psalm should never complain about this since return value cannot be null
         */
        $this->otherValue = $config->getOptionalString('someOption', 'value');

    }
}