<?php
/**
*话题回复信息浏览
*/
class TalkViewModel extends ViewModel{
	public $viewFields = array(
		'Group_post_reply'=>array('reply_content','replyed_id','reply_time'),
		'Group_post'=>array('post_title','group_post_id','_on'=>'Group_post.group_post_id=Group_post_reply.group_post_id'),
		'Users'=>array('uid','name','photo','_on'=>'Users.uid=Group_post_reply.uid'),
   );

}