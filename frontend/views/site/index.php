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
            <h2>Web Interface Test</h2>
            <?= Html::a('Goto test form', 'site/form', ['class' => 'btn btn-lg btn-success']) ?>
        </div>

		<hr style="color: #F00" />

        <div class="row">
            <h2>RESTful API test</h2>
            <p>Alternatively, a RESTful API has been setup to test with this method. You can either test using Postman or from cURL in the shell:</p>
            <code>
				curl -X POST \<br />
				  http://angrymango.test/api/test-form/test \<br />
				  -H 'cache-control: no-cache' \<br />
				  -H 'content-type: application/json' \<br />
				  -d '{ "name": "John", "number": 8123.67 }'

            </code>
        </div>

    </div>
</div>
