<?php
/**
* 
* 相约武夷信息调用类
*
*/
class ActivePostViewModel extends ViewModel{
    public $viewFields = array(
    		'Active_post' => array('active_post_id' => 'pid','aid','title','reply_num','addtime'),
    		'Users' => array('uid' => 'uid','name' => 'uname','photo','_on' => 'Active_post.uid = Users.uid')
    	);
}

