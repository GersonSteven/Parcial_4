<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AuthorSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="author-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID_AUTHOR') ?>

    <?= $form->field($model, 'FULL_NAME') ?>

    <?= $form->field($model, 'DATE_OF_BIRTH') ?>

    <?= $form->field($model, 'DATE_OF_DEATH') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
