<?php
/**
 *------------------------------------------
 *	*前台用户发布话题的操作类
 *
*/

class AddGroupPostAction extends CommonAction{

    public function _initialize(){
        //判断是否登录
        $uid = $_SESSION['user']['uid'];
        if(empty($uid) || $uid == " "){
            $this->error('请先登录','__APP__/Users/login');
        }
    }

	//浏览话题发布页面
	public function index(){

		$g =M("Groups");
		$gid = intval($_GET['gid']);
		$uid = $_SESSION['user']['uid'];
		
		$group_name = $g->where("gid = {$gid}")->getField("group_name");
		$groupres = D("UserGroupView")->where("User_group.uid = {$uid}")->select();
		
		$this->assign("group_name",$group_name);
		$this->assign("groupres",$groupres);
		$this->display("addgrouppost");
	}

	//执行用户加入话题
	public function agpinsert(){
		 //判断用户是否登录和是否加入该话题
		 $u = M("Users");
		 $uid=$_SESSION['user']['uid'];		 
		 if(!empty($uid)){
			$g = M("User_group");
			$gid=intval($_GET['gid']);
			$gres = $g->where("gid={$gid} and uid={$uid}")->select();
			if($gres){
				$groupres = D("UserGroupView")->where("User_group.uid = {$uid}")->select();
				$this->assign("groupres",$groupres);
				$this->display("addgrouppost");
			}else{
				$this->error("您还没有加入该话题，无权发布帖子！");
			}
		 }else{
			$this->error("您还没有登录，请先登录");
		 } 	
	}		
	
	//执行话题发布添加
	public function insert(){

		$grpo = M("Group_post");					//创建话题发布信息操作对象
		$_POST['uid']=$_SESSION['user']['uid'];		//获取用户的id号
        $_POST['post_title'] =htmlspecialchars($_POST['post_title']);
		$_POST['addtime']=time();
		$_POST['descripition']=substr($_POST['content'],0,200);	//获取截取后的发布内容
        $_POST['descripition'] =htmlspecialchars($_POST['descripition']);
		$gid = intval($_POST['gid']);
		//dump($gid);
		if($gid!=0){
			$rescp = $grpo->create();
			if(!$rescp){								//判断是否创建成功
				echo $grpo->getError();
			}else{
				$grpores = $grpo->add();
			}
		}else{
			$this->error("话题名不能为空");
		}	
		
		//判断是否发布成功
		if($grpores){
			$gpde = M("Group_post_details");		//创建话题详情表信息操作对象
			$_POST['group_post_id']=$grpores;
			$_POST['content']=htmlspecialchars($_POST['content']);
			$gpde->create();
			$gpderes = $gpde->add();
			$this->success("发布成功",U("./MyPost/index"));
		}else{
			$this->error("发布失败，内容不能为空");
		}

	}
	
}