<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Stock $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="stock-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID_BOOK')->textInput() ?>

    <?= $form->field($model, 'TOTAL_STOCK')->textInput() ?>

    <?= $form->field($model, 'NOTES')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LAST_INVENTARY')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
