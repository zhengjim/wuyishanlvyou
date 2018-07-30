<?php /* Smarty version Smarty-3.1.6, created on 2018-04-18 11:11:44
         compiled from "./Home/Tpl\Diary\index.html" */ ?>
<?php /*%%SmartyHeaderCode:204105acb10834e0d62-14863219%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac0516301e0c661b0cb41211fa4b45b178db7872' => 
    array (
      0 => './Home/Tpl\\Diary\\index.html',
      1 => 1524021103,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '204105acb10834e0d62-14863219',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5acb1083a6888',
  'variables' => 
  array (
    'list_time' => 0,
    'vo' => 0,
    'list_seven' => 0,
    'attens' => 0,
    'list_atten' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5acb1083a6888')) {function content_5acb1083a6888($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_truncate')) include 'D:\\phpStudy\\PHPTutorial\\WWW\\lvyou\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\modifier.truncate.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>武夷山驴友交流网--驴友武夷行分享</title>
	<link type="text/css" rel="stylesheet" href="__PUBLIC__/Home/css/public.css"/>
	<link type="text/css" rel="stylesheet" href="__PUBLIC__/Home/css/diary.css"/>
	<script type="text/javascript" src="__PUBLIC__/Home/js/jquery-1.7.2.min.js"></script>

		<script type="text/javascript">
		
		//赞
		function onlike(did){
			$.ajax({
				   type: "POST",
				   url: "__APP__/Diary/dolike",
				   data: { drid:did},
				   success: function(res){
						if(res){
							$("#like"+did).html("赞"+res);
						}
				   }
				});
		}
		
		//评论框的显示隐藏
		function onShow(did){
				if($("#reply"+did).css("display")=="none"){
					$("#reply"+did).slideDown("slow");
				}else{
					$("#reply"+did).slideUp("slow");
				}
		}
		
		//评论
		function onreply(did){
			var content = $("#reply"+did).find("span textarea").val();
			if(content != "" && content != undefined && content != null){
				$.ajax({
					   type: "POST",
					   url: "__APP__/Diary/doreply",
					   data: { did:did,content:content},
					   success: function(res){
						   if(res){
							   $("#reply"+did).prev().children(".a2").html("评论 "+res);
							   $("#reply"+did).slideUp("slow");
							   $("#reply"+did).find("span textarea").val("");
					   	}
					   }
					});
			}
		}
		
		//弹出登录框
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
		
		//关注
		function onAttention(uid){
			$.ajax({
				type: "POST",
				url: "__APP__/Diary/attention",
				data: { uid:uid},
				success: function(res){
					if(res){
						$("#attention"+uid).html("已关注");
						$("#attention"+uid).css("background","url(__PUBLIC__/Home/images/wycj.jpg) no-repeat 0px -144px");
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
		
		//分享浏览
		var page=1;//定义分页信息
		var totalPages=0;//总页数

		function diaryList(type,m){
			$("#pop").hide();
			$('#popimg').empty();
			$("#popimg").hide();
			
			page+=m;
			$.ajax({
				   type: "GET",
				   url: "__APP__/Diary/diarylist",
				   data: { type:type,p:page},
				   dataType: "json",
				   success: function(res){
					   totalPages=res["totalPages"];//获取总页数
					   data=res['list'];//获取数据
						var str="";
						for(var i=0;i<data.length;i++){
							str+="<li><div class='div1'>";
							if(data[i].photo){
								str+="<img src='__PUBLIC__/uploads/header/m_"+data[i].photo+"' width='70px' height='70px'/>";
							}else{
								str+="<img src='__PUBLIC__/uploads/header/none-img.png' width='70px' height='70px'/>";
							}
							str+="<a href=''>"+data[i].uname+"</a></div>";
							str+="<div class='div2'><div class='diva'>";
							str+="<a href='__APP__/Diary/detail/did/"+data[i].did+"/uid/"+data[i].uid+"' target='_blank'>"+data[i].title+"</a>";
							str+="<span>"+changeTimeFormat(data[i].addtime)+"</span></div>";
							str+="<div class='divb'>";
							if(data[i].images){
								for(var j=0;j<data[i].images.length;j++){
									str+="<a href='javascript:void(0)' onclick='pop(\""+data[i].images[j]['filename']+"\")'><img src='__PUBLIC__/uploads/diary/m_"+data[i].images[j]['filename']+"' style='margin:5px;'/></a>";
								}
							}
							if(data[i].content){
								str+="<span>"+data[i].content+"</span>";
							}
							str+="</div><div class='divc'>";
							str+="<?php if (isset($_SESSION['user'])){?>";
							str+="<span onclick='onlike("+data[i].did+")' id='like"+data[i].did+"' class='a1'>赞"+data[i].like_num+"</span>";
							str+="<?php }else{ ?><span onclick='login()' class='a1'>赞"+data[i].like_num+"</span><?php }?>";
							str+="<a href='javascript:onShow("+data[i].did+")' class='a2'>评论 "+data[i].count+"</a></div>";
							str+="<div class='divd' id='reply"+data[i].did+"'>";
							str+="<span><input type='hidden' name='uid' value='<?php echo $_SESSION['user']['uid'];?>
' />";
							str+="<textarea name='content'></textarea>";
							str+="<?php if (isset($_SESSION['user'])){?><input type='submit' value='评论' onclick='onreply("+data[i].did+")' />";
							str+="<?php }else{ ?><input type='submit' value='评论' onclick='login()' /><?php }?></span></div><div class='dive'></div></div></li>";
						}
						$("#diary").append(str);
						if(page>=totalPages){
							$("#diary").next().html("<a href='javascript:void(0)'>已全部显示</a>");
						}else{
							$("#diary").next().html("<a href='javascript:void(0)' onclick='diaryList(1)'>显示更多...</a>");
						}
						
					}
			   });
		}
		
		function attention(type){
			$("#attention").addClass("cur");
			$("#diaryall").removeClass("cur");
			$("#diary").html("");
			page=0;
			var m=1;
			diaryList(type,m);
		}
		
		//全部分享浏览函数
		var page=1;//定义分页信息
		var totalPages=0;//总页数
		function diaryListAll(m){
			page+=m;
			$.ajax({
				   type: "GET",
				   url: "__APP__/Diary/diarylist",
				   data: { p:page},
				   dataType: "json",
				   success: function(res){
					   totalPages=res["totalPages"];//获取总页数
					   data=res['list'];//获取数据
						var str="";
						for(var i=0;i<data.length;i++){
							str+="<li><div class='div1'>";
							if(data[i].photo){
								str+="<img src='__PUBLIC__/uploads/header/m_"+data[i].photo+"' width='70px' height='70px'/>";
							}else{
								str+="<img src='__PUBLIC__/uploads/header/none-img.png' width='70px' height='70px'/>";
							}
							
							str+="<a href=''>"+data[i].uname+"</a></div>";
							str+="<div class='div2'><div class='diva'>";
							str+="<a href='__APP__/Diary/detail/did/"+data[i].did+"/uid/"+data[i].uid+"' target='_blank'>"+data[i].title+"</a>";
							str+="<span>"+changeTimeFormat(data[i].addtime)+"</span></div>";
							str+="<div class='divb'>";
							if(data[i].images){
								for(var j=0;j<data[i].images.length;j++){
									str+="<a href='javascript:void(0)' onclick='pop(\""+data[i].images[j]['filename']+"\")'><img src='__PUBLIC__/uploads/diary/m_"+data[i].images[j]['filename']+"' style='margin:5px;'/></a>";
								}
							}
							if(data[i].content){
								str+="<span>"+data[i].content+"</span>";
							}
							str+="</div><div class='divc'>";
							str+="<?php if (isset($_SESSION['user'])){?>";
							str+="<span onclick='onlike("+data[i].did+")' id='like"+data[i].did+"' class='a1'>赞"+data[i].like_num+"</span>";
							str+="<?php }else{ ?><span onclick='login()' class='a1'>赞"+data[i].like_num+"</span><?php }?>";
							str+="<a href='javascript:onShow("+data[i].did+")' class='a2'>评论 "+data[i].count+"</a></div>";
							str+="<div class='divd' id='reply"+data[i].did+"'>";
							str+="<span><input type='hidden' name='uid' value='<?php echo $_SESSION['user']['uid'];?>
' />";
							str+="<textarea name='content'></textarea>";
							str+="<?php if (isset($_SESSION['user'])){?><input type='submit' value='评论' onclick='onreply("+data[i].did+")' />";
							str+="<?php }else{ ?><input type='submit' value='评论' onclick='login()' /><?php }?></span></div><div class='dive'></div></div></li>";
						}
						$("#diary").append(str);
						if(page>=totalPages){
							$("#diary").next().html("<a href='javascript:void(0)'>已全部显示</a>");
						}else{
							$("#diary").next().html("<a href='javascript:void(0)' onclick='diaryListAll(1)'>显示更多...</a>");
						}
						
					}
			   });
		}
		
		$(function(){
			$("#attention").removeClass("cur");
			$("#diaryall").addClass("cur");
			var m=0;
			diaryListAll(m);
		});
		
		function pop(img){
			var image = new Image();
			image.src = "__PUBLIC__/uploads/diary/p_"+img;
			
			var imgwidth=image.width;
			var imgheight=image.height;
			var imgtop=-250;
			var imgleft=-200;
			//alert(imgleft);
			//获取当前浏览器的尺寸；
			var width=$(document).outerWidth();
			var height=$(document).outerHeight();
			$("#pop").show();
			$('#popimg').empty();
			var str="<img src='__PUBLIC__/uploads/diary/p_"+img+"'/>";
			$("#popimg").html(str);
			$("#pop").css("width",imgwidth+"px");
			$("#pop").css("height",imgheight+"px");
			$("#pop").css("margin-top",imgtop+"px");
			$("#pop").css("margin-left",imgleft+"px");
			$("#popimg").css("width",imgwidth+"px");
			$("#popimg").css("height",imgheight+"px");
			$("#popimg").css("margin-top",imgtop+"px");
			$("#popimg").css("margin-left",imgleft+"px");
			$("#popimg").show();
		}
		
		$(function(){
			$("#close").hover(function(){
				$(this).css("background","url(__PUBLIC__/Home/images/close.gif) no-repeat -20px 0px");
			},function(){
				$(this).css("background","url(__PUBLIC__/Home/images/close.gif) no-repeat");
			});
			$("#close").click(function(){
				$("#pop").hide();
				$('#popimg').empty();
				$("#popimg").hide();
			});
			
		});
		
	</script>
</head>
<body>
	<!--公用头部LOGO、导航、登录、注册-->
	<?php echo $_smarty_tpl->getSubTemplate ("Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<!--公用头部LOGO、导航、登录、注册结束-->
	
	<!-- 图片弹出开始 -->
	<div id="pop"><span id="close"></span></div>
	<div id="popimg"></div>
	<!-- 图片弹出结束 -->
	
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
	<!-- 主题部分 -->
	<div class="w960">
		<div id="diary_top">

		</div>
		<div class="left-box" id="d_left">
			<div class="top">
				<a href="__APP__/Diary" id="diaryall"><h1>全部</h1></a>
				<a href="javascript:void(0)" onclick="attention(1)" ><h1>武夷山美食</h1></a>
				<a href="javascript:void(0)" onclick="attention(2)" ><h1>武夷山景点</h1></a>
				<a href="javascript:void(0)" onclick="attention(3)" ><h1>武夷山民宿</h1></a>
			</div>
			<!-- 内容列表显示区 -->
			<ul id="diary"></ul>
			<div class="div3"></div>
		</div>
		<div class="right-box" id="d_right">
			<div class="top"></div>
			<?php if (isset($_SESSION['user'])){?>
				<a href="__APP__/Diary/publish" id="record">分享我的武夷山行</a>
			<?php }else{ ?>
				<a href="javascript:void(0)" id="record" onclick="login()">分享我的武夷山行</a>
			<?php }?>
			<div class="record_list">
				<span class="title">24小时热门驴友武夷行分享</span>
				<ul>
					<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list_time']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?>
						<?php if ($_smarty_tpl->tpl_vars['vo']->value['picture']!=''){?>
						<li>
							<span class="img"><img src="__PUBLIC__/uploads/diary/s_<?php echo $_smarty_tpl->tpl_vars['vo']->value['picture'];?>
" width="70px" height="70px"/></span>
							<div>
								<a href="__APP__/Diary/detail/did/<?php echo $_smarty_tpl->tpl_vars['vo']->value['did'];?>
/uid/<?php echo $_smarty_tpl->tpl_vars['vo']->value['uid'];?>
" class="a1"><?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['vo']->value['title'],20,"...");?>
</a><br/><br/>
								<span clss="span1">by </span><a href="" class="a1"><?php echo $_smarty_tpl->tpl_vars['vo']->value['name'];?>
</a>
							</div>
						</li>
						<?php }?>
					<?php } ?>
				</ul>
			</div>
			
			<div class="record_list">
				<span class="title">本周分享达人</span>
				<ul>
					<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list_seven']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?>
						<li>
							<span class="img">
							<?php if ($_smarty_tpl->tpl_vars['vo']->value['photo']){?>
								<img src="__PUBLIC__/uploads/header/m_<?php echo $_smarty_tpl->tpl_vars['vo']->value['photo'];?>
" width="70px" height="70px"/>
							<?php }else{ ?>
								<img src="__PUBLIC__/uploads/header/none-img.png" width="70px" height="70px"/>
							<?php }?>
							</span>
							<div>
								<a href="" class="a2"><?php echo $_smarty_tpl->tpl_vars['vo']->value['name'];?>
</a><br/>
								<span class="span2">本周分享了<?php echo $_smarty_tpl->tpl_vars['vo']->value['count'];?>
条</span><br/>
								<!-- <range name="<?php echo $_smarty_tpl->tpl_vars['vo']->value['uid'];?>
"value="<?php echo $_smarty_tpl->tpl_vars['attens']->value;?>
"type="in">
									<a href="" class="a4">已关注</a>
								<else/>
									<a href="javascript:attention(<?php echo $_smarty_tpl->tpl_vars['vo']->value['uid'];?>
,this)" class="a3">+关注</a>
								</range> -->
								
								<?php if (in_array($_smarty_tpl->tpl_vars['vo']->value['uid'],$_smarty_tpl->tpl_vars['list_atten']->value)){?>
									<a href="javascript:void(0)" class="a4">已关注</a>
								<?php }else{ ?>
									<?php if (isset($_SESSION['user'])){?>
										<a href="javascript:void(0)" onclick="onAttention(<?php echo $_smarty_tpl->tpl_vars['vo']->value['uid'];?>
)" id="attention<?php echo $_smarty_tpl->tpl_vars['vo']->value['uid'];?>
" class="a3">+关注</a>
									<?php }else{ ?>
										<a href="javascript:void(0)" onclick="login()" class="a3">+关注</a>
									<?php }?>
								<?php }?>
								
								
							</div>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<!-- 分享部分结束 -->
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