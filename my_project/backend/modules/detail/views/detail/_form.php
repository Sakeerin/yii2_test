<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\modules\company\models\Company;
use backend\modules\customer\models\Customer;
use backend\modules\quotation\models\Quotation;
use backend\modules\detail\models\Detail;
use backend\modules\receipt\models\Receipt;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model backend\modules\detail\models\Detail */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="detail-form">
    <?php Pjax::begin(['id' => 'countries']) ?>
    <?php $form = ActiveForm::begin(); ?>


    <p>
      รหัสใบเสนอราคา : <?= Html::activeDropDownList($model, 'id_quotation',
        ArrayHelper::map(Quotation::find()->all(), 'id','id')) ?>
    </p>
    <p>
      รหัสใบเสร็จ : <?= Html::activeDropDownList($model, 'id_receipt',
        ArrayHelper::map(Receipt::find()->all(), 'id','id')) ?>

    </p>

    <?= $form->field($model, 'product_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quantity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'unit_price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <P>
     <?= Html::button('บันทึก',['value'=>Url::to('index.php?r=quotation/quotation/create'),'class'=> 'btn btn-success' ])  ?>
   </P>


    <?php ActiveForm::end(); ?>
    <?php Pjax::end() ?>

</div>
