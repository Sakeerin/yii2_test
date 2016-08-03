<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\detail\models\Detail */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'id_quotation' => $model->id_quotation, 'id_receipt' => $model->id_receipt], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'id_quotation' => $model->id_quotation, 'id_receipt' => $model->id_receipt], [
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
            'id',
            'id_quotation',
            'id_receipt',
            'product_description',
            'quantity',
            'unit_price',
        ],
    ]) ?>

</div>
