<?php /* Smarty version Smarty-3.1.6, created on 2018-04-09 15:29:05
         compiled from "./Home/Tpl\Core\index.html" */ ?>
<?php /*%%SmartyHeaderCode:195625acb164186c2b0-49070815%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0858162136cd0e3cba36962c184d73026c3c7fc6' => 
    array (
      0 => './Home/Tpl\\Core\\index.html',
      1 => 1521613448,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '195625acb164186c2b0-49070815',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'vo' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5acb1641b9499',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5acb1641b9499')) {function content_5acb1641b9499($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\phpStudy\\PHPTutorial\\WWW\\lvyou\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_modifier_truncate')) include 'D:\\phpStudy\\PHPTutorial\\WWW\\lvyou\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\modifier.truncate.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>武夷山驴友交流网--我的分享</title>
	<meta name="keywords" content="">
	<meta name="description" content="">	
	<link rel="StyleSheet" href="__PUBLIC__/Home/css/public.css" type="text/css"/>
	<link rel="StyleSheet" href="__PUBLIC__/Home/css/usercenter.css" type="text/css"/>
	<link type="text/css" rel="stylesheet" href="__PUBLIC__/Home/css/active.css"/>
	<link rel="StyleSheet" href="/WEB/WEB/Public/Home/css/mystyle.css" type="text/css">
	<script type="text/javascript">
		function doDel(did,img){
			if(confirm("确定要删除吗？删除之后无法恢复！")){
				//浏览器URL重定向（跳转）
				window.location="__APP__/Core/del/did/"+did+"/img/"+img;
			}
		}
	</script>
</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<!--这是主体部分-->
	<div class="w960" id="ucenter">
		<div class="c-left">
			<?php echo $_smarty_tpl->getSubTemplate ("Public/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			
			<div class="c-con">
				<ul>
					<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?>
						<li style="height:125px;border-bottom:1px dashed #ccc;background-color:#f8f1e8;padding:30px 0px;">
							<div style="float:left;width:415px;height:125px;">
								<a style="float:left;display:block;height:20px;font-size:14px;font-weight:bold;" href="__APP__/Diary/detail/did/<?php echo $_smarty_tpl->tpl_vars['vo']->value['did'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['vo']->value['title'];?>
</a>
								<span style="float:left;display:block;width:415px;height:20px;font-size:12px;color:#999;">更新于<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['vo']->value['addtime'],"%Y-%m-%d %H:%M:%S");?>
 赞(<?php echo $_smarty_tpl->tpl_vars['vo']->value['like_num'];?>
) <?php echo $_smarty_tpl->tpl_vars['vo']->value['count'];?>
条评论
									<a href="javascript:doDel(<?php echo $_smarty_tpl->tpl_vars['vo']->value['did'];?>
,'<?php echo $_smarty_tpl->tpl_vars['vo']->value['imgs'];?>
')" style="color:red;">删除</a>
								</span>
								<span style="float:left;display:block;width:415px;height:85px;line-height:20px;font-size:12px;color:#666;overflow:hidden;"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['vo']->value['content'],130,"...");?>
</span>
							</div>
							<div style="float:right;width:170px;height:125px;"><img src="__PUBLIC__/uploads/diary/m_<?php echo $_smarty_tpl->tpl_vars['vo']->value['picture'];?>
"/></div>
							
						</li>
					<?php } ?>
				</ul>
			</div>
			
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