<?php
/**
*个人主页信息浏览
*我参加话题的帖子
*/
class UserGroupViewModel extends ViewModel{
	public $viewFields = array(	
		'User_group'=>array('gid'),
		'Groups'=>array('group_name','grouper_num','group_pic','state','_on'=>'Groups.gid = User_group.gid'),
   );

}
