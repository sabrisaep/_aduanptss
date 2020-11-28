<!doctype html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aduan Awam PTSS</title>
    <link href="<?php echo base_url('assets/css/cetak.css'); ?>" rel="stylesheet">
</head>
<body>
<div class="container">
    <p class="sorok">
        <button type="button" onclick="print()">CETAK</button>
        <button type="button" onclick="window.location='<?php echo base_url('depan/jawapan/' . $row->idaduan); ?>'">
            TUTUP
        </button>
    </p>

    <img class="letterhead" src="<?php echo base_url('assets/img/letterhead.jpg'); ?>" alt="">

    <table class="kanan">
        <tr>
            <td>Rujukan:</td>
            <td><?php echo $row->noruj; ?></td>
        </tr>
        <tr>
            <td>Tarikh:</td>
            <td><?php echo tarikh($row->tarikhjawapanrasmi); ?></td>
        </tr>
    </table>

    <p>
        <?php
        echo $row->namapengadu, '<br>';
        echo nl2br($row->alamatpengadu);
        ?>
    </p>

    <p>Tuan/Puan,</p>
    <p class="font-weight-bold"><?php echo $row->tajuksuratjawapan; ?></p>
    <p><?php echo nl2br($row->jawapanrasmi); ?></p>

    <p>Sekian, terima kasih.</p>
    <p>"BERKHIDMAT UNTUK NEGARA"</p>
    <p>Saya yang menjalankan amanah,</p>
    <p>
        <?php echo $row->namappa; ?><br>
        Pegawai Perhubungan Awam<br>
        b.p. Pengarah<br>
        Politeknik Tuanku Syed Sirajuddin,<br>
        Perlis
    </p>
</div>
</body>
</html>
