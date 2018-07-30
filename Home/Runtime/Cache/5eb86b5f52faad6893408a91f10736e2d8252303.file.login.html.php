<?php /* Smarty version Smarty-3.1.6, created on 2018-04-09 13:44:54
         compiled from "./Home/Tpl\Users\login.html" */ ?>
<?php /*%%SmartyHeaderCode:292955acafdd6802e69-37029705%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5eb86b5f52faad6893408a91f10736e2d8252303' => 
    array (
      0 => './Home/Tpl\\Users\\login.html',
      1 => 1521701139,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '292955acafdd6802e69-37029705',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'e' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5acafdd6998ed',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5acafdd6998ed')) {function content_5acafdd6998ed($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>武夷山驴友交流网--登陆页</title>
	<link type="text/css" rel="stylesheet" href="__PUBLIC__/Home/css/public.css"/>
	<link type="text/css" rel="stylesheet" href="__PUBLIC__/Home/css/login.css"/>
	<style>
		#content{
			color: #666;
			margin-top:20px;
			background:#fff;
			padding:20px 0px;
		}
		#content h1{
			padding:0px 40px 0px 20px;
			font-size: 24px;
		}
		.article form{
			padding-left: 40px;
		}
	</style>
</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<div id="content">
		<h1>登录武夷山旅游交流网</h1>
		<div class="article">
			<form id="lzform" name="lzform" method="post" action="__APP__/Users/doLogin">
				<div style="color:red;">
					<label>&nbsp;</label><?php $_smarty_tpl->tpl_vars['e'] = new Smarty_variable($_GET['e'], null, 0);?><?php if ($_smarty_tpl->tpl_vars['e']->value==1){?>你被封号了<?php }elseif($_smarty_tpl->tpl_vars['e']->value==2){?>账号密码有误<?php }?>
				</div>
				<div class="item">
					<label>登录邮箱</label>
					<input id="email" name="email" type="text" class="basic-input" maxlength="60" value="" tabindex="1">
				</div>
				<div class="item">
					<label>密码</label>
					<input id="password" name="pass" type="password" class="basic-input" maxlength="20" tabindex="2">
				</div>

				<div class="item captcha-item">
					<label>验证码</label>
					<img src='__APP__/Users/verify/' height="25" onclick="this.src='__APP__/Users/verify/?id='+Math.random"/>
					<input type="text" name="usercode" size="6" style="display:block;line-height:5px;margin-left:70px;margin-top:10px;"/>
				</div>

				<div class="item">
					<label>&nbsp;</label>
					<input type="submit" value="登录" name="user_login" class="btn-submit" tabindex="5">
				</div>
			</form>
		</div>
			<ul id="side-nav" class="aside">
				<li>&gt;&nbsp;还没有武夷山驴友帐号？<a rel="nofollow" href="__APP__/Users/register" style="color:blue;">立即注册</a></li>
			</ul>
	</div>
	<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
	<?php echo $_smarty_tpl->getSubTemplate ("Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html>
<?php }} ?>