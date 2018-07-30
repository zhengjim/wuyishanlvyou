<?php /* Smarty version Smarty-3.1.6, created on 2018-04-04 20:29:54
         compiled from "./Admin/Tpl\Users\addusers.html" */ ?>
<?php /*%%SmartyHeaderCode:46835ac4c5421351a8-66962599%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3617fccef5e7749dc8d210b4fff8d7a063178fa4' => 
    array (
      0 => './Admin/Tpl\\Users\\addusers.html',
      1 => 1521105427,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '46835ac4c5421351a8-66962599',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5ac4c5421bec0',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ac4c5421bec0')) {function content_5ac4c5421bec0($_smarty_tpl) {?><div class="pageContent">
	<form method="post" action="__URL__/insert/navTabId/userslist/callbackType/closeCurrent"  class="pageForm required-validate" 
		onsubmit="return validateCallback(this,dialogAjaxDone);"><<?php ?>?php  //窗体组件采用这个 iframeCallback(this, navTabAjaxDone); ?<?php ?>>
		<div class="pageFormContent" layoutH="60">
			<dl>
				<dt>邮箱：</dt>
				<dd><input type="text" class="required email"  style="width:100%" name="email"/></dd>
			</dl>
			<dl>
				<dt>账号：</dt>
				<dd><input type="text" class="required"  style="width:100%" name="name"/></dd>
				<dd>初始密码为12345678</dd>
			</dl>


		</div>
		
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
			</ul>
		</div>
	</form>
</div>

<?php }} ?>