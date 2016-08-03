<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\customer\models\CustomersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!-- Render create form -->

     <!-- $this->render('_form', [
        'model' => $model,
    ])
    ?>-->
    <?php Pjax::begin(); ?>
    <p>
        <?= Html::a('Create Customer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::end(); ?>
    <?php Pjax::begin(['enablePushState' => false]) ?> <!-- เพิ่มคำสั่งนี้ ['id' => 'new_country'] หากต้องการเรียกหน้าค้นหน้าในหน้าฟอร์ม-->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'address',
            'phone_number',
            'email:email',
            // 'website',
            // 'bank_info',
            // 'tax:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
  <?php Pjax::end() ?>

</div>
