<?php /* Smarty version Smarty-3.1.6, created on 2018-05-16 18:48:30
         compiled from "./Home/Tpl\MyGroup\mygroup.html" */ ?>
<?php /*%%SmartyHeaderCode:59775acb1664b47636-95597180%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f54274c3df28793d5eb5d481b4cf9ad14db6c0c6' => 
    array (
      0 => './Home/Tpl\\MyGroup\\mygroup.html',
      1 => 1526467697,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59775acb1664b47636-95597180',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5acb1664d9cbe',
  'variables' => 
  array (
    'glist' => 0,
    'vo' => 0,
    'pageinfo' => 0,
    'list' => 0,
    'k' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5acb1664d9cbe')) {function content_5acb1664d9cbe($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>武夷山驴友交流网--我加入的武夷山话题</title>
		<meta name="keywords" content="">
		<meta name="description" content="">
		<link rel="StyleSheet" href="__PUBLIC__/Home/css/mygroup.css" type="text/css"/>
		<link rel="StyleSheet" href="__PUBLIC__/Home/css/public.css" type="text/css"/>
		<script src="__PUBLIC__/Home/js/jquery-1.7.2.min.js"></script>
		
	</head>
	<body>
		<!----------导入页头---------->
		<?php echo $_smarty_tpl->getSubTemplate ("Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<!----------主体开始---------->
		<div id="main">
			<!----------主体顶部开始---------->
			<div id="main_top"></div>
			<!----------主体顶部结束---------->
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
			
				<!----------左侧栏目标题开始----------->
				<div class="main_left_title">
					<h2>我加入的武夷山话题</h2>
				</div>
				<!----------左侧栏目标题结束----------->
				<!----------左侧栏目内容开始---------->
				<div class="main_left_content">
					<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['glist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?>
						<div class="groupli">
							<!----------话题的头像图片---------->
							<div class="groupli_img">
								<img src="__PUBLIC__/uploads/groups/m_<?php echo $_smarty_tpl->tpl_vars['vo']->value['group_pic'];?>
"/>
							</div>	
							<!----------话题的名字----------->
							<div class="groupfa">
								<span><a href="__APP__/GroupPost/index/gid/<?php echo $_smarty_tpl->tpl_vars['vo']->value['gid'];?>
"><?php echo $_smarty_tpl->tpl_vars['vo']->value['group_name'];?>
</a></span>
							</div>
							<div class="groupnum">
								共有<i><?php echo $_smarty_tpl->tpl_vars['vo']->value['grouper_num'];?>
</i>名成员
							</div>
							<div class="groupquit">
								<a href="__APP__/MyGroup/quit/gid/<?php echo $_smarty_tpl->tpl_vars['vo']->value['gid'];?>
">退出话题</a>
							</div>
						</div>
					<?php } ?>
				</div>
				<div class="main_left_list_pag"><?php echo $_smarty_tpl->tpl_vars['pageinfo']->value;?>
</div>
				<!----------左侧栏目内容开始---------->
			</div>
			<!----------主体左侧栏目结束---------->
			<!----------主体右侧栏目开始---------->
			<div id="main_right">
				<div class="main_right_top">
					<div class="main_right_top_add">值得加入的话题</div>
					<div class="main_right_top_exchange"><a id="changegroup">换一批</a></div>
					<div class="main_right_top_eliminate"></div>
				</div>
				<!--在此循环输出话题-->
				<div id="box">
					<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['vo']->key;
?>
					<div class="main_right_content">
						<ul>
							<div class="main_right_content_img">
								<a href="__APP__/GroupPost/index/gid/<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><img src="__PUBLIC__/uploads/groups/s_<?php echo $_smarty_tpl->tpl_vars['vo']->value['group_pic'];?>
"/></a>
							</div>	
							<li>
								<b><a href="__APP__/GroupPost/index/gid/<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['vo']->value['group_name'];?>
</a></b>
								<i><?php echo $_smarty_tpl->tpl_vars['vo']->value['grouper_num'];?>
个成员</i>&nbsp;&nbsp;
								<span><a href="__APP__/Groups/insert/gid/<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
">+加入该话题</a></span>
							</li>
						</ul>
					</div>
					<?php } ?>
				</div>
			</div>
			<!----------Ajax请求刷新话题----------->
			<script type="text/javascript">
				$(function(){
					$("#changegroup").click(function(){
						$.ajax({
							url:"__URL__/showgroup",	//请求地址
							dataType:'json',
							success:function(grouplist){
								var i;
								var str = "";
								for(i in grouplist){
									str +='<div class="main_right_content">';
									str +="<ul>";
									str +='<div class="main_right_content_img"><a href="__APP__/GroupPost/index/gid/'+i+'"><img src="__PUBLIC__/uploads/groups/s_'+grouplist[i].group_pic+'"/></a></div><li><b><a href="__APP__/GroupPost/index/gid/'+i+'">'+grouplist[i].group_name+'</a></b><i>'+grouplist[i].grouper_num+'个成员</i>&nbsp;&nbsp;<span><a href="__APP__/Groups/insert/gid/'+i+'">+加入该话题</a></span></li>';
									str +="</ul></div>";
								}
								$("#box").html(str);
							}
								
						});
					});
				});
			</script>
			<!----------主体右侧栏目结束---------->
			<!----------清除浮动----------->
			<div class="main_bottom"></div>
		</div>
		<!----------主体结束---------->
		<!----------导入页脚---------->
		<?php echo $_smarty_tpl->getSubTemplate ("Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</body>
</html>	<?php }} ?>