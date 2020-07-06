<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
//print_r($this->data);
//echo $this->data->id;
//echo "fac :".JFactory::getUser()->id;
?>
<div style="text-align: center;">
	<div class="center card" style="display:inline-block; margin:10px;">
		<div class="card-header"><h6 class="text-uppercase mb-0">Meu Perfil</h6></div>
		<div class="card-body">
			<?php echo $this->loadTemplate('core'); ?>
					<?php //echo $this->loadTemplate('params'); ?>
					<?php //echo $this->loadTemplate('custom'); ?>
		</div>
		<div class="card-footer">
			<?php if (JFactory::getUser()->id == $this->data->id) : ?>
				<div class = "btn-toolbar">
                    <div class = "btn-group">
                        <button type = "button" class = "btn btn-primary" onclick="window.location.href = '<?php echo JURI::root(); ?>'">
                            <i class = "icon-home"></i>Voltar
                        </button>
                    </div>
  					<div class = "btn-group">
						<button type = "button" class = "btn btn-primary" onclick="window.location.href='index.php?option=com_users&task=profile.edit&user_id=<?php echo (int) $this->data->id;?>';">
							<i class = "icon-home"></i> <?php echo JText::_('COM_USERS_EDIT_PROFILE') ?>
						</button>
					</div>  
 					  
				</div>					
			<?php endif; ?>
		</div>
	</div>
</div>