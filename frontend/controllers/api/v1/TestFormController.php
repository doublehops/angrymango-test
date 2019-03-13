<?php

namespace frontend\controllers\api\v1;

use yii;
use yii\rest\ActiveController;
use common\models\TestModel;

class TestFormController extends ActiveController
{
    public $modelClass = 'common\models\TestModel';

    public function actionTest()
    {
        $test = new TestModel;
        $test->attributes = Yii::$app->request->post();

        if (!$test->validate()) {
            return $test->getErrors();
        }

        return $test;
    }
}
