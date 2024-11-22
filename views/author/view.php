<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Author $model */

$this->title = $model->ID_AUTHOR;
$this->params['breadcrumbs'][] = ['label' => 'Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="author-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ID_AUTHOR' => $model->ID_AUTHOR], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ID_AUTHOR' => $model->ID_AUTHOR], [
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
            'ID_AUTHOR',
            'FULL_NAME',
            'DATE_OF_BIRTH',
            'DATE_OF_DEATH',
        ],
    ]) ?>

</div>
