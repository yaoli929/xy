<?php

/* @var $this yii\web\View */
use yii\helpers\Html;


$this->title = '首页';
//$this->params['breadcrumbs'][] = $this->title;

?>

<?=Html::jsFile('@webjs/index/index.js')?>
<?=Html::cssFile('@webcss/index/index.css')?>

<div id="imageFlow">
<!--    <div class="top">-->
<!--    </div>-->
    <div class="bank">
        <a rel="<?= Yii::getAlias('@webimg') ?>/index/1.jpg" title="Myselves" href="#">
            My identity lies in not knowing who I am</a>
        <a rel="<?= Yii::getAlias('@webimg') ?>/index/2.jpg" title="Discoveries" href="#">
            ...are made by not following instructions</a>
        <a rel="<?= Yii::getAlias('@webimg') ?>/index/3.jpg" title="Nothing" href="#">
            ...can come between us</a>
        <a rel="<?= Yii::getAlias('@webimg') ?>/index/4.jpg" title="New life" href="#">
            Here you come!</a>
        <a rel="<?= Yii::getAlias('@webimg') ?>/index/5.jpg" title="Optimists" href="#">
            They don&#39;t know all the facts yet</a>
        <a rel="<?= Yii::getAlias('@webimg') ?>/index/6.jpg" title="Empathy" href="#">
            Emotional intimacy</a>
        <a rel="<?= Yii::getAlias('@webimg') ?>/index/7.jpg" title="Much work" href="#">
            ...remains to be done before we can announce our total failure to make any
            progress</a>
        <a rel="<?= Yii::getAlias('@webimg') ?>/index/8.jpg" title="System error" href="#">
            Errare Programma Est</a>
        <a rel="<?= Yii::getAlias('@webimg') ?>/index/9.jpg" title="Nonexistance" href="#">
            There&#39;s no such thing</a>
        <a rel="<?= Yii::getAlias('@webimg') ?>/index/10.jpg" title="Inside" href="#">
            I抦 now trapped, without hope of escape or rescue</a>
        <a rel="<?= Yii::getAlias('@webimg') ?>/index/11.jpg" title="E-Slaves" href="#">
            The World is flat</a>
        <a rel="<?= Yii::getAlias('@webimg') ?>/index/12.jpg" title="l0v3" href="#">
            1 l0v3 j00 - f0r3v3r</a>
        <a rel="<?= Yii::getAlias('@webimg') ?>/index/13.jpg" title="T minus zero" href="#">
            111 111 111 x 111 111 111 = 12345678987654321</a>
        <a rel="<?= Yii::getAlias('@webimg') ?>/index/14.jpg" title="The End" href="#">
            ...has not been written yet</a> </div>
    <div class="text">
        <div class="title">
            Loading</div>
        <div class="legend">
            Please wait...</div>
    </div>
    <div class="scrollbar">
        <img class="track" src="<?= Yii::getAlias('@webimg') ?>/index/track.jpg" alt="">
        <img class="arrow-left" src="<?= Yii::getAlias('@webimg') ?>/index/sign_out.png" alt="">
        <img class="arrow-right" src="<?= Yii::getAlias('@webimg') ?>/index/sign_in.png" alt="">
        <img class="bar" src="<?= Yii::getAlias('@webimg') ?>/index/bar.jpg" alt=""> </div>
</div>
