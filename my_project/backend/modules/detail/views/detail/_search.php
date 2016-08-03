<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\detail\models\DetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_quotation') ?>

    <?= $form->field($model, 'id_receipt') ?>

    <?= $form->field($model, 'product_description') ?>

    <?= $form->field($model, 'quantity') ?>

    <?php // echo $form->field($model, 'unit_price') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
