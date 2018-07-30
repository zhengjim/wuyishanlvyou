<?php
/**
 *------------------------------------------
 *	*后台饮食话题管理操作类

 *
*/

//自定义话题信息管理类
class GroupAction extends CommonAction{
	//封装搜素条件
	public function _filter(&$map){
		//搜索条件有值则做封装
		if(!empty($_REQUEST['keyword'])){
			$where['keyword']  = array('like',"%{$_REQUEST['keyword']}%");
			$where['_logic'] = 'or';
			$map['_complex'] = $where;
		}
	}

	//浏览所有话题信息
	public function index(){
		//判断排序条件
		$order="gid asc";
		if(!empty($_REQUEST['_order'])){
			$order=$_REQUEST['_order']." ".$_REQUEST['_sort'];
		}
		
		$g = M("Groups");						//创建话题信息表操作对象
		
		if(!empty($_POST['keyword'])){			//判断页面提交的值是否为空
			$where="group_name like '%{$_POST['keyword']}%'";	//若不为空则进行模糊查询
		}else{
			$where=" 1=1 ";
		}
		
		//分页处理
		$_GET['p']=$_REQUEST['pageNum']+0;		//转换参数实现当前页号的传递
		$numPerPage=isset($_REQUEST["numPerPage"])?$_REQUEST["numPerPage"]:10;
		import('ORG.Util.Page');				//导入分页类
		$count = $g->count();					//获取总数据条数
		$Page = new Page($count,$numPerPage);	//实例化分页类，传入总数据条数和每页显示的条数
		
		//执行信息提取并放置到模板中
		$res=$g->where($where)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign("glist",$res);			//封装分页信息
		$this->assign("totalCount",$count);		//封装总数据条数
		$this->assign("numPerPage",$numPerPage);//封装页大小
		//$this->assign("pageNumShown",2);		//页标数字多少个
		$this->assign("currentPage",$_REQUEST['pageNum']);	//当前页
		$this->display("index");
	}
	
	
	//话题状态修改
	public function groupClose(){
		$g = M("Groups");						//创建话题操作对象
		$res = $g->find($_REQUEST['gid']);		//查询话题信息
		
		//获取当前饮食话题的状态
		if($res['state']==1){
			$_POST['state']=-1;
		}else{
			$_POST['state']=1;
		}
		
		$_POST['gid']=$_REQUEST['gid'];			//将gid传入到数据库中
		parent::update();						//调用父类Action中的修改方法
	}




}

