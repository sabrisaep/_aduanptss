<h2>Borang Laporan Siasatan Untuk Diisi KJ/KU</h2>

<p class="font-weight-bold">Butir-butir Aduan:</p>
<p>
    Tarikh Terima Aduan: <?php echo tarikh($row->tarikhterima); ?>
    <br>
    No. Rujukan Aduan: <?php echo $row->noruj; ?>
</p>

<p class="font-weight-bold">Ringkasan Aduan:</p>
<p><?php echo nl2br($row->ringkasan); ?></p>

<p class="font-weight-bold">Dapatan Hasil Siasatan</p>

<form action="<?php echo base_url('kjku/borang_simpan'); ?>" method="post">
    <input type="hidden" name="idaduan" value="<?php echo $row->idaduan; ?>">
    <div class="form-group">
        <label for="punca">a) Punca ketidakpatuhan</label>
        <textarea name="punca" id="punca" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="pembetulan">b) Tindakan pembetulan</label>
        <textarea name="pembetulan" id="pembetulan" class="form-control" required></textarea>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="pegawaipelaksana">Nama pelaksana</label>
                <select name="pegawaipelaksana" id="pegawaipelaksana" class="form-control" required>
                    <option value=""></option>
                    <?php
                    foreach ($parapegawai as $peg) {
                        echo "<option value=\"$peg->idpegawai\">$peg->namapegawai</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="disahkanoleh">Disahkan oleh</label>
                <select name="disahkanoleh" id="disahkanoleh" class="form-control" required>
                    <option value=""></option>
                    <?php
                    foreach ($parapegawai as $peg) {
                        echo "<option value=\"$peg->idpegawai\">$peg->namapegawai</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
    </div><!--row-->
    <div class="form-group">
        <label for="pemantauan">c) Pemantauan tindakan</label>
        <textarea name="pemantauan" id="pemantauan" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label for="statustindakan">Status tindakan</label>
        <textarea name="statustindakan" id="statustindakan" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-outline-primary">Simpan</button>
</form>
