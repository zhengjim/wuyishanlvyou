<?php
/**
 *------------------------------------------
 *	*用户在饮食话题中发布话题的视图Model类
 *
*/

//创建用户发布话题视图Model类
class GroupsPostViewModel extends ViewModel{
	public $viewFields = array(
		"Group_post"=>array('gid','group_post_id','post_title','like_num','descripition','addtime'),	//指定当前表
		"Groups"=>array('gid','group_name','group_pic','_on'=>"group_post.gid=groups.gid"),		//指定要关联的表
		"Users"=>array('uid','name','photo','_on'=>"group_post.uid=users.uid"),
	);
	
	

}