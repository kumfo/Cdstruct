<?php
/**
 * 管理配置
 */

return array(
    'path' => array(
        'APP_PATH' => BASE_PATH.'/../Protected/',
        'CONTROLLER_PATH' => BASE_PATH.'/../Protected/Controller',
        'MODEL_PATH' => BASE_PATH.'/../Protected/Model',
        'VIEW_PATH' => BASE_PATH.'/../Protected/View',
    ),
    'db' => array(
        'HOST' => '127.0.0.1',
        'UNAME' => 'root',
        'PASSWORD' => '',
        'DB_NAME' => 'test',
    ),
    'router' => array(
        'ROTER_TYPE' => 1,// 1:Module/Controller/
    ),
);