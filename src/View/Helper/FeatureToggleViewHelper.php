<?php
/**
 * This file is part of the DVSA MOT FeatureToggle package.
 *
 * @link http://gitlab.clb.npm/mot/featuretoggle
 */

namespace DvsaFeature\View\Helper;

use DvsaFeature\Exception\FeatureNotAvailableException;
use DvsaFeature\FeatureToggleAwareInterface;
use DvsaFeature\FeatureToggles;
use Laminas\View\Helper\AbstractHelper;

/**
 * Makes the FeatureToggler service available in the view layer.
 */
class FeatureToggleViewHelper extends AbstractHelper implements FeatureToggleAwareInterface
{
    /**
     * @var FeatureToggles
     */
    private $featureToggles;

    /**
     * @param FeatureToggles $featureToggles
     */
    public function __construct(FeatureToggles $featureToggles)
    {
        $this->featureToggles = $featureToggles;
    }

    /**
     * @return bool
     */
    public function __invoke($name)
    {
        return $this->isFeatureEnabled($name);
    }

    /**
     * @return FeatureToggles
     */
    public function getFeatureToggles()
    {
        return $this->featureToggles;
    }

    /**
     * {@inheritdoc}
     */
    public function isFeatureEnabled($name)
    {
        return $this->featureToggles->isEnabled($name);
    }

    /**
     * {@inheritdoc}
     */
    public function assertFeatureEnabled($name)
    {
        if (!$this->isFeatureEnabled($name)) {
            throw new FeatureNotAvailableException($name);
        }
    }
}
