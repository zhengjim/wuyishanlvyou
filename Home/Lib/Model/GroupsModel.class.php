<?php
/**
 *------------------------------------------
 *	*前台饮食话题首页浏览、加入饮食话题、创建饮食话题操作类
 *
*/

//建立话题数据库操作的Model类
class GroupsModel extends Model{
	//自动验证
	protected $_validate = array(
		 array('group_name','require','话题名不能为空！',1,'',3), 		// 新增和修改的时候标题不能为空
		 array('group_name','','标题已存在,请重新填写！',1,'unique',3), // 新增和修改的时候标题必须是唯一		
	);
	
	//自动完成
	protected $_auto = array(
	   array('addtime',"time",1,"function"),		 // 新增的时候把addtime字段设置为当前时间
	   array('grouper_num',0,1),					// 新增的时候把reply_num字段设置为0
	   array('uid',"getUid",1,"callback"),			// 新增的时候设置uid的填充值为回调函数getUid
	);
	
	//uid获取
	public function getUid(){
		$uid = $_SESSION['user']['uid'];
		return $uid;
	}
	
	
	
} 