<?php
class Controller {
    public function __construct() {

    }
    /**
     * @param tpl 要渲染的模板
     * @param datas 要渲染的数据
     */
    public function render($tpl = '',$datas = array()) {
        if($tpl == '') {
            throw new Exception('请选择一个要渲染的模板');
        }
        if(count($datas) > 0) {
            extract($datas);
            $tpl = App::$config['path']['VIEW_PATH'].$tpl.'.php';
            if(file_exists($tpl)) {
                include_once $tpl;
            }
        }
    }
}