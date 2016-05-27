<?php

/* @var $this yii\web\View */
use yii\helpers\Html;


$this->title = '首页';

?>



<?=Html::cssFile('@webcss/index2/index.css')?>


<ul class="nav nav-pills">

    <li  class="<?php if(Yii::$app->controller->action->id == "index"){echo "active";}?>">
        <a href="/index/index">倒影图片轮播</a>
    </li>
    <li  class="<?php if(Yii::$app->controller->action->id == "index2"){echo "active";}?>">
        <a href="/index/index2">幻灯片</a>
    </li>
</ul>

<div id="container" style="overflow:hidden;">
    <div id="photos" class="galleryview">
        <div class="panel">
            <img src="<?= Yii::getAlias('@webimg') ?>/index2/01.jpg" />
            <div class="panel-overlay">
                <h2>Effet du soleil sur le paysage</h2>
            </div>
        </div>
        <div class="panel">
            <img src="<?= Yii::getAlias('@webimg') ?>/index2/02.jpg" />
            <div class="panel-overlay">
                <h2>Eden</h2>
            </div>
        </div>
        <div class="panel">
            <img src="<?= Yii::getAlias('@webimg') ?>/index2/03.jpg" />
            <div class="panel-overlay">
                <h2>Snail on the Corn</h2>
            </div>
        </div>
        <div class="panel">
            <img src="<?= Yii::getAlias('@webimg') ?>/index2/04.jpg" />
            <div class="panel-overlay">
                <h2>Flowers</h2>
            </div>
        </div>
        <div class="panel">
            <img src="<?= Yii::getAlias('@webimg') ?>/index2/05.jpg" />
            <div class="panel-overlay">
                <h2>Alone Beach 2B</h2>
            </div>
        </div>
        <div class="panel">
            <img src="<?= Yii::getAlias('@webimg') ?>/index2/06.jpg" />
            <div class="panel-overlay">
                <h2>Sunrise Trees</h2>
            </div>
        </div>
        <div class="panel">
            <img src="<?= Yii::getAlias('@webimg') ?>/index2/07.jpg" />
            <div class="panel-overlay">
                <h2>Waterfall</h2>
            </div>
        </div>
        <div class="panel">
            <img src="<?= Yii::getAlias('@webimg') ?>/index2/08.jpg" />
            <div class="panel-overlay">
                <h2>Death Valley</h2>
            </div>
        </div>
        <ul class="filmstrip">
            <li><img src="<?= Yii::getAlias('@webimg') ?>/index2/frame-01.jpg" alt="Effet du soleil" title="Effet du soleil" /></li>
            <li><img src="<?= Yii::getAlias('@webimg') ?>/index2/frame-02.jpg" alt="Eden" title="Eden" /></li>
            <li><img src="<?= Yii::getAlias('@webimg') ?>/index2/frame-03.jpg" alt="Snail on the Corn" title="Snail on the Corn" /></li>
            <li><img src="<?= Yii::getAlias('@webimg') ?>/index2/frame-04.jpg" alt="Flowers" title="Flowers" /></li>
            <li><img src="<?= Yii::getAlias('@webimg') ?>/index2/frame-05.jpg" alt="Alone Beach" title="Alone Beach" /></li>
            <li><img src="<?= Yii::getAlias('@webimg') ?>/index2/frame-06.jpg" alt="Sunrise Trees" title="Sunrise Trees" /></li>
            <li><img src="<?= Yii::getAlias('@webimg') ?>/index2/frame-07.jpg" alt="Waterfall" title="Waterfall" /></li>
            <li><img src="<?= Yii::getAlias('@webimg') ?>/index2/frame-08.jpg" alt="Death Valley" title="Death Valley" /></li>
        </ul>
    </div>

</div>


