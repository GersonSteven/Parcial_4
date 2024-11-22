<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Book $model */

$this->title = $model->TITLE;
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="book-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'ID_BOOK' => $model->ID_BOOK], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'ID_BOOK' => $model->ID_BOOK], [
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
            'ID_BOOK',
            'TITLE',
            'DESCRIPTION',
            'YEAR_PUBLICATION',
            'ID_AUTHOR',
            'ID_GENRE',
        ],
    ]) ?>

</div>
