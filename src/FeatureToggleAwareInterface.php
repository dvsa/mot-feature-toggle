<?php

/**
 * This file is part of the DVSA MOT FeatureToggle package.
 *
 * @link http://gitlab.clb.npm/mot/featuretoggle
 */

namespace DvsaFeature;

/**
 * The interface for classes that are aware of features status.
 */
interface FeatureToggleAwareInterface
{
    /**
     * @param string $name
     *
     * @return bool
     */
    public function isFeatureEnabled($name);

    /**
     * @param string $name
     *
     * @throws FeatureNotAvailableException
     */
    public function assertFeatureEnabled($name);
}
