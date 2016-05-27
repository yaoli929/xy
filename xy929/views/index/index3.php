
<?php

/* @var $this yii\web\View */
use yii\helpers\Html;


$this->title = '首页';
//$this->params['breadcrumbs'][] = $this->title;

?>

<style>
    .index3_container{
        position: relative;
    }
    .index3_bg{
        background-image:url('<?= Yii::getAlias('@webimg') ?>/index3/snow_bk.jpg');
        background-size:cover;
        background-repeat: no-repeat;
        background-color:#222;
        min-width:1920px ;
        min-height:1075px ;
    }
    canvas{
        position: absolute;
        left:0;
        top:0;
        z-index: 10;
    }
    #code{
        width:40%;
        min-width:450px;
        height:450px;
        background-color:rgba(0, 0, 0, 0.3);
        position:fixed;
        left:30%;
        top:20%;
        border-radius: 10px;
        font-size:16px;
        line-height:22px;
        font-weitht:bold;
    }
    #author{
        position: fixed;
        bottom: 10px;
        left: 48%;
    }
    #author a{
        text-decoration: none;}
    .key{
        color:orange;
        font-family:'';
    }
    .comment{
        color:#e6e6e6;
        font-weight: 800;
    }
</style>
<!-- 代码部分begin -->
<!--	 <pre style="padding: 10px 15%;"> 	<code>-->
<!--             <span class="key">$.snowFall({</span>-->
<!--             <span class="comment">//创建粒子数量，密度</span>-->
<!--             <span class="key">particleNo: 100,</span>-->
<!--             <span class="comment">//粒子下拉速度</span>-->
<!--             <span class="key">particleSpeed:15,</span>-->
<!--             <span class="comment">//粒子在垂直（Y轴）方向运动范围</span>-->
<!--             <span class="key">particleY_Range:1300,</span>-->
<!--             <span class="comment">//粒子在垂直（X轴）方向运动范围</span>-->
<!--             <span class="key">particleX_Range:1000,</span>-->
<!--             <span class="comment">//是否绑定鼠标事件</span>-->
<!--             <span class="key">bindMouse: false,</span>-->
<!--             <span class="comment">//相机离Z轴原点距离</span>-->
<!--             <span class="key">zIndex:600,</span>-->
<!--             <span class="comment">//摄像机视野角度</span>-->
<!--             <span class="key">angle:55,</span>-->
<!--             <span class="comment">//风力，正值向右，负值向左，0表示无风</span>-->
<!--             <span class="key">wind_weight:0</span>-->
<!--             <span class="key">});</span>-->
<!--         </code>-->
<!--	 </pre>-->
<!--</div>-->
<div class="index3_container">
    <div class="index3_bg"></div>
    <canvas></canvas>
</div>

