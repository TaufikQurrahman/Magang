<?php

namespace app\controllers;

use app\models\TrxPendaftaran;
use app\models\TrxPendaftaranSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use kartik\mpdf\Pdf;
use Exception;

/**
 * TrxPendaftaranController implements the CRUD actions for TrxPendaftaran model.
 */
class TrxPendaftaranController extends Controller
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
     * Lists all TrxPendaftaran models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TrxPendaftaranSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TrxPendaftaran model.
     * @param int $no_registrasi No Registrasi
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($no_registrasi)
    {
        return $this->render('view', [
            'model' => $this->findModel($no_registrasi),
        ]);
    }

    /**
     * Creates a new TrxPendaftaran model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */

    public function actionCreate()
    {
        $model = new TrxPendaftaran();
        $jenisRegistrasi = TrxPendaftaran::JENIS_REGISTRASI;
        $statusRegistrasi = TrxPendaftaran::STATUS_REGISTRASI;

        if ($model->load(Yii::$app->request->post())) {
            try {
                if ($model->save()) {
                    Yii::$app->getSession()->setFlash(
                        'success',
                        'Data Tersimpan!'
                    );
                    return $this->redirect(['index', 'no_registrasi' => $model->no_registrasi]);
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
                'jenisRegistrasi' => $jenisRegistrasi,
                'statusRegistrasi' => $statusRegistrasi,
            ]);
        }
    }

    // public function actionCreate()
    // {
    //     $model = new TrxPendaftaran();
    //     $jenisRegistrasi = TrxPendaftaran::JENIS_REGISTRASI;
    //     $statusRegistrasi = TrxPendaftaran::STATUS_REGISTRASI;

    //     // if ($this->request->isPost) {
    //     //     if ($model->load($this->request->post()) && $model->save()) {
    //     //         return $this->redirect(['view', 'no_registrasi' => $model->no_registrasi]);
    //     //     }
    //     // } else {
    //     //     $model->loadDefaultValues();
    //     // }

    //     if ($model->load(Yii::$app->request->post())) {
    //         $model->save();
    //         return $this->redirect(['view', 'id' => $model->no_registrasi]);
    //     }

    //     return $this->render('create', [
    //         'model' => $model,
    //         'jenisRegistrasi' => $jenisRegistrasi,
    //         'statusRegistrasi' => $statusRegistrasi,
    //     ]);
    // }

    /**
     * Updates an existing TrxPendaftaran model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $no_registrasi No Registrasi
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($no_registrasi)
    {
        $model = $this->findModel($no_registrasi);
        $jenisRegistrasi = TrxPendaftaran::JENIS_REGISTRASI;
        $statusRegistrasi = TrxPendaftaran::STATUS_REGISTRASI;

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'no_registrasi' => $model->no_registrasi]);
        }

        return $this->render('update', [
            'model' => $model,
            'jenisRegistrasi' => $jenisRegistrasi,
            'statusRegistrasi' => $statusRegistrasi,
        ]);
    }

    /**
     * Deletes an existing TrxPendaftaran model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $no_registrasi No Registrasi
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($no_registrasi)
    {
        $this->findModel($no_registrasi)->delete();

        return $this->redirect(['index']);
    }

    public function actionPdf()
    {
        // Query data dari database
        // $data = Yii::$app->db->createCommand('SELECT * FROM trx_pendaftaran')->queryAll();
        $data = Yii::$app->db->createCommand('
        SELECT trx_pendaftaran.waktu_registrasi, trx_pendaftaran.no_registrasi, master_pelayanan.no_rekam_medis, 
        trx_pasien.nama_pasien, trx_pasien.jenis_kelamin, trx_pasien.tanggal_lahir, 
        trx_pendaftaran.jenis_registrasi, master_pelayanan.layanan, master_pelayanan.jenis_pembayaran, 
        trx_pendaftaran.status_registrasi, master_pelayanan.waktu_mulai, master_pelayanan.waktu_selesai, 
        master_petugas_pendaftaran.nama_petugas 
        FROM trx_pendaftaran INNER JOIN master_pelayanan ON trx_pendaftaran.no_rekam_medis = master_pelayanan.no_rekam_medis 
        INNER JOIN trx_pasien ON trx_pendaftaran.id_pasien = trx_pasien.id_pasien 
        INNER JOIN master_petugas_pendaftaran ON trx_pendaftaran.id_petugas = master_petugas_pendaftaran.id_petugas 
        ORDER BY trx_pendaftaran.no_registrasi;')->queryAll();

        // Konfigurasi TCPDF
        $pdf = new Pdf([
            // Nama file PDF yang akan dihasilkan
            'filename' => 'Export PDF.pdf',
            // Ukuran dan orientasi halaman
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // Konfigurasi margin
            'marginLeft' => 15,
            'marginRight' => 15,
            'marginTop' => 16,
            'marginBottom' => 16,
            // Konfigurasi header dan footer
            'options' => [
                'title' => 'Export PDF',
            ],
            'methods' => [
                'SetHeader' => ['Export PDF'],
                'SetFooter' => ['{PAGENO}'],
            ],
        ]);

        // Mengisi konten PDF dengan data dari database
        $pdf->content = $this->renderPartial('_pdf', ['data' => $data]);

        // Menghasilkan file PDF
        return $pdf->render();
    }

    /**
     * Finds the TrxPendaftaran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $no_registrasi No Registrasi
     * @return TrxPendaftaran the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($no_registrasi)
    {
        if (($model = TrxPendaftaran::findOne(['no_registrasi' => $no_registrasi])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
