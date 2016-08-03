<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\receipt\models\Receipt */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Receipts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receipt-view">

    <h1><?= Html::encode($this->title) ?></h1>

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_doc_re',
            'id_company',
            'id_customer',
            'date',
        ],
    ]) ?>

</div>
