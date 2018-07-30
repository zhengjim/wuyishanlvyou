<?php
/**
 *------------------------------------------
 *	*前台用户话题列表的操作类
 *
*/

class MyPostAction extends CommonAction{
	//浏览用户的发布的所有话题
	public function index(){
		$uid = $_SESSION['user']['uid'];	//获取登录用户的id号
		$g = M("Groups");					//创建话题操作对象
		//$mpt = M("Group_post");			//创建用户话题信息操作对象
		$ug = M("User_group");				//创建用户加入的话题操作对象
		$uglist = $ug->where("uid = {$uid}")->limit(6)->select();			//获取user_group表的信息
		foreach($uglist as $k=>$v){			//循环遍历user_group表信息
			$guid = $v['uid'];				//获取user_group表中用户id
			$ugid = $v['gid'];				//获取user_group表中的用户加入的话题的id号
			$glist[]=$g->where("gid = {$ugid}")->select();		//获取与$ugid相同的话题id号
			$this->assign("glist",$glist);
		}
		
		$gvm = new GroupsPostViewModel();	//实例化操作对象
		import("ORG.Util.Page");			//导入分页类
		import("ORG.Util.Page2");			
		$total = $gvm->where("Group_post.uid = {$uid}")->count();//获取总数据条数
		$page = new Page2($total,10);		//设置每页显示条数
		$show = $page->show();				//分页显示输出
		
		$list = $gvm->where("Group_post.uid = {$uid}")->order("addtime desc")->limit($page->firstRow.','.$page->listRows)->select();
		//获取登录用户在话题中所发布的所有话题

		$this->assign("list",$list);
		$this->assign("pageinfo",$show);	//输出页码信息
		$this->assign("total",$total);		//输出统计信息
		$this->display("mypost");
		
	}
	
	//执行用户话题删除
	public function del(){
		$gp = M("Group_post");				//创建话题帖子列表操作对象
		$gpd = M("Group_post_details");		//创建话题帖子详情操作对象
		$gpid = $_GET['group_post_id'];		//获取页面传来的话题id号
		
		if($gpid){
			$gpres = $gp->where("group_post_id={$gpid}")->delete();		//判断话题id并执行删除
			$gpdres= $gpd->where("group_post_id={$gpid}")->delete();	//删除话题详情表中的内容
			$this->success("删除成功！");
		}else{
			$this->error("删除失败！");
		}
	}
}