<?php /* Smarty version Smarty-3.1.6, created on 2018-05-17 15:27:42
         compiled from "./Home/Tpl\Users\register.html" */ ?>
<?php /*%%SmartyHeaderCode:36555acafe53b08e19-98937910%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dcaf2b93e010669eff6bde4307ddf0a2a59e1fb3' => 
    array (
      0 => './Home/Tpl\\Users\\register.html',
      1 => 1526541981,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '36555acafe53b08e19-98937910',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5acafe53cdff1',
  'variables' => 
  array (
    'list' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5acafe53cdff1')) {function content_5acafe53cdff1($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>武夷山驴友交流网--注册页</title>
	<script src="__PUBLIC__/Home/js/register.js"></script>
	<link type="text/css" rel="stylesheet" href="__PUBLIC__/Home/css/public.css"/>
	<link type="text/css" rel="stylesheet" href="__PUBLIC__/Home/css/register.css"/>
	<script type="text/javascript" src="__PUBLIC__/Home/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript">
		$(function(){
			//获取select并绑定onchange事件
			$("#pid").live("change",function(){ 
				var ob = $(this); //获取当前下拉选择框对象
				ob.nextAll("select").remove();
				var val = ob.val();
				//ajax加载子信息
				$.ajax({
					url:"__APP__/Users/doLoad",
					type:"post",
					data:{ pid:val},
					dataType:"json",
					success:function(data){
						if(data==null){
							return;
						}
						var str="<select name='city'>";
						str+="<option value=\"0\">-请选择-</option>";
						for(var i=0;i<data.length;i++){
							str+="<option value=\""+data[i].id+"\">"+data[i].name+"</option>";
						}
						str+="</select>";
						ob.after(str);
					}
				});
			 });
		});
	</script>
	<style>
		#content{
			color: #666;
			margin-top:20px;
			background:#fff;
			padding:20px 0px;
		}
		#content h1{
			padding:0px 40px 0px 20px;
			font-size: 24px;
		}
		.article form{
			padding-left: 40px;
		}
	</style>

</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<div id="content" class="w960">
		<h1>欢迎加入武夷山驴友交流网</h1>
		<div id="cuowu" style="color:red;font-size:15px;float:left;margin-left:60px;"></div>
		<div style="clear:both;"></div>
		<div class="grid-16-8 clearfix">
			<div class="article">
				<form name="lzform" method="post" action="__APP__/Users/doRegister" onsubmit="return dosubmit()">
					<div class="item extra-tips">
						<label>邮箱</label>
						<input id="email" name="email" type="text" class="basic-input" maxlength="60" tabindex="1"  >&nbsp;<span>如:wuyishan@qq.com</span>
					</div>
					<div class="item extra-tips">
						<label>密码</label>
						<input id="userpass" name="pass" type="password" class="basic-input" tabindex="2" maxlength="20">&nbsp;<span>6-8位字母数字</span>
					</div>
					<div class="item extra-tips">
						<label>昵称</label>
						<input id="name" name="name" type="text" class="basic-input" maxlength="15" tabindex="3" >&nbsp;<span></span>
					</div>
						<div class="item loc-item">
							<label>常居地</label>
							<span class="loc">
								<select name="pid" id="pid">
									<option value="0">-请选择-</option>
									<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option>
									<?php } ?>
								</select>
							</span>
						</div>
					<div class="item captcha-item">
						<label>验证码</label>
						<img src='__APP__/Users/verify/' height="25" onclick="this.src='__APP__/Users/verify/?id='+Math.random"/>
						<input type="text" name="usercode" size="6" style="display:block;line-height:5px;margin-left:70px;margin-top:10px;"/>
					</div>
					<div class="item-submit">
						<label>&nbsp;</label>
						<input type="submit" value="注册"  id="button" class="btn-submit disabled" tabindex="6" >
					</div>
				</form>
			</div>
			<div class="aside">
				<p class="pl">&gt;&nbsp;已经拥有武夷山驴友账号?<a rel="nofollow" href="__APP__/Users/login" style="color:blue;">直接登录</a></p><br/>
			</div>
		</div>
    </div>
    <br/>
    <br/>
    <?php echo $_smarty_tpl->getSubTemplate ("Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>