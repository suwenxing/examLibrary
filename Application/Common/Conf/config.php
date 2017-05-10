<?php
return array(
    //数据库配置
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'exam',     // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '',          // 密码
    'DB_PORT'               =>  '3306',          // 端口
    'DB_PREFIX'             =>  'e_',          // 数据库表前缀
    
    'SHOW_PAGE_TRACE' =>true,

				// 使用 'ERROR_PAGE' 的配置不能返回 404 状态码
				'TMPL_EXCEPTION_FILE'   => SPSTATIC.'404.html',
				//'ERROR_PAGE'   => __ROOT__.'/statics/404.html',

);
