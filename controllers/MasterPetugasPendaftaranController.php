<?php

namespace app\controllers;

use app\models\MasterPetugasPendaftaran;
use app\models\MasterPetugasPendaftaranSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MasterPetugasPendaftaranController implements the CRUD actions for MasterPetugasPendaftaran model.
 */
class MasterPetugasPendaftaranController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all MasterPetugasPendaftaran models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MasterPetugasPendaftaranSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MasterPetugasPendaftaran model.
     * @param int $id_petugas Id Petugas
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_petugas)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_petugas),
        ]);
    }

    /**
     * Creates a new MasterPetugasPendaftaran model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new MasterPetugasPendaftaran();

        // if ($this->request->isPost) {
        //     if ($model->load($this->request->post()) && $model->save()) {
        //         return $this->redirect(['view', 'id_petugas' => $model->id_petugas]);
        //     }
        // } else {
        //     $model->loadDefaultValues();
        // }

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_petugas]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MasterPetugasPendaftaran model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_petugas Id Petugas
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_petugas)
    {
        $model = $this->findModel($id_petugas);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_petugas' => $model->id_petugas]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MasterPetugasPendaftaran model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_petugas Id Petugas
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_petugas)
    {
        $this->findModel($id_petugas)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MasterPetugasPendaftaran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_petugas Id Petugas
     * @return MasterPetugasPendaftaran the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_petugas)
    {
        if (($model = MasterPetugasPendaftaran::findOne(['id_petugas' => $id_petugas])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}