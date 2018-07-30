<?php

class UsersModel extends RelationModel{
	
	//自动验证
	protected $_validate = array(
		 array('email','','邮箱已经存在！',0,'unique',1), // 在新增的时候验证email字段是否唯一
         array('email','email','邮箱格式有误!'),
		 array('name','','名号已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
	);
	
	protected $_link = array(
		//用户对分享
			'Diary'=> array(
					'mapping_type'=>HAS_MANY,
					'class_name'=>'Diary',
					'foreign_key'=>'uid',
					'mapping_name'=>'diary',
					'mapping_fields'=>'did,title'
			),
	);
}