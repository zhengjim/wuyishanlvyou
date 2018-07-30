<?php
/**
 *------------------------------------------
 *	*前台话题帖子列表的操作类
 *
*/

class GroupPostAction extends CommonAction{
	//浏览所有话题帖子
	public function index(){
		$gp = M("group_post");				//创建话题帖子列表操作对象
		$gr = M("groups");					//创建话题信息操作对象
		$m = M();							//创建一个没有数据的对象
		$gid = $_GET['gid'];				//获取话题id
		$res = $m->table("wuyi_groups g,wuyi_users u")->where("g.gid = {$gid} and g.uid=u.uid")->field("u.name")->select();							//查询话题创建人的名字
		
		$name = "";							//定义一个空的变量
		foreach($res as $v){
			$name=$v['name'];
		}

		
		$ads = M("Ads");					//创建广告操作对象
		$adslist = $ads->field("aid,url,picture")->limit(1)->select();
		
		$gvm = new GroupsPostViewModel();	//实例化操作对象
		import("ORG.Util.Page");			//导入分页类
		import("ORG.Util.Page2");			//导入扩展分页类
		$gpgid=$_GET['gid'];				//获取页面传来的话题gid号
		$total = $gvm->where("group_post.gid={$gpgid}")->count();			//获取总数据条数
		$page = new Page($total,10);		//设置每页显示条数
		$page = new Page2($total,10);
		$show =$page->show();				//分页显示输出
		
		$gplist= $gvm->where("group_post.gid={$gpgid}")->limit($page->firstRow.','.$page->listRows)->select();		//查询所有关联表的信息
		
		//获取与页面传来的话题id号相同的组的组名和帖子id
		$group_name = $gr->where("gid={$gpgid}")->getField("group_name");	//获取话题的名字
		$group_pic = $gr->where("gid={$gpgid}")->getField("group_pic");		//获取话题头像
		$group_intro = substr($gr->where("gid={$gpgid}")->getField("group_intro"),0,255);	//获取话题简介
		
		//获取添加时间，调用CommonAction中的时间差函数，对添加事件进行判断
		for($i=0;$i<count($gplist);$i++){
			$gplist[$i]['addtime'] = $this->gettime($gplist[$i]['addtime']);
		}
		$grlist = $gr->where("state=1")->order("rand()")->limit(5)->getField("gid,group_name,grouper_num,group_pic");	 //随机排序话题
		
		//执行前台加入话题、退出话题变换
		$ug = M("User_group");
		$uid =$_SESSION['user']['uid'];		//获取用户uid号
		$uglist = $ug->where("uid={$uid} and gid={$gpgid}")->select();
		//判断是否查询到值
		if($uglist){
			$state=1;
		}else{
			$state=0;
		}
		
		$this->assign("name",$name);				//将话题创建人的名字加载到模板中
		$this->assign("adslist",$adslist[0]);		//将广告加载到模板中
		$this->assign("state",$state);				//将话题状态加载到模板中
		$this->assign("total",$total);				//将话题帖子总数加载到模板中
		$this->assign("group_name",$group_name);	//将话题名加载到模板中
		$this->assign("group_pic",$group_pic);		//将话题图片加载到模板中
		$this->assign("group_intro",$group_intro);	//将话题简介加载到模板中
		$this->assign("gplist",$gplist);			//将话题列表信息加载到模板中
		$this->assign("grlist",$grlist);			//将查询的话题信息加载到模板中
		$this->assign("pageinfo",$show);			//输出页码信息
		$this->display("grouplist");				//加载模板并输出
		
	}
	

	//执行Ajax话题刷新
	
	
	//执行用户加入话题
	public function insert(){
		$ugr = M("user_group");			//创建用户加入的话题的操作对象
		$uid=$_SESSION['user']['uid'];	//获取用户的id号
		$gid = $_GET['gid'];			//获取页面传递来的话题id号
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

}
