<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = 'Angry Mango Test Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Angry Mango Test Application!</h1>
    </div>

    <div class="body-content">

        <div class="row">
            <?php
                $form = ActiveForm::begin([
                    'id' => 'test-form',
                    'options' => ['class' => 'form-horizontal'],
                ]);
            ?>

            <?= $form->field($model, 'name') ?>
            <?= $form->field($model, 'number') ?>


    		<div class="form-group">
    		    <div class="col-lg-offset-1 col-lg-11">
    		        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    		    </div>
    		</div>

            <?php ActiveForm::end(); ?>

	        <?php if ($data) : ?>
   	            <?= $this->render('/site/test-form-results', ['data' => $data]) ?>
    	    <?php endif ?>
        </div>

    </div>
</div>
