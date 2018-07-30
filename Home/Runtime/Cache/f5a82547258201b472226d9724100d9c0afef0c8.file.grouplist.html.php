<?php /* Smarty version Smarty-3.1.6, created on 2018-05-20 14:59:09
         compiled from "./Home/Tpl\GroupPost\grouplist.html" */ ?>
<?php /*%%SmartyHeaderCode:103755acb108b495d52-24467137%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5a82547258201b472226d9724100d9c0afef0c8' => 
    array (
      0 => './Home/Tpl\\GroupPost\\grouplist.html',
      1 => 1526799547,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '103755acb108b495d52-24467137',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5acb108b71369',
  'variables' => 
  array (
    'group_name' => 0,
    'total' => 0,
    'state' => 0,
    'group_pic' => 0,
    'name' => 0,
    'group_intro' => 0,
    'gplist' => 0,
    'vo' => 0,
    'pageinfo' => 0,
    'grlist' => 0,
    'k' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5acb108b71369')) {function content_5acb108b71369($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'D:\\phpStudy\\PHPTutorial\\WWW\\lvyou\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\modifier.truncate.php';
if (!is_callable('smarty_modifier_date_format')) include 'D:\\phpStudy\\PHPTutorial\\WWW\\lvyou\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>武夷山驴友交流网--武夷山话题列表页</title>
		<meta name="keywords" content="">
		<meta name="description" content="">
		<link rel="StyleSheet" href="__PUBLIC__/Home/css/grouplist.css" type="text/css"/>
		<link rel="StyleSheet" href="__PUBLIC__/Home/css/public.css" type="text/css"/>
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
		<!---------主体内容开始---------->
		<div id="main">
			<!----------列表武夷山话题名开始---------->
				<div id="main_top">
					<div class="main_top_c">
							<span><?php echo $_smarty_tpl->tpl_vars['group_name']->value;?>
</span>&nbsp;&nbsp;&nbsp;&nbsp;
							<i>共有<span><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</span>篇帖子</i>
					</div>
					
					<div class="main_top_addgroup">
						<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['state']->value==1;?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1){?>
						<a  href="__APP__/MyGroup/quit/gid/<?php echo $_GET['gid'];?>
">退出该话题</a>
						<?php }else{ ?>
						<a style="font-size: 16px;" href="__APP__/GroupPost/insert/gid/<?php echo $_GET['gid'];?>
">+加入该话题</a>
						<?php }?>
					</div>
				</div>
				
			<!---------列表武夷山话题名结束----------->
			<!----------主体左边列表栏开始---------->
			<div id="main_left">
				<div class="main_left_intro">
					<div class="main_left_intro_img">
						<img src="__PUBLIC__/uploads/groups/m_<?php echo $_smarty_tpl->tpl_vars['group_pic']->value;?>
"/>
						<div class="main_left_headman">
							<span>创建人：<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</span>
						</div>	
					</div>
					<div class="main_left_intro_char">
						<?php if (!empty($_smarty_tpl->tpl_vars['group_intro']->value)){?>
						<span><b>该武夷山话题简介：</b><?php echo $_smarty_tpl->tpl_vars['group_intro']->value;?>
</span>
						<?php }else{ ?>
						<span><b>该武夷山话题简介：</b><?php echo $_smarty_tpl->tpl_vars['group_intro']->value;?>
组长很懒，什么也没写!</span>
						<?php }?>
					</div>
				</div>
				<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['gplist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['vo']->key;
?>
				<!---------列表内容---------->
				<div class="main_left_c">
					<!----------喜欢人数---------->
					<div class="main_left_c_l">
						<span style="text-align:center;display:block"><?php echo $_smarty_tpl->tpl_vars['vo']->value['like_num'];?>
<br/>喜欢</span>
					</div>
					<!----------列表内容显示---------->
					<div class="main_left_c_r">
						<a href="__APP__/GroupDetails/index/group_post_id/<?php echo $_smarty_tpl->tpl_vars['vo']->value['group_post_id'];?>
/gid/<?php echo $_smarty_tpl->tpl_vars['vo']->value['gid'];?>
"><?php echo $_smarty_tpl->tpl_vars['vo']->value['post_title'];?>
</a><br/><br/>
						<ul>
							<?php if (!empty($_smarty_tpl->tpl_vars['vo']->value['photo'])){?>
							<li><img src="__PUBLIC__/uploads/header/m_<?php echo $_smarty_tpl->tpl_vars['vo']->value['photo'];?>
"/></li>
							<?php }else{ ?>
							<li><img src="__PUBLIC__/uploads/header/duface.png"/></li>
							<?php }?>
							<li><p><a href="__APP__/GroupDetails/index/group_post_id/<?php echo $_smarty_tpl->tpl_vars['vo']->value['group_post_id'];?>
/gid/<?php echo $_smarty_tpl->tpl_vars['vo']->value['gid'];?>
">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['vo']->value['descripition'],60,"...");?>
</a></p></li><br/><br/><br/>
						</ul>
							<span><?php echo $_smarty_tpl->tpl_vars['vo']->value['name'];?>
 &nbsp;&nbsp;&nbsp;&nbsp;<i><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['vo']->value['addtime'],"%Y-%m-%d %H:%M:%S");?>
&nbsp;&nbsp;&nbsp;&nbsp;发布</i></span>
					</div>
				</div>
				<?php } ?>
				<div class="main_left_c_page"><?php echo $_smarty_tpl->tpl_vars['pageinfo']->value;?>
</div>
			</div>
			<!----------主体左列表栏结束---------->
			<!----------主体右列表栏开始---------->
			<div id="main_right">
				<div class="main_right_top">
					<div class="main_right_top_fabu">
						<div class="main_right_top_fabu1">
							<?php if ($_SESSION['user']){?>
							<a href="__APP__/AddGroupPost/agpinsert/gid/<?php echo $_GET['gid'];?>
">发布帖子</a>
							<?php }else{ ?>
							<a href="javascript:void(0)" onclick="login()">发布帖子</a>
							<?php }?>
						</div>
					</div>
					<div class="main_right_top_add">值得加入的话题</div>
				<!--	<div class="main_right_top_exchange"><a id="changegroup">换一批</a></div> -->
					<div class="main_right_top_eliminate"></div>
				</div>
				<!--在此循环输出武夷山话题-->
				<div class="main_right_content">
				<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['grlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['vo']->key;
?>
					<div class="main_right_content_n">
						<div class="main_right_content_n1_img">	
							<a href="__APP__/GroupPost/index/gid/<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><img src="__PUBLIC__/uploads/groups/s_<?php echo $_smarty_tpl->tpl_vars['vo']->value['group_pic'];?>
"/></a>
						</div>	
						<div class="main_right_content_n2">
							<b><a href="__APP__/GroupPost/index/gid/<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['vo']->value['group_name'];?>
</a></b>
							<i><?php echo $_smarty_tpl->tpl_vars['vo']->value['grouper_num'];?>
个成员</i>&nbsp;&nbsp;
							<?php if ($_SESSION['user']){?>
							<span><a href="__APP__/GroupPost/insert/gid/<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
">+加入该武夷山话题</a></span>
							<?php }else{ ?>
							<span><a href="javascript:void(0)" onclick="login()">+加入该武夷山话题</a></span>
							<?php }?>
						</div>
					</div>
					<?php } ?>	
				</div>
				<!----------Ajax请求刷新武夷山话题----------->
				<script type="text/javascript">
					$(function(){
						$("#changegroup").click(function(){
							$.ajax({
								url:"__APP__/MyGroup/showgroup",	//请求地址
								dataType:'json',
								success:function(grouplist){
									var i;
									var str = "";
									for(i in grouplist){
										str +='<div class="main_right_content_n"><div class="main_right_content_n1_img"><a href="__APP__/GroupPost/index/gid/'+i+'"><img src="__PUBLIC__/uploads/groups/s_'+grouplist[i].group_pic+'"/></a></div><div class="main_right_content_n2"><b><a href="__APP__/GroupPost/index/gid/<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
">'+grouplist[i].group_name+'</a></b><i>'+grouplist[i]['grouper_num']+'个成员</i>&nbsp;&nbsp;&nbsp;<span><a href="__APP__/GroupPost/insert/gid/'+[i]+'">+加入该武夷山话题</a></span></div></div>';
									}
									$(".main_right_content").html(str);
								}
							});
						});
					});
				</script>
				<!----------右边公告位置开始---------->
				<div class="main_right_notice">
					
				</div>
				<!----------右边公告位置结束---------->
				<!----------右边广告位置开始---------->
				<div class="main_right_ad">
				</div>
				<!----------右边广告位置结束---------->
			</div>
			<!----------主体右列表栏结束---------->
			<!----------清除浮动---------->
			<div class="main_bottom">
			
			</div>
		</div>
		<!---------主体内容结束---------->
		<!----------导入页脚---------->
		<?php echo $_smarty_tpl->getSubTemplate ("Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</body>	
</html><?php }} ?>