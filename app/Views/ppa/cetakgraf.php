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
        <button type="button" onclick="window.location='<?php echo base_url('ppa/graf'); ?>'">
            TUTUP
        </button>
    </p>

    <h2>Graf Maklumbalas Aduan Pelanggan</h2>

    <img class="img-fluid" src="<?php echo base_url('graf/new_bar1.php'); ?>" alt="">

</div>
</body>
</html>
