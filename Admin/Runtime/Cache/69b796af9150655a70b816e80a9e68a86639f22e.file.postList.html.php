<?php /* Smarty version Smarty-3.1.6, created on 2018-05-08 17:34:46
         compiled from "./Admin/Tpl\Groups\postList.html" */ ?>
<?php /*%%SmartyHeaderCode:257155af16f368df5f5-73355054%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69b796af9150655a70b816e80a9e68a86639f22e' => 
    array (
      0 => './Admin/Tpl\\Groups\\postList.html',
      1 => 1457603577,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '257155af16f368df5f5-73355054',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'numPerPage' => 0,
    'gplist' => 0,
    'vo' => 0,
    'totalCount' => 0,
    'currentPage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5af16f36be3f9',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af16f36be3f9')) {function content_5af16f36be3f9($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\phpStudy\\PHPTutorial\\WWW\\lvyou\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("Public/pagerForm.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="pageHeader">
	<form rel="pagerForm" onsubmit="return navTabSearch(this);" method="post">
	<input type="hidden" name="numPerPage" value="<?php echo $_smarty_tpl->tpl_vars['numPerPage']->value;?>
" /><!--每页显示多少条-->
	<div class="searchBar">
		<table class="searchContent">
			<tr>
				<td>
					<b>搜索</b> &nbsp; 关键字：<input type="text" name="keyword" value="<?php echo $_POST['keyword'];?>
" /> <!-- [登录名,真实姓名,电话] -->
				</td>
				<td>
					<div class="buttonActive"><div class="buttonContent"><button type="submit">检索</button></div></div>
				</td>
			</tr>
		</table>
	</div>
	</form>
</div>
<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
			<!-- <li><a class="add" href="__URL__/add" target="dialog" width="550" height="420" rel="user_msg" title="添加新员工"><span>添加</span></a></li> -->
			<li><a class="delete" href="__URL__/postDel/id/{item_id}/navTabId/gpostlist" target="ajaxTodo" title="确定要删除吗?"><span>删除</span></a></li>
			<!-- <li><a class="edit" href="__URL__/edit/id/{item_id}/navTabId/gpostlist"  width="550" height="420" target="dialog"><span>修改</span></a></li> -->
			<!-- <li><a class="edit" href="__URL__/password/id/{item_id}/navTabId/grouppostlist"  width="400" height="220" target="dialog"><span>重设密码</span></a></li> -->
			<li class="line">line</li>
			<li><a class="icon"  href="javascript:navTabPageBreak()"><span>刷新</span></a></li>
			<!--<li><a class="icon" href="demo/common/dwz-team.xls" target="dwzExport" targetType="navTab" title="实要导出这些记录吗?"><span>导出EXCEL</span></a></li>-->
		</ul>
	</div>
	<table class="table" width="100%" layoutH="112">
		<thead>
			<tr>
				<th width="40" orderField="group_post_id" <?php if ($_REQUEST['_order']=='group_post_id'){?>class="<?php echo $_REQUEST['_sort'];?>
"<?php }?>>帖子id</th>
				<th width="150">标题</th>
				<th width="120">关键字</th>
				<th width="140">描述/简介</th>
				<th width="40">点击量</th>
				<th width="120">添加时间</th>
				<th width="120">最后修改时间</th>
			</tr>
		</thead>
		<tbody>
			<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_smarty_tpl->tpl_vars['K'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['gplist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
 $_smarty_tpl->tpl_vars['K']->value = $_smarty_tpl->tpl_vars['vo']->key;
?>
				<tr target="item_id" rel="<?php echo $_smarty_tpl->tpl_vars['vo']->value['group_post_id'];?>
">
					<td><?php echo $_smarty_tpl->tpl_vars['vo']->value['group_post_id'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['vo']->value['post_title'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['vo']->value['keywords'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['vo']->value['descripition'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['vo']->value['click_num'];?>
</td>
					<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['vo']->value['addtime'],"%Y-%m-%d %H:%M:%S");?>
</td>
					<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['vo']->value['last_edit_time'],"%Y-%m-%d %H:%M:%S");?>
</td>
				</tr>
			<?php } ?>
		</tbody>
		<!--<?php echo $_GET['gid'];?>
-->
	</table>
	<div class="panelBar">
		<div class="pages">
			<span>显示</span>
			<select class="combox" name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value})">
				<option value="10" <?php if ($_smarty_tpl->tpl_vars['numPerPage']->value==10){?>selected<?php }?>>10</option>
				<option value="15" <?php if ($_smarty_tpl->tpl_vars['numPerPage']->value==15){?>selected<?php }?>>15</option>
				<option value="20" <?php if ($_smarty_tpl->tpl_vars['numPerPage']->value==20){?>selected<?php }?>>20</option>
				<option value="25" <?php if ($_smarty_tpl->tpl_vars['numPerPage']->value==25){?>selected<?php }?>>25</option>
				<option value="30" <?php if ($_smarty_tpl->tpl_vars['numPerPage']->value==30){?>selected<?php }?>>30</option>
			</select>
			<span>共<?php echo $_smarty_tpl->tpl_vars['totalCount']->value;?>
条</span>
		</div>
		<!--<?php if ($_GET['gid']==$_smarty_tpl->tpl_vars['vo']->value['gid']){?>-->
		<div class="pagination" targetType="navTab" totalCount="<?php echo $_smarty_tpl->tpl_vars['totalCount']->value;?>
" numPerPage="<?php echo $_smarty_tpl->tpl_vars['numPerPage']->value;?>
" pageNumShown="10" currentPage="<?php echo $_smarty_tpl->tpl_vars['currentPage']->value;?>
"></div>
		<!--<?php }?>-->
	</div>
</div>
<?php }} ?>