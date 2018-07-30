<?php
/**
 *------------------------------------------
 *	*前台饮食话题话题详情页操作类
 *
*/

class GroupDetailsAction extends CommonAction{
	//浏览显示话题详情内容
	public function index(){
		//浏览话题信息
	 	$gpid = (int)$_GET['group_post_id'];				//获取页面传递的gid
		$gid = $_GET['gid'];
		$gpl = M("Group_post");						//创建话题列表操作对象
		
		$gdv = new GroupDetailsViewModel();			//实例化视图操作对象
		$gdvlist = $gdv->where("Group_post.group_post_id={$gpid}")->select();	//获取与gpid相对应的话题内容
		//获取话题发布时间，转换话题发布时间的格式	

			
		//浏览帖子评论的信息
		$m = M();									//实例化一个对象，没有对应任何数据
		import("ORG.Util.Page");					//导入分页类
		import("ORG.Util.Page2");					//导入使用的分页类
		$count = $m->table("wuyi_group_post_reply fgpr,wuyi_users u")->where("fgpr.uid=u.uid and fgpr.group_post_id={$gpid} and fgpr.replyed_id=0")->count();	//查询满足条件的总数据数
		
		$Page = new Page2($count,10);				//实例化分页类
		$show = $Page->show();						//分页显示输出
		
		//执行SQL查询操作，获取评论的信息		
		$gprlist = $m->table("wuyi_group_post_reply fgpr,wuyi_users u")->where("fgpr.uid=u.uid and fgpr.group_post_id={$gpid} and fgpr.replyed_id=0")->field("fgpr.group_reply_id,fgpr.group_post_id,fgpr.replyed_id,fgpr.reply_content,fgpr.reply_time,u.uid,u.name,u.photo")->order("reply_time desc")->limit($Page->firstRow.','.$Page->listRows)->select();


		//随机获取十条该话题其他帖子，并显示查看的人数
		$click_num=$gpl->where("group_post_id={$gpid}")->getField("click_num");			//获取表中的字段信息
		$gpl->where("group_post_id={$gpid}")->setInc(click_num);						//每打开一次点击量加1
		$gid = $gdvlist[0]['gid'];														//获取饮食话题id号
		$gplist = $gpl->where("gid={$gid}")->limit("0,10")->order("rand()")->select();	//随机获取十条数据信息
		
		$this->assign("gdvlist",$gdvlist);			//帖子的内容
		$this->assign("gprlist",$gprlist);			//评论的内容
		$this->assign("gplist",$gplist);			//随机获取十条该话题其他帖子
		$this->assign("pageinfo",$show);			//输出页面信息
		$this->display("groupdetails");
		
	}
	
	//对话题信息内容评论内容进行添加
	public function toReply(){
		//判断用户是否登录
		if($_SESSION['user']['uid']!==null){
			$reply_content=htmlspecialchars($_POST['reply_content']);			//获取评论内容
			if(!empty($reply_content)){						//判断添加内容是否为空
				$gpreply=M("Group_post_reply");				//创建评论表的信息操作对象
				$_POST['name']=$_SESSION['user']['name'];	//获取评论人的名字
				$_POST['uid']=$_SESSION['user']['uid'];		//获取评论人的uid号
				$_POST['reply_time']=time();				//获取评论的时间
				$gpreply->create();							//封装要添加的信息
				$res = $gpreply->add();						//执行信息添加
				if($res){									//判断是否评论发表陈功
					$this->success("评论成功！");
				}else{
					$this->error("评论失败！");
				}
			}else{
				$this->error("评论内容不能为空");
			}			
		}else{
			$this->error("您还未登录，请先登录！");
		}
	}
	
	//执行喜欢话题投票的添加
	public function addlikenum(){
		$gplike = M("Group_post_like");				//创建话题喜欢表操作对象
		$grpid=(int)$_GET['group_post_id'];				//获取页面传来的帖子id号
		$uid = $_SESSION['user']['uid'];			//获取用户的uid号
		$_POST['group_post_id']=$grpid;				//转化数据传递方式
		$_POST['uid']=$uid;
		//判断用户是否登录
		if(empty($uid) || empty($grpid)){
			$this->error("您还没有登录，请先登录");
		}
		$gplikelist = $gplike->where("uid={$uid} and group_post_id={$grpid}")->select();
		if(!$gplikelist){
			$gplike->create();						//封装要添加的信息
			$gplikeres = $gplike->add();			//执行数据添加
			if($gplikeres){		
				$gp = M("Group_post");
				$gp->where("group_post_id={$grpid}")->setInc("like_num");		//喜欢数量加1
				$this->success("点赞成功");
			}else{
				$this->error("点赞失败");
			}
		}else{
			$this->error("您已经点过赞了");
		}
	}
	
	
	//浏览回复的信息
	 function replyed(){
		$replyed_id = $_POST['replyed_id'];
		$gu = M();									//实例化一个对象，没有对应任何数据
		$gures = $gu->query("select fgpr.group_reply_id,fgpr.group_post_id,fgpr.uid,fgpr.replyed_id,fgpr.reply_content,fgpr.reply_time,u.name,u.photo from wuyi_group_post_reply fgpr,wuyi_users u where fgpr.uid=u.uid and fgpr.replyed_id={$replyed_id}  order by reply_time desc limit 5 ");

		/* $gures= $gu->table("wuyi_group_post_reply fgpr,wuyi_users u")->order("reply_time desc")->where("fgpr.uid=u.uid and fgpr.replyed_id={$replyed_id}")->field("fgpr.group_reply_id,fgpr.group_post_id,fgpr.uid,fgpr.replyed_id,fgpr.reply_content,fgpr.reply_time,u.name,u.photo")->select(); */
		echo json_encode($gures);
	}
	
	//执行评论回复的操作
 	public function replyView(){
		$msg = array();
		$gprely = M("Group_post_reply");			//创建回复表信息操作对象
		//$u = M("Users");							//用户信息操作对象
		$_POST['uid'] = $_SESSION['user']['uid'];	//获取评论用户的uid号
		$_POST['name']= $_SESSION['user']['name'];
		//$_POST['group_post_id'] = $_POST[];
		$_POST['reply_time'] = time();				//回复时间
		$gpr = $gprely->create();					//封装回复信息
		if(!$gpr){
			$msg['error'] == $gprely->getError();
			echo json_encode($msg);
			exit();
		}
		$gprelyres = $gprely->add();				//执行信息添加
		
		if(!$gprelyres){
			$msg['error'] == "回复失败！";
			echo json_encode($msg);
			exit();
		}
		$list = $gprely->table("wuyi_users u,wuyi_group_post_reply gpr")->where("u.uid = gpr.uid")->field("u.name,u.uid")->select();
		
		$msg['group_post_reply_id'] = $gprelyres;
		$msg['uid'] = $list[0]['uid'];
		$msg['name'] = $list[0]['name'];
		$msg['reply_time'] = $_POST['reply_time'];
		$msg['reply_content'] = $_POST['reply_content'];
		echo json_encode($msg);
	
	}
}