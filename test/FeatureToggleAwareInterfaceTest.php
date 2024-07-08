<?php

/**
 * This file is part of the DVSA MOT FeatureToggle package.
 *
 * @link http://gitlab.clb.npm/mot/featuretoggle
 */

namespace DvsaFeaturetest;

use DvsaFeature\FeatureToggleAwareInterface;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class FeatureToggleAwareInterfaceTest extends TestCase
{
    public function testMethodsAreDefined(): void
    {
        $interface = new ReflectionClass(FeatureToggleAwareInterface::class);
        $this->assertTrue($interface->hasMethod('isFeatureEnabled'));
        $this->assertTrue($interface->hasMethod('assertFeatureEnabled'));
    }
}
