<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;
JHtml::_('behavior.keepalive');
?>
<style type="text/css">
    .btn{
        padding-right: 20px;
    }
</style>
<div style="text-align: center;">
    <div class="center  card" style="display:inline-block; margin:10px;">
        <div class="card-header">LOGIN</div>
        <div class="card-body">
            <form action="<?php echo JRoute::_('index.php?option=com_users&task=user.login'); ?>" method="post" class="form-validate form-horizontal">

                <fieldset>
                    <?php foreach ($this->form->getFieldset('credentials') as $field) : ?>
                        <?php if (!$field->hidden) : ?>
                            <div class="control-group">
                                <div class="control-label">
                                    <?php echo $field->label; ?>
                                </div>
                                <div class="controls">
                                    <?php echo $field->input; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>

                    <?php if ($this->tfa): ?>
                        <div class="control-group">
                            <div class="control-label">
                                <?php echo $this->form->getField('secretkey')->label; ?>
                            </div>
                            <div class="controls">
                                <?php echo $this->form->getField('secretkey')->input; ?>
                            </div>
                        </div>
                    <?php endif;
                    ?>
                    <input type="hidden" name="return" value="<?php echo base64_encode(JURI::root()); ?>" />
<?php echo JHtml::_('form.token'); ?>
                </fieldset>
                <br>
                <div class = "btn-toolbar center">
                    <div class = "btn-group" style="width:50%">
                        <button style="width:100%" type = "button" class = "btn btn-primary" onclick="window.location.href = '<?php echo JURI::root(); ?>'">
                            <i class = "icon-home"></i> <?php echo JText::_('JCANCEL') ?>
                        </button>
                    </div>    
                    <div class = "btn-group" style="width:50%">
                        <button style="width:100%" type = "submit" class = "btn btn-primary">
                            <i class = "icon-save"></i> <?php echo JText::_('JLOGIN') ?>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <a href="<?php echo JRoute::_('index.php?option=com_users&view=reset'); ?>">
            <?php echo JText::_('COM_USERS_LOGIN_RESET'); ?></a>
        </div>
        <div class="card-footer">
            <a href="<?php echo JRoute::_('index.php?option=com_users&view=remind'); ?>">
            <?php echo JText::_('COM_USERS_LOGIN_REMIND'); ?></a>
        </div>
        <?php $usersConfig = JComponentHelper::getParams('com_users'); ?>
		<?php if ($usersConfig->get('allowUserRegistration')) : ?>
        <div class="card-footer">
				<a href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>">
					<?php echo JText::_('COM_USERS_LOGIN_REGISTER'); ?>
				</a>
        </div>
		<?php endif; ?>
    </div>
</div>
<script>
$("input").addClass("form-control");
</script>