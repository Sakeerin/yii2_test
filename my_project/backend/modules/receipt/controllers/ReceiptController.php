<?php

namespace backend\modules\receipt\controllers;

use Yii;
use backend\modules\receipt\models\Receipt;
use backend\modules\receipt\models\ReceiptSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReceiptController implements the CRUD actions for Receipt model.
 */
class ReceiptController extends Controller
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
     * Lists all Receipt models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReceiptSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Receipt model.
     * @param integer $id
     * @param integer $id_company
     * @param integer $id_customer
     * @return mixed
     */
    public function actionView($id, $id_company, $id_customer)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $id_company, $id_customer),
        ]);
    }

    /**
     * Creates a new Receipt model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Receipt();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'id_company' => $model->id_company, 'id_customer' => $model->id_customer]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Receipt model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $id_company
     * @param integer $id_customer
     * @return mixed
     */
    public function actionUpdate($id, $id_company, $id_customer)
    {
        $model = $this->findModel($id, $id_company, $id_customer);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'id_company' => $model->id_company, 'id_customer' => $model->id_customer]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Receipt model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $id_company
     * @param integer $id_customer
     * @return mixed
     */
    public function actionDelete($id, $id_company, $id_customer)
    {
        $this->findModel($id, $id_company, $id_customer)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Receipt model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $id_company
     * @param integer $id_customer
     * @return Receipt the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $id_company, $id_customer)
    {
        if (($model = Receipt::findOne(['id' => $id, 'id_company' => $id_company, 'id_customer' => $id_customer])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
