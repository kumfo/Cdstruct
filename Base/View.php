<?php
class View {
    /**
     * 输出，默认输出json
     */
    public function show($data,$type = 1) {
        $data = $type == 1? json_encode($data) : $data;
        switch($type) {
            case 1:
                header('Content-type: application/json');
                echo $data;
                break;
            case 2:
                echo $data;
                break;
        }
    }
}