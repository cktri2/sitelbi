<?php /* Smarty version Smarty-3.1-DEV, created on 2021-04-20 08:24:18
         compiled from "C:\aabbccdd\models\Bobcat\Layout\errors.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1485822273607e8fb29f7398-47058052%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bebec40e1dd214a8ca7b4b5f05c9796a4d32c3d5' => 
    array (
      0 => 'C:\\aabbccdd\\models\\Bobcat\\Layout\\errors.tpl',
      1 => 1616682033,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1485822273607e8fb29f7398-47058052',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'messages' => 0,
    'msg' => 0,
    'element' => 0,
    'el' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_607e8fb2ac2446_43553861',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_607e8fb2ac2446_43553861')) {function content_607e8fb2ac2446_43553861($_smarty_tpl) {?><!DOCTYPE html>
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="icon" href="images/favicon.png" type="image/png" />
        <link rel="shortcut icon" href="images/favicon.png" type="image/png" />
        <title>Quelquechose est allé de travers</title>
        <style>
            
            body, html{
                margin:0; padding:0;
                font-family: "Helvetica Neue", "Helvetica", "Arial", sans-serif;
                font-size:12px;
                color: #666;
            }
            #container {
                padding: 1em;
            }
            .message {
                background: #ebebeb;
                padding:1em;
                margin-bottom:0.5em;
            }
            .message h1{
                font-size:1.5em;
                border-bottom: 1px solid #e0e0e0;
                margin:0.5em 0;
                padding:0;
            }
            .message td {
                border-bottom: 1px solid #e3e3e3;
                padding:0.2em;
                vertical-align:top;
            }
            
        </style>
    </head>
    <body>
        <div id="container">
            <?php  $_smarty_tpl->tpl_vars['msg'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['msg']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['messages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->key => $_smarty_tpl->tpl_vars['msg']->value){
$_smarty_tpl->tpl_vars['msg']->_loop = true;
?>
                <div class="message">
                    <?php if ($_smarty_tpl->tpl_vars['msg']->value['title']){?><h1><?php echo $_smarty_tpl->tpl_vars['msg']->value['title'];?>
</h1><?php }?>
                    <div>
                        <?php if (is_array($_smarty_tpl->tpl_vars['msg']->value['msg'])){?>
                            <table cellpadding="0" cellspacing="0">
                                <?php  $_smarty_tpl->tpl_vars['element'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['element']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['msg']->value['msg']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['element']->key => $_smarty_tpl->tpl_vars['element']->value){
$_smarty_tpl->tpl_vars['element']->_loop = true;
?>                                    
                                    <tr>
                                        <?php if (is_a($_smarty_tpl->tpl_vars['element']->value,'\Framework\Utils\Logger\Displayable')){?>
                                            <?php  $_smarty_tpl->tpl_vars['el'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['el']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['element']->value->getElements(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['el']->key => $_smarty_tpl->tpl_vars['el']->value){
$_smarty_tpl->tpl_vars['el']->_loop = true;
?>
                                                <td><?php echo $_smarty_tpl->tpl_vars['el']->value;?>
</td>
                                            <?php } ?>
                                        <?php }elseif(is_array($_smarty_tpl->tpl_vars['element']->value)){?>
                                            <pre><?php echo var_export($_smarty_tpl->tpl_vars['element']->value);?>
</pre>
                                        <?php }else{ ?>
                                            <td><?php echo $_smarty_tpl->tpl_vars['element']->value;?>
</td>
                                        <?php }?>
                                    </tr>
                                <?php } ?>
                            </table>
                        <?php }else{ ?>
                            <?php echo $_smarty_tpl->tpl_vars['msg']->value['msg'];?>

                        <?php }?>                        
                    </div>
                </div>
            <?php } ?>
        </div> 
    </body>
</html><?php }} ?>