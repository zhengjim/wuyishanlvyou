<?php /* Smarty version Smarty-3.1.6, created on 2018-04-09 14:03:38
         compiled from "./Home/Tpl\Active\post.html" */ ?>
<?php /*%%SmartyHeaderCode:134715acb023a2beb46-44491814%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1b49e2dea0b208fe23f9f7e10e2f62137d9dabba' => 
    array (
      0 => './Home/Tpl\\Active\\post.html',
      1 => 1521613234,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134715acb023a2beb46-44491814',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'v' => 0,
    'info' => 0,
    'imglist' => 0,
    'im' => 0,
    'content' => 0,
    'rlist' => 0,
    'page' => 0,
    'ainfo' => 0,
    'plist' => 0,
    'po' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5acb023a4d5ec',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5acb023a4d5ec')) {function content_5acb023a4d5ec($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\phpStudy\\PHPTutorial\\WWW\\lvyou\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>武夷山驴友交流网--邀请讨论</title>
	<meta name="keywords" content="">
	<meta name="description" content="">	
	<link rel="StyleSheet" href="__PUBLIC__/Home/css/public.css" type="text/css"/>
	<link rel="StyleSheet" href="__PUBLIC__/Home/css/active.css" type="text/css"/>
	<script src="__PUBLIC__/Home/js/jquery-1.7.2.min.js"></script>
	<!--邀请讨论回复的js-->
	<script>
		function toReply(){
			//登录验证
			var uid = $("#uid").val();
			if(uid == ""){
				alert('请先登录！');
				window.location = "__APP__/Users/login";
				return;
			}

			//内容是否为空验证
			var content = $("#r-con").val();
			if(content.length < 1){
				alert('回复内容不能为空！');
				return;
			}

			//封装内容向PHP发送请求
			var pid = $("#pid").val();
			var ornum = $("#ornum").val();
			var replyed_id = $("#replyed_id").val();
			$.ajax({
				type: "POST",
				url: "__APP__/Active/toReply/",
				dataType: "json",
				data:{ uid:uid,pid:pid,content:content,ornum:ornum},
				success: function(newr){
					var li = "<li><div class='pic'><img src='__PUBLIC__/uploads/header/s_"+newr.photo+"'/></div><div class='comments-c'><div class='author'><span>"+newr.rtime+"</span><a href='"+newr.uid+"'><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</a><div class='again_reply' name='"+newr.uname+"' replyed_id='"+newr.uid+"'>回复</div></div><p>"+newr.content+"</p></div><div class='clear'></div></li>";
					$("#comments").prepend(li);
					$("#ornum").val(newr.nrnum);
					$("#r-con").val("");
				}
			});
		}

		$(function(){
			$(".again_reply").live('click',function(){
				$("#replyed_id").val($(this).attr('replyed_id'));
				var name = $(this).attr('name');
				$("#r-con").val("@"+name);
			});
		});
	</script>
</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<!--这是主体部分-->
	<div class="w960 active" id="active-p-view">
		<div class="left-box">
			<div id="info-box">
				<h1><?php echo $_smarty_tpl->tpl_vars['info']->value['title'];?>
</h1>
				<div id="info">
					<div class="pic"><a href="javascript:"><img src="__PUBLIC__/uploads/header/s_<?php echo $_smarty_tpl->tpl_vars['info']->value['photo'];?>
"/></a></div>
					<div class="info-r">
						<li class="title"><span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['info']->value['addtime'],"%Y-%m-%d %T");?>
</span><i>　　来自: <a href="javascript:"><?php echo $_smarty_tpl->tpl_vars['info']->value['uname'];?>
</a></i></li>
						<?php if ($_smarty_tpl->tpl_vars['imglist']->value[0]['filename']){?>
						<div class="details-img">
							<?php  $_smarty_tpl->tpl_vars['im'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['im']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['imglist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['im']->key => $_smarty_tpl->tpl_vars['im']->value){
$_smarty_tpl->tpl_vars['im']->_loop = true;
?>
								<a href=""><img src="__PUBLIC__/uploads/active/p_s_<?php echo $_smarty_tpl->tpl_vars['im']->value['filename'];?>
"/></a>
							<?php } ?>
						</div>
						<?php }?>
						<p><?php echo $_smarty_tpl->tpl_vars['content']->value;?>

						</p>
						<div id="comments">
							<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
							<li>
								<div class="pic"><img src="__PUBLIC__/uploads/header/s_<?php echo $_smarty_tpl->tpl_vars['v']->value['photo'];?>
"/></div>
								<div class="comments-c">
									<div class="author">
										<span><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['v']->value['rtime'],"%Y-%m-%d  %T");?>
</span>
							            <a href="<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['uname'];?>
</a>
							            <div class="again_reply" name="<?php echo $_smarty_tpl->tpl_vars['v']->value['uname'];?>
" replyed_id="<?php echo $_smarty_tpl->tpl_vars['v']->value['uid'];?>
">回复</div>
							        </div>
							        <p><?php echo $_smarty_tpl->tpl_vars['v']->value['content'];?>
</p>
								</div>
								<div class="clear"></div>
							</li>
							<?php } ?>
							<div class="pagelist"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</div>
		
							<div class="to-reply">
								<div id="ht"><a href="">我来回应</a></div>
								<div id="toReply">
									<input type="hidden" value="<?php echo $_SESSION['user']['uid'];?>
" id="uid"/>
									<input type="hidden" value="<?php echo $_GET['pid'];?>
" id="pid"/>
									<!--ornum为当前的帖子的回复数量-->
									<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['info']->value['reply_num'];?>
" id="ornum"/>
									<input type="hidden" value="0" id="replyed_id"/>
									<textarea id="r-con" cols="20" rows="5" resize="noresize"></textarea>
									<input type="button" onclick="toReply()" value="提交"/>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="right-box">
			<div class="ct"><p class="pl2">&gt; <a href="__URL__/view/aid/<?php echo $_smarty_tpl->tpl_vars['ainfo']->value['active_id'];?>
">去&lt;&lt;<?php echo $_smarty_tpl->tpl_vars['ainfo']->value['active_name'];?>
&gt;&gt;邀约看看</a></p></div>
			<div class="others">
				<ul>
					<?php  $_smarty_tpl->tpl_vars['po'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['po']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['plist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['po']->key => $_smarty_tpl->tpl_vars['po']->value){
$_smarty_tpl->tpl_vars['po']->_loop = true;
?>
					<li><a title="<?php echo $_smarty_tpl->tpl_vars['po']->value['title'];?>
" href="__URL__/post/pid/<?php echo $_smarty_tpl->tpl_vars['po']->value['pid'];?>
"><?php echo $_smarty_tpl->tpl_vars['po']->value['title'];?>
</a><span class="pl">(<?php echo $_smarty_tpl->tpl_vars['po']->value['uname'];?>
)</span></li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<div class="clear">
		</div>
	</div>
	<!--主体部分结束-->

	<?php echo $_smarty_tpl->getSubTemplate ("Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	
</body>
</html><?php }} ?>