<?php

/**
 * This file is part of the DVSA MOT FeatureToggle package.
 *
 * @link http://gitlab.clb.npm/mot/featuretoggle
 */

namespace DvsaFeaturetest;

use DvsaFeature\FeatureToggles;
use PHPUnit\Framework\TestCase;

/**
 * unit tests for FeatureToggles.
 */
class FeatureTogglesTest extends TestCase
{
    private const FEATURE_RBAC = 'rbac';
    private const FEATURE_AUTHORIZE = 'authorize';
    private const FEATURE_LOGIN_V2 = 'loginV2';

/**
 * @var array
 */

    private $features = [];

    public function setUp(): void
    {
        $this->features = [
            self::FEATURE_RBAC      => true,
            self::FEATURE_AUTHORIZE => true,
            self::FEATURE_LOGIN_V2  => false,
        ];
    }

    private function getFeatureToggles(): FeatureToggles
    {
        return new FeatureToggles($this->features);
    }

    /**
     * @return void
     */
    public function testGetFeatureToggles()
    {
        // Add some comment
        $featureToggles = $this->getFeatureToggles();
        $this->assertEquals($this->features, $featureToggles->getFeatureToggles());
    }

    /**
     * @test
     *
     * @return void
     */
    public function canFetchFeatureToggleEnabled()
    {
        $featureToggles = $this->getFeatureToggles();
        $this->assertTrue($featureToggles->isEnabled(self::FEATURE_RBAC));
        $this->assertTrue($featureToggles->isEnabled(self::FEATURE_AUTHORIZE));
        $this->assertFalse($featureToggles->isEnabled(self::FEATURE_LOGIN_V2));
    }

    /**
     * @test
     *
     * @return void
     */
    public function canFetchFeatureToggleDisabled()
    {
        $featureToggles = $this->getFeatureToggles();
        $this->assertFalse($featureToggles->isDisabled(self::FEATURE_RBAC));
        $this->assertFalse($featureToggles->isDisabled(self::FEATURE_AUTHORIZE));
        $this->assertTrue($featureToggles->isDisabled(self::FEATURE_LOGIN_V2));
    }
}
