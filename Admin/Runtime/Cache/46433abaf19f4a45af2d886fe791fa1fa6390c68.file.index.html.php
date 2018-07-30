<?php /* Smarty version Smarty-3.1.6, created on 2018-04-04 20:29:37
         compiled from "./Admin/Tpl\Index\index.html" */ ?>
<?php /*%%SmartyHeaderCode:198975ac4c5317173d3-28826996%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46433abaf19f4a45af2d886fe791fa1fa6390c68' => 
    array (
      0 => './Admin/Tpl\\Index\\index.html',
      1 => 1521619941,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '198975ac4c5317173d3-28826996',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5ac4c5319b64d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ac4c5319b64d')) {function content_5ac4c5319b64d($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\phpStudy\\PHPTutorial\\WWW\\lvyou\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>武夷山驴友交流网后台管理</title>

<link href="__PUBLIC__/Admin/dwz/themes/default/style.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="__PUBLIC__/Admin/dwz/themes/css/core.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="__PUBLIC__/Admin/dwz/themes/css/print.css" rel="stylesheet" type="text/css" media="print"/>
<link href="__PUBLIC__/Admin/dwz/uploadify/css/uploadify.css" rel="stylesheet" type="text/css" media="screen"/>
<!--[if IE]>
<link href="__PUBLIC__/Admin/dwz/themes/css/ieHack.css" rel="stylesheet" type="text/css" media="screen"/>
<![endif]-->

<script src="__PUBLIC__/Admin/dwz/js/speedup.js" type="text/javascript"></script>
<script src="__PUBLIC__/Admin/dwz/js/jquery-1.7.1.js" type="text/javascript"></script>
<script src="__PUBLIC__/Admin/dwz/js/jquery.cookie.js" type="text/javascript"></script>
<script src="__PUBLIC__/Admin/dwz/js/jquery.validate.js" type="text/javascript"></script>
<script src="__PUBLIC__/Admin/dwz/js/jquery.bgiframe.js" type="text/javascript"></script>

<script src="__PUBLIC__/Admin/dwz/xheditor/xheditor-1.1.12-zh-cn.min.js" type="text/javascript"></script>
<script src="__PUBLIC__/Admin/dwz/uploadify/scripts/swfobject.js" type="text/javascript"></script>
<script src="__PUBLIC__/Admin/dwz/uploadify/scripts/jquery.uploadify.v2.1.0.js" type="text/javascript"></script>


<script src="__PUBLIC__/Admin/dwz/js/dwz.min.js" type="text/javascript"></script>
<script src="__PUBLIC__/Admin/dwz/js/dwz.regional.zh.js" type="text/javascript"></script>

<script type="text/javascript">
$(function(){
	DWZ.init("__PUBLIC__/Admin/dwz/dwz.frag.xml", {
		//loginUrl:"login_dialog.html", loginTitle:"登录",	// 弹出登录对话框
		//loginUrl:"login.html",	// 跳到登录页面
		statusCode:{ ok:200, error:300, timeout:301}, //【可选】
		pageInfo:{ pageNum:"pageNum", numPerPage:"numPerPage", orderField:"_order", orderDirection:"_sort"}, //【可选】
		debug:false,	// 调试模式 【true|false】
		callback:function(){
			initEnv();
			$("#themeList").theme({ themeBase:"__PUBLIC__/Admin/dwz/themes"}); // themeBase 相对于index页面的主题base路径
		}
	});
});



</script>
</head>

<body scroll="no">
	<?php echo $_smarty_tpl->getSubTemplate ("Public/pagerForm.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<div id="layout">
		<div id="header">
			<div class="headerNav">
				<a class="logo" href="#">标志</a>
				<ul class="nav">
					<li style="color:#fff">欢迎您：<?php echo $_SESSION['adminuser']['name'];?>
</li>
					<li><a href="__APP__/Users/edit/uid/<?php echo $_SESSION['adminuser']['uid'];?>
/navTabId/userslist" target="dialog">修改密码</a></li>
					<li><a href="__APP__/Index/logOut">退出</a></li>
				</ul>
				
				<ul class="themeList" id="themeList">
					<li theme="default"><div class="selected">蓝色</div></li>
					<li theme="green"><div>绿色</div></li>
					<li theme="purple"><div>紫色</div></li>
					<li theme="silver"><div>银色</div></li>
					<li theme="azure"><div>天蓝</div></li>
				</ul>
			</div>
		</div>

		<div id="leftside">
			<div id="sidebar_s">
				<div class="collapse">
					<div class="toggleCollapse"><div></div></div>
				</div>
			</div>
			<div id="sidebar">
				<div class="toggleCollapse"><h2>主菜单</h2><div>收缩</div></div>
				<div class="accordion" fillSpace="sidebar">
					<div class="accordionHeader">
						<h2><span>Folder</span>驴友管理</h2>
					</div>
					<div class="accordionContent">
						<ul class="tree treeFolder">
							<li><a href="__APP__/Users/index/" target="navTab" rel="userslist">所有驴友</a></li>
							<!--<li><a href="__APP__/Users/addusers/" target="dialog" rel="userslist">添加用户</a></li>-->
						</ul>
					</div>

					<div class="accordionHeader">
						<h2><span>Folder</span>武夷行分享管理</h2>
					</div>
					<div class="accordionContent">
						<ul class="tree treeFolder">
							<li><a href="__APP__/Diary/index/" target="navTab" rel="diarylist">所有武夷行分享</a></li>
						</ul>
					</div>

					<div class="accordionHeader">
						<h2><span>Folder</span>武夷论坛管理</h2>
					</div>
					<div class="accordionContent">
						<ul class="tree treeFolder">
							<li><a href="__APP__/Groups/index/" target="navTab" rel="grouplist">所有话题</a></li>
							<li><a href="__APP__/GroupPost/index/" target="navTab" rel="gpostlist" title="所有话题的帖子">所有帖子</a></li>
						</ul>
					</div>

					<div class="accordionHeader">
						<h2><span>Folder</span>相约武夷管理</h2>
					</div>
					<div class="accordionContent">
						<ul class="tree treeFolder">
							<li><a href="__APP__/Active/" target="navTab" rel="active">武夷山美食邀请</a></li>
							<li><a href="__APP__/ActiveOff/" target="navTab" rel="activeoff">武夷山景点邀请</a></li>
						</ul>
					</div>

				</div>
			</div>
		</div>
		<div id="container">
			<div id="navTab" class="tabsPage">
				<div class="tabsPageHeader">
					<div class="tabsPageHeaderContent"><!-- 显示左右控制时添加 class="tabsPageHeaderMargin" -->
						<ul class="navTab-tab">
							<li tabid="main" class="main"><a href="javascript:;"><span><span class="home_icon">我的主页</span></span></a></li>
						</ul>
					</div>
					<div class="tabsLeft">left</div><!-- 禁用只需要添加一个样式 class="tabsLeft tabsLeftDisabled" -->
					<div class="tabsRight">right</div><!-- 禁用只需要添加一个样式 class="tabsRight tabsRightDisabled" -->
					<div class="tabsMore">more</div>
				</div>
				<ul class="tabsMoreList">
					<li><a href="javascript:;">主页</a></li>
				</ul>
				<div class="navTab-panel tabsPageContent layoutBox">
					<div class="page unitBox">
						<div class="accountInfo">
							<p>武夷山驴友交流网
								<a href="#" target="_blank"></a>
							</p>
							<p>今天是 <?php echo smarty_modifier_date_format(time(),'%Y-%m-%d');?>
</p>
						</div>
						
						<div class="pageFormContent" layoutH="80" style="margin-right:230px">
							<h3>系统信息</h3>
							<h3>PUBLIC:__PUBLIC__</h3>  
							<h3>APP:__APP__</h3>  
							<h3>URL:__URL__</h3>
							<br>
							<img src="__PUBLIC__/Admin/images/admin1.jpg" width="700" height="250">

						
					</div>
					
					
				</div>
			</div>
		</div>

	</div>

	<div id="footer">Copyright &copy; 2012 <a href="demo_page2.html" target="dialog">开发团队</a><!-- Tel：--></div>
</body>
</html><?php }} ?>