<?php
/**
* 
* 邀请信息调用类
* 
*/
class UsersActiveViewModel extends ViewModel{
    public $viewFields = array(
    		'Active' => array('active_name','end_time','photo','join_num','active_city' => 'city','address','description'),
    		'Users_active' => array('aid' => 'aid','uid' => 'uid','uid' => 'uid','aid' => 'aid','_on' => 'Active.active_id = Users_active.aid')
    		
    	);
}

