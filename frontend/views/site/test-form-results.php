<?php

use yii\helpers\Html;

?>
<div class="site-index" style="margin-top: 75px;">

    <div class="body-content">
        <h1>RESULTS:</h1>

        <div class="row">
            <table style="margin-top: 30px; padding: 5px; width: 800px;">
                <tr><th>Name: </th><td><?= $data['name'] ?></td></tr>
                <tr><th>Original Number: </th><td><?= $data['number'] ?></td></tr>
                <tr><th>Converted Number: </th><td><?= $data['convertedNumber'] ?></td></tr>
            </table>
        </div>

    </div>
</div>
