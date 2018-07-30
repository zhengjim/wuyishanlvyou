<?php /* Smarty version Smarty-3.1.6, created on 2018-04-09 14:40:56
         compiled from "./Home/Tpl\Users\editActive.html" */ ?>
<?php /*%%SmartyHeaderCode:159075acb0af87b17a1-20647084%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '560c7636358b64e84be11066d90ac1801608ba40' => 
    array (
      0 => './Home/Tpl\\Users\\editActive.html',
      1 => 1521537167,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159075acb0af87b17a1-20647084',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'info' => 0,
    'city' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5acb0af8aaac6',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5acb0af8aaac6')) {function content_5acb0af8aaac6($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\phpStudy\\PHPTutorial\\WWW\\lvyou\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title></title>
	<meta name="keywords" content="">
	<meta name="description" content="">	
	<link rel="StyleSheet" href="__PUBLIC__/Home/css/public.css" type="text/css"/>
	<link rel="StyleSheet" href="__PUBLIC__/Home/css/usercenter.css" type="text/css"/>
	<link rel="StyleSheet" href="__PUBLIC__/Home/css/addActive.css" type="text/css"/>
	<link rel="StyleSheet" href="__PUBLIC__/calendar/calendar-green.css" type="text/css"/>
	<script type="text/javascript" src="__PUBLIC__/calendar/calendar.js"></script>
	<script language='javascript' src="__PUBLIC__/calendar/main.js"></script>
    <script src="__PUBLIC__/Home/js/jquery-1.7.2.min.js"></script>
</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<!--这是主体部分-->
	<div class="w960" id="ucenter">
		<div class="c-left">
			<?php echo $_smarty_tpl->getSubTemplate ("Public/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


			<!--发起健康知识表单-->
			<div id="addActiveForm">
				<div id="title"> 
					<a href="javascript:" class="cur">健康知识修改</a>
				</div>
				<form action="__URL__/doEditActive" method="post" enctype="multipart/form-data">
				<input type="hidden" name="active_id" id="active_id" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['id'];?>
"/>
				<!--有的地方是通过post的方法传过来健康知识类型，如果post不存在默认线上健康知识-->
				<table border="0" cellpadding="5" cellspacing="0">
					<tr>
						<td>健康知识名称</td><td><input type="text" name="active_name" id="active_name" class="must" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['title'];?>
" disabled/></td>
					</tr>
					<tr>
						<td>开始时间</td><td><input type="text" style="width:88px" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['info']->value['start_time'],"%Y-%m-%d %H");?>
" name="start_time" id="start_time"/> 点
						<script language="javascript" type="text/javascript">
							var showX = getElementLeft($Obj("start_time")) + 15;
							var showY = (window.navigator.userAgent.indexOf("MSIE") >=1 )? getElementTop($Obj("start_time")) + 55 :  getElementTop($Obj("start_time")) + 25;

							if((window.navigator.userAgent.indexOf("MSIE 7.0") >=1 )) {
								showX = getElementLeft($Obj("start_time"))+105;
								showY = getElementTop($Obj("start_time"))+1200;
							}
							if(window.navigator.userAgent.indexOf("MSIE 6.0")>=1)
							{
								Calendar.setup({
									inputField     :    "start_time",
									ifFormat       :    "%Y-%m-%d %H",
									showsTime      :    true,
									timeFormat     :    "24"
									});
							} else {
									Calendar.setup({
									inputField     :    "start_time",
									ifFormat       :    "%Y-%m-%d %H",
									showsTime      :    true,
									position       :    [showX, showY],
									timeFormat     :    "24"
									});
							}
						</script>
						</td>
					</tr>
					<tr>
						<td>结束时间</td><td><input type="text" style="width:88px" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['info']->value['end_time'],"%Y-%m-%d %H");?>
" name="end_time" id="end_time"/> 点
						<script language="javascript" type="text/javascript">
							var showX = getElementLeft($Obj("end_time")) + 15;
							var showY = (window.navigator.userAgent.indexOf("MSIE") >=1 )? getElementTop($Obj("end_time")) + 55 :  getElementTop($Obj("end_time")) + 25;

							if((window.navigator.userAgent.indexOf("MSIE 7.0") >=1 )) {
								showX = getElementLeft($Obj("end_time"))+105;
								showY = getElementTop($Obj("end_time"))+1200;
							}
							if(window.navigator.userAgent.indexOf("MSIE 6.0")>=1)
							{
								Calendar.setup({
									inputField     :    "end_time",
									ifFormat       :    "%Y-%m-%d %H",
									showsTime      :    true,
									timeFormat     :    "24"
									});
							} else {
									Calendar.setup({
									inputField     :    "end_time",
									ifFormat       :    "%Y-%m-%d %H",
									showsTime      :    true,
									position       :    [showX, showY],
									timeFormat     :    "24"
									});
							}
						</script></td>
					</tr>
					<?php if ($_POST['type']==2){?>
					<tr id="city">
						<td>举行城市</td>
						<td>
							<input name="active_city"  id='old_city' value="<?php echo $_smarty_tpl->tpl_vars['city']->value['id'];?>
" type="hidden"/>
							<input name="active_city_f"  value="<?php echo $_smarty_tpl->tpl_vars['city']->value['name'];?>
" disabled="disabled"/>
							<a href="javascript:" id="edloc" style="color:#3177A8;" >选择其他城市</a>
						</td>
					</tr>
					<tr id="address-box">
						<td>具体地址</td>
						<td><input type="text" name="address" id="address" class="must" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['address'];?>
"/></td>
					</tr>
					<?php }?>
					<tr>
						<td height="240" valign="top">健康知识介绍</td>
						<td height="240" valign="top">
							<textarea name="content" id="content" class="must"><?php echo $_smarty_tpl->tpl_vars['info']->value['content'];?>
</textarea>
						</td>
					</tr>
					<tr>
						<td></td><td><input type="submit" value="发布"/>  <input type="reset" value="重填"/></td>
					</tr>
				</table>
			</div>

		</div>
		<div class="c-right">
			<div id="news">
				<b>试试更多有趣的内容</b>
				<ul>
					<li><a href="" target="" title="">双十一，来晒你的战利品！</a></li>
					<li><a href="" target="" title="">大家来讲相亲的故事。</a></li>
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