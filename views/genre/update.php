<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Genre $model */

$this->title = 'Update Genre: ' . $model->NAME;
$this->params['breadcrumbs'][] = ['label' => 'Genres', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->NAME, 'url' => ['view', 'ID_GENRE' => $model->ID_GENRE]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="genre-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
