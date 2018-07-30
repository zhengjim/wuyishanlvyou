<?php /* Smarty version Smarty-3.1.6, created on 2018-04-18 11:48:22
         compiled from "./Admin/Tpl\Diary\details.html" */ ?>
<?php /*%%SmartyHeaderCode:167355ac4c54ccd34d9-99207282%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'adcd8c795ee9ac8b808504e5d32ca874580aa791' => 
    array (
      0 => './Admin/Tpl\\Diary\\details.html',
      1 => 1524023300,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '167355ac4c54ccd34d9-99207282',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5ac4c54cd22f0',
  'variables' => 
  array (
    'list' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ac4c54cd22f0')) {function content_5ac4c54cd22f0($_smarty_tpl) {?><div style="width:100%;height:100%;">
	<img src="__PUBLIC__/uploads/diary/m_<?php echo $_smarty_tpl->tpl_vars['list']->value['picture'];?>
"/>
	<textarea style="font-size: 15px;width:98%;height:200px;">    <?php echo $_smarty_tpl->tpl_vars['list']->value['content'];?>
</textarea>
</div><?php }} ?>