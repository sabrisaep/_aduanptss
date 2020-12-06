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
        <button type="button" onclick="window.location='<?php echo base_url('ppa/statistik'); ?>'">
            TUTUP
        </button>
    </p>

    <h2>Statistik Maklumbalas Aduan Pelanggan</h2>

    <table class="table statistik">
        <thead>
        <tr>
            <th rowspan="2"></th>
            <th rowspan="2">Perkara</th>
            <th colspan="2">Bil</th>
        </tr>
        <tr>
            <th><?php echo $tahun0; ?></th>
            <th><?php echo $tahun1; ?></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>Bilangan aduan yang diterima</td>
            <td><?php echo $t0['semua']; ?></td>
            <td><?php echo $t1['semua']; ?></td>
        </tr>
        <tr>
            <td>2</td>
            <td>Bilangan aduan yang diselesaikan dalam tempoh 14 hari bekerja</td>
            <td><?php echo $t0['siapawai']; ?></td>
            <td><?php echo $t1['siapawai']; ?></td>
        </tr>
        <tr>
            <td>3</td>
            <td>Bilangan aduan dalam tindakan</td>
            <td><?php echo $t0['takselesai']; ?></td>
            <td><?php echo $t1['takselesai']; ?></td>
        </tr>
        <tr>
            <td>4</td>
            <td>Jenis-jenis aduan</td>
            <td></td>
            <td></td>
        </tr>
        <?php
        foreach (JENIS as $jenis) {
            ?>
            <tr>
                <td></td>
                <td><?php echo $jenis; ?></td>
                <td><?php echo $jenisjenis[0][$jenis]; ?></td>
                <td><?php echo $jenisjenis[1][$jenis]; ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
