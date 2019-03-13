<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Angry Mango Test Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Angry Mango Test Application!</h1>
    </div>

    <div class="body-content">

        <div class="row">
            <?= Html::a('Goto test form', 'site/form', ['class' => 'btn btn-lg btn-success']) ?>
        </div>

    </div>
</div>
