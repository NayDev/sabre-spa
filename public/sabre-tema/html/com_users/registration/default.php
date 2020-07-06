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
JHtml::_('behavior.formvalidation');
?>
<style type="text/css">
    .btn{
        padding-right: 20px;
    }
</style>
<div style="text-align: center;">
    <div class="center  panel panel-default" style="display:inline-block; margin:10px;">
        <div class="panel-heading">CADASTRO</div>
        <div class="panel-body">
            <form id="member-registration" action="<?php echo JURI::root(); ?>index.php/login?task=registration.register" method="post" class="form-validate form-horizontal" enctype="multipart/form-data">
                <fieldset>
                    <div class="control-group">
                        <div class="control-label">
                            <label id="jform_name-lbl" for="jform_name" class="hasTooltip required" title="&lt;strong&gt;Nome&lt;/strong&gt;&lt;br /&gt;Digite seu nome completo">
                                Nome:<span class="star">&#160;*</span></label>                                                                                                    </div>
                        <div class="controls">
                            <input type="text" name="jform[name]" id="jform_name" value="" class="required" size="30" required aria-required="true" />                                                </div>
                    </div>
                    <div class="control-group">
                        <div class="control-label">
                            <label id="jform_username-lbl" for="jform_username" class="hasTooltip required" title="&lt;strong&gt;Nome de usuário&lt;/strong&gt;&lt;br /&gt;Digite seu nome de usuário desejado">
                                Nome de usuário:<span class="star">&#160;*</span></label>                                                                                                    </div>
                        <div class="controls">
                            <input type="text" name="jform[username]" id="jform_username" value="" class="validate-username required" size="30" required aria-required="true" />                                                </div>
                    </div>
                    <div class="control-group">
                        <div class="control-label">
                            <label id="jform_password1-lbl" for="jform_password1" class="hasTooltip required" title="&lt;strong&gt;Senha&lt;/strong&gt;&lt;br /&gt;Digite a senha desejada - No mínimo 4 caracteres">
                                Senha:<span class="star">&#160;*</span></label>                                                                                                    </div>
                        <div class="controls">
                            <input type="password" name="jform[password1]" id="jform_password1" value="" autocomplete="off" class="validate-password required" size="30" maxlength="99" required aria-required="true" />                                                </div>
                    </div>
                    <div class="control-group">
                        <div class="control-label">
                            <label id="jform_password2-lbl" for="jform_password2" class="hasTooltip required" title="&lt;strong&gt;Confirmar senha&lt;/strong&gt;&lt;br /&gt;Confirme sua senha">
                                Confirmar senha:<span class="star">&#160;*</span></label>                                                                                                    </div>
                        <div class="controls">
                            <input type="password" name="jform[password2]" id="jform_password2" value="" autocomplete="off" class="validate-password required" size="30" maxlength="99" required aria-required="true" />                                                </div>
                    </div>
                    <div class="control-group">
                        <div class="control-label">
                            <label id="jform_email1-lbl" for="jform_email1" class="hasTooltip required" title="&lt;strong&gt;Endereço de e-mail&lt;/strong&gt;&lt;br /&gt;Entre com seu endereço de e-mail">
                                Endereço de e-mail:<span class="star">&#160;*</span></label>                                                                                                    </div>
                        <div class="controls">
                            <input type="email" name="jform[email1]" class="validate-email required" id="jform_email1" value="" size="30" required aria-required="true" />                                                </div>
                    </div>
                    <div class="control-group">
                        <div class="control-label">
                            <label id="jform_email2-lbl" for="jform_email2" class="hasTooltip required" title="&lt;strong&gt;Confirme o endereço de e-mail&lt;/strong&gt;&lt;br /&gt;Confirme seu endereço de e-mail">
                                Confirme o endereço de e-mail:<span class="star">&#160;*</span></label>                                                                                                    </div>
                        <div class="controls">
                            <input type="email" name="jform[email2]" class="validate-email required" id="jform_email2" value="" size="30" required aria-required="true" />                                                </div>
                    </div>
                </fieldset>
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
                <input type="hidden" name="option" value="com_users" />
                <input type="hidden" name="task" value="registration.register" />
                <?php echo JHtml::_('form.token'); ?>
            </form>
        </div>
    </div>
</div>
