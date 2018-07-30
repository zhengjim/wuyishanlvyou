<?php
/**
 *------------------------------------------
 *	*前台话题详情视图Model类
 *
*/

//创建话题详情视图Model类
class GroupDetailsViewModel extends ViewModel{
	public $viewFields = array(
		"Group_post_details"=>array('group_post_id','content'),		//指定当前表
		"Group_post"=>array('gid','group_post_id','post_title','like_num','addtime','_on'=>"group_post_details.group_post_id=group_post.group_post_id"),	//指定要关联的表
		"Users"=>array('uid','name','_on'=>"group_post.uid=users.uid"),	//指定要关联的表
	);
}