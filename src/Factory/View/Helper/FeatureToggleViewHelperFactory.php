<?php

/**
 * This file is part of the DVSA MOT FeatureToggle package.
 *
 * @link http://gitlab.clb.npm/mot/featuretoggle
 */

namespace DvsaFeature\Factory\View\Helper;

use DvsaFeature\View\Helper\FeatureToggleViewHelper;
use DvsaFeature\FeatureToggles;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

/**
 * Factory for the FeatureToggleViewHelper service.
 */
class FeatureToggleViewHelperFactory implements FactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function __invoke(ContainerInterface $container, $name, array $args = null)
    {
        /** @var FeatureToggles */
        $featureToggles = $container->get('Feature\FeatureToggles');

        return new FeatureToggleViewHelper($featureToggles);
    }
}
