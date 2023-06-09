<?php
/**
 * This file is part of the DVSA MOT FeatureToggle package.
 *
 * @link http://gitlab.clb.npm/mot/featuretoggle
 */

namespace DvsaFeatureTest\Exception;

use DvsaFeature\Exception\FeatureNotAvailableException;
use PHPUnit\Framework\TestCase;

class FeatureNotAvailableExceptionTest extends TestCase
{
    const FEATURE_NAME = 'featureName';

    public function testPassingAnEmptyMessageTriggersMessageBuilding()
    {
        $exception = new FeatureNotAvailableException(self::FEATURE_NAME);
        $this->assertNotEmpty($exception->getMessage());
    }

    public function testPassingANonEmptyMessageSkipsMessageBuilding()
    {
        $message   = 'This message overrides the default message created in FeatureNotAvailableExceptionTest::__construct';
        $exception = new FeatureNotAvailableException(self::FEATURE_NAME, $message);
        $this->assertEquals($message, $exception->getMessage());
    }

    public function testGetFeatureName()
    {
        $exception = new FeatureNotAvailableException(self::FEATURE_NAME);
        $this->assertEquals(self::FEATURE_NAME, $exception->getFeatureName());
    }
}
