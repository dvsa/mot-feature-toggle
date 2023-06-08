<?php
/**
 * This file is part of the DVSA MOT FeatureToggle package.
 *
 * @link http://gitlab.clb.npm/mot/featuretoggle
 */

namespace DvsaFeature;

use DvsaFeature\Factory\View\Helper\FeatureToggleViewHelperFactory;
use Laminas\ModuleManager\Feature\ViewHelperProviderInterface;

/**
 * FeatureToggle Module.
 */
class Module implements
    ViewHelperProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * @return array|mixed
     */
    public function getFeatureConfig()
    {
        $configFile = __DIR__ . '/config/features.config.php';

        return (!file_exists($configFile)) ? [] : include $configFile;
    }

    /**
     * {@inheritdoc}
     */
    public function getAutoloaderConfig()
    {
        return [
            'Laminas\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getViewHelperConfig()
    {
        return [
            'factories' => [
                'isFeatureEnabled' => FeatureToggleViewHelperFactory::class,
            ],
        ];
    }
}
