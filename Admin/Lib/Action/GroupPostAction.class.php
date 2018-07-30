<?php
/**
 *------------------------------------------
 *	*后台所有饮食话题话题列表管理操作类

 *
*/

//帖子管理类
class GroupPostAction extends CommonAction{
	//封装搜素条件
	public function _filter(&$map){
		//搜索条件有值则做封装
		if(!empty($_REQUEST['keyword'])){
			$where['keyword']  = array('like',"%{$_REQUEST['keyword']}%");
			$where['_logic'] = 'or';
			$map['_complex'] = $where;
		}
	}

	//浏览所有帖子
	public function index(){
		
		$this->_filter($_POST);									//调用上面函数中的_filter()方法
		$order="group_post_id asc";								//设置默认排序条件
		if(!empty($_REQUEST['_order'])){						//判断排序条件
			$order=$_REQUEST['_order']." ".$_REQUEST['_sort'];
		}
		
		
		$gp = M("Group_post");									//创建话题信息列表操作对象
		
		$where =" 1=1 ";										//设定恒真
		if(!empty($_REQUEST['gid'])){							//判断传来的值是否为空
			$where .=" and gid = {$_REQUEST['gid']}";			//获取隐藏表单中传来的话题id
		}
		if(!empty($_POST['keyword'])){
			$where .=" and post_title like '%{$_POST['keyword']}%'";	//若不为空则进行模糊查询
		}
		
		
		//分页处理
		$_GET['p']=$_REQUEST['pageNum']+0;						//转换参数实现当前页号的传递
		$numPerPage=isset($_REQUEST["numPerPage"])?$_REQUEST["numPerPage"]:10;
		import('ORG.Util.Page');								//导入分页类
		$count = $gp->where($where)->count();					//获取总数据条数
		$Page = new Page($count,$numPerPage);					//实例化分页类，传入总数据条数和每页显示的条数
		
		//执行信息提取并放置到模板中
		$res=$gp->where($where)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();	//封装搜索条件
		//echo $gp->getlastsql();
		$this->assign("gplist",$res);							//封装分页信息
		$this->assign("totalCount",$count);						//封装总数据条数
		$this->assign("numPerPage",$numPerPage);				//封装页大小
		//$this->assign("pageNumShown",2);						//页标数字多少个
		$this->assign("currentPage",$_REQUEST['pageNum']);		//当前页
		$this->display("index");
	}
	
	//帖子删除
	public function postDel(){

	    $post_id = $_GET['id'];
        M('group_post_details')->where("group_post_id={$post_id}")->delete();
        M('group_post_like')->where("group_post_id={$post_id}")->delete();
        M('group_post_reply')->where("group_post_id={$post_id}")->delete();

		$res = M("Group_post")->where("group_post_id={$post_id}")->delete();
		if($res){
			$this->success("删除成功");
		}else{
			$this->error("删除失败");
		}
	}
}