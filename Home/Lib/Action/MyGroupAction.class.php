<?php
/**
 *------------------------------------------
 *	*前台用户所有加入的话题的操作类
 *
*/

class MyGroupAction extends CommonAction{

    public function _initialize(){
        //判断是否登录
        $uid = $_SESSION['user']['uid'];
        if(empty($uid) || $uid == " "){
            $this->error('请先登录','__APP__/Users/login');
        }
    }

	//浏览用户都加入哪些话题
	public function index(){	
		$uid = $_SESSION['user']['uid'];	//获取登录用户的id号
		$ug = M("User_group");				//创建用户加入的话题的操作对象
		$uglist = $ug->where("uid = {$uid}")->select();	//获取所有user_group表的信息
		
		$total = D("UserGroupView")->where("User_group.uid = {$uid}")->count();
		import("ORG.Util.Page");			//导入分页类
		import("ORG.Util.Page2");
		$page = new Page2($total,6);
		$show =$page->show();
		$list = D("UserGroupView")->where(array("User_group.uid "=>$uid,"state"=>"1"))->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign("pageinfo",$show);
		$this->assign("glist",$list);
		
		//右侧话题显示
		$gr = M("Groups");					//创建话题操作对象
		$list = $gr->where("state=1")->order("rand()")->limit(5)->getField("gid,group_name,grouper_num,group_pic");	//随机排序话题
		$this->assign("list",$list);
		$this->display("mygroup");	
	}
	
	//执行Ajax话题刷新
	public function showgroup(){
        $gr = M("groups");	//创建话题操作对象
		$list = $gr->where("state=1")->order("rand()")->limit(5)->getField("gid,group_name,grouper_num,group_pic");	 //随机排序话题
		echo json_encode($list);
	}
	
	//执行用户加入话题
	public function insert(){
		$ugr = M("user_group");			//创建用户加入的话题的操作对象
		$uid=$_SESSION['user']['uid'];	//获取用户的id号
		$gid = $_GET['id'];				//获取页面传递来的话题id号
		$_POST['uid']=$uid;				//获取用户的id	
		$_POST['gid']=$gid;				//获取话题的id
		//判断用户是否已登录
		if(!empty($uid)){				//若已登录则执行信息查询
			$info = $ugr->where("uid = {$uid} and gid = {$gid}")->select();	//判断用户是否已加入话题
			if($info){					//判断是否有信息
				$this->error("您已经在该话题中");
			}else{
				$ugr->create();			//封装要添加的信息
				$res = $ugr->add();		//执行添加
				if($res){				//执行添加并判断
					$gr = M("Groups");	//创建Group话题操作对象
					$grouper_num = $gr->where("gid = {$gid}")->getField("grouper_num");	//获取表中的字段
					$gr->where("gid = {$gid}")->setInc(grouper_num);		//成员数量加1
					$this->success("加入成功");
				}else{
					$this->error("加入失败");
				}	
			}
		}else{
			$this->error("请您先登录");	//否则提示请先登
		}
	}
	
	//执行用户退出话题
	public function quit(){
		$ugr = M("user_group");			//创建用户加入话题的操作对象
		$uid=$_SESSION['user']['uid'];	//获得用户的登录的id号
		$gid = $_GET['gid'];			//获取页面传递来的话题id号
		$uglist = $ugr->select();		//获取user_group中信息
		//判断信息
		if($gid){						//判断话题id是否存在
			$ugres = $ugr->where("uid={$uid} and gid={$gid}")->delete();	//删除用户加入的话题
			$g = M("Groups");			//创建话题信息操作对象
			$groupnum = $g->where("gid = {$gid}")->getField("grouper_num");	//获取grouper_num字段的值
			$data['grouper_num']=$groupnum-1 ;								//删除成功话题成员减1
			$gres = M("Groups")->where("gid = {$gid}")->save($data);		//更新数据到数据库
			if($ugres and $gres){
				$this->success("退出话题成功");
			}else{
				$this->error("退出失败");
			}
		}else{
			$this->error("退出失败");
		}
	}
	
}