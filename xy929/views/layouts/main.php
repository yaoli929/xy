<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>乖乖宝宝-<?= $this->title ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '乖乖宝宝',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => '首页SNOW', 'url' => ['/index/index']],
            ['label' => '倒影图片轮播', 'url' => ['/index/index3']],
            ['label' => '幻灯片', 'url' => ['/index/index2']],
//            ['label' => '关于我们', 'url' => ['/index/about']],
//            ['label' => '联系我们', 'url' => ['/index/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => '登陆', 'url' => ['/index/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/index/logout'], 'post')
                . Html::submitButton(
                    '退出 (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            ),
            Yii::$app->admin->isGuest ? (
            ['label' => '管理员登陆', 'url' => ['/admin']]
            ) : (
                '<li>'
                . Html::beginForm(['/admin/index/logout'], 'post')
                . Html::submitButton(
                    '管理员退出 (' . Yii::$app->admin->identity->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            ),
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'homeLink'=>[
                'label'=>'首页',
                'url'=>'index',
            ],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : "",
        ]) ?>
        <?= $content ?>
    </div>
</div>



<?php $this->endBody() ?>

<?=Html::jsFile('@webjs/index2/jquery.easing.1.3.js')?>
<?=Html::jsFile('@webjs/index2/jquery.galleryview-1.1.js')?>
<?=Html::jsFile('@webjs/index2/jquery.timers-1.1.2.js')?>
<script type="text/javascript">
    $('#photos').galleryView({
        panel_width: 800,
        panel_height: 300,
        frame_width: 100,
        frame_height: 100
    });

</script>

<?=Html::jsFile('@webjs/index3/ThreeCanvas.js')?>
<?=Html::jsFile('@webjs/index3/Snow.js')?>
<?=Html::jsFile('@webjs/index3/snowFall.js')?>

<script>
    $.snowFall({
        //创建粒子数量，密度
        particleNo: 500,
        //粒子下拉速度
        particleSpeed:30,
        //粒子在垂直（Y轴）方向运动范围
        particleY_Range:1300,
        //粒子在垂直（X轴）方向运动范围
        particleX_Range:1000,
        //是否绑定鼠标事件
        bindMouse: false,
        //相机离Z轴原点距离
        zIndex:600,
        //摄像机视野角度
        angle:55,
        wind_weight:0
    });
</script>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; 乖乖宝宝 <?= date('Y') ?></p>

        <p class="pull-right">豫ICP备16005145号-1</p>
    </div>
</footer>

</body>
</html>
<?php $this->endPage() ?>
