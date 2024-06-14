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

class FeatureToggleViewHelperTest extends TestCase
{
    private const ENABLED_FEATURE  = 'enabledFeature';
    private const DISABLED_FEATURE = 'disabledFeature';

    /**
     * @var FeatureToggles
     */
    private $featureToggles;

    public function setUp(): void
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

        $this->featureToggles = $featureToggles;
    }

    /**
     * @return void
     */
    public function testInvoke()
    {
        $helper = new FeatureToggleViewHelper($this->featureToggles);
        $this->assertTrue($helper(self::ENABLED_FEATURE));
        $this->assertFalse($helper(self::DISABLED_FEATURE));
    }

    /**
     * @return void
     */
    public function testGetFeatureToggles()
    {
        $helper = new FeatureToggleViewHelper($this->featureToggles);
        $this->assertEquals($this->featureToggles, $helper->getFeatureToggles());
    }

    /**
     * @return void
     */
    public function testIsFeatureEnabled()
    {
        $helper = new FeatureToggleViewHelper($this->featureToggles);
        $this->assertTrue($helper->isFeatureEnabled(self::ENABLED_FEATURE));
        $this->assertFalse($helper->isFeatureEnabled(self::DISABLED_FEATURE));
    }
}
