<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\AdminLoginForm;
use app\modules\admin\models\AdminModel;

class IndexController extends AdminBaseController
{

    public function actionIndex()
    {
        //admin数据表中添加数据
//        $user = new AdminModel();
//        $user->username = 'admin';
//        $user->password = md5('xy929123456');
//        $user->save();

        return $this->render('index');
    }

    public function actionLogin()
    {
//        var_dump(Yii::$app->request->post());die;
        if (!\Yii::$app->admin->isGuest) {
            return $this->redirect(["index"]);
        }

        $model = new AdminLoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(["index"]);
        } else {
//            $this->_popErrorFlash();
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->admin->logout();

        return $this->redirect(["/admin/index/login"]);
    }
}
