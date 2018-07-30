<?php
/**
* 
* 相约武夷信息调用类
* 
*/
class Active2ViewModel extends ViewModel{
    public $viewFields = array(
    		'Active' => array('active_id' => 'id','active_name' => 'title','start_time','end_time','photo','join_num','active_city' => 'city','address'),
    		'Active_details' => array('content' => 'content','_on' => 'Active_details.active_id = Active.active_id')
    	);
}

