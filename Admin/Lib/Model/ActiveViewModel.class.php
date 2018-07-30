<?php
/**
* 
* 健康知识信息调用类
* 
*/
class ActiveViewModel extends ViewModel{
    public $viewFields = array(
    		'Active' => array('active_id' => 'id','state' => 'state','active_name' => 'title','start_time','end_time','photo','join_num','active_city' => 'city','address','description'),
    		'Users' => array('uid' => 'uid','name' => 'uname','_on' => 'Active.uid = Users.uid')
    	);
}

