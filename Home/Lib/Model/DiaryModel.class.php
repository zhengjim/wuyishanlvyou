<?php

class DiaryModel extends RelationModel{
	
	protected $_link = array(
		//分享的列表浏览
		'Diary_details'=>array(
			'mapping_type'=>HAS_ONE,
				'class_name'=>'Diary_details',
				'foreign_key'=>'did',
				'mapping_name'=>'diary_details',
				'as_fields'=>'content'
				//'mapping_order'=>'addtime desc
		),
		
		'Images'=>array(
			'mapping_type'=>HAS_MANY,
				'class_name'=>'Images',
				'foreign_key'=>'pid',
				'mapping_name'=>'images',
				'mapping_fields'=>'filename'
		),
	);
	
}