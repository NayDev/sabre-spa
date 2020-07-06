<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidator');
JHtml::_('formbehavior.chosen', 'select');
$usuario = JFactory::getUser();
// Load user_profile plugin language
$lang = JFactory::getLanguage();
$lang->load('plg_user_profile', JPATH_ADMINISTRATOR);
?>
<div style="text-align: center;">
    <div class="center  card" style="display:inline-block; margin:10px;">
        <div class="card-header"><h6 class="text-uppercase mb-0">Editar Perfil</h6></div>
        <div class="card-body">
            <form id="member-profile" action="<?php echo JRoute::_('index.php?option=com_users&task=profile.save'); ?>" method="post" class="form-validate form-horizontal" enctype="multipart/form-data">

                <fieldset>
                    <input name="jform[id]" id="jform_id" value="<?php echo $usuario->id; ?>" type="hidden">																			
                    <input name="jform[email1]" id="jform_email1" value="<?php echo $usuario->email; ?>" type="hidden">						
                    <input name="jform[email2]" id="jform_email2" value="<?php echo $usuario->email; ?>" type="hidden">						
                    <input name="jform[profile][aboutme]" id="jform_profile_aboutme" value="[não aplicável]" type="hidden">						
                    <div class="control-group">
                        <div class="control-label">
                            <label data-original-title="<strong>Nome</strong><br />" id="jform_name-lbl" for="jform_name" class="hasTooltip" title="">
                                Nome
                            </label>															
                            <span class="optional">
                            </span>
                        </div>
                        <div class="controls">
                            <input name="jform[name]" id="jform_name" class="form-control"  value="<?php echo $usuario->name; ?>" size="30" readonly="" type="text">						
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="control-label">
                            <label data-original-title="<strong>Login</strong><br />" id="jform_username-lbl" for="jform_username" class="hasTooltip" title="">
                                Login
                            </label>															
                            <span class="optional">
                            </span>
                        </div>
                        <div class="controls">
                            <input name="jform[username]" id="jform_username" class="form-control" value="<?php echo $usuario->username; ?>" size="30" readonly="" type="text">						
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="control-label">
                            <label aria-invalid="false" data-original-title="<strong>Senha</strong><br />Digite a senha desejada - No mínimo 4 caracteres" id="jform_password1-lbl" for="jform_password1" class="hasTooltip" title="">
                                Senha</label>															
                        </div>
                        <div class="controls">
                            <input aria-invalid="false" name="jform[password1]" id="jform_password1" class="form-control"  value="" autocomplete="off" class="validate-password" size="30" maxlength="99" type="password">						</div>
                    </div>
                    <div class="control-group">
                        <div class="control-label">
                            <label data-original-title="<strong>Confirmar senha</strong><br />Confirme sua senha" id="jform_password2-lbl" for="jform_password2" class="hasTooltip" title="">
                                Confirmar senha
                            </label>															
                        </div>
                        <div class="controls">
                            <input name="jform[password2]" id="jform_password2" value="" autocomplete="off" class="form-control"  class="validate-password" size="30" maxlength="99" type="password">						
                        </div>
                    </div>

                            <input type="hidden" name="option" value="com_users" />
                            <input type="hidden" name="task" value="profile.save" />
                            <input type="hidden" name="return" value="<?php echo base64_encode($this->params->get('logout_redirect_url', $this->form->getValue('return'))); ?>" />
                    <?php echo JHtml::_('form.token'); ?>
                </fieldset>
                <br>
                <div class = "btn-toolbar">
                    <div class = "btn-group">
                        <button type = "button" class = "btn btn-primary" onclick="window.location.href = '<?php echo JURI::root(); ?>'">
                            <i class = "icon-home"></i> <?php echo JText::_('JCANCEL') ?>
                        </button>
                    </div>    
                    <div class = "btn-group">
                        <button type = "submit" class = "btn btn-primary" >
                            <i class = "icon-save"></i> <?php echo JText::_('JSUBMIT') ?>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
