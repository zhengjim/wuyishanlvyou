<?php
/**
*个人主页信息浏览
*我参加话题的帖子
*/
class GroupsViewModel extends ViewModel{
	public $viewFields = array(	
		'Group_post'=>array('post_title','group_post_id','addtime'),
		'Groups'=>array('gid','group_name','_on'=>'Groups.gid=Group_post.gid'),
		'Users'=>array('uid','name','photo','_on'=>'Users.uid=Group_post.uid'),
   );

}
