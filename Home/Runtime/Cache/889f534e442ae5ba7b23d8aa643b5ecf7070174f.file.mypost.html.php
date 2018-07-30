<?php /* Smarty version Smarty-3.1.6, created on 2018-04-09 16:20:32
         compiled from "./Home/Tpl\MyPost\mypost.html" */ ?>
<?php /*%%SmartyHeaderCode:126695acb20d95d54b2-72120985%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '889f534e442ae5ba7b23d8aa643b5ecf7070174f' => 
    array (
      0 => './Home/Tpl\\MyPost\\mypost.html',
      1 => 1523262030,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '126695acb20d95d54b2-72120985',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5acb20d98d021',
  'variables' => 
  array (
    'list' => 0,
    'vo' => 0,
    'pageinfo' => 0,
    'glist' => 0,
    'g' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5acb20d98d021')) {function content_5acb20d98d021($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\phpStudy\\PHPTutorial\\WWW\\lvyou\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>武夷山驴友交流网--我的武夷山论坛话题</title>
		<meta name="keywords" content="">
		<meta name="description" content="">
		<link rel="StyleSheet" href="__PUBLIC__/Home/css/mypost.css" type="text/css"/>
		<link rel="StyleSheet" href="__PUBLIC__/Home/css/public.css" type="text/css"/>
	</head>
	<body>
		<!----------导入页头---------->
		<?php echo $_smarty_tpl->getSubTemplate ("Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<!----------用户发布的话题页面主体开始---------->
		<div id="main">
			<!----------详情页顶部开始（先设置保留）---------->
			<div id="main_top">
				
			</div>
			<!----------详情页顶部结束---------->
			<!----------主体左侧栏目开始---------->
			<div id="main_left">
				<div id="c-nav">
					<ul>
						<li><a href="__APP__/Users/myshow" target="" title="">我的首页</a></li>
						<li><a href="__APP__/Core" target="" title="">我的分享</a></li>
						<li><a href="__APP__/MyGroup/index" target="" title="">我的话题</a></li>
						<li><a href="__APP__/Users/myActive" target="" title="">我的邀约</a></li>
					</ul>
				</div>
				<div id="add">
					<ul>
						<li>
							<span><a href="__APP__/Diary/publish"  title=""><img src="__PUBLIC__/Home/images/small-img.png" style="margin-top:5px;" /></a></span>
							<i><a href="__APP__/Diary/publish"  title="">分享我的武夷行</a></i>
						</li>
						<li>
							<span><a href="__APP__/AddGroupPost/index"  title=""><img src="__PUBLIC__/Home/images/pen.png" style="margin-top:5px;" /></a></span>
							<i><a href="__APP__/AddGroupPost/index"  title="">发布帖子</a></i>
						</li>
						<li>
							<span><a href="__APP__/Users/addActive"  title=""><img src="__PUBLIC__/Home/images/small-img.png" style="margin-top:5px;" /></a></span>
							<i><a href="__APP__/Users/addActive/"  title="">发起相约武夷</a></i>
						</li>
						<li>
							<span><a href="__APP__/Groups/addgroup"  title=""><img src="__PUBLIC__/Home/images/pen.png" style="margin-top:5px;" /></a></span>
							<i><a href="__APP__/Groups/addgroup"  title="">新建武夷山话题</a></i>
						</li>
					</ul>
				</div>
				
				<div class="main_left_title"><h2>我发布的帖子</h2></div>
				<!----------在此循环输出用户的话题列表---------->
				<!----------用户发布的话题名称、发布时间、用户名---------->
				<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?>
				<div class="main_left_content">
					<div class="main_left_c1">
						<a href="__APP__/GroupDetails/index/group_post_id/<?php echo $_smarty_tpl->tpl_vars['vo']->value['group_post_id'];?>
/gid/<?php echo $_smarty_tpl->tpl_vars['vo']->value['gid'];?>
"><?php echo $_smarty_tpl->tpl_vars['vo']->value['post_title'];?>
</a>
					</div>
					<div class="main_left_c2">
						<span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['vo']->value['addtime'],"%Y-%m-%d %T");?>
</span>
					</div>
					<div class="main_left_c3">
						<span><?php echo $_smarty_tpl->tpl_vars['vo']->value['group_name'];?>
</span>
					</div>
					<div class="main_left_delete"><a href="__APP__/MyPost/del/group_post_id/<?php echo $_smarty_tpl->tpl_vars['vo']->value['group_post_id'];?>
">删除</a></div>
				</div>
				<?php } ?>
				<div class="main_left_list_pag"><?php echo $_smarty_tpl->tpl_vars['pageinfo']->value;?>
</div>
			</div>
			<!----------主体左侧栏目结束---------->
			
			<!----------主体右侧栏目开始---------->
			<div id="main_right">
				<div class="main_right_title">
					<span>我加入的话题</span>
				</div>
				<!----------在此开始循环输出---------->
				<?php  $_smarty_tpl->tpl_vars['g'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['g']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['glist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['g']->key => $_smarty_tpl->tpl_vars['g']->value){
$_smarty_tpl->tpl_vars['g']->_loop = true;
?>
					<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['g']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?>
					<div class="main_right_content">
						<ul>
							<img src="__PUBLIC__/uploads/groups/m_<?php echo $_smarty_tpl->tpl_vars['vo']->value['group_pic'];?>
"/>
							<li>
								<b><a href="__APP__/GroupPost/index/gid/<?php echo $_smarty_tpl->tpl_vars['vo']->value['gid'];?>
"><?php echo $_smarty_tpl->tpl_vars['vo']->value['group_name'];?>
</a></b>
								<span><?php echo $_smarty_tpl->tpl_vars['vo']->value['grouper_num'];?>
个成员</span>
							</li>
						</ul>
					</div>
					<?php } ?>
				<?php } ?>
			</div>
			<!----------主体右侧栏目结束---------->
			<!----------清除浮动---------->
			<div class="main_bottom"></div>
		</div>
		<!----------用户发布的话题页面主体结束---------->
		<!----------导入页脚---------->
		<?php echo $_smarty_tpl->getSubTemplate ("Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</body>
</html>	<?php }} ?>