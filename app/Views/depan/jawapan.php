<div class="row">
    <div class="col-sm-10">
        <h2>Jawapan Aduan Rasmi</h2>
    </div>
    <div class="col-sm-2 text-right">
        <a href="<?php echo base_url('depan/cetakjawapan/' . $row->idaduan); ?>"
           class="btn btn-primary">Cetak</a>
    </div>
</div>

<p class="font-weight-bold">Butir-butir Aduan:</p>
<p>
    Tarikh Jawapan Rasmi: <?php echo tarikh($row->tarikhjawapanrasmi); ?>
    <br>
    No. Rujukan Aduan: <?php echo $row->noruj; ?>
</p>

<p class="font-weight-bold">Ringkasan Aduan:</p>
<p><?php echo nl2br($row->ringkasan); ?></p>

<p class="font-weight-bold">Jawapan Terhadap Aduan Dikemukakan:</p>
<p><?php echo $row->tajuksuratjawapan; ?></p>
<p><?php echo nl2br($row->jawapanrasmi); ?></p>

<p>Sekian, terima kasih.</p>
<p>"BERKHIDMATA UNTUK NEGARA"</p>
<p>Saya yang menjalankan amanah,</p>
<p>
    <?php echo $row->namappa; ?><br>
    Pegawai Perhubungan Awam<br>
    b.p. Pengarah<br>
    Politeknik Tuanku Syed Sirajuddin,<br>
    Perlis
</p>
