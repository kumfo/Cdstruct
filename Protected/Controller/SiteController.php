<?php
class SiteController extends Controller {
    public function index() {
        header('Content-type','content="text/html;charset=utf-8"');
        echo '这里是测试页面';
    }
}