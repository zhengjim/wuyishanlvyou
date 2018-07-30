<?php
/*
 *
 * 网站首页
 *
 */

class IndexAction extends CommonAction {
    public function index(){
    	$m = M("Diary");
    	$times = time()-7*24*3600;
    	$list_diary_pic = $m->table("wuyi_diary d, wuyi_users u")->where("d.uid = u.uid and d.addtime<{$times} and d.state = 1")->field("d.did did, d.title title, d.like_num like_num, d.picture pic, u.uid uid, u.name uname")->order("d.addtime desc")->limit("0,6")->select();
    	//一周内分享按回复量查询
    	$list_diary = $m->query("SELECT d.did,d.title title,u.uid uid,u.name uname,dd.content content FROM wuyi_diary d, wuyi_diary_reply dr, wuyi_diary_details dd, wuyi_users u WHERE d.uid=u.uid AND d.did=dr.did AND d.did=dd.did and d.state = 1 GROUP BY dr.did ORDER BY COUNT(dr.diary_reply_id) DESC LIMIT 0,9");
    	$length = count($list_diary);
    	
    	$m = M("Active");
    	$time = time();
    	//相约武夷查询
    	$list_active = $m->field("active_id aid,active_name aname,start_time,end_time,join_num")->where("state=1 ")->order("join_num desc")->limit("0,6")->select();

    	$m = M("Groups");
    	//热门帖子查询
    	$list_topic = $m->table("wuyi_group_post gp,wuyi_groups g")->where("g.state=1 and gp.gid = g.gid ")->field("gp.group_post_id gpid,gp.post_title title,gp.like_num,gp.addtime time,g.group_name gname")->order("gp.like_num desc")->limit("0,6")->select();

    	//热门话题查询
    	$list_group = $m->where("state=1")->field("gid,group_name,grouper_num,group_pic")->order("grouper_num desc")->limit("0,7")->select();
    	$this->assign("list_diary_pic",$list_diary_pic);
    	$this->assign("list_diary",$list_diary);
    	$this->assign("length",$length);
    	$this->assign("list_active",$list_active);
    	$this->assign("list_topic",$list_topic);
    	$this->assign("list_group",$list_group);
    	$this->display("index");
    }
}