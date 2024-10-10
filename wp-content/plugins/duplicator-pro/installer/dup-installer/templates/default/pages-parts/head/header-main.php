<?php

/**
 *
 * @package templates/default
 *
 */

defined('ABSPATH') || defined('DUPXABSPATH') || exit;

// @var $showSwitchView bool

$showSwitchView   = !isset($showSwitchView) ? false : $showSwitchView;
$showInstallerLog = !isset($showInstallerLog) ? false : $showInstallerLog;
?>
<div id="header-main-wrapper" >
    <div class="hdr-main">
        <?php echo $htmlTitle; ?>
    </div>
    <div class="hdr-secodary">
        <?php
        if ($showInstallerLog) {
            ?>
            <div class="installer-log" >
                <?php DUPX_View_Funcs::installerLogLink(); ?>
            </div>
            <?php
        }
        if ($showSwitchView) {
            dupxTplRender('pages-parts/step1/actions/switch-template');
        }
        ?>
    </div>
</div>
