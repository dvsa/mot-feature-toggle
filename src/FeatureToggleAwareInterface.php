<?php

/**
 * This file is part of the DVSA MOT FeatureToggle package.
 *
 * @link http://gitlab.clb.npm/mot/featuretoggle
 */

namespace DvsaFeature;

use DvsaFeature\Exception\FeatureNotAvailableException;

/**
 * The interface for classes that are aware of features status.
 */
interface FeatureToggleAwareInterface
{
    public function isFeatureEnabled($name);

    /**
     * @param string $name
     *
     * @throws FeatureNotAvailableException
     *
     * @return void
     */
    public function assertFeatureEnabled($name);
}
