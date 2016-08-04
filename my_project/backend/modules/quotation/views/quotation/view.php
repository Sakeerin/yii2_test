<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
//use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\quotation\models\Quotation */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Quotations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quotation-view">

    <h1><?= Html::encode('PSN-Qu-'.$this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'id_company' => $model->id_company, 'id_customer' => $model->id_customer], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'id_company' => $model->id_company, 'id_customer' => $model->id_customer], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'id_doc_qu',
            //'id_company',
            //'id_customer',
            'date',
            'dev_time',
            'payment',
            'guaruantee',
            //'product_description',
            //'quantity',
            //'unit_price',
        ],
    ]) ?>
  <?php
//    DetailView::widget([
//    'detail'=>$detail,
//    'condensed'=>true,
//    'hover'=>true,
//    //'mode'=>DetailView::MODE_VIEW,
//    'attributes'=>[
//       'columns' =>
//       [
//          'attribute'=>'product_description',
//       ],
//       [
//          'attribute'=>'quantity',
//       ],
//    ]
// ]);	 ?>
    <?php Pjax::end(); ?>
    <br/>
     <!-- Html::button('ExportPDF',['value'=>Url::to('index.php?r=detail/detail/create'),'class'=> 'btn btn-success','id'=> 'modalButton'])  ?> -->
      <!-- Html::a('ExportPDF', ['_preview', 'id' => $model->id, 'id_company' => $model->id_company, 'id_customer' => $model->id_customer], ['class' => 'btn btn-success']) ?> -->
     <P>
      <?= Html::button('เพิ่มรายละเอียด',['value'=>Url::to('index.php?r=detail/detail/create'),'class'=> 'btn btn-success','id'=> 'modalButton'])  ?>
    </P>

<?php
      Modal::begin([
          'header' => '<h4> Detail </h4>',
          'id' => 'modal',
          'size' => 'modal-lg',
      ]);
      echo "<div id='modalContent'></div>";
      Modal::end();
     ?>

</div>
