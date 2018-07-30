<?php
/**
*分享回复信息浏览
*/
class DiaryViewModel extends ViewModel{
	public $viewFields = array(
		'Diary_reply'=>array('content','addtime'),
		'Diary'=>array('title','did','_on'=>'Diary.did=Diary_reply.did'),
		'Users'=>array('uid','name','photo','_on'=>'Diary_reply.uid = Users.uid'),
   );

}