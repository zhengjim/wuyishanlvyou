<?php /* Smarty version Smarty-3.1.6, created on 2018-04-04 20:31:58
         compiled from "./Admin/Tpl\Active\index.html" */ ?>
<?php /*%%SmartyHeaderCode:105235ac4c5be2ffd70-94140754%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9faf62b5387474ca80060a06434508a402b5da7b' => 
    array (
      0 => './Admin/Tpl\\Active\\index.html',
      1 => 1521619976,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '105235ac4c5be2ffd70-94140754',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'numPerPage' => 0,
    'list' => 0,
    'vo' => 0,
    'totalCount' => 0,
    'currentPage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5ac4c5be6e3ce',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ac4c5be6e3ce')) {function content_5ac4c5be6e3ce($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\phpStudy\\PHPTutorial\\WWW\\lvyou\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
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
" />
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
			<li><a class="delete" href="__URL__/del/id/{item_id}/navTabId/active" target="ajaxTodo" title="确定要删除吗?"><span>删除</span></a></li>
			<li class="line">line</li>
			<li><a class="icon"  href="javascript:navTabPageBreak()"><span>刷新</span></a></li>
		</ul>
	</div>
	<table class="table" width="100%" layoutH="112">
		<thead>
			<tr>
				<th width="40" orderField="id" <?php if ($_REQUEST['_order']=='id'){?> class="<?php echo $_REQUEST['_sort'];?>
"<?php }?>>ID</th>
				<th width="80">活动标题	</th>
				<th width="80">开始时间</th>
				<th width="80">结束时间</th>
				<th width="80">发起人</th>
				<th width="80" orderField="join_num" <?php if ($_REQUEST['_order']=='join_num'){?> class="<?php echo $_REQUEST['_sort'];?>
"<?php }?>>参加人数</th>
				<th width="80">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?>
				<tr target="item_id" rel="<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
">
					<td><?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['vo']->value['title'];?>
</td>
					<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['vo']->value['start_time'],"%Y-%m-%d %H:%I");?>
</td>
					<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['vo']->value['end_time'],"%Y-%m-%d %H:%I");?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['vo']->value['uname'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['vo']->value['join_num'];?>
</td>
					<td><dd><div class="button"><div class="buttonContent"><?php if ($_smarty_tpl->tpl_vars['vo']->value['state']>0){?><a href="__URL__/toOpen/id/<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
/sid/<?php echo $_smarty_tpl->tpl_vars['vo']->value['state'];?>
/navTabId/active"  target="ajaxTodo">禁用</a><?php }else{ ?><a href="__URL__/toOpen/id/<?php echo $_smarty_tpl->tpl_vars['vo']->value['id'];?>
/sid/<?php echo $_smarty_tpl->tpl_vars['vo']->value['state'];?>
/navTabId/active" target="ajaxTodo">启用</a><?php }?></div></div></dd></td>
				</tr>
			<?php } ?>
		</tbody>
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
		<div class="pagination" targetType="navTab" totalCount="<?php echo $_smarty_tpl->tpl_vars['totalCount']->value;?>
" numPerPage="<?php echo $_smarty_tpl->tpl_vars['numPerPage']->value;?>
" pageNumShown="10" currentPage="<?php echo $_smarty_tpl->tpl_vars['currentPage']->value;?>
"></div>
	</div>
</div>
<?php }} ?>