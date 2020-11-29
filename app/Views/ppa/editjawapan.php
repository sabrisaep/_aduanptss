<h2>Borang Jawapan Aduan Rasmi Untuk Diedit Oleh PPA</h2>

<p class="font-weight-bold">Butir-butir Aduan:</p>
<div class="row">
    <div class="col-sm-6">
        Tarikh terima aduan: <?php echo tarikh($row->tarikhterima); ?>
    </div>
    <div class="col-sm-6">
        No. rujukan aduan: <?php echo $row->noruj; ?>
    </div>
</div>
<br>

<p class="font-weight-bold">Ringkasan Aduan</p>
<p><?php echo $row->ringkasan; ?></p>

<form action="<?php echo base_url('ppa/simpaneditjawapan'); ?>" method="post">
    <input type="hidden" name="idaduan" value="<?php echo $row->idaduan; ?>">
    <div class="form-group">
        <label for="jawapanrasmi" class="font-weight-bold">Jawapan Terhadap Aduan Dikemukakan</label>
        <textarea name="jawapanrasmi" id="jawapanrasmi" class="form-control" required><?php echo $row->jawapanrasmi; ?></textarea>
    </div>

    <p>Sekian, terima kasih.</p>
    <p>"BERKHIDMAT UNTUK NEGARA"</p>

    <div class="form-group">
        <label for="namappa">Saya yang menjalankan amanah,</label>
        <input type="text" name="namappa" id="namappa" class="form-control" required value="<?php echo $row->namappa; ?>">
    </div>

    <p>
        Pegawai Perhubungan Awam<br>
        b.p. Pengarah<br>
        Politeknik Tuanku Syed Sirajuddin,<br>
        Perlis
    </p>

    <button type="submit" class="btn btn-outline-primary">Simpan</button>
</form>
