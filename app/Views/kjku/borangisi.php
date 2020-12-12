<div class="row">
    <div class="col-sm-10">
        <h2>Borang Laporan Siasatan Telah Disi KJ/KU</h2>
    </div>
    <div class="col-sm-2 text-right">
        <a href="<?php echo base_url('kjku/cetakborang/' . $row->idaduan); ?>"
           class="btn btn-primary">Cetak</a>
    </div>
</div>

<p class="font-weight-bold">Butir-butir Aduan:</p>
<p>
    Tarikh Terima Aduan: <?php echo tarikh($row->tarikhterima); ?>
    <br>
    No. Rujukan Aduan: <?php echo $row->noruj; ?>
</p>

<p class="font-weight-bold">Ringkasan Aduan:</p>
<p><?php echo nl2br($row->ringkasan); ?></p>

<p class="font-weight-bold">Dapatan Hasil Siasatan</p>

<p class="font-weight-bold">a) Punca ketidakpatuhan:</p>
<p><?php echo nl2br($row->punca); ?></p>

<p class="font-weight-bold">b) Tindakan pembetulan</p>
<p><?php echo nl2br($row->pembetulan); ?></p>

<div class="row">
    <div class="col-sm-6">
        Nama pelaksana:
        <?php echo $pegawaipelaksana; ?>
        <br>
        Tarikh:
        <?php echo tarikh($row->tarikhpelaksana); ?>
    </div>
    <div class="col-sm-6">
        Disahkan oleh:
        <?php echo $disahkanoleh; ?>
        <br>
        Tarikh:
        <?php echo tarikh($row->tarikhdisahkan); ?>
    </div>
</div>

<br>
<p class="font-weight-bold">c) Pemantauan tindakan</p>
<p><?php echo nl2br($row->pemantauan); ?></p>

<p class="font-weight-bold">Status tindakan</p>
<p><?php echo nl2br($row->statustindakan); ?></p>

<p>Pegawai siasatan: <?php echo $pegawaisiasatan; ?></p>
<p>Tarikh: <?php echo tarikh($row->tarikhjawapankjku); ?></p>
