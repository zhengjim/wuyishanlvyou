<?php
/**
* 
* 相约武夷信息调用类
* 
*/
class ActivePostReplyViewModel extends ViewModel{
    public $viewFields = array(
    		'Active_reply' => array('active_post_rid' => 'rid','reply_time' => 'rtime','reply_content' => 'content'),
    		'Users' => array('uid' => 'uid','name' => 'uname','photo','_on' => 'Active_reply.uid = Users.uid')
    	);
}

