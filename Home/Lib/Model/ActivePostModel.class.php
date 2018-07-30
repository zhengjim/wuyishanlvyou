<?php
/**
* 
* 相约武夷信息调用类
* 
*/
class ActivePostModel extends RelationModel{
    //自动验证
	protected $_validate = array(
		 array('title','require','标题不能为空！',1,'',3), // 新增和修改的时候标题不能为空	
		 array('title','','标题已存在,请重新填写！',1,'unique',3), // 新增和修改的时候标题必须是唯一		
	);

	//自动完成
	protected $_auto = array(
	   array('addtime',"time",1,"function"),       // 新增的时候把addtime字段设置为当前时间
	   array('reply_num',0,1),				       // 新增的时候把reply_num字段设置为0
	   array('uid',"getUid",1,"callback"),         // 新增的时候设置uid的填充值为回调函数getUid
	   array('last_edit_time',"time",3,"function") // 新增和修改的时候把last_edit_time字段设置为当前时间
	);

	//uid获取
	public function getUid(){
		$uid = $_SESSION['user']['uid'];
		return $uid;
	}

}

