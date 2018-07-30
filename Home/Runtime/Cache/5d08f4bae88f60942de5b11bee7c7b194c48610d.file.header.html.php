<?php /* Smarty version Smarty-3.1.6, created on 2018-04-08 16:37:47
         compiled from "./Home/Tpl\Public\header.html" */ ?>
<?php /*%%SmartyHeaderCode:224675ac9d4db4d6d48-46260432%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d08f4bae88f60942de5b11bee7c7b194c48610d' => 
    array (
      0 => './Home/Tpl\\Public\\header.html',
      1 => 1521610692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '224675ac9d4db4d6d48-46260432',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5ac9d4dba3010',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ac9d4dba3010')) {function content_5ac9d4dba3010($_smarty_tpl) {?> 
		<center>
            <table width="1000" border="0">
  <tr  bgcolor="#FFCC99">
    <td>&nbsp;</td>
    <td>&nbsp;<div id="t-login">
					<?php if (isset($_SESSION['user'])){?>
						你好，<span><?php echo $_SESSION['user']['name'];?>
！</span>&nbsp;&nbsp;&nbsp;&nbsp;<a href="__APP__/Users/usersInfo/">个人中心</a>&nbsp;&nbsp;<a href="__APP__/Users/myshow/">我的主页</a>&nbsp;&nbsp;<a href="__APP__/Users/activeReply/">个人消息</a>&nbsp;&nbsp;<a href="__APP__/Users/loginOut/">退出</a>
						<?php }else{ ?><a href="__APP__/Users/login/">登录</a>&nbsp;&nbsp;<a href="__APP__/Users/register/">注册</a>
					<?php }?>
				</div></td>
  </tr>
  <tr>
    <td>&nbsp;<div id="logo">
				<a href="__APP__" title="网站首页"> </a>
			</div></td>
    <td>&nbsp;<div id="search-text">
					<table width="100%" border="0">
  <tr>
    <td bgcolor="#FFCC99" width="100" height="50" >&nbsp;<a href="__APP__">网站首页</a> </td>
    <td bgcolor="#FFCC99" width="100" height="50" >&nbsp;<a href="__APP__/Diary">驴友武夷行分享</a></td>
    <td bgcolor="#FFCC99" width="100" height="50" >&nbsp;<a href="__APP__/Groups/">武夷驴友论坛</a></td>
 
    <td bgcolor="#FFCC99" width="100" height="50" >&nbsp;<a href="__APP__/Active">相约武夷</a></td>
  </tr>
</table>

					
					 </td>
  </tr>
</table>


		</center>	 
	<!--头部结束--><?php }} ?>