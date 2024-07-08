<?php

/**
 * This file is part of the DVSA MOT FeatureToggle package.
 *
 * @link http://gitlab.clb.npm/mot/featuretoggle
 */

namespace DvsaFeature;

/**
 * Feature Toggles Container.
 */
class FeatureToggles
{
    private const EXCEPTION_FEATURE_NOT_STRING = "The feature name must be a string.";

    /**
     * @var array
     */
    protected $features = [];

    /**
     * @param array $features
     */
    public function __construct(array $features)
    {
        $this->features = $features;
    }

    /**
     * @return array
     */
    public function getFeatureToggles()
    {
        return $this->features;
    }

    /**
     * @param mixed $name
     *
     * @return bool
     */
    public function isEnabled($name)
    {
        if (!is_string($name)) {
            throw new \InvalidArgumentException(self::EXCEPTION_FEATURE_NOT_STRING);
        }

        return isset($this->features[$name]) ? $this->features[$name] : false;
    }

    /**
     * @param mixed $name
     *
     * @return bool
     */
    public function isDisabled($name)
    {
        return !$this->isEnabled($name);
    }
}
