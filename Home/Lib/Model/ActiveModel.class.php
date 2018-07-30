<?php
/**
* 
* 相约武夷信息调用类
* 
*/
class ActiveModel extends Model{
    //自动验证
	protected $_validate = array(
		 array('active_name','require','活动名称不能为空！',1,'',3), // 新增和修改的时候标题不能为空
		 array('active_name','','活动已存在！',1,'unique',3), // 新增和修改的时候标题必须是唯一
	);

	//自动完成
	protected $_auto = array(
	   array('addtime',"time",1,"function"),       //新增的时候把addtime字段设置为当前时间
	   array('join_num',0,1),				       //新增的时候把join_num字段设置为0
	   array('reply_num',0,1),				       //新增的时候把reply_num字段设置为0
	   array('state',1,1),				           //新增的时候把state字段设置为1,健康知识默认是启用的
	   array('uid',"getUid",1,"callback"),         //新增的时候设置uid的填充值为回调函数getUid
	);

	//uid获取
	public function getUid(){
		$uid = $_SESSION['user']['uid'];
		return $uid;
	}
}

