<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Stock $model */

$this->title = 'Update Stock: ' . $model->ID_STOCK;
$this->params['breadcrumbs'][] = ['label' => 'Stocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID_STOCK, 'url' => ['view', 'ID_STOCK' => $model->ID_STOCK]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="stock-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
