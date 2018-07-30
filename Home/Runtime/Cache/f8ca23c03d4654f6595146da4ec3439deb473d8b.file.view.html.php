<?php /* Smarty version Smarty-3.1.6, created on 2018-04-09 14:55:17
         compiled from "./Home/Tpl\Active\view.html" */ ?>
<?php /*%%SmartyHeaderCode:194885acb0e558f6a54-29108076%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f8ca23c03d4654f6595146da4ec3439deb473d8b' => 
    array (
      0 => './Home/Tpl\\Active\\view.html',
      1 => 1522651625,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194885acb0e558f6a54-29108076',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'info' => 0,
    'name' => 0,
    'join_state' => 0,
    'postlist' => 0,
    'p' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5acb0e55b0f3c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5acb0e55b0f3c')) {function content_5acb0e55b0f3c($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\phpStudy\\PHPTutorial\\WWW\\lvyou\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>武夷山驴友交流网--相约武夷</title>
	<meta name="keywords" content="">
	<meta name="description" content="">	
	<link rel="StyleSheet" href="__PUBLIC__/Home/css/public.css" type="text/css"/>
	<link rel="StyleSheet" href="__PUBLIC__/Home/css/active.css" type="text/css"/>
	<style rel="stylesheet" type="text/css">
		#join_num{ display:inline;}
	</style>
	<!--参加、退出邀请JS-->
	<script src="__PUBLIC__/Home/js/jquery-1.7.2.min.js"></script>
	<script>
		//参加邀请操作
		function join(aid){
			var uid = $("#uid").val();
			//如果没有登录提示登录，如果登录了则执行回复操作
			if(uid == undefined || uid == "" ){
				alert('请先登录！');
				window.location = "__APP__/Users/login";//如果没有登录则跳转到登录界面
				return;
			}else{
				var aid = $("#aid").val();
				$.ajax({
					type: "POST",
					url: "__APP__/Active/join/",
					dataType: "json",
					data:{ aid:aid},
					success: function(msg){
						if(msg.msg == "no-login"){
							alert('登录超时！');
						}else if(msg.msg == 'logined'){
							alert('您已加入邀请！');
						}else if(msg.msg == 'error'){
							alert('加入失败！');
						}else{
							alert('加入成功！');
							$("#join_num").html(msg.njnum);
							$("#info li i").html("<a href='javascript:' onclick='dropOut("+aid+")'>我要退出</a>");

						}
					}
				});

			}

		}

		//退出邀请操作
		function dropOut($aid){
			var aid = $("#aid").val();
			$.ajax({
				type: "POST",
				url: "__APP__/Active/dropOut/",
				dataType: "json",
				data:{ aid:aid},
				success: function(msg){
					if(msg.msg == 'success'){
						alert('成功退出此邀请！');
                        $("#join_num").html(msg.njnum);
						$("#info li i").html("<a href='javascript:' onclick='join("+aid+")'>我要参加</a>");
					}else{
						alert('操作失败');
					}
				}
			});

		}

	</script>
</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<!--这是主体部分-->
	<div class="w960 active" id="active-view">
		<div class="left-box">
			<div id="info-box">
				<div class="active-img"><a href=""><img src="__PUBLIC__/uploads/active/a_<?php echo $_smarty_tpl->tpl_vars['info']->value['photo'];?>
"/></a></div>
				<div id="info"> 
					<h1><?php echo $_smarty_tpl->tpl_vars['info']->value['active_name'];?>
</h1>

					<li class="item">发起人:<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</li>
					<li class="item">活动时间:<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['info']->value['start_time'],"%Y-%m-%d");?>
 至 <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['info']->value['end_time'],"%Y-%m-%d");?>
</li>
					<li class="item">集合地址:<?php echo $_smarty_tpl->tpl_vars['info']->value['address'];?>
</li>
					<li class="item"><div id="join_num"><?php echo $_smarty_tpl->tpl_vars['info']->value['join_num'];?>
</div>人参加 <i><?php if ($_smarty_tpl->tpl_vars['join_state']->value==-1){?><a href="javascript:" onclick="join(<?php echo $_GET['aid'];?>
)">我要参加</a><?php }else{ ?><a href="javascript:" onclick="dropOut(<?php echo $_GET['aid'];?>
)">我要退出</a><?php }?></i></li>
					<input type="hidden" id="aid" value="<?php echo $_GET['aid'];?>
"/>
					<input type="hidden" id="uid" value="<?php echo $_SESSION['user']['uid'];?>
"/>
				</div>
				<div class="clear"></div>

			</div>
			<br/>
			<h3>邀请介绍  · · · · · ·</h3>
			<div id="a-conent">
				<?php echo $_smarty_tpl->tpl_vars['info']->value['description'];?>

			</div>

			<div id="list">
				<div class="title">
					<br/>
					<h3>讨论  · · · · · ·</h3><span id="add-bar"><a href="__APP__/Active/AddPost/aid/<?php echo $_GET['aid'];?>
/">添加讨论</a></span>
				</div>
				<?php if ($_smarty_tpl->tpl_vars['postlist']->value){?>
				<ul>
					<li></li>
					<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['postlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
					<li><a href="__URL__/post/pid/<?php echo $_smarty_tpl->tpl_vars['p']->value['pid'];?>
" class="post-t"><?php echo $_smarty_tpl->tpl_vars['p']->value['title'];?>
</a><span class="from">来自:<?php echo $_smarty_tpl->tpl_vars['p']->value['uname'];?>
</span><span id="replay"><?php echo $_smarty_tpl->tpl_vars['p']->value['reply_num'];?>
个回应</span><i><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['p']->value['addtime'],"%Y-%m-%d");?>
</i></li>
					<?php } ?>
				</ul>
				<div class="pagelist"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
				<?php }?>
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
		<div class="clear">
		</div>
	</div>

	<!--主体部分结束-->

	<?php echo $_smarty_tpl->getSubTemplate ("Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<div id="active_box">
	</div>
	<div id="active_imgs"></div>
	
</body>
</html><?php }} ?>