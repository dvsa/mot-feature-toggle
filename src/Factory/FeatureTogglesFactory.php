<?php

/**
 * This file is part of the DVSA MOT FeatureToggle package.
 *
 * @link http://gitlab.clb.npm/mot/featuretoggle
 */

namespace DvsaFeature\Factory;

use DvsaFeature\FeatureToggles;
use Laminas\ServiceManager\Factory\FactoryInterface;
use Psr\Container\ContainerInterface;

class FeatureTogglesFactory implements FactoryInterface
{
    /**
     * Create a FeatureToggles instance.
     *
     * @param ContainerInterface $container
     * @param string $name
     * @param array $args
     * @return FeatureToggles
     */
    public function __invoke(ContainerInterface $container, $name, array $args = null)
    {
        $config   = $container->get('config');
        $features = (is_array($config) && isset($config['feature_toggle']) && is_array($config['feature_toggle'])) ?
            $config['feature_toggle'] : [];

        return new FeatureToggles($features);
    }
}
