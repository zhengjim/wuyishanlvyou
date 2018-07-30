<?php
/**
+--------------------------------------------------------
* 后台会员管理类

*/

class UsersAction extends CommonAction {
   //浏览用户
	public function index(){
		//判断排序条件
		$order="uid asc";
		if(!empty($_REQUEST['_order'])){
			$order=$_REQUEST['_order']." ".$_REQUEST['_sort'];
		}
		
		$m = M("users");  //初始化数据库变量
		//封装搜索条件
		if(!empty($_REQUEST['keyword'])){
			$where = "name like '%{$_REQUEST['keyword']}%'";
		}else{
			$where="1=1";
		}
		
		//分页处理：
		$_GET['p']=$_REQUEST['pageNum']+0;//转换参数实现当前页号的传递
		$numPerPage=isset($_REQUEST["numPerPage"])?$_REQUEST["numPerPage"]:10;
		import('ORG.Util.Page');// 导入分页类
		$count = $m->where($where)->count();// 查询满足要求的总记录数
		$Page  = new Page($count,$numPerPage);// 实例化分页类 传入总记录数和每页显示的记录数
		
		//执行信息提取并放置到模版中
		$this->assign("list",$m->order($order)->where($where)->limit($Page->firstRow.','.$Page->listRows)->select());	//封装分页信息	
		//echo $m->getLastsql();
		$this->assign("totalCount",$count); //封装总数据条数
		$this->assign("numPerPage",$numPerPage);     //封装页大小
		$this->assign("pageNumShown",10);     //页标数字多少个
		$this->assign("currentPage",$_REQUEST['pageNum']);     //当前页
		$this->display("index");
	}


	public function add(){   //添加用户
		$this->add();
	}

	public function insert(){  //执行添加用户
		$m = M('users');    //创建数据库变量
		$_POST['pass']=md5("12345678");   //默认密码是12345678
		if(!$m->create()){
            $this->error('添加失败');
		}
		if($m->add()){
			$this->success('添加成功');
		}else{
			$this->error('添加失败');
		}
	}

	public function del(){            //删除操作
		if($_REQUEST['uid']>5){
            //删除相关的数据
		    $id = $_REQUEST['uid'];

		    $m  = M();
		    //删除对应武夷邀约
            $list = $m->table("wuyi_active a,wuyi_active_details ad")
                        ->where("a.uid = {$id} and a.active_id = ad.active_id")
                        ->field("ad.active_id")
                        ->select();
            foreach ($list as $item){
                $post_id = $item["active_id"];
                M('active_details')->where("active_id={$post_id}")->delete();
            }
            $list = $m->table("wuyi_active_post ap,wuyi_active_post_details apd")
                ->where("ap.uid = {$id} and ap.active_post_id = apd.active_post_id")
                ->field("apd.active_post_id")
                ->select();
            foreach ($list as $item){
                $post_id = $item["active_post_id"];
                M('active_post_details')->where("active_post_id={$post_id}")->delete();
            }
            M('active_reply')->where("uid = {$id}")->delete();
            M('users_active')->where("uid = {$id}")->delete();

            //删除对应武夷论坛
            $list = $m->table("wuyi_group_post gp,wuyi_group_post_details gpd")
                ->where("gp.uid = {$id} and gp.group_post_id = gpd.group_post_id")
                ->field("apd.group_post_id")
                ->select();
            foreach ($list as $item){
                $post_id = $item["group_post_id"];
                M('group_post_details')->where("group_post_id={$post_id}")->delete();
            }
            M('user_group')->where("uid = {$id}")->delete();
            M('groups')->where("uid = {$id}")->delete();
            M('group_post_like')->where("uid = {$id}")->delete();
            M('group_post_reply')->where("uid = {$id}")->delete();

            //删除对应的武夷行分享
            $list = $m->table("wuyi_diary d,wuyi_diary_details dd")
                ->where("d.uid = {$id} and d.did = dd.did")
                ->field("dd.did")
                ->select();
            foreach ($list as $item){
                $post_id = $item["did"];
                M('diary_details')->where("did={$post_id}")->delete();
            }
            M('diary_like')->where("uid = {$id}")->delete();
            M('diary_reply')->where("uid = {$id}")->delete();

            //删除对应关注
            M('attention')->where("uid = {$id}")->delete();
            M('attention')->where("auid = {$id}")->delete();


		    $res = M('Users')->where("uid = {$id}")->delete();

			if($res){
				$this->success('删除成功');
			}else{
                $this->error('删除失败');
			}
		}else{
			$this->error('不能删除管理员');
		}
		
	}

	public function editpass(){       //密码修改操作
		$this->display("editpass");
	}

	
	public function updatepass(){   //重设会员密码，重写父类放入方法
		//判断密码和重复密码是否一致
		if($_POST['pass']!=$_POST['repass']){
			$this->error("密码和重复密码不一致！");
			return;
		}
		//对密码加密
		$_POST['pass'] = md5($_POST['pass']);
		
		parent::update();//调用父类的添加方法执行添加操作。
	}

	public function editstate(){
		$m = M("Users");
		$a = $m->find($_REQUEST['uid']);

		//封装新的state	
		if($a['state'] < 2){
			$_POST['state'] = 2;
		}else{
			$_POST['state'] = -1;
		}

		//把数据的uid传进去
		$_POST['uid'] = $_REQUEST['uid'];
		parent::update();//调用父类的添加方法执行添加操作。
		
		//$res = $m->save($a); 
		//if($res){
			//$this->success('更新成功');
		//}else{
			//$this->error('error');
		//}
	}
}