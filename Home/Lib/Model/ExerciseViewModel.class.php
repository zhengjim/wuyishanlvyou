<?php
/**
*相约武夷回复信息浏览
*/
class ExerciseViewModel extends ViewModel{
	public $viewFields = array(
		'Active_reply'=>array('active_post_rid','reply_time','reply_content'),
     	'Active_post'=>array('title','active_post_id'=>'pid', '_on'=>'Active_post.active_post_id = Active_reply.active_post_id'),
    	'Users'=>array('uid','name','photo','_on'=>'Active_reply.uid = Users.uid'),
   );

}