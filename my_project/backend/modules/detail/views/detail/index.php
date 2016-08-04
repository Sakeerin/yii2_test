<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;
use yii\helpers\Url;
use backend\modules\detail\views\detail\index;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\detail\models\DetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Detail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
      // Modal::begin([
      //     'header' => '<h4> Detail </h4>',
      //     'id' => 'modal',
      //     'size' => 'modal-lg',
      // ]);
      // echo "<div id='modalContent'>
      //   Hello World
      // </div>";
      // Modal::end();
     ?>
  <?php Pjax::begin() ?> <!-- ['timeout' => false, 'enablePushState' => false] -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        //'responsive' => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_quotation',
            'id_receipt',
            'product_description',
            'quantity',
            // 'unit_price',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
  <?php Pjax::end() ?>
</div>
