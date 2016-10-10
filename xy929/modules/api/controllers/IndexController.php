<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 16-2-29
 * Time: 下午5:13
 */
namespace app\modules\api\controllers;

use app\modules\api\services\Api_Service;
use Yii;
use yii\web\Controller;


// api总控制器
class IndexController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    public function actionIndex()
    {
        echo "api test";
        exit;
    }
    public function actionTest()
    {
        var_dump(Yii::$app->request);
        echo "api test11";
        exit;
    }
}
