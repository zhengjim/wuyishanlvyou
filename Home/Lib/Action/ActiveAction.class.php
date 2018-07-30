<?php
/**
+--------------------------------------------------------
* 相约武夷首页的调用
*
*/

class ActiveAction extends CommonAction{

	//相约武夷首页
	public function index(){
		//构造排序条件
		$orderlist = array(
			1 => "active_id desc",//按id排，也就是按发布时间排
			2 => "join_num desc",//按参加人数排序
		);

		$order = 'active_id desc';
		if($_GET['oid']){
			$order = $orderlist[intval($_GET['oid'])];
		}

        $_GET['type'] = intval($_GET['type']);
		($_GET['type']) ? $type = "Active.type = {$_GET['type']} and": $type = "";


            //构造查询条件
		$t = time();
		$where = "{$type} Active.state = 1 ";//type为了表示相约武夷

		import('ORG.Util.Page');// 导入分页原类
		import('ORG.Util.Page2');// 导入实际使用的分页类

		$Model = D('ActiveView');
		$count = $Model->where($where)->count();


		$page = new Page2($count,10);
		
		$list = $Model->where($where)->order($order)->limit($page->firstRow.','.$page->listRows)->select();
		//查出相约武夷美食图片并封装到$list中
		for($i = 0;$i < count($list);$i++){
			$m = M('Images');
			$resm = $m->where("aid = ".$list[$i]['id'])->order("id desc")->limit(4)->select();
			if($resm){
				$list[$i]['images'] = $resm;
			}
		}
		$this->assign('list',$list);
		$this->assign('page',$page->show());
		$this->assign('total',$count);

		$this->checkJoin();//判断是否已加入此饮食话题
		$this->display('index');
	}



	//武夷邀约查看
	public function view(){
		//调出武夷邀约基本信息
		$aid = intval($_GET['aid']);
		if(empty($aid) || $aid == " "){
		    $this->error("请输入活动号!");
        }
		$info = M('Active')->find($aid);
		$this->assign('info',$info);

		//图片调用
		if($info['type'] == 1){
			$resimg = M('Images')->where("aid = {$aid}")->select();

			if(count($resimg) > 0){
				$this->assign('imgtotal',count($resimg));
				$this->assign('imgList',$resimg);
			}
		}

		//调用出相约武夷的发起人
		$uid = $info['uid'];
		$u = M('Users')->find($uid);
		$this->assign('name',$u['name']);

		//调出相约武夷详细介绍
		$d = M('Active_details')->find($aid);
		$this->assign('content',$d['content']);

		//调用相约武夷下面的讨论帖
		import('ORG.Util.Page');// 导入分页原类
		import('ORG.Util.Page2');// 导入实际使用的分页类
		$pl = D('ActivePostView');
		$count = $pl->where("Active_post.aid = {$aid}")->count();
		$page = new Page2($count,10);
		$post = $pl->where("Active_post.aid = {$aid}")->order('addtime desc')->limit($page->firstRow.','.$page->listRows)->select();
		if(count($post) > 0){
			$this->assign("postlist",$post);
			$this->assign('page',$page->show());
		}

		$this->checkJoin($aid);//判断是否已加入此话题
        //var_dump($info);die;
		$this->display('view');
	}

	//判断是否加入饮食话题
	public function checkJoin($aid = ""){
		//判断当前登录用户是否已加入此饮食话题
		$state = "";//初始化加入状态，用于前台判断调用
		$thisuid = $_SESSION['user']['uid'];
		if($thisuid){
			$m = M('Users_active');
			$res = $m->where(array('uid'=>$thisuid,'aid'=>$aid))->select();#"uid = {$thisuid} and aid = {$aid}"
			if($res){
				$state = 1;
			}else{
				$state = -1;
			}
		}else{
			$state = -1;
		}
		$this->assign('join_state',$state);

	}

	//邀请讨论查看
	public function post(){
		$pid = intval($_GET['pid']);

		//调用文章的基本信息及发布人信息
		$p = D('ActivePostView');
		$info = $p->where("Active_post.active_post_id = {$pid}")->select();
		$this->assign('info',$info[0]);

		//调用相约武夷讨论的详情内容
		$c = M('Active_post_details')->find($pid);
		$this->assign('content',$c['content']);		

		//讨论图片的调用
		$im = M('Images');
		$imglist = $im->where("pid = {$pid}")->select();

		if(count($imglist)){
			$this->assign('imglist',$imglist);
		}

		//讨论回复的调用
		$r = D('ActivePostReplyView');
		import('ORG.Util.Page');// 导入分页原类
		import('ORG.Util.Page2');// 导入实际使用的分页类
		$count = $r->where("Active_reply.active_post_id = {$pid}")->count();
		$page = new Page2($count,5);
		$rlist = $r->where("Active_reply.active_post_id = {$pid}")->order("Active_reply.reply_time desc")->limit($page->firstRow.','.$page->listRows)->select();
		$this->assign('rlist',$rlist);
		$this->assign('page',$page->show());


		//相约武夷名称和id的调用
		$aid = $info[0]['aid'];
		$ainfo = M('Active')->field('active_id,active_name')->find($aid);
		$this->assign('ainfo',$ainfo);

		//右侧同相约武夷讨论内容调用
		$p = D('ActivePostView');
		$plist = $p->where("Active_post.aid = {$aid}  and Active_post.active_post_id != {$pid}")->limit(10)->select();
		$this->assign('plist',$plist);

		$this->display('post');
	}

	//相约武夷讨论添加
	public function addPost(){
		//判断是否登录
		$_POST['uid'] = $_SESSION['user']['uid'];
		if(empty($_POST['uid'])){
			$this->error('请先登录',__APP__."/Users/login");
			exit();
		}
        $_GET['aid'] = intval($_GET['aid']);
		if(empty($_GET['aid']) || $_GET['aid'] == " "){
            $this->error("请输入正确的活动号!");
        }

		$active_name = M('Active')->where("active_id = {$_GET['aid']}")->getField('active_name');
		$this->assign('active_name',$active_name);
		$this->display('addPost');
	}

	//执行文章添加，
	public function insertPost(){

        $image = $this->upload(1000000,'Public/uploads/active/');
        $picture = $image[0]['savename'];
        $path = $image[0]['savepath'];



		//判断是否登录
		$_POST['uid'] = $_SESSION['user']['uid'];
		if(empty($_POST['uid'])){
			$this->delImgs($path,$picture);
			$this->error('请先登录',__APP__."/Users/login");
			exit();
		}

		//判断是否选择邀约，即是否有aid
		if(empty($_POST['aid']) || $_POST['aid'] == " "){
            $this->delImgs($path,$picture);
			$this->error('请选择在哪个邀约下发布讨论');
			exit();
		}

		$m = D('ActivePost');

		//基本数据的添加(到active_post表)
		$res = $m->create();//创建数据对象
		if(!$res){
            $this->delImgs($path,$picture);
			$this->error($m->getError());
			exit();
		}

        $_POST['aid'] = intval($_POST['aid']);
        $_POST['title'] = htmlspecialchars($_POST['title']);
        $_POST['content'] = htmlspecialchars($_POST['content']);

		$resa = $m->add();//执行数据插入
		if(!$resa){
            $this->delImgs($path,$picture);
			$this->error('添加失败');
			exit();
		}

		//如果主表数据插入成功
		//第一步把讨论内容保存到active_post_details中
		if(count(trim($_POST['content'])) > 0){
			$_POST['content'] = trim($_POST['content']);
			$_POST['active_post_id'] = $resa;
			$d = M('Active_post_details');
			$resdc = $d->create();//创建向active_post_details插入的数据对象
			if(!$resdc){
				$m->delete($resa);//如果内容保存失败把主表的这条信息也删除
                $this->delImgs($path,$picture);
				$this->error($d->getError());
				exit();
			}
			//插入讨论内容，如果成功继续向下执行，如果失败删除主表中的数据
			$resda = $d->add();
			if(!$resda){
				$m->delete($resa);
                $this->delImgs($path,$picture);
				$this->error('内容添加失败');
				exit();
			}
		}
        if($picture) {
            $m = M("images");
            $_POST['filename'] = $picture;
            $_POST['table'] = "active_post";
            $_POST['pid'] = $resa;
            $_POST['aid'] = intval($_POST['aid']);
            $m->create();
            $m->add();
        }
		//前面的所有执行成功，作成功提示
		$this->success('添加成功',U("/Active/view/aid/{$_POST['aid']}"));


	}

	//邀约发讨论的时候上传图片
	public function doUpload(){
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 3145728 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  '../Public/uploads/active/';// 设置附件上传目录
		$info = "";
		if(!$upload->upload()) {// 上传错误提示错误信息
			echo  $upload->getErrorMsg();
			//$this->error($upload->getErrorMsg());
		}else{// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
			echo "<script>doUpload('".$info[0]['savename']."');</script>";
		}
		
	}

	
	//讨论回复
	public function toReply(){
		//回复的插入
		$m = M('Active_reply');
		$data['active_post_id'] = intval($_POST['pid']);
		$data['reply_time'] = time();
		$data['uid'] = intval($_POST['uid']);
		$data['replyed_id'] = 0;
		$data['reply_content'] = htmlspecialchars(trim($_POST['content']));
		$res = $m->add($data); //讨论回复的添加
		//如果操作没有成功退出
		if(!$res){
			exit("回复失败");
		}else
		{
			$rid = $res;//如果插入成功则取出回复的id
		}

		//更新讨论的回复的数量
		$ornum = $_POST['ornum'];//更新前的讨论的回复数量
		$pdata['reply_num'] = $ornum + 1;
		$p = M('Active_post');
		$resp = $p->where(array('active_post_id'=>$_POST['pid']))->save($pdata);
		//如果操作没有成功则退出
		if(!$resp){
			$m->delete($rid);//操作失败的话删除已添加的回复
			exit();
		}

		//调出新增的回复，这里是利用现有数据进行拼装
		$newr['uid'] = $_SESSION['user']['uid'];//回复人id
		$newr['uname'] = $_SESSION['user']['name'];//回复人名字
		$newr['photo'] = $_SESSION['user']['photo'];//回复人头像
		$newr['rtime'] = date("Y-m-d H:i:s",$data['reply_time']);//回复时间
		$newr['nrnum'] = $pdata['reply_num'];//新的回复数量
		$newr['content'] = $data['reply_content'];//回复内容
		echo json_encode($newr);
	}


	/**
	*  join()   加入邀请的方法
	*  @param   int $aid 邀请id号
	*  @return  操作的结果，直接输出结果
	* 
	*/
	public function join($aid){
		$msg = array();
		$aid = intval($_POST['aid']);

		//判断邀请是否关闭或是否结束
		$astate = M('Active')->where("active_id = {$aid}")->getField('state');
		if($astate < 1){
			$msg['msg'] = 'close';
			exit();
		}

		//这个地方通过session再对用户登录进行验证
		$uid = $_SESSION['user']['uid'];
		if(empty($uid) || $uid == " "){
			$msg['msg'] = 'no-login';
			exit();
		}

		//查看是否已经加入邀请
		$yres = M('Users_active')->where("uid = {$uid} && aid = {$aid}")->select();
		if($yres){
			$msg['msg'] = 'logined';
			exit();//如果数据存在说明已加入，退出
		}

		//在users_active中插入用户对邀请的关联数据
		$ua = M('users_active');
		$_POST['uid'] = $uid;
		$_POST['aid'] = $aid;
		$res = $ua->create();//由POST创建数据对象
		if(!$res){
			$msg['msg'] = 'error';
			exit();
		}
		$resadd = $ua->add();//执行数据添加
		if(!$resadd){
			$msg['msg'] = 'error';
			exit();
		}

		//如果上面的数据插入成功，则在活动表中对join_num加1
		//为数据安全通过获取到的aid查出当前活动的join_num
		$a = M('active');
		$ojnum = $a->where("active_id = {$aid}")->getfield('join_num');
		$data['join_num'] = $ojnum + 1;
		$jres = $a->where("active_id = {$aid}")->save($data);
		$msg['njnum'] = $data['join_num'];
		if(!$jres){
			$ua->where("uid = {$uid} and  aid = {$aid}")->delete();//操作失败的话删除已添加的回复
			$msg['msg'] = 'error';
			exit();		
		}else{
			$msg['msg'] = 'success';
		}
		echo json_encode($msg);

	}


	/**
	*  dropOut()   退出邀请方法
	*  @param   int $aid 邀请的id号
	*  @return  操作的结果，直接输出结果
	* 
	*/
	public function dropOut($aid){
		$aid = intval($_POST['aid']);
		$uid = $_SESSION['user']['uid'];//获取当前用户的id

		//在active表中给当前邀请的join_num减1
		$a = M('Active');
		$ojnum = $a->where("active_id ={$aid}")->getField('join_num');//获取当前邀请的参加人数

        $data['join_num'] = $ojnum - 1;

		$a->where("active_id = {$aid}")->save($data);

        $msg['njnum'] = $data['join_num'];

		//删除用户对活动表中对应的数据
		$au = M('Users_active');
		$res = $au->where("uid = {$uid} and aid = {$aid}")->delete();
		if(!$res){
			$_POST['join_num'] = $ojnum;
			$a->save();
			$msg['msg'] = 'error';
			exit();
		}else{
			$msg['msg'] = 'success';
		}

		//对返回结果进行json封装
		echo json_encode($msg);


	}


	/* 
	*  //关闭邀请操作
	*  @param   int $aid 直接通过post传过来
	*  @return  操作的结果，直接输出结果
	* 
	*/
	public function toClose(){
		$aid = intval($_POST['aid']);
		$data['state'] = -1;
		$m = M('Active');
		$res = $m->where('active_id = {$aid}')->save($data);
		echo "关闭该活动成功";
	}

    private function upload($maxSize,$savePath){
        import('ORG.Net.UploadFile');
        $upload = new UploadFile();// 实例化上传类
        $upload->maxSize  = $maxSize ;// 设置附件上传大小
        $upload->saveRule = md5(time().rand(100000,999999));//上传文件的保存规则
        //缩略图处理
        $upload->thumb = true;               //进行图片缩放
        $upload->thumbPrefix = 'p_,p_s_'; ;      //图片前缀名，多个之间加,
        $upload->thumbMaxWidth = '700,100';  //缩略图的最大宽度,多个使用逗号分隔
        $upload->thumbMaxHeight = '700,100';//缩略图的最大高度,多个使用逗号分隔
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

