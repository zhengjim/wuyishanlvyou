<?php /* Smarty version Smarty-3.1.6, created on 2018-04-09 16:26:57
         compiled from "./Home/Tpl\GroupDetails\groupdetails.html" */ ?>
<?php /*%%SmartyHeaderCode:47065acb1512922915-04970228%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3904d158c0e754722469f76f0939343f8f1d09ad' => 
    array (
      0 => './Home/Tpl\\GroupDetails\\groupdetails.html',
      1 => 1523262415,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47065acb1512922915-04970228',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5acb1512c090f',
  'variables' => 
  array (
    'gdvlist' => 0,
    'vo' => 0,
    'gprlist' => 0,
    'pageinfo' => 0,
    'gplist' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5acb1512c090f')) {function content_5acb1512c090f($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\phpStudy\\PHPTutorial\\WWW\\lvyou\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>武夷山驴友交流网--武夷山论坛话题详情页</title>
		<meta name="keywords" content="">
		<meta name="description" content="">
		<link rel="StyleSheet" href="__PUBLIC__/Home/css/groupdetails.css" type="text/css"/>
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
		<!----------话题帖子详情页主体开始---------->
		<div id="main">
			<!----------详情页顶部开始（先设置保留）---------->
			<div id="main_top">
				<h2></h2>
			</div>
			<!----------详情页顶部结束---------->
			<!----------详情页左侧栏目开始---------->
			<div id="main_left">
				<!---------内容标题、作者、发布时间---------->
				<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['gdvlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?>
				<div id="main_left_title">
					<div class="tit"><span><?php echo $_smarty_tpl->tpl_vars['vo']->value['post_title'];?>
</span></div>
					<div class="aut"><span>作者：<?php echo $_smarty_tpl->tpl_vars['vo']->value['name'];?>
</span></div>
					<div class="tim"><span>发布时间：<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['vo']->value['addtime'],"%Y-%m-%d %T");?>
</span></div>
				</div>
				<!----------发布的话题内容---------->
				<div class="main_left_content">
					<p>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['vo']->value['content'];?>
<!-- <img src="__PUBLIC__/Home/images/1.jpg"/> --></P>
				</div>
				<!----------评论---------->
				<div class="main_left_review">
					<div class="main_left_rev">
						<a href="#common">我要评论</a>
					</div>
					<div class="main_left_lik">
						<?php if ($_SESSION['user']){?>
						<a href="__APP__/GroupDetails/addlikenum/group_post_id/<?php echo $_smarty_tpl->tpl_vars['vo']->value['group_post_id'];?>
">赞<?php echo $_smarty_tpl->tpl_vars['vo']->value['like_num'];?>
</a>
						<?php }else{ ?>
						<a href="javascript:void(0)" onclick="login()">赞<?php echo $_smarty_tpl->tpl_vars['vo']->value['like_num'];?>
</a>
						<?php }?>
					</div>	
				</div>
				<?php } ?>
				<!----------评论和回复内容的显示开始---------->
				<div class="review">
					<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['gprlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?>
					<div class="review_box">
						<div class="review_left">
							<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['vo']->value['photo'];?>
<?php $_tmp1=ob_get_clean();?><?php if (!empty($_tmp1)){?>
							<img src="__PUBLIC__/uploads/header/m_<?php echo $_smarty_tpl->tpl_vars['vo']->value['photo'];?>
"/>
							<?php }else{ ?>
							<img src="__PUBLIC__/uploads/header/duface.png"/>
							<?php }?>
						</div>	
						<div class="review_right">
							<div class="review_right_hid">
								<span>用户昵称:</span>
								<b><?php echo $_smarty_tpl->tpl_vars['vo']->value['name'];?>
</b>
								<i><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['vo']->value['reply_time'],"%Y-%m-%d %T");?>
</i>
								<a class="d1js" name="12" id="reply<?php echo $_smarty_tpl->tpl_vars['vo']->value['group_reply_id'];?>
" onclick="onShow(<?php echo $_smarty_tpl->tpl_vars['vo']->value['group_reply_id'];?>
,<?php echo $_smarty_tpl->tpl_vars['vo']->value['group_post_id'];?>
)">查看回复</a>
							</div>
							<div class="review_right_cid">
							<!----------评论的内容---------->
								<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['vo']->value['reply_content'];?>
</span>
							</div>
							<!---------回复内容---------->
							<div id="replyed<?php echo $_smarty_tpl->tpl_vars['vo']->value['group_reply_id'];?>
" style="display:none;">
								<div class="review_reply" id="revie<?php echo $_smarty_tpl->tpl_vars['vo']->value['group_reply_id'];?>
">
								
								</div>
								<div class="fid2">
									<div>
										<textarea id="reply_content<?php echo $_smarty_tpl->tpl_vars['vo']->value['group_reply_id'];?>
" name="content" rows="2" cols="45"></textarea>
										<?php if ($_SESSION['user']['uid']){?>
										<input type="button" value="回复" class="replybutton">
										<?php }else{ ?>
										<input type="button" value="回复" class="replybutton1" onclick="login()">
										<?php }?>
									</div>	
								</div>
								<div class="main_bottom"></div>
							</div>
						</div>
					<!----------回复表单结束---------->
					</div>
					<?php } ?>
					<script type="text/javascript">					
						//定义一个时间函数
						function changeTimeFormat(time){
							var date = new Date(time*1000);//实例化一个Date对象
							var month = date.getMonth()+1<10?"0"+(date.getMonth()+1):date.getMonth()+1;
							var currentDate = date.getDate()<10?"0"+date.getDate():date.getDate();
							var hh = date.getHours()<10?"0"+date.getHours():date.getHours();
							var mm = date.getMinutes()<10?"0"+date.getMinutes():date.getMinutes();
							var ss = date.getSeconds()<10?"0"+date.getSeconds():date.getSeconds();
							return date.getFullYear()+"-"+month+"-"+currentDate+" "+hh+":"+mm+":"+ss;
							/* return date.getFullYear()+"-"+(date.getMonth()+1)+"-"+date.getDate()+" "+date.getHours()+":"+date.getMinutes()+":"+date.getSeconds(); */
						}
						
						function onShow(did,group_post_id){
							$("#replyed"+did).find("textarea").val("");
							$("#replyed"+did).find("textarea").attr('id','reply_content'+did);
							$("#replyed"+did).find("input").attr('post_id',group_post_id);
							$("#replyed"+did).find("input").attr('replyed_id',did);//回复id，
							$("#replyed"+did).find("input").attr('top_rid',did);//评论id
							if($("#replyed"+did).css("display")=="none"){
								$("#replyed"+did).slideDown("slow");
							}else{
								$("#replyed"+did).slideUp("slow");
							}
							
							//Ajax浏览回复信息
							$.ajax({
								type:"POST",
								url:"__URL__/replyed",
								dataType:'json',
								data:{ replyed_id:did},
								success:function(gures){
									var str="";
									for(var i=0;i<gures.length;i++){
										$(".fid2 textarea").attr('id','reply_content'+did);
										$(".fid2 input:first").attr('uid',gures[i].uid);
										//$(".fid2 input:first").attr('onclick','doreply('+did+','+gures[i].uid+')');
										str+="<div class='review_reply_top'><div class='review_reply_top_name'><span>"+gures[i].name+"</span><b>"+changeTimeFormat(gures[i].reply_time)+"</b><a class='againreplys' href='javascript:void(0)' uid='"+gures[i].uid+"' replyed_id='"+gures[i].group_reply_id+"' name='"+gures[i].name+"' top_rid='"+did+"' post_id='"+group_post_id+"'>回复</a></div><div class='review_reply_top_con'><span>"+gures[i].reply_content+"</span></div><div class='main_bottom'></div></div>";
									}
									$("#revie"+did).html(str);
								}
							
							});
						}
						
						
						//执行评论与回复，回复完成做内容的追加
						$(".replybutton").live('click',function(){
							var top_rid =  $(this).attr('top_rid');//评论的id
							var replyed_id = $(this).attr('replyed_id');//被回复id
							var group_post_id = $(this).attr('post_id');//帖子id
							var reply_content=$("#reply_content"+replyed_id).val();//回复内容
							if(reply_content != "" && reply_content != undefined && reply_content != null){
									$.ajax({
									type:"POST",
									url:"__URL__/replyView",
									dataType:'json',
									data:{ replyed_id:top_rid,reply_content:reply_content,group_post_id:group_post_id},
									//async:true,
									success:function(msg){
										var str = "";
										str +="<div class='review_reply_top'><div class='review_reply_top_name'><span>"+msg.name+"</span><b>"+changeTimeFormat(msg.reply_time)+"</b><a href='javascript:void(0)' name='"+msg.name+"' replyed_id="+msg.group_post_reply_id+" post_id="+group_post_id+" uid='"+msg.uid+"' top_rid ='"+top_rid+"' class='againreplys'>回复</a></div><div class='review_reply_top_con'><span>"+msg.reply_content+"</span></div><div class='main_bottom'></div></div>";
										$("#revie"+top_rid).prepend(str);
										$("#replyed"+top_rid+" textarea").val("");
									}
										
								});
							}
						});
						
						
						$(".againreplys").live('click',function(){
							var group_reply_id = $(this).attr('replyed_id');//回复id
							var name = $(this).attr('name');//被回复人名称
							var top_rid = $(this).attr('top_rid');//评论id
							var uid = $(this).attr('uid');//被回复人id
							var post_id = $(this).attr('post_id');//帖子id获取
							var rearea = $("#replyed"+top_rid+" .fid2 textarea");//回复表单对象
							rearea.attr('id','reply_content'+group_reply_id);
							rearea.val("@"+name+":");
							rearea.next().attr('replyed_id',group_reply_id);
							rearea.next().attr('post_id',post_id);
							rearea.next().attr('uid',uid);
						});
					</script>
				<!----------评论和回复内容的显示结束---------->	
				<!----------分页开始----------->
					<div class="main_bottom"></div>
					
				<!----------分页结束----------->
					<div class="main_left_list_pag"><?php echo $_smarty_tpl->tpl_vars['pageinfo']->value;?>
</div>
				
				<!----------评论表单开始----------->
					<div id="comfor">
						<a name="common"></a>
							<div class="comfor_com">
								<span>你也来说点什么吧</span>
							</div>
						<form action="__APP__/GroupDetails/toReply" method="post">
							<input type="hidden" name="group_post_id" value="<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['gdvlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?><?php echo $_smarty_tpl->tpl_vars['vo']->value['group_post_id'];?>
<?php } ?>"/>
							<div class="comfor_con">
								<textarea id="textareaid" name="reply_content" rows="5" cols="68"></textarea>
							</div>	
							<div class="comfor_but">
								<?php if ($_SESSION['user']){?>
								<span><input type="submit" name="submit" value="评论"/></span>
								<?php }else{ ?>
								<span><input type="button" href="javascript:void(0)" name="submit" value="评论" onclick="login()" /></span>
								<?php }?>
							</div>
						</form>	
						<!----------清除浮动---------->
						<div class="main_bottom"></div>
					</div>
				</div>	
				<!----------评论表单结束----------->
			</div>
			<!----------详情页左侧栏目结束---------->
			<!----------右侧栏目开始(显示所在话题的其他帖子)--------->
			<div id="main_right">
				<div class="main_right_top"></div>
				<h2 class="other">该话题下的帖子：</h2>
				<div class="indent">
				<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['gplist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?>
					<p class="pul">
						<a href="__APP__/GroupDetails/index/group_post_id/<?php echo $_smarty_tpl->tpl_vars['vo']->value['group_post_id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['vo']->value['post_title'];?>
</a>
						<span>(<?php echo $_smarty_tpl->tpl_vars['vo']->value['click_num'];?>
人查看)</span>
					</p>
				<?php } ?>
					<!-- <div class="main_right_list_pag"><?php echo $_smarty_tpl->tpl_vars['pageinfo']->value;?>
</div> -->
				</div>
			</div>
			<!----------右侧栏目结束--------->
			<!----------清除浮动---------->
			<div class="main_bottom"></div>
		</div>
		<!----------话题帖子详情页主体结束---------->
		<!----------导入页脚---------->
		<?php echo $_smarty_tpl->getSubTemplate ("Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</body>
</html><?php }} ?>