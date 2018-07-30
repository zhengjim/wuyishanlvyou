<?php /* Smarty version Smarty-3.1.6, created on 2018-04-09 15:23:43
         compiled from "./Home/Tpl\AddGroupPost\addgrouppost.html" */ ?>
<?php /*%%SmartyHeaderCode:111175acb14ff151468-77023287%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3db90734af6359881260f126c59b087e9ae44e35' => 
    array (
      0 => './Home/Tpl\\AddGroupPost\\addgrouppost.html',
      1 => 1521534536,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '111175acb14ff151468-77023287',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'groupres' => 0,
    'vo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5acb14ff342c1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5acb14ff342c1')) {function content_5acb14ff342c1($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>武夷山驴友交流网--发布帖子</title>
	<meta name="keywords" content="">
	<meta name="description" content="">	
	<link rel="StyleSheet" href="__PUBLIC__/Home/css/public.css" type="text/css"/>
	<link rel="StyleSheet" href="__PUBLIC__/Home/css/usercenter.css" type="text/css"/>
</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<!--这是主体部分-->
	<div class="w960" id="ucenter">
		<div class="c-left">
			<div id="c-nav">
				<ul>
					<li><a href="__APP__/Users/myshow" target="" title="">我的首页</a></li>
					<li><a href="__APP__/Core" target="" title="">我的分享</a></li>
					<li><a href="__APP__/MyGroup/index" target="" title="">我的话题</a></li>
					<li><a href="__APP__/Users/myActive" target="" title="">我的邀约</a></li>
				</ul>
			</div>
			<div class="c-con" id="addgrouppost">
				<h1><?php echo $_SESSION['user']['name'];?>
 您好</h1>
				<form action="__APP__/AddGroupPost/insert" method="post">
					<input type="hidden" name="gid" value="<?php echo $_GET['gid'];?>
"/>
					<table border="0" width="500" cellspacing="5" cellpadding="0">
						<tr><td><label>标题:</label></td>
							<td><input type="text" name="post_title"/></td>
						</tr>
						<tr><td></td>
	
						</tr>
						<tr><td>选择话题:</td>
							<td>
								<select name="gid">
									<option value="0">-请选择-</option>
									<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['groupres']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['vo']->value['gid'];?>
" <?php if ($_smarty_tpl->tpl_vars['vo']->value['gid']==$_GET['gid']){?> selected<?php }?>>-<?php echo $_smarty_tpl->tpl_vars['vo']->value['group_name'];?>
-</option>
									<?php } ?>
								</select>
							</td>	
						</tr>
						<tr><td></td>
	
						</tr>
						<tr><td><label>内容:</label></td>
							<td><textarea name="content" rows="20" cols="55"></textarea></td>
						</tr>
						<tr><td></td>
							<td><input type="submit" value="提交"/><input type="submit" value="重置"/></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
		<div class="c-right">
			<div id="news">
				<b>了解我们的武夷山~</b>
				<ul>
					<li><a href="http://www.wuyiu.edu.cn/" target="" title="">武夷学院</a></li>
					<li><a href="http://www.wys.gov.cn/" target="" title="">武夷山政府</a></li>
				</ul>
			</div>
			<div class="right-ad01">
				<img src="__PUBLIC__/Home/images/ad01.png" /> 
			</div> 
		</div>
		<div class="clear"></div> 
	</div> 
	<!--主体部分结束-->

	<?php echo $_smarty_tpl->getSubTemplate ("Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>