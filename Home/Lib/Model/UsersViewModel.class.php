<?php
/**
*个人主页信息浏览
*我参加邀请的讨论
*/
class UsersViewModel extends ViewModel{
	public $viewFields = array(
	'Active_post'=>array('active_post_id' =>'pid','title','last_edit_time'),
	'Active' => array('active_id','active_name','_on' => 'Active.active_id = Active_post.aid'),
	'Users'=>array('uid','name','photo','_on'=>'Users.uid=Active_post.uid'),
   );

}

