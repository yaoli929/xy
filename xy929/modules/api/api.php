<?php

namespace app\modules\api;
//
class api extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\api\controllers';

    public function init()
    {
        //登录用户才可以访问api接口
        parent::init();
    }
}
