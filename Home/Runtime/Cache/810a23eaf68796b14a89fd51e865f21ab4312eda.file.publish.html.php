<?php /* Smarty version Smarty-3.1.6, created on 2018-04-09 15:33:57
         compiled from "./Home/Tpl\Diary\publish.html" */ ?>
<?php /*%%SmartyHeaderCode:6205acb1765f0d226-23179460%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '810a23eaf68796b14a89fd51e865f21ab4312eda' => 
    array (
      0 => './Home/Tpl\\Diary\\publish.html',
      1 => 1522642396,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6205acb1765f0d226-23179460',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5acb17661d3a6',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5acb17661d3a6')) {function content_5acb17661d3a6($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>武夷山驴友交流网--我的武夷行分享</title>
	<link type="text/css" rel="stylesheet" href="__PUBLIC__/Home/css/public.css"/>
	<link type="text/css" rel="stylesheet" href="__PUBLIC__/Home/css/diary.css"/>
	<style>
		#thumbnails img{
			width:100px;
		}
	</style>

</head>
<body>
	<!--公用头部LOGO、导航、登录、注册-->
	<?php echo $_smarty_tpl->getSubTemplate ("Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<!--公用头部LOGO、导航、登录、注册结束-->
	<!-- 记录分享部分 -->
	<div class="w960">
		<div id="diary_top">
			<span>分享我的武夷山行</span>
		</div>
		<div id="diary_record">
			<form action="__APP__/Diary/dopublish" method="post" enctype="multipart/form-data">
				<span id="title">我的武夷行分享</span>
				<div id="record_content">

					<div id="record_table">
						<font size="3">图片: </font></br>
						<input type="file" name="photo" id="photo"/>
						</br></br>
						<font size="3">分享类型: </font></br>
						<select id="type" name="type">
							<option value='1'>武夷山美食</option>
							<option value='2'>武夷山景点</option>
							<option value='3'>武夷山民宿</option>
						</select>
						</br></br>
						<font size="3">标题: </font></br>
						<input type="text" name="title" placeholder="输入标题" style="width:250px;margin-bottom:20px;"/>
						</br>
						<font size="3">分享内容: </font>
						<textarea placeholder="武夷山旅游美食?趣事?民宿?" name="content"></textarea>
					</div>
				</div>
				<span id="record_publish"><input type="submit" value="发布" /></span>
			</form>
		</div>
		<div class="clear"></div>
	</div>
	<!-- 记录分享部分结束 -->
	<!--底部开始-->
	<?php echo $_smarty_tpl->getSubTemplate ("Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<!--底部结束-->
</body>
</html><?php }} ?>