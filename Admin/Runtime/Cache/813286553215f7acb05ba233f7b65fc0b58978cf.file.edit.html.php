<?php /* Smarty version Smarty-3.1.6, created on 2018-05-18 13:14:53
         compiled from "./Admin/Tpl\Users\edit.html" */ ?>
<?php /*%%SmartyHeaderCode:170435afe614d8b66e4-63278986%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '813286553215f7acb05ba233f7b65fc0b58978cf' => 
    array (
      0 => './Admin/Tpl\\Users\\edit.html',
      1 => 1457603577,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '170435afe614d8b66e4-63278986',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'vo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5afe614d9fc01',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5afe614d9fc01')) {function content_5afe614d9fc01($_smarty_tpl) {?><div class="pageContent">
	<form method="post" action="__URL__/updatepass/navTabId/userslist/callbackType/closeCurrent"  class="pageForm required-validate" 
		onsubmit="return validateCallback(this,dialogAjaxDone);"><<?php ?>?php  //窗体组件采用这个 iframeCallback(this, navTabAjaxDone); ?<?php ?>>
		<input type="hidden" name="uid" value="<?php echo $_smarty_tpl->tpl_vars['vo']->value['uid'];?>
"/>
		<div class="pageFormContent" layoutH="60">
			<dl>
				<dt>新密码：</dt>
				<dd><input type="password" class="required"  style="width:100%" name="pass"/></dd>
			</dl>
			<dl>
				<dt>重复密码：</dt>
				<dd><input type="password" class="required"  style="width:100%" name="repass"/></dd>
			</dl>
		</div>
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">修改</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
			</ul>
		</div>
	</form>
</div><?php }} ?>