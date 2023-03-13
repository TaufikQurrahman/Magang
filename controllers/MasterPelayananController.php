<?php

namespace app\controllers;

use app\models\MasterPelayanan;
use app\models\MasterPelayananSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Exception;

/**
 * MasterPelayananController implements the CRUD actions for MasterPelayanan model.
 */
class MasterPelayananController extends Controller
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
     * Lists all MasterPelayanan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MasterPelayananSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MasterPelayanan model.
     * @param int $no_rekam_medis No Rekam Medis
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($no_rekam_medis)
    {
        return $this->render('view', [
            'model' => $this->findModel($no_rekam_medis),
        ]);
    }

    /**
     * Creates a new MasterPelayanan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new MasterPelayanan();
        $layanan = MasterPelayanan::LAYANAN;
        $jenisPembayaran = MasterPelayanan::JENIS_PEMBAYARAN;

        if ($model->load(Yii::$app->request->post())) {
            try {
                if ($model->save()) {
                    Yii::$app->getSession()->setFlash(
                        'success',
                        'Data Tersimpan!'
                    );
                    return $this->redirect(['index', 'no_rekam_medis' => $model->no_rekam_medis]);
                }
            } catch (Exception $e) {
                Yii::$app->getSession()->setFlash(
                    'error',
                    "{$e->getMessage()}"
                );
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'layanan' => $layanan,
                'jenisPembayaran' => $jenisPembayaran,
            ]);
        }
    }

    // if ($this->request->isPost) {
    //     if ($model->load($this->request->post()) && $model->save()) {
    //         return $this->redirect(['view', 'no_rekam_medis' => $model->no_rekam_medis]);
    //     }
    // } else {
    //     $model->loadDefaultValues();
    // }

    // if ($model->load(Yii::$app->request->post())) {
    //     $model->post_create_time = date('Y-m-d h:m:s');
    //     $model->save();
    //     return $this->redirect(['view', 'id' => $model->no_rekam_medis]);
    // } else {
    //     return $this->render('create', [
    //         'model' => $model,
    //         'layanan' => $layanan,
    //         'jenisPembayaran' => $jenisPembayaran,
    //     ]);
    // }

    // if ($model->load(Yii::$app->request->post())) {
    //     $model->save();
    //     return $this->redirect(['view', 'id' => $model->pelayanan->no_rekam_medis]);
    // }

    // return $this->render('create', [
    //     'model' => $model,
    //     'layanan' => $layanan,
    //     'jenisPembayaran' => $jenisPembayaran,
    // ]);
    // }

    /**
     * Updates an existing MasterPelayanan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $no_rekam_medis No Rekam Medis
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($no_rekam_medis)
    {
        $model = $this->findModel($no_rekam_medis);
        $layanan = MasterPelayanan::LAYANAN;
        $jenisPembayaran = MasterPelayanan::JENIS_PEMBAYARAN;

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'no_rekam_medis' => $model->no_rekam_medis]);
        }

        return $this->render('update', [
            'model' => $model,
            'layanan' => $layanan,
            'jenisPembayaran' => $jenisPembayaran,
        ]);
    }

    /**
     * Deletes an existing MasterPelayanan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $no_rekam_medis No Rekam Medis
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($no_rekam_medis)
    {
        $this->findModel($no_rekam_medis)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MasterPelayanan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $no_rekam_medis No Rekam Medis
     * @return MasterPelayanan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($no_rekam_medis)
    {
        if (($model = MasterPelayanan::findOne(['no_rekam_medis' => $no_rekam_medis])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
