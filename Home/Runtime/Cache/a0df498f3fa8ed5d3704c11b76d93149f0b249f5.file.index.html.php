<?php /* Smarty version Smarty-3.1.6, created on 2018-04-18 11:41:35
         compiled from "./Home/Tpl\Index\index.html" */ ?>
<?php /*%%SmartyHeaderCode:208045ac9d4daeccc32-29676145%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0df498f3fa8ed5d3704c11b76d93149f0b249f5' => 
    array (
      0 => './Home/Tpl\\Index\\index.html',
      1 => 1524022892,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '208045ac9d4daeccc32-29676145',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5ac9d4db4b269',
  'variables' => 
  array (
    'list_active' => 0,
    'vo' => 0,
    'list_topic' => 0,
    'list_group' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ac9d4db4b269')) {function content_5ac9d4db4b269($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\phpStudy\\PHPTutorial\\WWW\\lvyou\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>武夷山驴友交流网</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
	<link type="text/css" rel="stylesheet" href="__PUBLIC__/Home/css/public.css"/>
	<link type="text/css" rel="stylesheet" href="__PUBLIC__/Home/css/index.css"/>
	<script type="text/javascript" src="__PUBLIC__/Home/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript">
		$(function(){
			$("#diary_img div").hover(function(){
				$(this).find("a").css({ filter: "alpha(opacity: 70)", opacity: "0.7", background: "#fff" });
				$(this).find("span").css({ display: "block" });
			},function(){
				$(this).find("a").css({ filter: "alpha(opacity: 100)", opacity: "1", background: "" });
				$(this).find("span").css({ display: "none" });
			});
		});
		
		//执行登录
		function doLogin(){
			var username=$("#username").val();
			var pass=$("#password").val();
			$.ajax({
				type: "POST",
				url: "__APP__/Users/doLogins",
				data: { email:username,pass:pass},
				success: function(res){
					if(res=="ok"){
						window.location.reload();
					}
					if(res=="error"){
						$("#hints").text("账号或密码错误!");
					}
					if(res=="close"){
						$("#hints").text("你的账号已被查封!");
					}
				}
			});
		}
	</script>
</head>
<body>
	<!--公用头部LOGO、导航、登录、注册-->
	<?php echo $_smarty_tpl->getSubTemplate ("Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<!--网站推荐或介绍-->
	<div class="intro w960">
		<div class="left">
			<a href="" target="">
				<img src="__PUBLIC__/Home/images/stop.png"/>
			</a>
		</div>
		<div class="right">
			<div class="intro-content">
				<h2><a href="" target="">享受武夷山</a></h2>
				<div class="cc">
					<p>武夷山，武夷山位于江西与福建西北部两省交界处，武夷山脉北段东南麓总面积999.75平方公里，是中国著名的风景旅游区和避暑胜地。属典型的丹霞地貌，是首批国家级重点风景名胜区之一。</p>
					<p>武夷山是三教名山。自秦汉以来，武夷山就为羽流禅家栖息之地，留下了不少宫观、道院和庵堂故址。武夷山还曾是儒家学者倡道讲学之地。
					</p>
					<p>在这里,让我们大家来分享对武夷山的了解,旅游攻略等</p>
				</div>
			</div>
		</div> 
	</div>

	<!--武夷山美食图片-->
	
	<div id="diary" class="w960 main01">
		<div class="left-box">
			<span class="l_top">武夷山美食图片精选</span>
				 <img src="__PUBLIC__/images/1.jpg" width="150" height="120">
				 <img src="__PUBLIC__/images/2.jpg" width="150" height="120">
				 <img src="__PUBLIC__/images/3.jpg" width="150" height="120">
				 <img src="__PUBLIC__/images/4.jpg" width="150" height="120">
				 <img src="__PUBLIC__/images/5.jpg" width="150" height="120">
				 <img src="__PUBLIC__/images/6.jpg" width="150" height="120">
				 <img src="__PUBLIC__/images/7.jpg" width="150" height="120">
				 <img src="__PUBLIC__/images/8.jpg" width="150" height="120">
				<img src="__PUBLIC__/images/5.jpg" width="150" height="120">
				<img src="__PUBLIC__/images/6.jpg" width="150" height="120">
				<img src="__PUBLIC__/images/7.jpg" width="150" height="120">
				<img src="__PUBLIC__/images/8.jpg" width="150" height="120">

		 
			 
		</div> 
		<div class="right-box">
			<div class="d_right">
				<span class="r_top"><span>相约武夷行.....</span>（<a href="__APP__/Active">更多</a>）</span>
				<div class="r_centre">
					<ul>
						<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list_active']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?>
							<li>
								<a href="__APP__/Active/view/aid/<?php echo $_smarty_tpl->tpl_vars['vo']->value['aid'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['vo']->value['aname'];?>
</a><br/>
								<span style="height:20px;line-height:20px;">时间：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['vo']->value['start_time'],"%Y-%m-%d");?>
-<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['vo']->value['end_time'],"%Y-%m-%d");?>
</span><br/>
								<span><?php echo $_smarty_tpl->tpl_vars['vo']->value['join_num'];?>
人参加</span>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
		<div class="clear"></div> 
	</div>
	
	<!--武夷山分享、相约武夷结束-->

	<!--第一个横屏广告开始-->
	<div class="ad-w960" class="w960">
		<a href="http://www.wuyiu.edu.cn/" >
		<img src="__PUBLIC__/Home/images/aaaa.gif" />
		</a>
	</div>
	<!--第一个横屏广告结束-->

	<!--论坛、话题开始-->
	<div id="group" class="w960">
		<div id="group_left" class="left-box">
			<span class="l_top">热门武夷山帖子</span>
			<div class="l_list">
				<ul>
					<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list_topic']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?>
					<li>
						<span class="block"><?php echo $_smarty_tpl->tpl_vars['vo']->value['like_num'];?>
<br/>喜欢</span>
						<div>
							<a href="__APP__/GroupDetails/index/group_post_id/<?php echo $_smarty_tpl->tpl_vars['vo']->value['gpid'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['vo']->value['title'];?>
</a><br/>
							<span class="span">来自<?php echo $_smarty_tpl->tpl_vars['vo']->value['gname'];?>
话题         <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['vo']->value['time'],"%Y-%m-%d %H:%M:%S");?>
</span>
						</div>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<div id="group_right" class="right-box">
			<div class="r_content">
				<span class="c_top"><span>热门武夷驴友话题......</span>（<a href="__APP__/Groups">更多</a>）</span>
				<ul>
					<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list_group']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?>
					<li>
						<span class="block"><img src="__PUBLIC__/uploads/groups/s_<?php echo $_smarty_tpl->tpl_vars['vo']->value['group_pic'];?>
" width="50px" height="50px"/></span>
						<div>
							<a href="__APP__/GroupPost/index/gid/<?php echo $_smarty_tpl->tpl_vars['vo']->value['gid'];?>
"><?php echo $_smarty_tpl->tpl_vars['vo']->value['group_name'];?>
</a><br/>
							<span class="span"><?php echo $_smarty_tpl->tpl_vars['vo']->value['grouper_num'];?>
个成员</span>
						</div>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
	<!--话题、话题结束-->

	<!--底部开始-->
	<?php echo $_smarty_tpl->getSubTemplate ("Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<!--底部结束-->
</body>
</html><?php }} ?>