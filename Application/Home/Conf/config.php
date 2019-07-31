<?php
return array(
	//'配置项'=>'配置值'
	//链接数据库
	'DB_TYPE'           => 'mysqli',
	'DB_HOST'           => '127.0.0.1',
	'DB_NAME'           => 'test',
	'DB_USER'           => 'root',
	'DB_PWD'            => '123456',
	'DB_PORT'           => '3306',
	'DB_PREFIX'         => '',

	//路由
	'URL_ROUTER_ON'		=>true,//开启路由规则
	'URL_ROUTE_RULES'	=>array(
		array('Index/register', 'Index/register', '', array('method'=>'POST')),
		array('Index/login', 'Index/login', '', array('method'=>'POST')),
		array('Index/userDetails', 'Index/userDetails', '', array('method'=>'GET')),
	)
);