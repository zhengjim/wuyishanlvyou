<?php
/**
 *------------------------------------------
 *	*前台话题首页浏览、加入话题、创建话题操作类
 *
*/

class GroupsAction extends CommonAction{
	//浏览显示所有题话
	public function index(){
		$gr = M("Groups");				//创建话题操作对象

		import("ORG.Util.Page");		//导入分页类
		import("ORG.Util.Page2");
		$total = $gr->where("state=1")->count();			//获取总数据条数
		$page = new Page($total,10);	//设置每页显示条数
		$page = new Page2($total,10);
		$show = $page->show();			//分页显示输出
		$res = $gr->where("state=1")->limit($page->firstRow.','.$page->listRows)->select();

		$this->assign("grlist",$res);
		$this->assign("pageinfo",$show);//输出页码信息
		$this->assign("total",$total);	//输出统计信息
		$this->display("groups");
		
	}
	
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
				if($res){				
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
	
	//用户创建话题
	public function addgroup(){
		$u = M("users");				//创建用户信息操作对象

		$uid=$_SESSION['user']['uid'];	//获取用户的id号
		$score = $u->where("uid={$uid}")->getField("score");	//获取score积分字段信息的值
        //var_dump($score);die;
		//判断用户是否登录
		if(empty($uid)){
			$this->error("您还没有登录，请先登录！");
		}
			
		//判断用户的积分是否满足创建话题条件
		if($score>=100){
			$this->display("groupfound");
		}else{
			$this->error("对不起！您积分不够100分，无权创建话题");
		}	
	}
	
	//执行话题信息添加
	public function ginsert(){
		$g = D("Groups");					//创建话题信息操作对象

		import("ORG.Net.UploadFile");		//导入文件上传类
		$gupload = new UploadFile();		//实例化上传类
		$gupload->maxSize = 3141592;		//设置上传文件大小
		$gupload->allowExts =array("jpg","gif","png","jpeg");		//设置上传文件类型
		$gupload->savePath = "./Public/uploads/groups/";			//设置上传文件路径
		$gupload->saveRule = time().rand(00000,99999);
		
		//对上传图片的缩放设置
		$gupload->thumb = true;				//对图片文件进行缩略图处理
		$gupload->thumbMaxWidth = '50,120';	//设置缩略图的最大宽度
		$gupload->thumbMaxHeight = '50,120';//设置缩略图的最大高度
		$gupload->thumbPrefix="s_,m_";		//设置图片的前缀
		$gupload->thumbRemoveOrigin=true;	//删除原图
		
		if(!$gupload->upload()){
			$this->error($gupload->getErrorMsg());		//上传错误提示错误信息
		}else{
			$info = $gupload->getUploadFileInfo();		//上传成功获取上传文件信息
			$_POST['group_pic']=$info[0]['savename'];	//获取上传图片的名字
		}

        $_POST['group_name'] = htmlspecialchars($_POST['group_name']);
        $_POST['group_intro'] = htmlspecialchars($_POST['group_intro']);
		$g->create();									//获取添加返回值
		$res = $g->add();								//执行添加
		if($res){
			$ugr = M("user_group");						//创建用户加入的话题的操作对象
			$gr = M("Groups");							//创建Group话题操作对象
			$_POST['uid']=$_SESSION['user']['uid'];
			$_POST['gid']=$res;
			$ugr->create();								//封装要添加的信息
			$ugr->add();						//执行添加
			$grouper_num = $gr->where("gid = {$res}")->getField("grouper_num");	//获取表中的字段
			$gr->where("gid = {$res}")->setInc(grouper_num);					//成员数量加1
		
			$this->success("创建成功,等待审核~",U("./MyGroup/index"));
		}else{
			$this->error("创建失败！话题名已存在");
		}
	}
}