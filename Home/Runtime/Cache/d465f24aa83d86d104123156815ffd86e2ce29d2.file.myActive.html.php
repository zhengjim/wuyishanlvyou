<?php /* Smarty version Smarty-3.1.6, created on 2018-04-09 14:24:30
         compiled from "./Home/Tpl\Users\myActive.html" */ ?>
<?php /*%%SmartyHeaderCode:291565acb071e242485-33826298%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd465f24aa83d86d104123156815ffd86e2ce29d2' => 
    array (
      0 => './Home/Tpl\\Users\\myActive.html',
      1 => 1521540580,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '291565acb071e242485-33826298',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'alist' => 0,
    'v' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5acb071e4d06a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5acb071e4d06a')) {function content_5acb071e4d06a($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\phpStudy\\PHPTutorial\\WWW\\lvyou\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>武夷山驴友交流网--我的邀约</title>
	<meta name="keywords" content="">
	<meta name="description" content="">	
	<link rel="StyleSheet" href="__PUBLIC__/Home/css/public.css" type="text/css"/>
	<link rel="StyleSheet" href="__PUBLIC__/Home/css/usercenter.css" type="text/css"/>
	<script src="__PUBLIC__/Home/js/jquery-1.7.2.min.js"></script>
	<script>
		//退出健康知识操作
		function dropOut(aid){
			$.ajax({
				type: "POST",
				url: "__APP__/Active/dropOut/",
				dataType: "json",
				data:{ aid:aid},
				success: function(msg){
					if(msg.msg == 'success'){
						alert('成功退出此邀约！');
						window.location.reload();
					}else{
						alert('操作失败');
					}
				}
			});

		}

		//关闭健康知识
		function toClose(aid){
			//登录验证
			var uid = $("#uid").val();
			if(uid == ""){
				alert('请先登录！');
				window.location = "__APP__/Users/login";
				return;
			}

			$.ajax({
				type: "POST",
				url: "__APP__/Active/toClose/",
				dataType: "text",
				data:aid,
				success: function(){
					window.location.reload();
				}
			});
		}
	</script>
</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<!--这是主体部分-->
	<div class="w960" id="ucenter">
		<div class="c-left">
		<?php echo $_smarty_tpl->getSubTemplate ("Public/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


			<!--发起健康知识表单-->
			<div id="myActive">
				<h1><a class="cur" href="__APP__/Users/myActive/">我参加的邀约</a>  | <a href="__APP__/Users/myActive/type/c/">我发起的邀约</a></h1>
				<ul>
					<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['alist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
					<li>
						<div class="img"><a href="__APP__/Active/view/aid/<?php echo $_smarty_tpl->tpl_vars['v']->value['active_id'];?>
"  target="_blank"><img src="__PUBLIC__/uploads/active/a_<?php echo $_smarty_tpl->tpl_vars['v']->value['photo'];?>
" alt=""></a></div>
						<div class="content-r">
							<p class="info">
								活动标题：<strong><?php if ($_GET['type']=='c'){?><a href="__APP__/Active/view/aid/<?php echo $_smarty_tpl->tpl_vars['v']->value['active_id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['active_name'];?>
</a><?php }else{ ?><a href="__APP__/Active/view/aid/<?php echo $_smarty_tpl->tpl_vars['v']->value['aid'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['v']->value['active_name'];?>
</a><?php }?></strong><br/>
								结束时间：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['end_time'],"%Y-%m-%d-%T");?>
<br/>
								集合地址：<?php echo $_smarty_tpl->tpl_vars['v']->value['address'];?>
<br/>
							</p>
							<span>
								<i><?php echo $_smarty_tpl->tpl_vars['v']->value['join_num'];?>
人参加</i>&nbsp;&nbsp;<?php if ($_GET['type']=='c'){?><a href="__URL__/editActive/aid/<?php echo $_smarty_tpl->tpl_vars['v']->value['active_id'];?>
">修改</a><!--<a href="javascript:" onclick="toClose(<?php echo $_smarty_tpl->tpl_vars['v']->value['aid'];?>
)">我要关闭</a>--><?php }else{ ?><a href="__APP__/Active/AddPost/aid/<?php echo $_smarty_tpl->tpl_vars['v']->value['aid'];?>
/">我要讨论</a>&nbsp;&nbsp<a href="javascript:" onclick="dropOut(<?php echo $_smarty_tpl->tpl_vars['v']->value['aid'];?>
)">我要退出</a><?php }?>
							</span>
						</div> 
					</li>
					<?php } ?>							
				</ul>
				<div class="pagelist">
					<div class="paginator">
						<?php echo $_smarty_tpl->tpl_vars['page']->value;?>

					</div>
				</div> 
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