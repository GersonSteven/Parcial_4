<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Stock $model */

$this->title = $model->ID_STOCK;
$this->params['breadcrumbs'][] = ['label' => 'Stocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="stock-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ID_STOCK' => $model->ID_STOCK], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ID_STOCK' => $model->ID_STOCK], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID_STOCK',
            'ID_BOOK',
            'TOTAL_STOCK',
            'NOTES',
            'LAST_INVENTARY',
        ],
    ]) ?>

</div>
