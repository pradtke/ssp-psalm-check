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
        /**
         * Psalm wrongly complains about this since it thinks $value can never be null
         */
        $this->assertNull($value);

        $otherValue = $config->getOptionalString('someOption', 'value');

        /**
         * Psalm should complain about this since $otherValue is never null
         */
        $this->assertNotNull($otherValue);
    }
}