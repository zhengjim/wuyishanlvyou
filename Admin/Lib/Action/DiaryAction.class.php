<?php
class DiaryAction extends CommonAction{
	
	public function index(){
		//判断排序条件
		$order="d.did asc";
		if(!empty($_REQUEST['_order'])){
			$order=$_REQUEST['_order']." ".$_REQUEST['_sort'];
		}
		
		$m = M("Diary");						
		$where = "d.uid = u.uid";
		if(!empty($_REQUEST['keyword'])){			//判断页面提交的值是否为空
			$where .="  and d.title like '%{$_REQUEST['keyword']}%'";	//若不为空则进行模糊查询
		}
		
		//分页处理
		$_GET['p']=$_REQUEST['pageNum']+0;		//转换参数实现当前页号的传递
		$numPerPage=isset($_REQUEST["numPerPage"])?$_REQUEST["numPerPage"]:10;
		import('ORG.Util.Page');				//导入分页类
		$count = $m->count();					//获取总数据条数
		$Page = new Page($count,$numPerPage);	//实例化分页类，传入总数据条数和每页显示的条数
		
		//执行信息提取并放置到模板中
		$res=$m->field("d.did did,d.title title,d.addtime addtime,d.state state,u.uid uid,u.name name")->table("wuyi_diary d,wuyi_users u")->where($where)->order($order)->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign("list",$res);			//封装分页信息
		$this->assign("totalCount",$count);		//封装总数据条数
		$this->assign("numPerPage",$numPerPage);//封装页大小
		//$this->assign("pageNumShown",2);		//页标数字多少个
		$this->assign("currentPage",$_REQUEST['pageNum']);	//当前页
		$this->display("index");
	}
	
	//美食内容
	public function details(){
		$m = M();
		$did = $_GET['did'];
		$res = $m->table("wuyi_diary d,wuyi_diary_details dd")->where("d.did = dd.did and d.did = {$did}")->field("d.picture,dd.content")->select();

		$this->assign("list",$res[0]);
		$this->display("details");
	}
	

	
	//武夷行分享恢复
	public function toOpen(){
		$m = M('Diary');
		$_POST['state'] = 1;
		$_POST['did'] = $_REQUEST['did'];
		parent::update();//调用父类的添加方法执行添加操作
	}
	
	//美食禁用
	public function toClose(){
		$m = M('Diary');
		$_POST['state'] = -2;
		$_POST['did'] = $_REQUEST['did'];
		parent::update();//调用父类的添加方法执行添加操作
	}

	//美食删除
    public function del(){            //删除操作

        $id = $_REQUEST['id'];

        $res = M('diary')->where("did={$id}")->delete();
        M('diary_cate')->where("did={$id}")->delete();
        M('diary_details')->where("did={$id}")->delete();
        M('diary_like')->where("drid={$id}")->delete();
        M('diary_reply')->where("did={$id}")->delete();
        if($res){
            $this->success(L('删除成功'));
        }else{
            $this->error(L('删除失败'));
        }
	}

}