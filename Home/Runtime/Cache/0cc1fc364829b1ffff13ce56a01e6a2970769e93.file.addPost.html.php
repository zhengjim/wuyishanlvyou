<?php /* Smarty version Smarty-3.1.6, created on 2018-04-09 15:00:25
         compiled from "./Home/Tpl\Active\addPost.html" */ ?>
<?php /*%%SmartyHeaderCode:168225acb0f8957ae50-12367665%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0cc1fc364829b1ffff13ce56a01e6a2970769e93' => 
    array (
      0 => './Home/Tpl\\Active\\addPost.html',
      1 => 1521541408,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '168225acb0f8957ae50-12367665',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'active_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5acb0f89861db',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5acb0f89861db')) {function content_5acb0f89861db($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>武夷山驴友交流网--发布回复</title>
	<meta name="keywords" content="">
	<meta name="description" content="">	
	<link rel="StyleSheet" href="__PUBLIC__/Home/css/public.css" type="text/css"/>
	<link rel="StyleSheet" href="__PUBLIC__/Home/css/usercenter.css" type="text/css"/>
	<style>
		#thumbnails img{
			width:100px;
		}
	</style>
	<script src="__PUBLIC__/Home/js/jquery-1.7.2.min.js"></script>

	<!--多图片上传的JS-->
	<script type="text/javascript" src="__PUBLIC__/Home/swfupload/swfupload.js"></script>
	<script type="text/javascript" src="__PUBLIC__/Home/swfupload/handlers.js"></script>
	<script type="text/javascript">
		var swfu;
		window.onload = function () {
			swfu = new SWFUpload({
				// Backend Settings
				upload_url: "__APP__/Common/swfupload/w/700/h/700/",
				post_params: { "PHPSESSID": "<?php echo session_id();?>
"}, //定义了一些键/值对，允许在上传每个文件时候捎带地post给服务器

				// File Upload Settings
				file_size_limit : "2 MB",	// 2MB 特殊值0表示文件大小无限
				file_types : "*.jpg;*.jpeg;*.gif;*.png", // 类型
				file_types_description : "Images",  //设置文件选择对话框中显示给用户的文件描述。
				file_upload_limit : 0, //设置SWFUpload实例允许上传的最多文件数量

				// 事件处理程序设置，这些函数的定义在handlers.js
				// 该处理程序不属于SwfUpload但是我的网站和控制
				// 我的网站到SwfUpload事件的反应。
				swfupload_preload_handler : preLoad,		//预加载上传处理程序
				swfupload_load_failed_handler : loadFailed, //当页面不能正常加载flash影片的时候
				file_queue_error_handler : fileQueueError,			//fileQueueError事件侦听函数(加入文件上传队列错误)
				file_dialog_complete_handler : fileDialogComplete,  //fileDialogComplete事件侦听函数（加入文件队列完成后）
				upload_progress_handler : uploadProgress,	//由flash控件定时触发,以达到及时显示上传进度的效果
				upload_error_handler : uploadError,			//文件失败成功后触发的事件处理函数
				upload_success_handler : uploadSuccess,		//文件上传成功后触发的事件处理函数
				upload_complete_handler : uploadComplete, 	//上传（无论成功还是失败）一个后触发的事件处理函数

				// Button Settings
				button_image_url : "__PUBLIC__/Home/swfupload/images/SmallSpyGlassWithTransperancy_17x18.png",
				button_placeholder_id : "spanButtonPlaceholder",
				button_width: 180,
				button_height: 18,
				button_text : '<span class="button">选择上传图片<span class="buttonSmall">(最大2M/张)</span></span>',
				button_text_style : '.button { font-family: Helvetica, Arial, sans-serif; font-size: 12pt; } .buttonSmall { font-size: 10pt; }',
				button_text_top_padding: 0,
				button_text_left_padding: 18,
				button_window_mode: SWFUpload.WINDOW_MODE.TRANSPARENT,
				button_cursor: SWFUpload.CURSOR.HAND,

				// Flash Settings
				flash_url : "__PUBLIC__/Home/swfupload/swfupload.swf",
				flash9_url : "__PUBLIC__/Home/swfupload/swfupload_FP9.swf",

				custom_settings : {
					upload_target : "divFileProgressContainer"
				},

				// Debug Settings
				debug: false
			});
		};
	</script>
</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	

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
			<script>
				function doCheck(){
					if(($("#title").val().length) < 5){
						$("#title").next("i").remove();
						$("#title").after("<i>*标题为空或过短！</i>");
						return false;
					}
					if(($("#post-c").val().length) < 5){
						$("#post-c").next("i").remove();
						$("#post-c").after("<i>*内容为空或过短！</i>");
						return false;
					}
				}
			</script>
			<div class="c-con" id="addgrouppost">
				<h1>在【<?php echo $_smarty_tpl->tpl_vars['active_name']->value;?>
】邀请发布讨论</h1>
				<form action="__URL__/insertPost/" method="post" enctype="multipart/form-data" onsubmit="return doCheck()">
					<input type="hidden" name="aid" value="<?php echo $_GET['aid'];?>
"/>
					<table border="0" width="500" cellspacing="5" cellpadding="0">
						<tr><td><label>标题:</label></td>
							<td><input type="text" name="title" id="title"/></td>
						</tr>
						<tr></tr>
						<tr><td><label>内容:</label></td>
							<td><textarea name="content" rows="20" cols="55" id="post-c"></textarea></td>
						</tr>
						<tr></tr>
						<tr><td><label>图片:</label></td>
							<td><input type="file" name="photo" id="photo"/></td>
						</tr>
						<tr></tr>
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