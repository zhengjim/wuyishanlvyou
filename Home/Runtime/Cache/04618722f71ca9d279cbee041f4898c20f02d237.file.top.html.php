<?php /* Smarty version Smarty-3.1.6, created on 2018-04-09 14:03:32
         compiled from "./Home/Tpl\Public\top.html" */ ?>
<?php /*%%SmartyHeaderCode:308075acb02343e0c45-95402388%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04618722f71ca9d279cbee041f4898c20f02d237' => 
    array (
      0 => './Home/Tpl\\Public\\top.html',
      1 => 1521536402,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '308075acb02343e0c45-95402388',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5acb023442a58',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5acb023442a58')) {function content_5acb023442a58($_smarty_tpl) {?>			<div id="c-nav">
				<ul>
					<li><a href="__APP__/Users/myshow" target="" title="">我的首页</a></li>
					<li><a href="__APP__/Core" target="" title="">我的分享</a></li>
					<li><a href="__APP__/MyGroup/index" target="" title="">我的话题</a></li>
					<li><a href="__APP__/Users/myActive" target="" title="">我的邀约</a></li>
				</ul>
			</div>
			<div id="add">
				<ul>
					<li>
						<span><a href="__APP__/Diary/publish"  title=""><img src="__PUBLIC__/Home/images/small-img.png" style="margin-top:5px;" /></a></span>
						<i><a href="__APP__/Diary/publish"  title="">分享我的武夷行</a></i>
					</li>
					<li>
						<span><a href="__APP__/AddGroupPost/index"  title=""><img src="__PUBLIC__/Home/images/pen.png" style="margin-top:5px;" /></a></span>
						<i><a href="__APP__/AddGroupPost/index"  title="">发布帖子</a></i>
					</li>
					<li>
						<span><a href="__APP__/Users/addActive"  title=""><img src="__PUBLIC__/Home/images/small-img.png" style="margin-top:5px;" /></a></span>
						<i><a href="__APP__/Users/addActive/"  title="">发起相约武夷</a></i>
					</li>
					<li>
						<span><a href="__APP__/Groups/addgroup"  title=""><img src="__PUBLIC__/Home/images/pen.png" style="margin-top:5px;" /></a></span>
						<i><a href="__APP__/Groups/addgroup"  title="">新建武夷山话题</a></i>
					</li>
				</ul>
			</div><?php }} ?>