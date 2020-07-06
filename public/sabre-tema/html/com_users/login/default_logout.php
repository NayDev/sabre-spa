<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
?>  
<div style="text-align: center;">
    <div class="center  card" style="display:inline-block; margin:10px;">
        <div class="card-header"><?php echo JText::_('JLOGOUT') ?></div>
        <div class="card-body">
        <form action="<?php echo JRoute::_('index.php?option=com_users&task=user.logout'); ?>" method="post" class="form-horizontal well">
            <div class = "btn-toolbar center">
                <div class = "btn-group">
                    <button type = "button" class = "btn btn-primary" onclick="window.location.href = '<?php echo JURI::root(); ?>'">
                        <i class = "icon-home"></i> <?php echo JText::_('JCANCEL') ?>
                    </button>
                </div>    
                <div class = "btn-group">
                    <button type = "submit" class = "btn btn-primary">
                        <i class = "icon-exit"></i> <?php echo JText::_('JLOGOUT') ?>
                    </button>
                </div>
            </div>
            <input type="hidden" name="return" value="<?php echo base64_encode($this->params->get('logout_redirect_url', $this->form->getValue('return'))); ?>" />
            <?php echo JHtml::_('form.token'); ?>
        </form>
</div>
</div>
</div>
