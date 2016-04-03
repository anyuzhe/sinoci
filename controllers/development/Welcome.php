<?php

class Welcome extends Controller {

    public function index()
    {
        // 加载解析类库
        $this->load->library('parser');

        // 添加视图目录
        $this->load->add_package_path(BASEPATH.'../application/');

        // 设置 $elapsed_time 变量
        $elapsed_time =
            $this->benchmark->elapsed_time(
                'loading_time:_base_classes_start',
                'loading_time:_base_classes_end'
            );

        // 渲染模版
        $welcome_message =
            $this->parser->parse(
                'welcome_message',
                compact('elapsed_time'),
                TRUE
            );

        // 过滤多余信息
        // TODO
        $welcome_message =
            preg_replace(
                '/<p.+\/code>/',
                '',
                $welcome_message,
                1
            );

        // 输出页面
        echo $welcome_message;
    }

}
