<?php

namespace backend\modules\detail\controllers;

use Yii;
use backend\modules\detail\models\Detail;
use backend\modules\detail\models\DetailSearch;
use backend\modules\quotation\models\Quotation;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\Pjax;
use yii\helpers\Url;


/**
 * DetailController implements the CRUD actions for Detail model.
 */
class DetailController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Detail models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Detail model.
     * @param integer $id
     * @param integer $id_quotation
     * @param integer $id_receipt
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Detail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Detail();
        //$q = Quotation::find('id')->orderBy(['id' => 'SORT_DESC'])->where('id' => $model->id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/quotation/quotation/view', 'id' => $model->id, 'id_quotation' => $model->id_quotation, 'id_receipt' => $model->id_receipt]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
                //'q' => $q,
            ]);
        }
    }

    /**
     * Updates an existing Detail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $id_quotation
     * @param integer $id_receipt
     * @return mixed
     */
    public function actionUpdate($id, $id_quotation, $id_receipt)
    {
        $model = $this->findModel($id, $id_quotation, $id_receipt);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'id_quotation' => $model->id_quotation, 'id_receipt' => $model->id_receipt]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Detail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $id_quotation
     * @param integer $id_receipt
     * @return mixed
     */
    public function actionDelete($id, $id_quotation, $id_receipt)
    {
        $this->findModel($id, $id_quotation, $id_receipt)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Detail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $id_quotation
     * @param integer $id_receipt
     * @return Detail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Detail::findOne(['id' => $id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
