<?php /* Smarty version Smarty-3.1.6, created on 2018-03-22 17:21:09
         compiled from "./Admin/Tpl\Index\login.html" */ ?>
<?php /*%%SmartyHeaderCode:235105ab37585886ba4-62140322%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b5c6d1cd1fbb3657bb549012595bb6c0ec555c70' => 
    array (
      0 => './Admin/Tpl\\Index\\login.html',
      1 => 1521439638,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '235105ab37585886ba4-62140322',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5ab375858b602',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ab375858b602')) {function content_5ab375858b602($_smarty_tpl) {?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>武夷山驴友交流网后台管理</title>
<link href="__PUBLIC__/Admin/dwz/themes/css/login.css" rel="stylesheet" type="text/css" />

<script language="javascript" src="__PUBLIC__/Admin/js/jquery-1.7.2.min.js"></script> 
<script language="javascript">
	<!--
	$(function(){
		$("#tosubmit").click(function(){
			if($("#name").val() == "" || $("#name").val() == " " ){
				alert("用户名为空！");
				return false;
			}
			if($("#pass").val() == "" || $("#pass").val() == " " ){
				alert("密码为空！");
				return false;
			}
			if($("#verify").val() == "" || $("#verify").val() == " " ){
				alert("验证码为空");
				return false;
			}
		});
	});
	//-->
</script>
</head>

<body>
	<?php echo $_smarty_tpl->getSubTemplate ("Public/pagerForm.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<div id="login">
		<div id="login_header">
			<h1 class="login_logo">
				<a href="__APP__"><img src="__PUBLIC__/images/logo.jpg" width="190"/></a>
			</h1>
			<div class="login_headerContent">

				<h2 class="login_title"><img src="__PUBLIC__/Admin/dwz/themes/default/images/login_title.png" /></h2>
			</div>
		</div>
		<div id="login_content">
			<div class="loginForm">
				<form action="__URL__/login" method="post" onsubmit="return validateCallback(this);" id="login">
					<p>
						<label>用户名：</label>
						<input type="text" name="name" size="20" class="login_input required" id="uname"/>
					</p>
					<p>
						<label>密码：</label>
						<input type="password" name="pass" size="20" class="login_input required"  id="pass"/>
					</p>
					<p>
						<label>验证码：</label>
						<input name="verify" class="code" type="text" size="5" id="verify"/>
						<span><img src="__URL__/verify/" alt="" width="75" height="24" onclick="this.src='__URL__/verify/?id='+Math.random"/></span>
					</p>
					<div class="login_bar">
						<input class="sub" type="submit" value="" id="tosubmit"/>
					</div>
				</form>
			</div>
			<div class="login_banner"><img src="__PUBLIC__/Admin/images/login-bg.png" /></div>
		</div>
		<div id="login_footer">
			Copyright &copy;   All Rights Reserved.
		</div>
	</div>
</body>
</html><?php }} ?>