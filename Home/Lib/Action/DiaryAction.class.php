<?php
class DiaryAction extends CommonAction{
	
	public function index(){
		$m = M();

		//查询24h热门分享
		$time = time()-24*3600;
		$list_time = $m->table("wuyi_diary diary, wuyi_users users")->where("diary.uid = users.uid and diary.addtime>{$time} and diary.state = 1")->field("diary.did as did, diary.title as title, diary.picture as picture, diary.click_num as click_num, users.uid as uid, users.name as name")->order("click_num desc")->limit("0,6")->select();//在规定时间内按点击量倒序查询
		$mod = M();
		//查询本周记录达人
		$time = time()-7*24*3600;
		$list_seven = $mod->query("select u.uid uid,u.name name,u.photo photo,count(d.did) count from wuyi_users u inner join wuyi_diary d on u.uid = d.uid and d.addtime>{$time} and d.state = 1 group by u.uid order by count desc limit 0,6");
		//查询关注人
		$m = M("attention");
		$auid = $_SESSION['user']['uid'];
		$list_atten = $m->where("auid = {$auid}")->field("uid")->select();
		$attens = array();
		foreach($list_atten as $atten){
			$attens[] = $atten['uid'];
		}


		$this->assign("list_time",$list_time);
		$this->assign("list_seven",$list_seven);
		$this->assign("list_atten",$attens);
		$this->display("index");
	}
	
	//分享首页列表信息
	public function diarylist(){
		$m = D("Diary");
		$type = $_GET['type'];
		import('ORG.Util.Page');// 导入分页类
		if(isset($type)){
			//查询分享
			$count = $m->relation(true)->where("state = 1 and type = {$type}")->order("addtime desc")->count();
			$Page = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
			$list = $m->relation(true)->where("state = 1 and type = {$type}")->order("addtime desc")->limit($Page->firstRow.','.$Page->listRows)->select();
			//计算总页数
			$totalPages=ceil($count/10);
			foreach($list as $k=>$v){
				$did=$v['did'];
				$uid=$v['uid'];
				$uname=M("users")->field("name,photo")->find($uid);
				$list[$k]['uname']=$uname['name'];
				$list[$k]['photo']=$uname['photo'];
				$count=M("diary_reply")->where("did={$did}")->count();
				$list[$k]['count']=$count;
			}
			$data=array("totalPages"=>$totalPages,"list"=>$list);
		}else{
			//查询全部分享
			$count = $m->relation(true)->where("state = 1")->order("addtime desc")->count();
			$Page = new Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
			$list = $m->relation(true)->where("state = 1")->order("addtime desc")->limit($Page->firstRow.','.$Page->listRows)->select();
			//计算总页数
			$totalPages=ceil($count/10);
			foreach($list as $k=>$v){
				$did=$v['did'];
				$uid=$v['uid'];
				$uname=M("users")->field("name,photo")->find($uid);
				$list[$k]['uname']=$uname['name'];
				$list[$k]['photo']=$uname['photo'];
				$count=M("diary_reply")->where("did={$did}")->count();
				$list[$k]['count']=$count;
			}
			$data=array("totalPages"=>$totalPages,"list"=>$list);
		}
		echo json_encode($data);
	}
	
	public function publish(){
	    if(!$_SESSION['user']){
	        $this->error("未登录,请登录后访问");
        }

		$this->display("publish");
	}
	
	//执行信息添加处理
	public function dopublish(){

	    //判断是否登录
        $uid = $_SESSION['user']['uid'];
        if(empty($uid) || $uid == " "){
            $this->error('请先登录','__APP__/Users/login');
        }

//        if(empty($_POST['photo']) || $_POST['photo'] == " "){
//            $this->error("请上传图片!");
//        }

       $image = $this->upload(1000000,'Public/uploads/diary/');

		$User = M("users");
		$uid = $_SESSION['user']['uid'];
        $picture = $image[0]['savename'];
		$Diary = M("diary");
		$_POST['type'] = (int)$_POST['type'];
        $_POST['title'] = htmlspecialchars($_POST['title']);
        $_POST['content'] = htmlspecialchars($_POST['content']);
		$_POST['picture']=$picture;
		$_POST['uid']=$uid;
		$_POST['addtime']=time();
		if($_POST['title'] != ""){
			$Diary->create();
			$result = $Diary->add();
			if($result){ //执行添加并判断
				//得到添加的did号并添加记录内容
				$Diary = M("diary_details");
				$_POST['did']=$result;
				if($_POST['content'] != ""){
					$Diary->create();
					$Diary->add();
				}
				$m = M("images");
				$_POST['table']="diary";
				$_POST['pid']=$result;
                $_POST['filename']=$picture;
                $m->create();
                $m->add();

				$this->success('添加成功', U('Diary/index'));
			}else{
                unlink($image[0]['savepath']."m_".$picture);
                unlink($image[0]['savepath']."p_".$picture);
                unlink($image[0]['savepath']."s_".$picture);
				$this->error('添加失败');
			}
		}else{
			$this->success('添加失败');
		}
	}
	
	//执行信息详情的显示
	public function detail(){
		$did = $_GET['did'];
		$uid = $_GET['uid'];
		$m = D("Diary");
		//分享详情查询
		$list = $m->relation(true)->where(array("did" => $did))->select();
		foreach($list as $k=>$v){
			$did=$v['did'];
			$uid=$v['uid'];
			$uname=M("users")->field("name,photo,sex")->find($uid);
			$list[$k]['uname']=$uname['name'];
			$list[$k]['photo']=$uname['photo'];
			$list[$k]['sex']=$uname['sex'];
			$count=M("diary")->where("uid={$uid}")->count();
			$list[$k]['count']=$count;
		}
		//$list = $m->table("wuyi_diary diary, wuyi_diary_details details")->where("diary.did = details.did and diary.did = {$did}")->field("diary.did, diary.title, diary.picture, details.content")->select();
		//查询图片
		//$list_img = $m->table("wuyi_diary d,wuyi_images i")->where("d.did = i.pid and i.table = 'diary' and i.pid = {$did}")->field("i.filename imgname")->select();
		
		//分享回复查询
		//import('ORG.Util.Page');// 导入分页类
		//import('ORG.Util.Page2');// 导入实际使用的分页类
		//$count = $m->table("wuyi_diary diary, wuyi_diary_reply reply, wuyi_users users")->where("diary.did = reply.did and diary.did = {$did} and reply.uid = users.uid and reply.replyed_id = 0")->count();// 查询满足要求的总记录数
		//$Page = new Page2($count,6);// 实例化分页类 传入总记录数和每页显示的记录数
		//$show = $Page->show();//分页显示输出
		//$list_reply = $m->table("wuyi_diary diary, wuyi_diary_reply reply, wuyi_users users")->where("diary.did = reply.did and diary.did = {$did} and reply.uid = users.uid and reply.replyed_id = 0")->field("diary.did, reply.content, reply.diary_reply_id dri, reply.uid, reply.addtime, users.photo, users.name")->order("reply.addtime desc")->limit($Page->firstRow.','.$Page->listRows)->select();
		
		$list_new= $m->where("uid={$uid} and state =1")->order("addtime desc")->limit("0,9")->select(); //根据uid查询最新分享
		$list_like= $m->where("uid={$uid} and state =1")->order("like_num desc")->limit("0,9")->select(); //根据uid查询最受欢迎分享
		$m = M();
		$list_user = $m->query("select u.uid uid, u.name uname, u.sex sex, u.photo photo, count(d.did) c from wuyi_users u, wuyi_diary d where u.uid = d.uid and d.uid = {$uid} group by d.uid");

		$this->assign("list",$list[0]);
		//$this->assign("list_img",$list_img);
		//$this->assign("list_reply",$list_reply);
		//$this->assign('page',$show);//赋值分页输出
		$this->assign("list_new",$list_new);
		$this->assign("list_like",$list_like);
		$this->assign("list_user",$list_user[0]);
		$this->display("detail");
	}
	
	//评论的显示
	function doReplyList(){
		$did = intval($_GET['did']);
		$m = D("Diary");
		import('ORG.Util.Page');// 导入分页类
		$count = $m->table("wuyi_diary diary, wuyi_diary_reply reply, wuyi_users users")->where("diary.did = reply.did and diary.did = {$did} and reply.uid = users.uid and reply.replyed_id = 0")->count();// 查询满足要求的总记录数
		$Page = new Page($count,6);// 实例化分页类 传入总记录数和每页显示的记录数
		//计算总页数
		$totalPages=ceil($count/6);
		$list = $m->table("wuyi_diary diary, wuyi_diary_reply reply, wuyi_users users")->where("diary.did = reply.did and diary.did = {$did} and reply.uid = users.uid and reply.replyed_id = 0")->field("diary.did, reply.content, reply.diary_reply_id dri, reply.uid, reply.addtime, users.photo, users.name")->order("reply.addtime desc")->limit($Page->firstRow.','.$Page->listRows)->select();
		$data=array("totalPages"=>$totalPages,"list"=>$list);
		echo json_encode($data);
	}
	
	/* //评论信息的显示
	public function replyDada(){
		$did = $_GET['did'];
		$uid = $_GET['uid'];
		//分享回复查询
		$m->M();
		import('ORG.Util.Page');// 导入分页类
		$count = $m->table("wuyi_diary diary, wuyi_diary_reply reply, wuyi_users users")->where("diary.did = reply.did and diary.did = {$did} and reply.uid = users.uid and reply.replyed_id = 0")->count();// 查询满足要求的总记录数
		$Page = new Page($count,6);// 实例化分页类 传入总记录数和每页显示的记录数
		$list = $m->table("wuyi_diary diary, wuyi_diary_reply reply, wuyi_users users")->where("diary.did = reply.did and diary.did = {$did} and reply.uid = users.uid and reply.replyed_id = 0")->field("diary.did, reply.content, reply.diary_reply_id dri, reply.uid, reply.addtime, users.photo, users.name")->order("reply.addtime desc")->limit($Page->firstRow.','.$Page->listRows)->select();
		//计算总页数
		$totalPages=ceil($count/6);
		$data=array("totalPages"=>$totalPages,"list"=>$list);
		echo json_encode($data);
	} */
	
	//回复中回复的显示 / 分页
	public function replylist(){
		$dri = $_GET['diary_reply_id'];
		$m = M();
		import('ORG.Util.Page');// 导入分页类
		$count = $m->Table("wuyi_diary_reply dr, wuyi_users u")->where("dr.uid = u.uid and dr.replyed_id = {$dri}")->count();// 查询满足要求的总记录数
		$Page = new Page($count,6);// 实例化分页类 传入总记录数和每页显示的记录数
		//$list = $m->query("select u.uid uid, u.name uname, u.photo photo,dr.diary_reply_id dri, dr.did did, dr.content content, dr.replyed_id rid, dr.addtime drtime from wuyi_diary_reply dr, wuyi_users u where dr.uid = u.uid and dr.replyed_id = {$dri}");
		$list = $m->Table("wuyi_diary_reply dr, wuyi_users u")->where("dr.uid = u.uid and dr.replyed_id = {$dri}")->field("u.uid uid, u.name uname, u.photo photo,dr.diary_reply_id dri, dr.did did, dr.content content, dr.replyed_id rid, dr.addtime drtime")->order("dr.addtime desc")->limit($Page->firstRow.','.$Page->listRows)->select();
		//计算总页数
		$totalPages=ceil($count/6);
		$data=array("totalPages"=>$totalPages,"list"=>$list);
		echo json_encode($data);
		exit();
	}
	
	//首页回复
	public function doreply(){
		$m = M("diary_reply");
		$_POST['uid'] = $_SESSION['user']['uid'];
		$_POST['content'] = htmlspecialchars($_POST['content']);
		$_POST['addtime'] = time();
		$did = intval($_POST['did']);
		$m->create();
		if($m->add()){ //执行添加并判断
			$res = $m->query("select count(diary_reply_id) count from wuyi_diary_reply where did={$did}");
			echo $res[0]['count'];
		}
	}
	
	//详情页回复
	public function dtdoreply(){
		$m = M("diary_reply");
		$_POST['uid'] = $_SESSION['user']['uid'];
		$_POST['addtime'] = time();
		$_POST['content'] = htmlspecialchars($_POST['content']);
		$time = date("Y-m-d H:i:s",time());
		$m->create();
		$res=$m->add();
		if($res){ //执行添加并判断
			$reply['dri']=$res;
			$reply['uid']=$_SESSION['user']['uid'];
			$reply['did']=$_POST['did'];
			$reply['uname']=$_SESSION['user']['name'];
			$reply['photo']=$_SESSION['user']['photo'];
			$reply['time']=$time;
			$reply['content']=$_POST['content'];
			echo json_encode($reply);
		}
		
	}
	
	//赞
	public function dolike(){
		$m = M("diary_like");
		$_POST['uid']=$_SESSION['user']['uid'];
		$drid = $_POST['drid'];
		$sel = $m->where("drid={$drid} and uid={$_POST['uid']}")->count();
		if($sel<=0){
			$m->create();
			$m->add();
			$m = M("diary");
			$m->where("did= {$drid} ")->setInc('like_num');
			$n = $m->where("did={$drid}")->find();
			$res = $n['like_num'];
			echo $res;
		}
	}
	
	//关注
	public function attention(){
		$m = M("attention");
		$_POST['auid']=$_SESSION['user']['uid'];
		$sel = $m->where("auid={$_POST['auid']} and uid={$_POST['uid']}")->count();
		if($sel<=0){
			$m->create();
			$res = $m->add();
			echo $res;
		}
	}


    private function upload($maxSize,$savePath){
        import('ORG.Net.UploadFile');
        $upload = new UploadFile();// 实例化上传类
        $upload->maxSize  = $maxSize ;// 设置附件上传大小
        $upload->saveRule = md5(time().rand(100000,999999));//上传文件的保存规则
        //缩略图处理
        $upload->thumb = true;               //进行图片缩放
        $upload->thumbPrefix = 'p_,m_,s_'; ;      //图片前缀名，多个之间加,
        $upload->thumbMaxWidth = '544,170,70';  //缩略图的最大宽度,多个使用逗号分隔
        $upload->thumbMaxHeight = '544,125,70';//缩略图的最大高度,多个使用逗号分隔
        $upload->thumbRemoveOrigin = true;   //删除原图
        $upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->savePath =  $savePath;// 设置附件上传目录
        if(!$upload->upload()) {// 上传错误提示错误信息
            return null;
//            echo $upload->getErrorMsg();
            //$this->error($upload->getErrorMsg());
        }else{// 上传成功 获取上传文件信息
            $info =  $upload->getUploadFileInfo();
            return $info;
        }

    }
}