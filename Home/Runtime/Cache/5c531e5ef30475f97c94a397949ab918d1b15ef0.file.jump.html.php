<?php /* Smarty version Smarty-3.1.6, created on 2018-04-08 16:41:01
         compiled from "./Home/Tpl\Public\jump.html" */ ?>
<?php /*%%SmartyHeaderCode:209285ac9d59da232f7-77111312%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c531e5ef30475f97c94a397949ab918d1b15ef0' => 
    array (
      0 => './Home/Tpl\\Public\\jump.html',
      1 => 1457603577,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '209285ac9d59da232f7-77111312',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'message' => 0,
    'jumpUrl' => 0,
    'waitSecond' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5ac9d59dc9a97',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ac9d59dc9a97')) {function content_5ac9d59dc9a97($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>跳转提示</title>
	<style type="text/css">
		*{
			margin:0px;padding:0px;
			font-size:14px;
			font-family:'宋体';
			color:#666;
			}
		a{
			color:#666;
			text-decoration:none;
		}
		table{
			border:1px solid #ccc;
			}
		td{
			border-bottom:1px solid #ccc;
			}
		#tid{
			margin-left:400px;margin-top:40px;
			}
	</style>
</head>
<body>
	<div id="tid">
		<?php if (isset($_smarty_tpl->tpl_vars['message']->value)){?>
		<table width="450"  cellpadding="0" cellspacing="0">
			<tr height="30" style="background-color:#F5E8D8"><td align="center">跳转提示页</td></tr>
			<tr height="80"><td align="center" valign="middle"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</td></tr>
			<tr height="32"><td align="center" style="border:0px;"><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
:页面自动 <a id="href" href="<?php echo $_smarty_tpl->tpl_vars['jumpUrl']->value;?>
">跳转</a>....<b id="wait"><?php echo $_smarty_tpl->tpl_vars['waitSecond']->value;?>
</b></td></tr>
		</table>
		<?php }else{ ?>
		<table width="450"  cellpadding="0" cellspacing="0">
			<tr height="30" style="background-color:#F5E8D8"><td align="center">跳转提示页</td></tr>
			<tr height="80"><td align="center" valign="middle"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</td></tr>
			<tr height="32"><td align="center" style="border:0px;"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
:页面自动 <a id="href" href="<?php echo $_smarty_tpl->tpl_vars['jumpUrl']->value;?>
">跳转</a>....<b id="wait"><?php echo $_smarty_tpl->tpl_vars['waitSecond']->value;?>
</b></td></tr>
		</table>
		<?php }?>
		<p class="detail"></p>
		<p class="jump">
	</div>
	<script type="text/javascript">
	(function(){
	var wait = document.getElementById('wait'),href = document.getElementById('href').href;
	var interval = setInterval(function(){
		var time = --wait.innerHTML;
		if(time == 0) {
			location.href = href;
			clearInterval(interval);
		};
	}, 1000);
	})();
	</script>
</body>
</html><?php }} ?>