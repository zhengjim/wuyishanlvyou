<?php /* Smarty version Smarty-3.1.6, created on 2018-04-18 11:11:06
         compiled from "./Home/Tpl\Users\activereply.html" */ ?>
<?php /*%%SmartyHeaderCode:187395ad6b74a556ed5-08238371%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '57b94104a357672e63834e1ece7d6255a3908e26' => 
    array (
      0 => './Home/Tpl\\Users\\activereply.html',
      1 => 1521539710,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187395ad6b74a556ed5-08238371',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'v' => 0,
    'm' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5ad6b74a6c58c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ad6b74a6c58c')) {function content_5ad6b74a6c58c($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>武夷山驴友交流网--相约武夷回复页</title>
	<meta name="keywords" content="">
	<meta name="description" content="">	
	<link rel="StyleSheet" href="__PUBLIC__/Home/css/public.css" type="text/css"/>
	<link rel="StyleSheet" href="__PUBLIC__/Home/css/usercenter.css" type="text/css"/>
	<link type="text/css" rel="stylesheet" href="__PUBLIC__/Home/css/active.css"/>
	<link rel="StyleSheet" href="/WEB/WEB/Public/Home/css/mystyle.css" type="text/css">
</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<!--这是主体部分-->
	<div class="w960" id="ucenter">
		<div class="c-left">
			<?php echo $_smarty_tpl->getSubTemplate ("Public/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<div id="title" ><a href="__APP__/Users/activeReply" style="color:#37a;font-weight: bold;">相约武夷回复</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="__APP__/Users/talkReply">话题回复</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="__APP__/Users/diaryReply">武夷行回复</a></div>
			<?php if (!empty($_smarty_tpl->tpl_vars['list']->value)){?>
			<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
			<div class="c-con">
				<ul>
					<li>
						<div class="img">
							<?php if (!empty($_smarty_tpl->tpl_vars['v']->value['photo'])){?>
							<img src="__PUBLIC__/uploads/header/s_<?php echo $_smarty_tpl->tpl_vars['v']->value['photo'];?>
"> 
						<?php }else{ ?>
							<img src="__PUBLIC__/uploads/header/none-img2.png"> 
						<?php }?> 
						</div>
						<div class="c-con-right">
							<i><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
:的回复</i>
							<p>
								<b><a href="__APP__/Active/Post/pid/<?php echo $_smarty_tpl->tpl_vars['v']->value['pid'];?>
" target=""><?php echo $_smarty_tpl->tpl_vars['v']->value['title'];?>
</a></b> 
								<?php echo $_smarty_tpl->tpl_vars['v']->value['reply_content'];?>

							</p>
							<span><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
发布</span>
						</div> 
					</li>
				</ul>
			</div>
			<?php } ?>
			<?php }else{ ?>
				<div class="none">暂时没有回复哦</div>
			<?php }?>
			<div class="pagelist">
				<div class="paginator">
					<?php echo $_smarty_tpl->tpl_vars['page']->value;?>

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