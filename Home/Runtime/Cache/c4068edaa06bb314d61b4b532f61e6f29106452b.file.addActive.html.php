<?php /* Smarty version Smarty-3.1.6, created on 2018-04-09 14:32:45
         compiled from "./Home/Tpl\Users\addActive.html" */ ?>
<?php /*%%SmartyHeaderCode:292515acb07638f6cd6-57415652%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c4068edaa06bb314d61b4b532f61e6f29106452b' => 
    array (
      0 => './Home/Tpl\\Users\\addActive.html',
      1 => 1523255562,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '292515acb07638f6cd6-57415652',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5acb0763cac27',
  'variables' => 
  array (
    'province' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5acb0763cac27')) {function content_5acb0763cac27($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\phpStudy\\PHPTutorial\\WWW\\lvyou\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>武夷山驴友交流网--发起相约武夷</title>
	<meta name="keywords" content="">
	<meta name="description" content="">	
	<link rel="StyleSheet" href="__PUBLIC__/Home/css/public.css" type="text/css"/>
	<link rel="StyleSheet" href="__PUBLIC__/Home/css/usercenter.css" type="text/css"/>
	<link rel="StyleSheet" href="__PUBLIC__/Home/css/addActive.css" type="text/css"/>
	<link rel="StyleSheet" href="__PUBLIC__/calendar/calendar-green.css" type="text/css"/>
	<script type="text/javascript" src="__PUBLIC__/calendar/calendar.js"></script>
	<script language='javascript' src="__PUBLIC__/calendar/main.js"></script>
    <script src="__PUBLIC__/Home/js/jquery-1.7.2.min.js"></script>

    
    <!--检查数据添加-->
    <script>
    	$(function(){
    		//给每一个表单项绑定移入移除事件
    		$(".must").live('focus',function(){
    			$(this).next().remove();
    		});

    		$(".must").live('blur',function(){
    			checkActiveName($(this));
    		});

    	});

    	//检查文章标题是否为空
    	function checkActiveName(input_name){

    		var checkInfo = { active_name:'文章标题不能为空！',content:'文章内容不能为空！',address:'地址不能为空！'};
    		input_val = input_name.val();
    		if(input_val.length < 1){
    			input_id = input_name.attr('id');
    			input_name.next().remove();
    			input_name.after(' <i>'+checkInfo[''+input_id+'']+'</i>');
    			return false;
    		}
    	}
    	function checkAdd(){
    		//城市的选择
    		//如果重新选择了举行城市但没有提交则把省份和城市的下拉表单都移除，避免数据重复
    		if($('#old_city').val()){
    			if($("#active_city")){
    				$("#active_city").remove();
    			}
    		}
    		//移除省
    		if($('#pid')){
    			$('#pid').remove();	
    		}
    		
    		var checkInfo = { active_name:'文章标题不能为空！',content:'文章内容不能为空！',address:'地址不能为空！'};
    		var must = $(".must");
    		for(var i = 0 ;i < must.length;i++){
    			var thisid = must.eq(i).attr('id');
    			if(checkActiveName(must.eq(i)) == false){
    				must.eq(i).focus();
    				must.eq(i).next().remove();
 					must.eq(i).after(' <i>'+checkInfo[''+thisid+'']+'</i>');
    				return false;
    			}
    		}



    		
    		
    	}
    </script>
    <script type="text/javascript">
		$("#pid").live("change",function(){ 
				var ob = $(this); //获取当前下拉选择框对象
				ob.nextAll("select").remove();
				ob.nextAll("input").remove();
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
						var str = "<select name='active_city' id='active_city'>";
						str += "<option value=\"0\">-请选择-</option>";
						for(var i=0;i<data.length;i++){
							str += "<option value=\""+data[i].id+"\">"+data[i].name+"</option>";
						}
						str += "</select>";
						str += "<input type='button' id='select-cid' onclick='chooseCid()' value='确认'/>";
						ob.after(str);
					}
				});
			 });

		function chooseCid(){
			var active_city = $("#active_city");
			if(!active_city.val()){
				alert('您还没有选择城市');
			}else{
				$("#city td").eq(1).empty();
				$('#city td').eq(1).html(active_city);
			}
		}
	</script>
	<script>
					//美食丶景点知识发布切换效果
					function create(type){
						if(type == "2"){
							$("#title a:last").addClass('cur');
							$("#title a:first").removeClass('cur');
							$('#type').val('2');
							//先清除之前的城市下下拉表单和地址
							if($("#city")){
								$("#city").remove();
							}
							if($("#address-box")){
								$("#address-box").remove();
							}
							//追加城市和地址

						}else{
							$("#title a:first").addClass('cur');
							$("#title a:last").removeClass('cur');
							$('#type').val('1');
							if($("#city")){
								$("#city").remove();
							}
							if($("#address-box")){
								$("#address-box").remove();
							}
						}
					}
				</script>
						<script type="text/javascript">
							$(function(){
								$("#edloc").live('click',function(){
											$(this).after(
												"<select name=\"active_province\" id=\"pid\"><option value=\"0\">-请选择-</option><?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['province']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value){
$_smarty_tpl->tpl_vars['v']->_loop = true;
?><option value=\"<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
\"><?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>
</option><?php } ?>"
											);
								})
							})
						</script>

</head>
<body>
	<?php echo $_smarty_tpl->getSubTemplate ("Public/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<!--这是主体部分-->
	<div class="w960" id="ucenter">
		<div class="c-left">
			<?php echo $_smarty_tpl->getSubTemplate ("Public/top.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


			<!--文章表单-->
			<div id="addActiveForm">
				
				<div id="title">
					<a href="javascript:" onclick="create('1')" <?php if ($_POST['type']==1||$_POST['type']==''){?> class="cur" <?php }?>>武夷山美食</a> |
					<a href="javascript:" onclick="create('2')" <?php if ($_POST['type']==2){?> class="cur" <?php }?>>武夷山景点</a>
				</div>
				<form action="__URL__/createActive" method="post" onsubmit="return checkAdd()" enctype="multipart/form-data">
				<input type="hidden" name="type" id="type" value="<?php if ($_POST['type']){?><?php echo $_POST['type'];?>
<?php }else{ ?>1<?php }?>"/>
				<!--有的地方是通过post的方法传过来文章类型，如果post不存在默认武夷山美食-->
				<table border="0" cellpadding="5" cellspacing="0">
					<tr>
						<td>活动标题</td><td><input type="text" name="active_name" id="active_name" class="must"/></td>
					</tr>
					<tr>
						<td>活动图片</td><td><input type="file" name="photo" id="photo"/></td>
					</tr>
					<tr>
						<td>开始时间</td><td><input type="text" style="width:200px" value="<?php echo smarty_modifier_date_format(time(),"%Y-%m-%d %T");?>
" name="start_time" id="start_time"/>
						<script language="javascript" type="text/javascript">
							var showX = getElementLeft($Obj("start_time")) + 15;
							var showY = (window.navigator.userAgent.indexOf("MSIE") >=1 )? getElementTop($Obj("start_time")) + 55 :  getElementTop($Obj("start_time")) + 25;

							if((window.navigator.userAgent.indexOf("MSIE 7.0") >=1 )) {
								showX = getElementLeft($Obj("start_time"))+105;
								showY = getElementTop($Obj("start_time"))+1200;
							}
							if(window.navigator.userAgent.indexOf("MSIE 6.0")>=1)
							{
								Calendar.setup({
									inputField     :    "start_time",
									ifFormat       :    "%Y-%m-%d %H:%M:%S",
									showsTime      :    true,
									timeFormat     :    "24"
									});
							} else {
									Calendar.setup({
									inputField     :    "start_time",
									ifFormat       :    "%Y-%m-%d %H:%M:%S",
									showsTime      :    true,
									position       :    [showX, showY],
									timeFormat     :    "24"
									});
							}
						</script>
						</td>
					</tr>
					<tr>
						<td>结束时间</td><td><input type="text" style="width:200px" value="<?php echo smarty_modifier_date_format(time(),"%Y-%m-%d %T");?>
" name="end_time" id="end_time"/>
						<script language="javascript" type="text/javascript">
							var showX = getElementLeft($Obj("end_time")) + 15;
							var showY = (window.navigator.userAgent.indexOf("MSIE") >=1 )? getElementTop($Obj("end_time")) + 55 :  getElementTop($Obj("end_time")) + 25;

							if((window.navigator.userAgent.indexOf("MSIE 7.0") >=1 )) {
								showX = getElementLeft($Obj("end_time"))+105;
								showY = getElementTop($Obj("end_time"))+1200;
							}
							if(window.navigator.userAgent.indexOf("MSIE 6.0")>=1)
							{
								Calendar.setup({
									inputField     :    "end_time",
									ifFormat       :    "%Y-%m-%d %H:%M:%S",
									showsTime      :    true,
									timeFormat     :    "24"
									});
							} else {
									Calendar.setup({
									inputField     :    "end_time",
									ifFormat       :    "%Y-%m-%d %H:%M:%S",
									showsTime      :    true,
									position       :    [showX, showY],
									timeFormat     :    "24"
									});
							}
						</script></td>
					</tr>

					<tr>
						<td>集合地址</td><td><input type="text" name="address" id="address" class="must"/></td>
					</tr>

					<tr>
						<td height="240" valign="top">活动介绍</td>
						<td height="240" valign="top">
							<textarea name="content" id="content" class="must"></textarea>
						</td>
					</tr>
					<tr>
						<td></td><td><input type="submit" value="发布"/>  <input type="reset" value="重填"/></td>
					</tr>
				</table>
			</div>

		</div>
		<div class="c-right">
			<div id="news">
				<b>了解我们的武夷山~</b>
				<ul>
					<li><a href="http://www.wuyiu.edu.cn/" target="" title="">武夷学院</a></li>
					<li><a href="http://www.wys.gov.cn/" target="" title="">武夷山政府</a></li>
				</ul>
			</div>
			<div class="right-ad01">
				<img src="__PUBLIC__/Home/images/ad01.png" /> 
			</div> 
		</div>
		<div class="clear"></div> 
	</div> 
	<!--主体部分结束-->

	<?php echo $_smarty_tpl->getSubTemplate ("Public/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>