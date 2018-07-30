<?php /* Smarty version Smarty-3.1.6, created on 2018-04-08 16:37:52
         compiled from "./Home/Tpl\Users\usersinfo.html" */ ?>
<?php /*%%SmartyHeaderCode:257375ac9d4e0b64fa0-46640545%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cec2d0a328fbe788449a58622d5c9f07fcf3b5bf' => 
    array (
      0 => './Home/Tpl\\Users\\usersinfo.html',
      1 => 1521537125,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '257375ac9d4e0b64fa0-46640545',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'clist' => 0,
    'list' => 0,
    'v' => 0,
    'sel' => 0,
    's' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5ac9d4e0e977f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ac9d4e0e977f')) {function content_5ac9d4e0e977f($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"><head>	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />	<title>武夷山驴友交流网--个人资料修改页</title>	<link type="text/css" rel="stylesheet" href="__PUBLIC__/Home/css/public.css"/>	<link type="text/css" rel="stylesheet" href="__PUBLIC__/Home/css/index.css"/>	<script type="text/javascript" src="__PUBLIC__/Home/js/jquery-1.7.2.min.js"></script>	<script type="text/javascript">		$("#pid").live("change",function(){ 				var ob = $(this); //获取当前下拉选择框对象				ob.nextAll("select").remove();				var val = ob.val();				//ajax加载子信息				$.ajax({					url:"__APP__/Users/doLoad",					type:"post",					data:{ pid:val},					dataType:"json",					success:function(data){						if(data==null){							return;						}						var str="<select name='city'>";						str+="<option value=\"0\">-请选择-</option>";						for(var i=0;i<data.length;i++){							str+="<option value=\""+data[i].id+"\">"+data[i].name+"</option>";						}						str+="</select>";						ob.after(str);					}				});			 });	</script>	<style>		#content{			color: #666;			margin-top:20px;			background:#fff;			padding:20px 0px;		}		#content h1{			padding:0px 40px 0px 110px;			font-size: 24px;		}	</style></head><body>	<?php echo $_smarty_tpl->getSubTemplate ("Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
	<!--头像的尺寸 48*48 160*169-->	<div class="w960" id="content">       <h1><?php echo $_SESSION['user']['name'];?>
的帐号</h1>    <div class="grid-16-8 clearfix">   		<div class="article">			<div class="clear"></div>			<br/>			<br/>			<div class="clear"></div>			<form id="lzform" name="lzform" method="post" action="__APP__/Users/editInfo" onsubmit="return dosubmit()"><div style="display:none;"></div>				<table style="clear:both" width="100%" align="center" cellpadding="5">					<tbody>						<tr>							<td class="m" valign="top" align="right">名　号: </td>							<td valign="top">								<input name="name" type="text" size="15" maxlength="15" value="<?php echo $_SESSION['user']['name'];?>
">								<br><span style="color:#aaa;font-size:15px;">建议不要频繁修改。</span><br>							</td>						</tr>						<!--头像开始-->						<tr>							<td class="m" valign="top" align="right">头　像:</td>   							<td valign="top">								<div style="height:48px;width:48px;border:1px solid #bbb;margin:10px;float:left;">									<?php if ($_SESSION['user']['photo']){?>									<img src="__PUBLIC__/uploads/header/s_<?php echo $_SESSION['user']['photo'];?>
" height="48" width="48" >									<?php }else{ ?>									<img src="__PUBLIC__/uploads/header/none-img2.png" height="48" width="48" >									<?php }?>								</div>								<div style="margin:10px;float:left;height:160px;width:160px;border:1px solid #bbb;">									<?php if ($_SESSION['user']['photo']){?>									<img id="bigheader" src="__PUBLIC__/uploads/header/m_<?php echo $_SESSION['user']['photo'];?>
" height="160" width="160">									<?php }else{ ?>									<img id="bigheader" src="__PUBLIC__/uploads/header/none-img.png" height="160" width="160">									<?php }?>								</div>								<a href="__APP__/Users/headUpload" style="margin:10px;float:left;color:#3177A8;">更新</a><p></p>								<br><br>							</td>						</tr>						<!--头像结束-->						<tr>							<td class="m" valign="middle" align="right" height="45">常居地:</td>							<td valign="middle" height="45">								<?php echo $_smarty_tpl->tpl_vars['clist']->value[0]['name'];?>
 <a href="javascript:" id="edloc" style="color:#3177A8;" >修改</a>								<br>							</td>						</tr>						<script type="text/javascript">							$(function(){								$("#edloc").click(function(){								$(this).nextAll("select").remove();								$(this).after(									"<select name=\"pid\" id=\"pid\"><option value=\"0\">-请选择-</option><?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?><option value=\"<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
\"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option><?php } ?>"									);								})							})						</script>												<tr>							<td class="m" valign="top" align="right">性别:</td>							<td valign="top">								<input type="radio" name="sex" value="1" <?php if ($_SESSION['user']['sex']==1){?>checked<?php }?>/>男								<input type="radio" name="sex" value="2" <?php if ($_SESSION['user']['sex']==2){?>checked<?php }?>/>女							</td>						</tr>						<tr>							<td class="m" valign="top" align="right">年龄:</td>							<td valign="top">																<select name="age">									<?php  $_smarty_tpl->tpl_vars['s'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['s']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sel']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['s']->key => $_smarty_tpl->tpl_vars['s']->value){
$_smarty_tpl->tpl_vars['s']->_loop = true;
?>									<option <?php if (isset($_SESSION['user']['age'])){?><?php if ($_smarty_tpl->tpl_vars['s']->value==$_SESSION['user']['age']){?>selected<?php }?><?php }elseif($_smarty_tpl->tpl_vars['s']->value==20){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['s']->value;?>
</option>									<?php } ?>								</select>																<!--<input type="text" name="age" value="<?php echo $_SESSION['user']['age'];?>
" size="6"/>-->							</td>						</tr>						<tr>							<td class="m" align="right">登录邮箱: </td>							<td valign="top">								<?php echo $_SESSION['user']['email'];?>
&nbsp;&nbsp;<a href="__APP__/Users/editEmail" style="color:#3177A8;">更改</a>							</td>						</tr>						<tr>							<td class="m" align="right">登录密码: </td>							<td valign="top">								<a href="__APP__/Users/editPass/" style="color:#3177A8;">更改</a>							</td>						</tr>						<tr>							<td class="m" align="right">手机号:</td>							<td valign="top">								<div id="yz"><?php if (!$_SESSION['user']['phone']){?>									<a href="__APP__/Users/editPhone" style="color:#3177A8;">绑定手机吧</a><?php }else{ ?><?php echo $_SESSION['user']['phone'];?>
&nbsp;&nbsp;<a href="__APP__/Users/editPhone" style="color:#3177A8;">更改</a><?php }?>								</div>							</td>						</tr>						<tr>							<td></td>							<td><span class="bn-flat"><input  type="submit" value="更新设置" tabindex="8"></span></td>						</tr>					</tbody>				</table>			</form>		</div>    </div>    </div>	<!--底部信息-->    <?php echo $_smarty_tpl->getSubTemplate ("Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</body></html><?php }} ?>