<?php
return array(
	//'配置项'=>'配置值'

    //页面调试,开发阶段使用
//    'SHOW_PAGE_TRACE' =>true,

    /* 项目设定 */
    //'APP_STATUS'            => 'debug',  // 应用调试模式状态 调试模式开启后有效 默认为debug 可扩展 并自动加载对应的配置文件

	 /* 数据库设置 */
    'DB_TYPE'               => 'mysql',     // 数据库类型
	'DB_HOST'               => 'localhost', // 服务器地址
	'DB_NAME'               => 'wuyilvyou',          // 数据库名
	'DB_USER'               => 'xxxx',      // 用户名
	'DB_PWD'                => 'xxxx',          // 密码
	'DB_PORT'               => '3306',        // 端口
	'DB_PREFIX'             => 'wuyi_',    // 数据库表前缀

	//'URL_HTML_SUFFIX'=>'.html',

	//开启Smarty模板的支持
	//使用的模板引擎名
	'TMPL_ENGINE_TYPE'     => 'Smarty',
	//url不区分大小写
	//'URL_CASE_INSENSITIVE' => true,
	//模板引擎相关的设置
	'TMPL_ENGINE_CONFIG'   => array(
		//是否缓存模板
		'caching'          => false,
		//模板目录
		'template_dir'     => TMPL_PATH,
		//模板编译目录
		'compile_dir'      => CACHE_PATH,
		//缓存目录
		'cache_dir'        => TEMP_PATH,
		//左定界符
		'left_delimiter'   => '{',
		//右定界符
		'right_delimiter'  => '}',
	),

	
	//'SHOW_PAGE_TRACE' =>true, // 显示页面Trace信息
	//'SHOW_ERROR_MSG'=> true,
	//自定义跳转页面
	'TMPL_ACTION_SUCCESS' => 'Public:jump',
	'TMPL_ACTION_ERROR' => 'Public:jump',

);
?>