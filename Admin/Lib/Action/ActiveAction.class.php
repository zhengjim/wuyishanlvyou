<?php
/**
+----------------------------------------------------------------------------------------
* 后台会员管理类
+----------------------------------------------------------------------------------------

*/

class ActiveAction extends CommonAction {

	//武夷美食邀请调用
	public function index(){
		//判断排序条件
		$order = "id desc";
		if(!empty($_REQUEST['_order'])){
			$order = $_REQUEST['_order']." ".$_REQUEST['_sort'];
		}

		$where = 'Active.type = 1';//武夷美食邀请的条件必须是城市>0
		//封装搜索条件
		if(!empty($_REQUEST['keyword'])){
			$where .= " and Active.active_name like '%{$_REQUEST['keyword']}%'";
		}

		//分页处理
		$_GET['p'] = $_REQUEST['pageNum'] + 0;//转换参数实现当前页号的传递
		$numPerPage = isset($_REQUEST["numPerPage"])?$_REQUEST["numPerPage"]:10;//每页显示数量
		import('ORG.Util.Page');// 导入分页原类
		$m = D('ActiveView');
		$count = $m->where($where)->count();
		$page = new Page($count,$numPerPage);
		$list = $m->where($where)->order($order)->limit($page->firstRow.','.$page->listRows)->select();

		$this->assign('list',$list);
		$this->assign("totalCount",$count);               //封装总数据条数
		$this->assign("numPerPage",$numPerPage);          //封装页大小
		$this->assign("pageNumShown",10);                 //页标数字多少个
		$this->assign("currentPage",$_REQUEST['pageNum']);//当前页
		$this->display('index');
	}

	//邀约恢复、关闭
	public function toOpen($state){
		$state = $_REQUEST['sid'];
		$m = M('Active');
		if($state > 0){
			$_POST['state'] = -2;
		}else{
			$_POST['state'] = 1;
		}
		$_POST['active_id'] = $_REQUEST['id'];
		if(false === $m->create()) {
			$this->error($m->getError());
		}
		// 更新数据
		if(false !== $m->save()) {
			//成功提示
			$this->success('更新成功');
		} else {
			//错误提示
			$this->error('更新失败');
		}
	}

    public function del(){            //删除操作

        $id = $_REQUEST['id'];
        //相关信息全部删除
        $m = M();
        $ap_list = $m->table("wuyi_active a,wuyi_active_post ap")->where("a.active_id = 165 and a.active_id = ap.aid")->field("ap.active_post_id")->select();
        foreach ($ap_list as $ap){
            $post_id = $ap["active_post_id"];
            M('active_post_details')->where("active_post_id={$post_id}")->delete();
            M('active_post')->where("active_post_id={$post_id}")->delete();
            M('active_reply')->where("active_post_id={$post_id}")->delete();
        }
        M('users_active')->where("active_id={$id}")->delete();
        M('active_details')->where("active_id={$id}")->delete();
        $res  = M('active')->where("active_id={$id}")->delete();


        if($res){
            $this->success(L('删除成功'));
        }else{
            $this->error(L('删除失败'));
        }
    }

}