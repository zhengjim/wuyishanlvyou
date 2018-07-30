<?php /* Smarty version Smarty-3.1.6, created on 2018-04-09 15:04:39
         compiled from "./Home/Tpl\Groups\groups.html" */ ?>
<?php /*%%SmartyHeaderCode:102165acb1087a645a0-59172445%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29c38fe629f8549b4a564630c3100c496b77836f' => 
    array (
      0 => './Home/Tpl\\Groups\\groups.html',
      1 => 1521703252,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '102165acb1087a645a0-59172445',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'total' => 0,
    'grlist' => 0,
    'vo' => 0,
    'pageinfo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5acb1087d9369',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5acb1087d9369')) {function content_5acb1087d9369($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>武夷山驴友交流网--武夷驴友论坛</title>
		<meta name="keywords" content="">
		<meta name="description" content="">
		<link rel="StyleSheet" href="__PUBLIC__/Home/css/groups.css" type="text/css"/>
		<link rel="StyleSheet" href="__PUBLIC__/Home/css/public.css" type="text/css"/>
		<script type="text/javascript" src="__PUBLIC__/Home/js/jquery-1.7.2.min.js"></script>
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
		<!----------导入页头---------->
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
		<!----------主体内容开始---------->
		<div id="main">
			<!----------主体顶部内容开始---------->
			<div id="main_top">
				<div class="main_top_c">
					<?php if (!empty($_smarty_tpl->tpl_vars['total']->value)){?>
					<span style="font-size:25px;color:#D68375">共有<i><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</i>个武夷山话题，总有一个适合你的......</span>
					<?php }else{ ?>
					<span style="font-size:25px;color:#D68375">共有<i><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</i>个武夷山话题，快来创建一个自己的武夷山话题吧......</span>
					<?php }?>
				</div>	
			</div>
			<!----------主体顶部内容结束---------->
			<!----------主体内容左侧开始---------->
			<div id="main_left">
				<!----------所有话题内容显示列表---------->
				<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['grlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?>
				<div class="main_left_list">
					<div class="main_left_list_img">
						<img src="__PUBLIC__/uploads/groups/s_<?php echo $_smarty_tpl->tpl_vars['vo']->value['group_pic'];?>
" />
					</div>	
					<a href="__APP__/GroupPost/index/gid/<?php echo $_smarty_tpl->tpl_vars['vo']->value['gid'];?>
"><span><?php echo $_smarty_tpl->tpl_vars['vo']->value['group_name'];?>
</span></a><br/>
					<div class="main_left_list_add">
						<i><?php echo $_smarty_tpl->tpl_vars['vo']->value['grouper_num'];?>
人参加</i>
						<?php if ($_SESSION['user']){?>
						<b><a href="__APP__/Groups/insert/gid/<?php echo $_smarty_tpl->tpl_vars['vo']->value['gid'];?>
">+加入该话题</a></b>
						<?php }else{ ?>
						<b><a href="javascript:void(0)" onclick="login()">+加入该话题</a></b>
						<?php }?>
					</div>	
				</div>
				<?php } ?>
				<div class="main_left_list_pag"><?php echo $_smarty_tpl->tpl_vars['pageinfo']->value;?>
</div>
				<!----------清除浮动---------->
				<div class="clear"></div>
				<!----------分页显示的div---------->
				<div class="main_paging"></div>
			</div>
			<!----------主体内容左侧结束---------->
			<!----------主体内容右侧侧开始---------->
			<div id="main_right">
				<div id="main_right_top">
					<div class="setup">
						<?php if ($_SESSION['user']){?>
						<a href="__APP__/Groups/addgroup">创建自己的话题</a>
						<?php }else{ ?>
						<a href="javascript:void(0)" onclick="login()">创建自己的话题</a>
						<?php }?>
					</div>	
				</div>
				<!----------右边公告位置开始---------->
				<div class="main_right_notice">
					
				</div>
				<!----------右边公告位置结束---------->
				<!----------右边广告位置开始---------->
				<div class="main_right_ad">

				</div>
				<!----------右边广告位置结束---------->
			</div>
			<!----------主体内容右侧侧结束---------->
			<!----------清除浮动---------->
			<div class="main_bottom"></div>
		</div>
		<!----------主体内容结束---------->
		<!----------导入页脚---------->
		<?php echo $_smarty_tpl->getSubTemplate ("Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</body>
</html><?php }} ?>