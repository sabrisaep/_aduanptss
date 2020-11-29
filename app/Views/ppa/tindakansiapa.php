<h2>Aduan Oleh PPA Kepada KJ/KU Untuk Tindakan</h2>

<form action="<?php echo base_url('ppa/simpantindakan'); ?>" method="post">
    <input type="hidden" name="idaduan" value="<?php echo $idaduan; ?>">
    <div class="row align-items-center">
        <div class="col-sm-3">
            <div class="form-group">
                <label for="noruj">Nombor rujukan aduan</label>
                <input name="noruj" id="noruj" type="text" class="form-control" required>
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                <label for="pegawai">Aduan dijawab oleh</label>
                <select name="pegawai" id="pegawai" class="form-control" required>
                    <option value=""></option>
                    <?php
                    foreach ($result as $row) {
                        echo "<option value=\"$row->idpegawai\">$row->namapegawai, $row->namajabatan</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label for="jenis">Jenis aduan</label>
                <select name="jenis" id="jenis" class="form-control" required>
                    <option value=""></option>
                    <?php
                    foreach (JENIS as $jenis) {
                        echo "<option value=\"$jenis\">$jenis</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-sm-1">
            <button type="submit" class="btn btn-outline-primary">Hantar</button>
        </div>
    </div><!--row-->
</form>
