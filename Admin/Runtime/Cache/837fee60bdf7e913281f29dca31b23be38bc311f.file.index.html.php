<?php /* Smarty version Smarty-3.1.6, created on 2018-04-04 20:29:40
         compiled from "./Admin/Tpl\Users\index.html" */ ?>
<?php /*%%SmartyHeaderCode:41175ac4c534aed400-45653336%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '837fee60bdf7e913281f29dca31b23be38bc311f' => 
    array (
      0 => './Admin/Tpl\\Users\\index.html',
      1 => 1521629490,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '41175ac4c534aed400-45653336',
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
  'unifunc' => 'content_5ac4c534e26d6',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ac4c534e26d6')) {function content_5ac4c534e26d6($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("Public/pagerForm.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="pageHeader">
	<form rel="pagerForm" onsubmit="return navTabSearch(this);" method="post">
	<input type="hidden" name="numPerPage" value="<?php echo $_smarty_tpl->tpl_vars['numPerPage']->value;?>
" /><!--每页显示多少条-->
	<div class="searchBar">
		<table class="searchContent">
			<tr>
				<td>
					<b>搜索</b> &nbsp; 关键字：<input type="text" name="keyword" value="<?php echo $_POST['keyword'];?>
" /> [名号]
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
			<li><a class="add" href="__URL__/addusers" target="dialog" width="550" height="420" rel="user_msg" title="添加新用户"><span>添加</span></a></li>
			<li><a class="delete" href="__URL__/del/uid/{item_id}/navTabId/userslist" target="ajaxTodo" title="确定要删除吗?"><span>删除</span></a></li>
			<li><a class="edit" href="__URL__/edit/uid/{item_id}/navTabId/userslist"  width="400" height="220" target="dialog"><span>重设密码</span></a></li>
			<li class="line">line</li>
			<li><a class="icon"  href="javascript:navTabPageBreak()"><span>刷新</span></a></li>
			<!--<li><a class="icon" href="demo/common/dwz-team.xls" target="dwzExport" targetType="navTab" title="实要导出这些记录吗?"><span>导出EXCEL</span></a></li>-->
		</ul>
	</div>
	<table class="table" width="100%" layoutH="112">
		<thead>
			<tr>
				<th width="40" orderField="uid" <?php if ($_REQUEST['_order']=='uid'){?> class="<?php echo $_REQUEST['_sort'];?>
"<?php }?>>ID</th>
				<th width="80">名号</th>
				<th width="80">邮箱</th>
				<th width="80">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php  $_smarty_tpl->tpl_vars['vo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['vo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['vo']->key => $_smarty_tpl->tpl_vars['vo']->value){
$_smarty_tpl->tpl_vars['vo']->_loop = true;
?>
				<tr target="item_id" rel="<?php echo $_smarty_tpl->tpl_vars['vo']->value['uid'];?>
">
					<td><?php echo $_smarty_tpl->tpl_vars['vo']->value['uid'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['vo']->value['name'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['vo']->value['email'];?>
</td>
					<td><dd><div class="button"><div class="buttonContent"><?php if ($_smarty_tpl->tpl_vars['vo']->value['uid']>5){?><?php if ($_smarty_tpl->tpl_vars['vo']->value['state']<2){?><a href="__URL__/editstate/uid/<?php echo $_smarty_tpl->tpl_vars['vo']->value['uid'];?>
/navTabId/userslist"  target="ajaxTodo">启用</a><?php }else{ ?><a href="__URL__/editstate/uid/<?php echo $_smarty_tpl->tpl_vars['vo']->value['uid'];?>
/navTabId/userslist"   target="ajaxTodo">禁用</a><?php }?><?php }else{ ?>管理员<?php }?></div></div></dd></td>
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