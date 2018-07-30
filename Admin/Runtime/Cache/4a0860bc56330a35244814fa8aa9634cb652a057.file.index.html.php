<?php /* Smarty version Smarty-3.1.6, created on 2018-04-18 11:49:08
         compiled from "./Admin/Tpl\DiaryReply\index.html" */ ?>
<?php /*%%SmartyHeaderCode:33935ad6c03448dc53-85344185%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a0860bc56330a35244814fa8aa9634cb652a057' => 
    array (
      0 => './Admin/Tpl\\DiaryReply\\index.html',
      1 => 1521613933,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '33935ad6c03448dc53-85344185',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'numPerPage' => 0,
    'title' => 0,
    'list' => 0,
    'vo' => 0,
    'totalCount' => 0,
    'currentPage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5ad6c0346683e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ad6c0346683e')) {function content_5ad6c0346683e($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\phpStudy\\PHPTutorial\\WWW\\lvyou\\ThinkPHP\\Extend\\Vendor\\Smarty\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("Public/pagerForm.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="pageHeader">
	<form rel="pagerForm" onsubmit="return navTabSearch(this);" method="post">
	<input type="hidden" name="numPerPage" value="<?php echo $_smarty_tpl->tpl_vars['numPerPage']->value;?>
" /><!--每页显示多少条-->
	<input type="hidden" name="did" value="<?php echo $_REQUEST['did'];?>
"/>
	<div class="searchBar">
		<table class="searchContent">
			<tr>
				<td>
					发表人：<?php echo $_smarty_tpl->tpl_vars['title']->value['uname'];?>

				</td>
				<td>
					发表标题：<?php echo $_smarty_tpl->tpl_vars['title']->value['title'];?>

				</td>
			</tr>
		</table>
	</div>
	</form>
</div>
<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar" >
			<li><a class="delete" href="__URL__/del/id/{item_id}/navTabId/diaryreplylist" target="ajaxTodo" title="确定要删除吗?"><span>删除</span></a></li>
			<li><a class="icon"  href="javascript:navTabPageBreak()"><span>刷新</span></a></li>
		</ul>
	</div>


	<table class="table" width="100%" layoutH="138">
		<thead>
			<tr>
				<th width="40">ID</th>
				<th width="80">回复人</th>
				<th width="280">回复内容</th>
				<th width="110">回复时间</th>
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
				<td><?php echo $_smarty_tpl->tpl_vars['vo']->value['uname'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['vo']->value['content'];?>
</td>
				<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['vo']->value['addtime'],"%Y-%m-%d %H:%M:%S");?>
</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<div class="panelBar">
		<div class="pages">
			<span>显示</span>
			<select class="combox" name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value})">
				<option value="5" <?php if ($_smarty_tpl->tpl_vars['numPerPage']->value==5){?>selected<?php }?>>5</option>
				<option value="10" <?php if ($_smarty_tpl->tpl_vars['numPerPage']->value==10){?>selected<?php }?>>10</option>
				<option value="15" <?php if ($_smarty_tpl->tpl_vars['numPerPage']->value==50){?>selected<?php }?>>50</option>
				<option value="20" <?php if ($_smarty_tpl->tpl_vars['numPerPage']->value==100){?>selected<?php }?>>100</option>
				<option value="25" <?php if ($_smarty_tpl->tpl_vars['numPerPage']->value==150){?>selected<?php }?>>150</option>
				<option value="30" <?php if ($_smarty_tpl->tpl_vars['numPerPage']->value==200){?>selected<?php }?>>200</option>
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