<?php /* Smarty version Smarty-3.1.6, created on 2018-04-09 15:29:19
         compiled from "./Home/Tpl\Diary\detail.html" */ ?>
<?php /*%%SmartyHeaderCode:177525acb164f35f575-44319493%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db3e927d762067c47ca5f66e282c9f6b6b2e092f' => 
    array (
      0 => './Home/Tpl\\Diary\\detail.html',
      1 => 1521703069,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '177525acb164f35f575-44319493',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'list' => 0,
    'vo' => 0,
    'list_reply' => 0,
    'reply' => 0,
    'list_user' => 0,
    'list_new' => 0,
    'new' => 0,
    'list_like' => 0,
    'like' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5acb164f8b86e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5acb164f8b86e')) {function content_5acb164f8b86e($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\phpStudy\\PHPTutorial\\WWW\\lvyou\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>武夷山驴友交流网--驴友武夷行分享详情</title>
	<link type="text/css" rel="stylesheet" href="__PUBLIC__/Home/css/public.css"/>
	<link type="text/css" rel="stylesheet" href="__PUBLIC__/Home/css/diary.css"/>
	<style type="text/css" rel="stylesheet">
		#diary_detail .div4 span.current { display:inline;!import}
	</style>
	<script type="text/javascript" src="__PUBLIC__/Home/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript">
		//评论的添加及显示
		function onreply(did,mybox){
			var content = $(mybox).prev().val();
			if(content == "" || content == undefined || content == null){
				alert("请输入内容!");
			}else{
				$.ajax({
					   type: "POST",
					   url: "__APP__/Diary/dtdoreply",
					   data: { did:did,content:content},
					   dataType: "json",
					   success: function(reply){
						   if(reply){
							   var li="";
								li+="<li><div class='photo1'>";
								li+="<img src='__PUBLIC__/uploads/header/m_"+reply.photo+"' width='50px' height='50px'/>";
								li+="</div><div class='reply'>";
								li+="<a href=''>"+reply.uname+"</a>";
								li+="<span class='time'>"+reply.time+"</span>";
								li+="<a href='javascript:void(0)' class='replylist' onclick='replylist("+reply.dri+",0)'>回复</a>";
								li+="<span class='content'>"+reply.content+"</span>";
								li+="<div id='reply_replyed"+reply.dri+"' class='reply_replyed'>";
								li+="<ul></ul><div><textarea></textarea>";
								li+="<?php if (isset($_SESSION['user'])){?>";
								li+="<input type='submit' value='回复' onclick='dtdoreply("+reply.did+","+reply.dri+")'/>";
								li+="<?php }else{ ?>";
								li+="<input type='submit' value='回复' onclick='login()'/>";
								li+="<?php }?>";
								li+="</div></div>";
								li+="</div></li>";
								$("#reply").prepend(li);
								$("#content").val("");
					   	}
					   }
					});
			}
		}
		
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
		
		//评论
		var paged=1;//定义分页信息
		var totalPages=0;//总页数
		function doReplyList(did,m){
			paged+=m;
			$.ajax({
				type: "GET",
				url: "__APP__/Diary/doReplyList",
				data: { did:did,p:paged},
				dataType: "json",
				success: function(res){
					   totalPages=res["totalPages"];//获取总页数
					   data=res['list'];//获取数据
					   var str="";
					   for(var i=0;i<data.length;i++){
						   str+="<li><div class='photo1'>";
							str+="<img src='__PUBLIC__/uploads/header/m_"+data[i].photo+"' width='50px' height='50px'/></div>";
							str+="<div class='reply'><a href=''>"+data[i].name+"</a>";
							str+="<span class='time'>"+changeTimeFormat(data[i].addtime)+"</span>";
							str+="<a href='javascript:void(0)' class='replylist' onclick='replylist("+data[i].dri+",0)'>回复</a>";
							str+="<span class='content'>"+data[i].content+"</span>";
							str+="<div id='reply_replyed"+data[i].dri+"' class='reply_replyed'>";
							str+="<ul></ul><div><textarea></textarea>";
							str+="<?php if (isset($_SESSION['user'])){?>";
							str+="<input type='submit' value='回复' onclick='dtdoreply("+data[i].did+","+data[i].dri+")'/>";
							str+="<?php }else{ ?><input type='submit' value='回复' onclick='login()'/><?php }?>";
							str+="</div></div></div></li>";
					   }
					   $("#reply").html(str);
					   
					   //处理当前页的信息
					   if(paged>totalPages){
						   paged=totalPages;
					   }
					   if(paged<1){
						   paged=1;
					   }
					   
					   if(totalPages>1){
						   var pg="";
						   pg+="<a>"+paged+"/"+totalPages+"</a>";
						   if(paged>1){
						   		pg+="<a href='javascript:doReplyList("+did+",-1)'>上一页</a>";
						   }
						   if(paged<totalPages){
							   pg+="<a href='javascript:doReplyList("+did+",1)'>下一页</a>";
						   }
						   
						   $("#reply").next().find(".paginator").html(pg);
					   }
				   }
			});
		}
		
		$(function(){
			var did="<?php echo $_GET['did'];?>
";
			var m=0;
			doReplyList(did,m);
		});
		
		//回复的展开操作
		$(function(){
			$("#reply li .reply .replylist").live('click',function(){
				var aa=$(this).next().next();
				if(aa.css("display")=="none"){
					aa.slideDown("slow");
				}else{
					aa.slideUp("slow");
				}
			});
		});
		
		//回复的操作
		var page=1;//定义分页信息
		var totalPages=0;//总页数
		function replylist(dri,m){
			$("#reply_replyed"+dri).find("div textarea").val("");
			page+=m;
			$.ajax({
				   type: "GET",
				   url: "__APP__/Diary/replylist",
				   data: { diary_reply_id:dri,p:page},
				   dataType: "json",
				   success: function(res){
					   totalPages=res["totalPages"];//获取总页数
					   data=res['list'];//获取数据
					   var str="";
					   for(var i=0;i<data.length;i++){
						   str+="<li>";
						   str+="<a href=''>"+data[i].uname+"</a>";
						   str+="<span class='time'>"+changeTimeFormat(data[i].drtime)+"</span>";
						   str+="<a href='javascript:void(0)' onclick='replyText(\""+data[i].uname+"\",this)'>回复</a>";
						   str+="<span class='content'>"+data[i].content+"</span>";
						   str+="</li>";
					   }
					   $("#reply_replyed"+dri).find("ul").html(str);
					   
					   //处理当前页的信息
					   if(page>totalPages){
						   page=totalPages;
					   }
					   if(page<1){
						   page=1;
					   }
					   
					   if(totalPages>1){
						   var pg="";
						   pg+="<li><a>"+page+"/"+totalPages+"</a>";
						   if(page>1){
							   pg+="<a href='javascript:replylist("+dri+",-1)'>上一页</a>";
						   }
						   if(page<totalPages){
							   pg+="<a href='javascript:replylist("+dri+",1)'>下一页</a></li>";
						   }
						   
						   $("#reply_replyed"+dri).find("ul").append(pg);
					   }
				   }
				});
		}
		
		function replyText(uname,myreply){
			$(myreply).parent().parent().next().find("textarea").val("");
			$(myreply).parent().parent().next().find("textarea").val("@"+uname+":");
		}

		//对评论的回复
		function dtdoreply(did,dri){
			var content = $("#reply_replyed"+dri).find("div textarea").val();
			if(content != "" && content != undefined && content != null){
				$.ajax({
					   type: "POST",
					   url: "__APP__/Diary/dtdoreply",
					   data: { did:did,content:content,replyed_id:dri},
					   dataType: "json",
					   success: function(reply){
						   if(reply){
							   var li="";
							   li+="<li>";
							   li+="<a href=''>"+reply.uname+"</a>";
							   li+="<span class='time'>"+reply.time+"</span>";
							   li+="<a href='javascript:void(0)' onclick='replyText(\""+reply.uname+"\",this)'>回复</a>";
							   li+="<span class='content'>"+reply.content+"</span>";
							   li+="</li>";
							   $("#reply_replyed"+dri).find("ul").prepend(li);
							   $("#reply_replyed"+dri).find("div textarea").val("");
					   	}
					   }
					});
			}
			
		}
		
	</script>
</head>
<body>
	<!--公用头部LOGO、导航、登录、注册-->
	<?php echo $_smarty_tpl->getSubTemplate ("Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<!--公用头部LOGO、导航、登录、注册结束-->
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
	<!-- 详情部分 -->
	<div class="w960">
		<div id="diary_top">
			<span><font size="5">武夷行分享</font></span>
		</div>
		
		<div class="left-box" id="diary_detail">
			<div class="div1"></div>
			<div class="div2">
				<span style="font-size:40px;">
					<?php echo $_smarty_tpl->tpl_vars['list']->value['title'];?>

				</span>
				<?php if ($_smarty_tpl->tpl_vars['list']->value['images']){?>
					<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value['images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?>
					<img src="__PUBLIC__/uploads/diary/p_<?php echo $_smarty_tpl->tpl_vars['vo']->value['filename'];?>
" style="margin:5px 0px;"/>
					<?php } ?>
				<?php }?>
				<span style="margin-top:10px;font-size:20px;font-weight:lighter;line-height:25px;"><?php echo $_smarty_tpl->tpl_vars['list']->value['content'];?>
</span>
			</div>
			<div class="div3"></div>
			
			<div class="div4">
				<span><?php echo $_smarty_tpl->tpl_vars['list']->value['title'];?>
的评论</span>
				<div class="photo">
					<?php if (isset($_SESSION['user']['photo'])){?>
					<img src="__PUBLIC__/uploads/header/m_<?php echo $_SESSION['user']['photo'];?>
" width="50px" height="50px"/>
					<?php }else{ ?>
					<img src="__PUBLIC__/uploads/header/none-img.png" width="50px"/>
					<?php }?>
				</div>
				<textarea name="content" id="content"></textarea>
				<?php if (isset($_SESSION['user'])){?>
					<input type="submit" value="评论" onclick="onreply(<?php echo $_smarty_tpl->tpl_vars['list']->value['did'];?>
,this)"/>
				<?php }else{ ?>
					<input type="submit" value="评论" onclick="login()"/>
				<?php }?>
				
				<ul id="reply">
				<!--	 <?php  $_smarty_tpl->tpl_vars['reply'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['reply']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list_reply']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['reply']->key => $_smarty_tpl->tpl_vars['reply']->value){
$_smarty_tpl->tpl_vars['reply']->_loop = true;
?>
						<li>
							<div class="photo1">
								<img src="__PUBLIC__/uploads/header/m_<?php echo $_smarty_tpl->tpl_vars['reply']->value['photo'];?>
" width="50px" height="50px"/>
							</div>
							<div class="reply">
								<a href=""><?php echo $_smarty_tpl->tpl_vars['reply']->value['name'];?>
</a>
								<span class="time"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['reply']->value['addtime'],"%Y-%m-%d %H:%M:%S");?>
</span>
								<a href="javascript:void(0)" class="replylist" onclick="replylist(<?php echo $_smarty_tpl->tpl_vars['reply']->value['dri'];?>
,0)">回复</a>
								<span class="content"><?php echo $_smarty_tpl->tpl_vars['reply']->value['content'];?>
</span>
								<div id="reply_replyed<?php echo $_smarty_tpl->tpl_vars['reply']->value['dri'];?>
" class="reply_replyed">
									<ul></ul>
									<div>
										<textarea></textarea>
										<?php if (isset($_SESSION['user'])){?>
											<input type="submit" value="回复" onclick="dtdoreply(<?php echo $_smarty_tpl->tpl_vars['reply']->value['did'];?>
,<?php echo $_smarty_tpl->tpl_vars['reply']->value['dri'];?>
)"/>
										<?php }else{ ?>
											<input type="submit" value="回复" onclick="login()"/>
										<?php }?>
									</div>
								</div>
							</div>
						</li>
					<?php } ?> -->
				</ul>
				<div class="pagelist">
					<div class="paginator">
						
					</div>
				</div>
			</div>
		</div>
		
		<div class="right-box" id="diary_user">
			<div class="user">
				<span class="photo"><img src="__PUBLIC__/uploads/header/m_<?php echo $_smarty_tpl->tpl_vars['list_user']->value['photo'];?>
" width="40px" height="40px"/></span>
				<span class="info"><a href="" class="name"><?php echo $_smarty_tpl->tpl_vars['list']->value['uname'];?>
</a><?php if ($_smarty_tpl->tpl_vars['list']->value['sex']==1){?><span style="width:25px;height:25px;display:block;float:left;background:url(__PUBLIC__/Home/images/sex.jpg);"></span><?php }elseif($_smarty_tpl->tpl_vars['list']->value['sex']==2){?><span style="width:25px;height:25px;display:block;float:left;background:url(__PUBLIC__/Home/images/sex.jpg) -35px 0px;"></span><?php }else{ ?><span style="width:25px;height:25px;display:block;float:left;"></span><?php }?></span>
				<span class="diary_num"><span class="num"><?php echo $_smarty_tpl->tpl_vars['list']->value['count'];?>
</span> 分享</span>
			</div>
			<div class="new">
				<span>TA最新的分享</span>
				<ul>
					<?php  $_smarty_tpl->tpl_vars['new'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['new']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list_new']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['new']->key => $_smarty_tpl->tpl_vars['new']->value){
$_smarty_tpl->tpl_vars['new']->_loop = true;
?>
						<?php if ($_smarty_tpl->tpl_vars['new']->value['picture']!=''){?>
							<li><a href="__APP__/Diary/detail/did/<?php echo $_smarty_tpl->tpl_vars['new']->value['did'];?>
/uid/<?php echo $_smarty_tpl->tpl_vars['new']->value['uid'];?>
"><img src="__PUBLIC__/uploads/diary/s_<?php echo $_smarty_tpl->tpl_vars['new']->value['picture'];?>
" width="70px" height="70px"/></a></li>
						<?php }?>
					<?php } ?>
					<div class="clear"></div>
				</ul>
			</div>
			<div class="new">
				<span>TA最受欢迎的分享</span>
				<ul>
					<?php  $_smarty_tpl->tpl_vars['like'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['like']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list_like']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['like']->key => $_smarty_tpl->tpl_vars['like']->value){
$_smarty_tpl->tpl_vars['like']->_loop = true;
?>
						<?php if ($_smarty_tpl->tpl_vars['like']->value['picture']!=''){?>
							<li><a href="__APP__/Diary/detail/did/<?php echo $_smarty_tpl->tpl_vars['like']->value['did'];?>
/uid/<?php echo $_smarty_tpl->tpl_vars['like']->value['uid'];?>
"><img src="__PUBLIC__/uploads/diary/s_<?php echo $_smarty_tpl->tpl_vars['like']->value['picture'];?>
" width="70px" height="70px"/></a></li>
						<?php }?>
					<?php } ?>
					<div class="clear"></div>
				</ul>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<!-- 分享详情部分结束 -->
	<!--第一个横屏广告开始-->
	<div class="ad-w960" class="w960">
		<img src="__PUBLIC__/Home/images/ad.jpg" alt=""/>
	</div>
	<!--第一个横屏广告结束-->
	<!--底部开始-->
	<?php echo $_smarty_tpl->getSubTemplate ("Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<!--底部结束-->
</body>
</html><?php }} ?>