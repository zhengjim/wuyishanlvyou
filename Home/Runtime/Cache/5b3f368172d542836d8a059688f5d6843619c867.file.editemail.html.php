<?php /* Smarty version Smarty-3.1.6, created on 2018-04-09 14:15:50
         compiled from "./Home/Tpl\Users\editemail.html" */ ?>
<?php /*%%SmartyHeaderCode:211825acb0516cc0751-82667046%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b3f368172d542836d8a059688f5d6843619c867' => 
    array (
      0 => './Home/Tpl\\Users\\editemail.html',
      1 => 1521537221,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '211825acb0516cc0751-82667046',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5acb0516ec4fa',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5acb0516ec4fa')) {function content_5acb0516ec4fa($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>武夷山驴友交流网--邮箱修改页</title>
	<script src="__PUBLIC__/Home/js/editemail.js"></script>
	<link type="text/css" rel="stylesheet" href="__PUBLIC__/Home/css/public.css"/>
	<link type="text/css" rel="stylesheet" href="__PUBLIC__/Home/css/index.css"/>
	<link type="text/css" rel="stylesheet" href="__PUBLIC__/Home/css/register.css"/>
	<style>
		#header{
			color: #666;
			margin-top:20px;
			background:#fff;
			padding:20px 0px;
		}
		#header h1{
			padding:0px 40px 0px 30px;
			margin-top: 30px;
			margin-bottom: 40px;
			font-size: 24px;
		}
		#header form{
			margin-bottom: 60px;
		}
	</style>
</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<br/><br/>
	<center>
		<div id="header" class="w960">
		<h1>邮箱修改页</h1>
		<form action="__APP__/Users/updateEmail" name="myform" method="post" onsubmit="return dosubmit()">
			<table>
				<tr>
					<td align="right">新邮箱：</td>
					<td><input type="text" name="email" value="<?php echo $_SESSION['user']['email'];?>
"/>&nbsp;&nbsp;<span>如:guoguo@126.com</span></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td align="center"  colspan="2"><span class="bn-flat"><input  type="submit" value="更新邮箱" tabindex="8"></span></td>
				</tr>
			</table>
			<div id="cw"></div>
		</form>

		</div>
	</center>	
	<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
	<!--底部信息-->
    <?php echo $_smarty_tpl->getSubTemplate ("Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>