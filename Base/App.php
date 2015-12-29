<?php
/**
 * 基础类
 */
define('BASE_PATH',dirname(__FILE__));
$base_path = dirname(__FILE__);
include_once BASE_PATH.'/autoload.php';
class App {
    private static $config;
    public static function run($config = array()) {
        $convention = include_once(BASE_PATH.'/convention.php'); //加载管理配置
        self::$config = array_merge($convention,$config);
        self::InitApp();
    }
    public static function InitApp() {
        // 初始化文件夹,start
        foreach(self::$config['path'] as $path) {
            if(!is_dir($path)) {
                self::CreatePath($path);
            }
        }
        // 初始化文件夹,end
        // 初始化文件,start
        self::CreateFile(self::$config['path']['CONTROLLER_PATH'].'/SiteController.php', BASE_PATH.'/tpl/Controller.php');
        self::CreateFile(self::$config['path']['MODEL_PATH'].'/SiteModel.php', BASE_PATH.'/tpl/Model.php');
        self::CreateFile(self::$config['path']['VIEW_PATH'].'/index.php', BASE_PATH.'/tpl/View.php');
        // 初始化文件,end
        /**
         * 加载控制器，模型，视图,路由
         */
        include_once BASE_PATH.'/Controller.php';
        include_once BASE_PATH.'/Model.php';
        include_once BASE_PATH.'/View.php';
        include_once BASE_PATH.'/Router.php';
    }
    /**
     * 创建文件夹
     */
    public static function CreatePath($path) {
        $path_split = explode('/',$path);
        $_path = '';
        foreach($path_split as $item) {
            $_path .= $item.'/';
            if(!is_dir($_path)) {
                mkdir($_path,0777);
            }
        }
    }
    /**
     * 创建文件
     * @param file_name 创建的文件名字
     * @param $tpl 使用的模板
     */
    public static function CreateFile($file_name,$tpl) {
        $data = file_get_contents($tpl);
        if(file_put_contents($file_name,$data)) {
            return true;
        } else {
            return false;
        }
    }
}