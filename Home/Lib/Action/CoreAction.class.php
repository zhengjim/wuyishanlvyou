<?php
class CoreAction extends CommonAction{

    public function _initialize(){
        //判断是否登录
        $uid = $_SESSION['user']['uid'];
        if(empty($uid) || $uid == " "){
            $this->error('请先登录','__APP__/Users/login');
        }
    }

	//列表
	public function index(){
		$m = D("Diary");
		$uid = $_SESSION['user']['uid'];
		import('ORG.Util.Page');// 导入分页类
		import('ORG.Util.Page2');// 导入实际使用的分页类
		//查询分享
		$count = $m->relation(true)->where("state = 1 and uid={$uid}")->order("addtime desc")->count();
		$Page = new Page2($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$list = $m->relation(true)->where("state = 1 and uid={$uid}")->order("addtime desc")->limit($Page->firstRow.','.$Page->listRows)->select();
		
		foreach($list as $k=>$v){
			$did=$v['did'];
			$uname=M("users")->field("name,photo")->find($uid);
			$list[$k]['uname']=$uname['name'];
			$list[$k]['photo']=$uname['photo'];
			$count=M("diary_reply")->where("did={$did}")->count();
			$list[$k]['count']=$count;
			foreach($v['images'] as $vo){
				$str[]=$vo['filename'];
			}
			$list[$k]['imgs']=implode(":",$str);
		}
		
		$this->assign("list",$list);
		$this->assign('page',$Page->show());
		$this->display("index");
	}
	
	//删除数据
	public function del(){
		$did=intval($_GET['did']);
		$img=$_GET['img'];
		$imgs[]=explode(":",$img);
		$m = M("Diary");
		$m->where("did={$did}")->delete();
		$m->table("wuyi_diary_details")->where("did={$did}")->delete();
		$m->table("wuyi_diary_reply")->where("did={$did}")->delete();
		$m->table("wuyi_diary_like")->where("drid={$did}")->delete();
		$m->table("wuyi_images")->where("`table`='diary' and pid={$did}")->delete();
		foreach($imgs[0] as $v){
			unlink("../Public/uploads/diary/{$v}");
			unlink("../Public/uploads/diary/p_{$v}");
			unlink("../Public/uploads/diary/m_{$v}");
			unlink("../Public/uploads/diary/s_{$v}");
		}
		$this->index();
	}
}