<?php

class UsersModel extends Model{
	//自动验证
	protected $_validate = array(
		 array('email','','邮箱已经存在！',0,'unique',1), // 在新增的时候验证email字段是否唯一			
		 array('name','','名号已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
	);
}