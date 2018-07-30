<?php
 /**
 +----------------------------------------------------------------------------------
  * 前台用户登陆注册操作
 */
class UsersAction extends CommonAction{
	public function index()    //用户首页浏览
	{
        //判断是否登录
             $uid = $_SESSION['user']['uid'];
        if(empty($uid) || $uid == " "){
            $this->error('请先登录','__APP__/Users/login');
        }

		$user=M("users");   //用户表变量赋值
		$this->assign("list",$user->select());  //向用户界面放值
		$this->display("index");  //跳转到用户首页
	}
    Public function verify(){
        import('ORG.Util.Image');
        Image::buildImageVerify();
    }
	public function register()   //注册
	{
		$p=M("province");
		$list=$p->select();
		$this->assign("list",$list);
		$this->display("register");   //转到
	}
	public function doLoad(){
		$mod = M("City");
		$list = $mod->where(array('province_id'=>intval($_POST['pid'])))->select();
		echo json_encode($list);
	}
	public function doRegister()  //执行注册操作
	{
		if($_SESSION['verify'] != md5($_POST['usercode'])) {
			$this->error('验证码错误！');
		}
		$user= D("Users");   //用户表变量赋值
        $_POST['level']=1;
        $_POST['score']=100;
		$_POST=array_slice($_POST,0,5);   //筛选post
		$_POST['pass']=md5($_POST['pass']);  //加密密码
		$_POST['addtime']=time();        //添加时间
		$_POST['state']=2;             //状态
		$_POST['city']=intval($_POST['city']);
		unset($_POST['pid']);
		unset($_POST['usercode']);
		if(!$user->create()){
			$this->error($user->getError());
		}
		// 根据表单提交的POST数据创建数据对象
		if(!$user->create()){    //自动验证
			exit($user->getError());
		}
		if($user->add($_POST))   //添加成功判断
		{
			if($_POST['city']==0){
				$this->error('请选择城市');
			}else{
				//添加成功   
			$this->success('注册成功',U('Users/login'));
			}
		}else
		{
            $this->error('注册失败');
		}
	}
	public function loginOut()  //退出
	{
		unset($_SESSION['user']);   //消除用户的session
		echo "<script>";
		echo "window.location.href='".__APP__."'";  //返回首页
		echo "</script>";
	}

	public function login()     //登录操作
	{
		$this->display("login");
	}

	public function doLogin()    //执行登陆操作
	{
        if($_SESSION['verify'] != md5($_POST['usercode'])) {
            $this->error('验证码错误！');
        }

		$user=M("users");   //用户表变量赋值
		if(count($_POST)>0){
			$email=$_POST['email'];
			$pass=md5($_POST['pass']);
			$list=$user->where(array('email'=>$email,'pass'=>$pass))->select(); //数据库连贯操作
			if(count($list)>0)   //登陆成功
			{
				$_SESSION['user']=$list[0];
					if($_SESSION['user']['state']==2){
						$this->success("登陆成功",U("Users/myshow"));

					}else{
						unset($_SESSION['user']);
						header("Location:".__ROOT__.'/index.php/Users/login?e=1');
					}
					
			}else{ //登录失败
                header("Location:".__ROOT__.'/index.php/Users/login?e=2');
				}

			} 
			else
		{
			//登录失败
			header("Location:".__ROOT__.'/index.php/Users/login?e=2');
		}
	}

	public function doLogins()    //执行登陆操作(弹框)
	{
        if($_SESSION['verify'] != md5($_POST['usercode'])) {
            exit("verfail");
        }

		$user=M("users");   //用户表变量赋值
		if(count($_POST)>0){
			$email=$_POST['email'];
			$pass=md5($_POST['pass']);
			$list=$user->where(array('email'=>$email,'pass'=>$pass))->select(); //数据库连贯操作
			if(count($list)>0)   //登陆成功
			{
				$_SESSION['user']=$list[0];
				if($_SESSION['user']['state']==2){
                    exit("ok");

				}else{
					unset($_SESSION['user']);
                    exit("close");
				}
					
			}else{ //登录失败
                exit("error");
			}
				
				
		}else
		{
			//登录失败
            exit("error");

		}
	}

	public function getProvince(){
		$mod = M("City");
		$p=M("province");
		$list=$p->select();
		dump($list);
	}
	public function usersInfo()    //用户个人中心
	{
		if(!isset($_SESSION['user'])){
			$this->display("login");
			exit();
		}
		$mod = M("City");
		$p=M("province");
		$list=$p->select();
		$clist=$mod->where("id={$_SESSION['user']['city']}")->select();
		$this->assign("clist",$clist);
		$this->assign("list",$list);
		$a=array();
		for($i=10;$i<100;$i++){
			$a[]=$i;
		}
		$this->assign("sel",$a);
		$this->display("usersinfo");
	}
	public function headUpload()  //头像上传操作
	{
        //判断是否登录
        $uid = $_SESSION['user']['uid'];
        if(empty($uid) || $uid == " "){
            $this->error('请先登录','__APP__/Users/login');
        }

		$this->display("headupload");
	}
	public function doUpload()   //执行头像上传
	{

        //判断是否登录
        $uid = $_SESSION['user']['uid'];
        if(empty($uid) || $uid == " "){
            $this->error('请先登录','__APP__/Users/login');
        }

		$user = M("users"); // 实例化users对象
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = 200000 ;// 设置附件上传大小
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  './Public/uploads/header/';// 设置附件上传目录
		//对图片进行缩放处理
		$upload->thumb = true;
		$upload->thumbMaxWidth = '48,160';  //尺寸
		$upload->thumbMaxHeight = '48,169';
		$upload->thumbPrefix="s_,m_";  //图像前缀名
		$upload->thumbRemoveOrigin=true;  //删除原图
		$upload->saveRule=time();
		if(!$upload->upload()) {
			// 上传错误提示错误信息
			$this->error($upload->getErrorMsg());
		}else{
			$a=array();
			for($i=10;$i<100;$i++){
				$a[]=$i;
			}
			$this->assign("sel",$a);
			unlink("../Public/uploads/header/m_".$_SESSION['user']['photo']);  //删除原来的头像的资源
			unlink("../Public/uploads/header/s_".$_SESSION['user']['photo']);
			// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
			//获取文件名
			$name=$info[0]['savename'];
			$data['photo'] = $name;
			//$clist=$mod->where("id={$_SESSION['user']['city']}")->select();
			//$this->assign("clist",$clist);
			$user->where("uid='".$_SESSION['user']['uid']."'")->save($data);  //修改用户数据
			$list=$user->where("uid='".$_SESSION['user']['uid']."'")->select();  //查询用户的信息
			$_SESSION['user']=$list[0];    //更新用户session
		}
		$this->success('更新成功',U('Users/usersinfo'));
	}
	public function editInfo()   //修改用户信息
	{

        //判断是否登录
        $uid = $_SESSION['user']['uid'];
        if(empty($uid) || $uid == " "){
            $this->error('请先登录','__APP__/Users/login');
        }

		$user=D("Users");   //用户表变量赋值
        $a=array();
        for($i=10;$i<100;$i++){
            $a[]=$i;
        }
		$this->assign("sel",$a);
		unset($_POST["__hash__"]);
		$_POST['city']=intval($_POST['city']);
		if($_POST['city']==0){
			$_POST['city']=$_SESSION['user']['city'];
		}
        $_POST['name']=htmlspecialchars($_POST['name']);
        $_POST['sex'] = intval($_POST['sex']);
        $_POST['age'] = intval($_POST['age']);
		unset($_POST['pid']);

		// 根据表单提交的POST数据创建数据对象
		$user->where("uid='".$_SESSION['user']['uid']."'")->data($_POST)->save(); // 根据条件保存修改的数据
		$list=$user->where("uid='".$_SESSION['user']['uid']."'")->select();  //查询用户的信息
		$_SESSION['user']=$list[0];    //更新用户session
		$this->success('更新成功',U('Users/usersinfo'));
	}
	public function editEmail()   //修改邮箱
	{
        //判断是否登录
        $uid = $_SESSION['user']['uid'];
        if(empty($uid) || $uid == " "){
            $this->error('请先登录','__APP__/Users/login');
        }

		$this->display("editemail");
	}
	public function updateEmail()  //修改邮箱操作
	{

        //判断是否登录
        $uid = $_SESSION['user']['uid'];
        if(empty($uid) || $uid == " "){
            $this->error('请先登录','__APP__/Users/login');
        }

		$user=D("Users");   //用户表变量赋值
		$_POST=array_slice($_POST,0,1);   //筛选post
		if(!$user->create()){              //自动验证
			$this->error($user->getError());
		}
		$user->where("uid='".$_SESSION['user']['uid']."'")->data($_POST)->save(); // 根据条件保存修改的数据
		$list=$user->where("uid='".$_SESSION['user']['uid']."'")->select();  //查询用户的信息
		$_SESSION['user']=$list[0];    //更新用户session
		$this->success('更新成功',U('Users/usersinfo'));
	}
	public function editPhone()   //修改电话
	{
        //判断是否登录
        $uid = $_SESSION['user']['uid'];
        if(empty($uid) || $uid == " "){
            $this->error('请先登录','__APP__/Users/login');
        }

		$this->display("editphone");
	} 
	public function updatePhone()  //修改电话操作
	{
        //判断是否登录
        $uid = $_SESSION['user']['uid'];
        if(empty($uid) || $uid == " "){
            $this->error('请先登录','__APP__/Users/login');
        }

		$user=D("Users");   //用户表变量赋值
		$_POST=array_slice($_POST,0,1);   //筛选post
		if(!$user->create()){            //自动验证
			$this->error($user->getError());
		}
		$user->where("uid='".$_SESSION['user']['uid']."'")->data($_POST)->save(); // 根据条件保存修改的数据
		$list=$user->where("uid='".$_SESSION['user']['uid']."'")->select();  //查询用户的信息
		$_SESSION['user']=$list[0];    //更新用户session
		$this->success('更新成功',U('Users/usersinfo'));
	}
	public function editPass()    //修改密码
	{
        //判断是否登录
        $uid = $_SESSION['user']['uid'];
        if(empty($uid) || $uid == " "){
            $this->error('请先登录','__APP__/Users/login');
        }

		$this->display("editpass");
	}
	public function updatePass()   //执行修改密码的操作
	{

        //判断是否登录
        $uid = $_SESSION['user']['uid'];
        if(empty($uid) || $uid == " "){
            $this->error('请先登录','__APP__/Users/login');
        }

		$user=D("Users");   //用户表变量赋值

        if($_POST['pass1'] != $_POST['pass2']){
            $this->error('两次密码不一致!');
        }

        $oldpass  = md5($_POST['oldpass']);
        $result = $user->where("uid='".$_SESSION['user']['uid']."'")->field('pass')->select();
        if($oldpass != $result[0]["pass"]){
            $this->error('原密码错误!');
        }


		$_POST['pass']=md5($_POST['pass1']);
		$_POST=array_slice($_POST,3,1);   //筛选post
		$user->where("uid='".$_SESSION['user']['uid']."'")->data($_POST)->save(); // 根据条件保存修改的数据
		$list=$user->where("uid='".$_SESSION['user']['uid']."'")->select();  //查询用户的信息
		$_SESSION['user']=$list[0];    //更新用户session
		$this->success('更新成功',U('Users/usersinfo'));
	}

	public function myShow()  //个人中心首页显示
	{
        //判断是否登录
        $uid = $_SESSION['user']['uid'];
        if(empty($uid) || $uid == " "){
            $this->error('请先登录','__APP__/Users/login');
        }


		$uid = $_SESSION['user']['uid'];  //用户的id
		$myActive = "";   //拼装id号的字串
		$alist = M('Users_active')->where("uid = {$uid}")->select();  //查找uid对应的文章id信息
		foreach($alist as $v){
			$myActive .= ",".$v['aid'];                //执行拼装文章id
		} 
		$myActive = trim($myActive,",");      

		import('ORG.Util.Page');// 导入分页原类
		import('ORG.Util.Page2');// 导入实际使用的分页类
		$mod = D("UsersView");
		$count = $mod->where("Active_post.aid = Active.active_id and (Active.active_id in ({$myActive}))")->count();
		$page = new Page2($count,6);
		$list = $mod->order('Active_post.addtime desc')->where("Active_post.aid = Active.active_id and (Active.active_id in ({$myActive}))")->limit($page->firstRow.','.$page->listRows)->select();
		$l=$list[0]['last_edit_time'];
		$t=$this->gettime($l);
		$this->assign("list",$list);
		$this->assign('page',$page->show());  //放置分页信息
		$this->assign("m",$t);
		$this->display("index");
	}
	public function myGroup(){   //参加话题的帖子动态

        //判断是否登录
        $uid = $_SESSION['user']['uid'];
        if(empty($uid) || $uid == " "){
            $this->error('请先登录','__APP__/Users/login');
        }

		import('ORG.Util.Page');// 导入分页原类
		import('ORG.Util.Page2');// 导入实际使用的分页类
		$uid = $_SESSION['user']['uid'];  //用户的id
		$myGroup = "";   //拼装id号的字串
		$glist = M('User_group')->where("uid = {$uid}")->select();  //查找uid对应的话题id信息
		foreach($glist as $v){
			$myGroup .= ",".$v['gid'];                //执行拼装话题id
		} 
		$myGroup = trim($myGroup,","); 

		$mod = D("GroupsView");
		$count = $mod->where(" Groups.gid in ({$myGroup})")->count();
		$page = new Page2($count,6);
		$list = $mod->order('Group_post.addtime desc')->where("Groups.gid in ({$myGroup})")->limit($page->firstRow.','.$page->listRows)->select();
		$l=$list[0]['addtime'];
		$t=$this->gettime($l);
		$this->assign("list",$list);
		$this->assign('page',$page->show());  //放置分页信息
		$this->assign("m",$t);
		$this->display("groups");
	}
	public function diaryReply(){   //分享回复

        //判断是否登录
        $uid = $_SESSION['user']['uid'];
        if(empty($uid) || $uid == " "){
            $this->error('请先登录','__APP__/Users/login');
        }

		import('ORG.Util.Page');// 导入分页原类
		import('ORG.Util.Page2');// 导入实际使用的分页类
		$mod = D("DiaryView");
		$count = $mod->where("Diary.uid = {$_SESSION['user']['uid']}")->count();
		$page = new Page2($count,6);
		$list = $mod->order('Diary_reply.addtime desc')->where("Diary.uid = {$_SESSION['user']['uid']}")->limit($page->firstRow.','.$page->listRows)->select();
		$l=$list[0]['addtime'];
		$t=$this->gettime($l);
		$this->assign('page',$page->show());  //放置分页信息
		$this->assign("list",$list);
		$this->assign("m",$t);
		$this->display("diaryreply");
	}
	public function talkReply(){   //我发布的话题回复

        //判断是否登录
        $uid = $_SESSION['user']['uid'];
        if(empty($uid) || $uid == " "){
            $this->error('请先登录','__APP__/Users/login');
        }

		import('ORG.Util.Page');// 导入分页原类
		import('ORG.Util.Page2');// 导入实际使用的分页类
		$mod = D("TalkView");
		$count = $mod->where("Group_post.uid = {$_SESSION['user']['uid']}")->count();
		$page = new Page2($count,6);
		$list = $mod->order('Group_post_reply.reply_time desc')->where("Group_post.uid = {$_SESSION['user']['uid']}")->limit($page->firstRow.','.$page->listRows)->select();
		$l=$list[0]['reply_time'];
		$t=$this->gettime($l);
		$this->assign('page',$page->show());  //放置分页信息
		$this->assign("list",$list);
		$this->assign("m",$t);
		$this->display("talkreply");
	}
	public function activeReply(){  //文章讨论的回复

        //判断是否登录
        $uid = $_SESSION['user']['uid'];
        if(empty($uid) || $uid == " "){
            $this->error('请先登录','__APP__/Users/login');
        }

		import('ORG.Util.Page');// 导入分页原类
		import('ORG.Util.Page2');// 导入实际使用的分页类
		//使用自定义视图
		$mod = D("ExerciseView");
		$count = $mod->where("Active_post.uid = {$_SESSION['user']['uid']}")->count();
		$page = new Page2($count,6);
		$list = $mod->order('Active_reply.reply_time desc')->where("Active_post.uid = {$_SESSION['user']['uid']}")->select();
		$l=$list[0]['reply_time'];
		$t=$this->gettime($l);
		$this->assign('page',$page->show());  //放置分页信息
		$this->assign("list",$list);
		$this->assign("m",$t);
		$this->display("activereply");
	}


	/**
	 * myActive()  我参加的所有邀请列表
	 * @author     zhengjianmin
	 * @return     void
	 *
	 **/
	public function myActive(){
		//判断是否登录
		$uid = $_SESSION['user']['uid'];
		if(empty($uid) || $uid == " "){
			$this->error('请先登录','__APP__/Users/login');
		}

		//判断是我发起的文章还是我参加的文章，$type == 'c'则为我发起的文章
		$type = $_GET['type'];
		
		if($type == 'c'){
			//取出我发起的所有文章
			$m = D('Active');
			$where = "state = 1 and uid = {$uid}";
		}else{
			//取出我参加的所有文章
			$m = D('UsersActiveView');
			$where = "Active.state = 1 and Users_active.uid = {$uid}";
		}

		import('ORG.Util.Page');// 导入分页原类
		import('ORG.Util.Page2');// 导入实际使用的分页类
		$count = $m->where($where)->count();
		$page = new Page2($count,5);
		$alist = $m->where($where)->limit($page->firstRow.','.$page->listRows)->select();

		$this->assign("alist",$alist);
		$this->assign('page',$page->show());  //放置分页信息

		$this->display('myActive');
	}


	/**
	 * addActive()  发起文章
	 * @author      zhengjianmin
	 * @return      void
	 *
	 **/
	public function addActive(){
		//判断是否登录
		$uid = $_SESSION['user']['uid'];
		if(empty($uid) || $uid == " "){
			$this->error('请先登录','__APP__/Users/login');
		}

		//查出用户的常住城市id及城市名
		$city = array();
		$city['id'] = M('Users')->where("uid = {$uid}")->getField('city');
		$city['name'] = M('City')->where("id = {$city['id']}")->getField('name');

		$this->assign('city',$city);

		//调用所有省
		$province = M('Province')->select();
		$this->assign('province',$province);
		$this->display('addActive');

	}
	
	/**
	 * createActive()  执行文章发起  美食、景点放在一起靠传过来的$_POST['type']区别，1为美食，2为景点
	 * @author         zhengjianmin
	 * @return         void
	 *
	 **/
	public function createActive(){
		//判断是否登录
		$uid = $_SESSION['user']['uid'];
		if(empty($uid) || $uid == " "){
			$this->error('请先登录','__APP__/Users/login');
		}

		//构造$_POST数据
		$_POST['start_time'] = strtotime($_POST['start_time']);//开始时间处理
		$_POST['end_time'] = strtotime($_POST['end_time']);//结束时间处理

        $_POST['address'] = $_POST['address'];

		//图片上传处理
        $info = $this->upload(1000000,'Public/uploads/active/',110,165,'a_');

		if($info){
			$_POST['photo'] = $info[0]['savename'];//只有一张图片所以直接取就行了
		}else{
			$_POST['photo'] = "";
		}
		
		//文章描述获取
		$_POST['description'] = ($_POST['content'])?(substr($_POST['content'],0,255)) : "";
        $_POST['description'] = htmlspecialchars($_POST['description']);
        $_POST['active_name'] = htmlspecialchars($_POST['active_name']);
        $_POST['address'] = htmlspecialchars($_POST['address']);
		$_POST['type'] = intval($_POST['type']);

		//向文章主表中插入数据
		$m = D('Active');
		$resc = $m->create();
		if(!$resc){
			$this->error($m->getError());
		}
		$resa = $m->add();
		if(!$resa){
			$this->error('发布失败');
		}

		//如果有文章内容向文章详情表active_details中添加内容
		if(strlen(trim($_POST['content'])) > 0){
			$_POST['active_id'] = $resa;
			$_POST['content'] = htmlspecialchars(trim($_POST['content']));

			$d = M('Active_details');
			$resd = $d->create();
			if(!$resd){
				$m->delete($resa);//如果内容添加不成功则删除之前插入的文章主表数据
				$this->error($d->getError());
			}
			$resda = $d->add();
			
			if($resda){
				//向User_active表增加一条数据，即使创建默认就已加入该邀请
				$_POST['aid'] = $resa;//$_POST['uid']上面已经取了就再写了
				$_POST['uid'] = $uid;
				$ua = M('Users_active');
				$resuc = $ua->create();
				$ures = $ua->add();
				if($ures){
					$m->where("active_id = {$resa}")->setInc('join_num');
				}

				$this->success('发布成功',__APP__."/Users/myActive/type/c/");
			}else{
				$m->delete($resa);//如果内容添加不成功则删除之前插入的文章主表数据
				$this->error('发布失败');
			}
		}

		

	}

	//修改文章内容
	public function editActive(){
		//判断是否登录
		$uid = $_SESSION['user']['uid'];
		if(empty($uid) || $uid == " "){
			$this->error('请先登录','__APP__/Users/login');
			exit();
		}
        $aid = intval($_GET['aid']);
		if(empty($aid) || $aid == " "){
		    $this->error("操作错误,请输入健康知识号!");
        }



		//获取文章信息
		$m = D('Active2View');
		$info = $m->where("Active.active_id = {$aid}")->select();
		$this->assign('info',$info[0]);

		//查出用户的常住城市id及城市名
		$city = array();
		$city['id'] = M('Users')->where("uid = {$uid}")->getField('city');
		$city['name'] = M('City')->where("id = {$city['id']}")->getField('name');
		$this->assign('city',$city);

		//调用所有省
		$province = M('Province')->select();
		$this->assign('province',$province);
		
		$this->display('editActive');
	}


	//执行文章修改(开始时间、结束时间、文章内容)
	public function doEditActive(){

        //判断是否登录
        $uid = $_SESSION['user']['uid'];
        if(empty($uid) || $uid == " "){
            $this->error('请先登录','__APP__/Users/login');
        }
		
		$_POST['start_time'] = strtotime($_POST['start_time'].":00:00");//拼装开始时间
		$_POST['end_time'] = strtotime($_POST['end_time'].":00:00");    //拼装结束时间
		$_POST['content'] = trim($_POST['content']);

		//修改active表中的数据
		$a = M('Active');
		$resc = $a->create();
		if(!$resc){
			$this->error($a->getError());
		}
		$resa = $a->save();
		if(!$resa){
			$this->error('无任何修改');
		}

		//修改active_details表中的数据，下面的执行语句没有问题，无论$ad->save()返回true或者false都不算报错。返回false是因为内容没有任何修改
		$ad = M('Active_details');
		$ad->create();
		$ad->save();

		$this->success('修改成功',__APP__."/Users/myActive/type/c/");
	}



	/*+------------------------------------------------------------------------------------------
	 * @upload()          图片上传函数
	 *+------------------------------------------------------------------------------------------
	 */
	private function upload($maxSize,$savePath,$MaxWidth=200,$MaxHeight=200,$Prefix='a_'){
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();// 实例化上传类
		$upload->maxSize  = $maxSize ;// 设置附件上传大小
		$upload->saveRule = time()."-".rand(10000,99999);//上传文件的保存规则
		//缩略图处理
		$upload->thumb = true;               //进行图片缩放
		$upload->thumbPrefix = $Prefix;      //图片前缀名，多个之间加,
		$upload->thumbMaxWidth = $MaxWidth;  //缩略图的最大宽度,多个使用逗号分隔 
		$upload->thumbMaxHeight = $MaxHeight;//缩略图的最大高度,多个使用逗号分隔
		$upload->thumbRemoveOrigin = true;   //删除原图
		$upload->allowExts  = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->savePath =  $savePath;// 设置附件上传目录
		if(!$upload->upload()) {// 上传错误提示错误信息
			return null;
			//echo $upload->getErrorMsg();
			//$this->error($upload->getErrorMsg());
		}else{// 上传成功 获取上传文件信息
			$info =  $upload->getUploadFileInfo();
			return $info;
		}
		
	}



	/**
	 *
	 *	检查用户帐号状态
	 *  author:郑建民
	 *  addtime:2017/12/17
	 */
	public function checkUserState(){
		//判断用户帐号是否被禁用
		$state = $_SESSION['user']['state'];
		echo $state;
		if($state < 0){
			$this->error('你被封号了，不能进行此操作','__APP__/Users/usersInfo/');
		}
		if($state == 1){
			$this->error('帐号待激活，请返回激活','__APP__/Users/usersInfo/');
		}
	}

}
