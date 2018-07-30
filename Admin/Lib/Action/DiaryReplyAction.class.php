<?php

class DiaryReplyAction extends Action{
	//回复内容
	public function index(){
		$m = M("Diary_reply");
		$did = $_REQUEST['did'];
		$title = $m->table("wuyi_diary d,wuyi_users u")->where("d.uid = u.uid and d.did = {$did}")->field("u.name uname,d.title title")->select();
		$this->assign("title",$title[0]);
	
		//分页处理
		$_GET['p'] = $_REQUEST['pageNum']+0;		//转换参数实现当前页号的传递
		$numPerPage=isset($_REQUEST["numPerPage"])?$_REQUEST["numPerPage"]:10;
		import('ORG.Util.Page');				//导入分页类
		$count = $m->where("did={$did}")->count();					//获取总数据条数
		$Page = new Page($count,$numPerPage);	//实例化分页类，传入总数据条数和每页显示的条数
	
		//执行信息提取并放置到模板中
		$res = $m->table("wuyi_diary_reply dr,wuyi_users u")->where("dr.did = {$did} and dr.uid = u.uid")->field("dr.diary_reply_id id,u.name uname,dr.content content,dr.addtime addtime")->order("dr.addtime desc")->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign("list",$res);			//封装分页信息
		$this->assign("totalCount",$count);		//封装总数据条数
		$this->assign("numPerPage",$numPerPage);//封装页大小
		//$this->assign("pageNumShown",2);		//页标数字多少个
		$this->assign("currentPage",$_REQUEST['pageNum']);	//当前页
		$this->display("index");
	}

    public function del(){            //删除操作

        $id = $_REQUEST['id'];

        $res  = M('diary_reply')->where("diary_reply_id={$id}")->delete();
        if($res){
            $this->success(L('删除成功'));
        }else{
            $this->error(L('删除失败'));
        }
    }

}