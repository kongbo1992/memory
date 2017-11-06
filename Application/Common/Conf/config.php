<?php
return array(
	//'配置项'=>'配置值'
    'DB_TYPE' => 'mysql',
    'DB_HOST' => '127.0.0.1',
    'DB_NAME' => 'test',
    'DB_USER' => 'root',
    'DB_PWD' => 'root',
    'DB_PORT' => '3306',
    'DB_CHARSET' => 'utf8',

    'SESSION_AUTO_START'    =>  true,
    'TMPL_L_DELIM'          =>  '{',
    'TMPL_R_DELIM'          =>  '}',
    'MULTI_MODULE'          =>  true,

    'DATA_CACHE_TIME'       =>  false,      // 数据缓存有效期 0表示永久缓存
    'LOG_RECORD'            =>  true,   // 默认不记录日志
    'LOG_TYPE'              =>  'File', // 日志记录类型 默认为文件方式
    'LOG_LEVEL'             =>  'EMERG,ALERT,CRIT,ERR',// 允许记录的日志级别
    'LOG_FILE_SIZE'         =>  2097152,	// 日志文件大小限制
    'LOG_EXCEPTION_RECORD'  =>  true,    // 是否记录异常信息日志

);