<?php

use yii\helpers\Html;
use yii\helpers\Url;

// Konfigurasi tabel
$tableOptions = [
    'class' => 'table table-striped table-bordered',
    'style' => 'width:100%;',
];

// Header tabel
$headers = [
    'Waktu Registrasi', 'No Registrasi', 'No Rekam Medis', 'Nama Pasien', 'Jenis Kelamin', 'Tanggal Lahir', 'Jenis Registrasi', 'Layanan', 'Jenis Pembayaran', 'Status Registrasi',
    'Waktu Mulai Pelayanan', 'Waktu Selesai Pelayanan', 'Petugas Pendaftaran'
];

// Isi tabel
$rows = [];
foreach ($data as $row) {
    $rows[] = [
        $row['waktu_registrasi'],
        $row['no_registrasi'],
        $row['no_rekam_medis'],
        $row['nama_pasien'],
        $row['jenis_kelamin'],
        $row['tanggal_lahir'],
        $row['jenis_registrasi'],
        $row['layanan'],
        $row['jenis_pembayaran'],
        $row['status_registrasi'],
        $row['waktu_mulai'],
        $row['waktu_selesai'],
        $row['nama_petugas'],

    ];
}

// Tampilkan tabel
echo Html::tag('h2', 'Data Export PDF');
echo Html::tag('p', 'Tanggal: ' . date('d/m/Y H:i:s'));
echo Html::beginTag('table', $tableOptions);
echo Html::beginTag('thead');
echo Html::beginTag('tr');
foreach ($headers as $header) {
    echo Html::tag('th', $header);
}
echo Html::endTag('tr');
echo Html::endTag('thead');
echo Html::beginTag('tbody');
foreach ($rows as $row) {
    echo Html::beginTag('tr');
    foreach ($row as $cell) {
        echo Html::tag('td', $cell);
    }
    echo Html::endTag('tr');
}
echo Html::endTag('tbody');
echo Html::endTag('table');
