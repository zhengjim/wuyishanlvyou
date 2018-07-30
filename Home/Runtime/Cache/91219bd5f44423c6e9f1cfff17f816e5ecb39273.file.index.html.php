<?php /* Smarty version Smarty-3.1.6, created on 2018-04-09 14:51:45
         compiled from "./Home/Tpl\Active\index.html" */ ?>
<?php /*%%SmartyHeaderCode:212265acb0d81422fe1-06656106%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '91219bd5f44423c6e9f1cfff17f816e5ecb39273' => 
    array (
      0 => './Home/Tpl\\Active\\index.html',
      1 => 1522651670,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212265acb0d81422fe1-06656106',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'total' => 0,
    'list' => 0,
    'v' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5acb0d8176b07',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5acb0d8176b07')) {function content_5acb0d8176b07($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'D:\\phpStudy\\PHPTutorial\\WWW\\lvyou\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\modifier.truncate.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>武夷山驴友交流网--相约武夷</title>
	<meta name="keywords" content="">
	<meta name="description" content="">	
	<link rel="StyleSheet" href="__PUBLIC__/Home/css/public.css" type="text/css"/>
	<link rel="StyleSheet" href="__PUBLIC__/Home/css/active.css" type="text/css"/>
	<script src="__PUBLIC__/Home/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript">
        function login(){
            //获取当前浏览器的尺寸；
            var width=$(document).outerWidth();
            var height=$(document).outerHeight();
            $("#allfill").width(width).height(height).show();
            $("#dologin").show();
        }

        //执行登录
        function doLogin(){
            var username=$("#username").val();
            var pass=$("#password").val();
            var usercode=$("#usercode").val();
            $("#hint").text("");
            $.ajax({
                type: "POST",
                url: "__APP__/Users/doLogins",
                data: { email:username,pass:pass,usercode:usercode},
                success: function(res){
                    if(res=="ok"){
                        window.location.reload();
                    }
                    if(res=="error"){
                        $("#hint").text("账号或密码错误!");
                    }
                    if(res=="close"){
                        $("#hint").text("你的账号已被查封!");
                    }
                    if(res=="verfail"){
                        $("#hint").text("验证码错误!");
                    }
                }
            });
        }

	</script>

</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<!-- 登录弹窗开始 -->
	<div id="allfill"></div>
	<div id="dologin">
		<div id="dologin1">
			<div id="dologin2">登录
				<div id="dologin3"></div>
			</div>
			<table width="276" height="200" border="0">
				<tr>
					<td class="td1">账号:</td>
					<td><input type="text" name="email" id="username" placeholder="输入账号" class="td2"/></td>
				</tr>
				<tr>
					<td class="td1">密码:</td>
					<td><input type="password" name="pass" id="password" placeholder="输入密码" class="td2"/></td>
				</tr>
				<tr>
					<td class="td1">验证码:</td>
					<td><input type="text" name="usercode" id="usercode" size="6" placeholder="输入验证码" class="td2" /></td>
				</tr>
				<tr>
					<td></td>
					<td><img src='__APP__/Users/verify/' height="25" onclick="this.src='__APP__/Users/verify/?id='+Math.random"/></td>
				</tr>
				<tr><td></td></tr>
				<tr><td></td></tr>
				<tr>
					<td colspan="2" align="center">
						<input type="submit" value="登录" id="login" onclick="doLogin()"/>&nbsp;&nbsp;
						<input type="button" onclick="$('#allfill,#dologin').hide();" value="关闭"/>
					</td>
				</tr>
			</table>
			<div id="hint" style="padding-top:40px;"></div>
		</div>
	</div>
	<!-- 登录弹窗结束 -->

	<!--这是主体部分-->
	<div class="w960 active" id="onlines">
		<div id="title" ><a href="__APP__/Active/" >全部武夷山邀约</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="__APP__/Active/?type=1">武夷山美食邀约</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="__APP__/Active/?type=2">武夷山景点邀约</a></div>
		<br>
		<div class="left-box">
			<div class="online-tab">
				<span class="total">共<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
个邀约</span>
				<span class="tabs"><a href="__URL__" <?php if ($_GET['oid']==1||$_GET['oid']==''){?>class="tab-on"<?php }?>>最新邀请</a> / <a href="__URL__/index/oid/2/" <?php if ($_GET['oid']==2){?>class="tab-on"<?php }?>>最热邀请</a></span>
				<input type="hidden" id="uid" value="<?php echo $_SESSION['user']['uid'];?>
"/>
			</div>
			
			<ul>
				<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
				<li>
					<h5><a href="__APP__/Active/view/aid/<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"  target="_blank"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['v']->value['title'],50);?>
</a></h5>
					<div class="info"><?php echo $_smarty_tpl->tpl_vars['v']->value['join_num'];?>
人参加</div>
					<div class="imgs">
						<a href="__APP__/Active/view/aid/<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"  target="_blank" ><img src="__PUBLIC__/uploads/active/a_<?php echo $_smarty_tpl->tpl_vars['v']->value['photo'];?>
"/></a>
					</div>
					<p>
						<?php echo $_smarty_tpl->tpl_vars['v']->value['description'];?>

					</p>
				</li>
				<?php } ?>
			</ul>
			<div class="pagelist">
				<div class="paginator">
					<?php echo $_smarty_tpl->tpl_vars['page']->value;?>

				</div>
			</div> 
		</div>
		<div class="right-box">
			<div class="mb20">
				<div class="setup">
					<?php if ($_SESSION['user']){?>
					<a href="__APP__/Users/addActive">发起武夷山邀请</a>
					<?php }else{ ?>
					<a href="javascript:void(0)" onclick="login()">发起武夷山邀请</a>
					<?php }?>
				</div>
			</div>
		</div>
		<div class="clear">
		</div>
	</div>
	<!--主体部分结束-->

	<?php echo $_smarty_tpl->getSubTemplate ("Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>