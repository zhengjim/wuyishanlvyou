<?php /* Smarty version Smarty-3.1.6, created on 2018-04-09 15:25:37
         compiled from "./Home/Tpl\Groups\groupfound.html" */ ?>
<?php /*%%SmartyHeaderCode:306165acb1571f39a70-99773801%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '339b4f08faef4f34c32e72a7c242d20dfdd913d6' => 
    array (
      0 => './Home/Tpl\\Groups\\groupfound.html',
      1 => 1521698802,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '306165acb1571f39a70-99773801',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5acb157217d46',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5acb157217d46')) {function content_5acb157217d46($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>武夷山驴友交流网--创建武夷山论坛话题</title>
		<meta name="keywords" content="">
		<meta name="description" content="">
		<script type="text/javascript" src="__PUBLIC__/Home/js/jquery-1.7.2.min.js"></script>
		<link rel="StyleSheet" href="__PUBLIC__/Home/css/groupfound.css" type="text/css"/>
		<link rel="StyleSheet" href="__PUBLIC__/Home/css/public.css" type="text/css"/>
		<!--<script src="__PUBLIC__/Home/js/groupfound.js"></script>-->
	</head>
	<body>
		<!----------导入页头---------->
		<?php echo $_smarty_tpl->getSubTemplate ("Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<!----------创建话题页面主体开始---------->
		<div id="main">
			<!----------主体顶部开始---------->
			<div id="main_top">

			</div>
			<!----------主体顶部结束---------->
			<!----------主体左侧开始---------->
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
			
			
				<!--<div id="slip" style="color:red;font-size:15px;float:left;margin-left:60px;"></div>-->
				<div class="main_left_present">
					<form action="__APP__/Groups/ginsert" method="post" enctype="multipart/form-data">
						<span>武夷山话题名称：</span><input type="text" name="group_name" class="required"/>  <br/>
						<span>武夷山话题logo：</span><input type="file" name="group_pic"/>
						<div class="textarea">
							<span>武夷山话题简介：</span><textarea name="group_intro" rows="5" cols="40"></textarea>
						</div>
						<!-- <div class="main_left_headpic">
							<img src="__PUBLIC__/uploads/groups/m"/>
						</div><br/> -->
						<div class="main_left_present_bu">
							<input type="submit" name="submit" value="提交"/>&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="reset" name="reset" value="重置" />
						</div>
					</form>
				</div>
				<script type="text/javascript">
					var info={ required:"不可以为空！"};
					$(function(){
						//获取input输入框，并添加获取和失去焦点事件
						$("input:text").focus(function(){
							//获取焦点事件处理
							$(this).next("span").remove();
							var gname = $(this).attr("class");
							$(this).after("&nbsp;&nbsp;<span style='color:blue;font-size:12px;'>"+info[gname]+"</pan>");
						}).blur(function(){
							//失去焦点事件
							$(this).next("span").remove();
							//信息验证
							var gname = $(this).attr("class");
							if($(this).val().length==0){
								$(this).after("&nbsp;&nbsp;<span style='color:red;font-size:12px;'>话题名不可以为空！</span>");
							}
						});
					});
				</script>
			</div>
			
			<!----------主体左侧结束---------->
			<!----------主体右侧开始---------->
			<div id="main_right">
				<!----------右边公告位置开始---------->
				<div class="main_right_notice">
					
				</div>
				<!----------右边公告位置结束---------->
				<!----------右边广告位置开始---------->
				<div class="main_right_ad">

				</div>
				<!----------右边广告位置结束---------->
			</div>
			<!----------主体右侧结束---------->
		</div>
		<!----------创建话题页面主体结束---------->
		<!----------导入页脚---------->
		<?php echo $_smarty_tpl->getSubTemplate ("Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</body>
</html><?php }} ?>