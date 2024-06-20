<?php

/**
 * This file is part of the DVSA MOT FeatureToggle package.
 *
 * @link http://gitlab.clb.npm/mot/featuretoggle
 */

namespace DvsaFeatureTest\View\Helper;

use DvsaFeature\FeatureToggles;
use DvsaFeature\View\Helper\FeatureToggleViewHelper;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\MockObject\MockObject;

class FeatureToggleViewHelperTest extends TestCase
{
    private const ENABLED_FEATURE  = 'enabledFeature';
    private const DISABLED_FEATURE = 'disabledFeature';

    /** @return FeatureToggles&MockObject */
    private function getFeatureToggles()
    {
        $featureToggles = $this
            ->getMockBuilder(FeatureToggles::class)
            ->disableOriginalConstructor()
            ->getMock();

        $featureToggles
            ->expects($this->any())
            ->method('isEnabled')
            ->will($this->returnValueMap([
                [self::ENABLED_FEATURE, true],
                [self::DISABLED_FEATURE, false],
            ]));

        return $featureToggles;
    }

    public function testInvoke(): void
    {
        $helper = new FeatureToggleViewHelper($this->getFeatureToggles());
        $this->assertTrue($helper(self::ENABLED_FEATURE));
        $this->assertFalse($helper(self::DISABLED_FEATURE));
    }

    public function testGetFeatureToggles(): void
    {
        $featureToggles = $this->getFeatureToggles();
        $helper = new FeatureToggleViewHelper($featureToggles);
        $this->assertEquals($featureToggles, $helper->getFeatureToggles());
    }

    public function testIsFeatureEnabled(): void
    {
        $helper = new FeatureToggleViewHelper($this->getFeatureToggles());
        $this->assertTrue($helper->isFeatureEnabled(self::ENABLED_FEATURE));
        $this->assertFalse($helper->isFeatureEnabled(self::DISABLED_FEATURE));
    }
}
