<?php

/**
 * Validation object
 *
 * Standard: PSR-2
 * @link http://www.php-fig.org/psr/psr-2 Full Documentation
 *
 * @package SC\DUPX\U
 *
 */

defined('ABSPATH') || defined('DUPXABSPATH') || exit;

use Duplicator\Installer\Core\Deploy\ServerConfigs;
use Duplicator\Installer\Core\Params\PrmMng;
use Duplicator\Installer\Utils\Log\Log;
use Duplicator\Libs\WpConfig\WPConfigTransformer;

class DUPX_Validation_test_wp_config extends DUPX_Validation_abstract_item
{
    /**
     * @return int
     * @throws Exception
     */
    protected function runTest()
    {
        if (!DUPX_InstallerState::isClassicInstall()) {
            return self::LV_SKIP;
        }

        if (self::isWpConfigValid()) {
            return self::LV_PASS;
        } else {
            PrmMng::getInstance()->setValue(PrmMng::PARAM_WP_CONFIG, 'new');
            PrmMng::getInstance()->save();
            return self::LV_SOFT_WARNING;
        }
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'Wordpress Configuration';
    }

    /**
     * Check if the wp-config of the source site is valid.
     *
     * @return bool true on success, false on failure
     */
    private static function isWpConfigValid()
    {
        try {
            $configTransformer = new WPConfigTransformer(ServerConfigs::getSourceWpConfigPath());
            $requiredConst     = array('DB_NAME', 'DB_USER', 'DB_PASSWORD', 'DB_HOST');
            foreach ($requiredConst as $constName) {
                if (!$configTransformer->exists('constant', $constName)) {
                    throw new Exception($constName . ' don\'t exist');
                }
            }
        } catch (Exception $e) {
            Log::info('CHECK WP CONFIG FAIL msg: ' .  $e->getMessage());
            return false;
        }
        return true;
    }

    /**
     * @return string
     */
    protected function swarnContent()
    {
        return dupxTplRender('parts/validation/tests/wp-config-check', array(
            'testResult' => $this->testResult,
            'configPath' => ServerConfigs::getSourceWpConfigPath()
        ), false);
    }

    /**
     * @return string
     */
    protected function passContent()
    {
        return $this->swarnContent();
    }
}
