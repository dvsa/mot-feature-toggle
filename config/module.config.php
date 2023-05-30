<?php
/**
 * This file is part of the DVSA MOT FeatureToggle package.
 *
 * @link http://gitlab.clb.npm/mot/featuretoggle
 */

use DvsaFeature\Factory\FeatureTogglesFactory;

return [
    'service_manager' => [
        'factories' => [
            'Feature\FeatureToggles' => FeatureTogglesFactory::class,
        ],
    ],
];
