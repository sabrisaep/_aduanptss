<h2>Aduan Baru</h2>

<form enctype="multipart/form-data" action="<?php echo base_url('depan/aduanbaru_simpan'); ?>" method="post">
    <p class="font-weight-bold mb-2 mt-2">1) Sila nyatakan aduan anda;</p>
    <div class="form-group">
        <label for="ringkasan">a) Ringkasan Aduan:</label>
        <textarea name="ringkasan" id="ringkasan" class="form-control" required></textarea>
        <div>
            (sila berikan butiran lengkap mengenai aduan/maklumbalas yang diberikan)
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="jabatan">b) Jabatan/Unit terlibat:</label>
                <select name="jabatan" id="jabatan" class="form-control" required>
                    <option value=""></option>
                    <?php
                    foreach ($listjabatan as $jabatan) {
                        echo "<option value=\"$jabatan->idjabatan\">$jabatan->namajabatan</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="lampiran">c) Lampiran (jika ada):</label>
                <input type="file" name="lampiran" id="lampiran" class="form-control">
            </div>
        </div>
    </div><!--row-->

    <p class="font-weight-bold mb-2 mt-2">2) Butiran peribadi anda;</p>
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label for="namapengadu">Nama:</label>
                <input type="text" name="namapengadu" id="namapengadu" required class="form-control">
            </div>
            <div class="form-group">
                <label for="nokppengadu">No.K/P:</label>
                <input type="text" name="nokppengadu" id="nokppengadu" required class="form-control" minlength="12"
                       maxlength="12">
            </div>
        </div><!--col-sm-4-->
        <div class="col-sm-4">
            <div class="form-group">
                <label for="telefonpengadu">No. telefon:</label>
                <input type="text" name="telefonpengadu" id="telefonpengadu" required class="form-control">
            </div>
            <div class="form-group">
                <label for="emailpengadu">email:</label>
                <input type="text" name="emailpengadu" id="emailpengadu" required class="form-control">
            </div>
        </div><!--col-sm-4-->
        <div class="col-sm-4">
            <div class="form-group">
                <label for="alamatpengadu">Alamat:</label>
                <textarea name="alamatpengadu" id="alamatpengadu" class="form-control" required></textarea>
            </div>
        </div><!--col-sm-4-->
    </div><!--row-->

    <div class="row">
        <div class="col-sm-9">
            <p class="font-weight-bold mb-2 mt-2">Akuan Pengesahan:</p>
            <p>
                Saya mengaku bahawa saya telah membaca dan memahami takrif
                aduan dan prosedur pengurusan aduan oleh pihak PTSS.
                Segala maklumat diri dan maklumat perkara yang dikemukakan
                oleh saya adalah benar dan saya bertanggungjawab ke atasnya.
            </p>
        </div>
        <div class="col-sm-3">
            <p class="font-weight-bold mb-2 mt-2">Kod Sulit:</p>

            <img src="<?php echo base_url('depan/mycaptcha'); ?>" alt="CAPTCHA" class="img-fluid" style="min-width: 100%;">
            <label for="kodsulit">Sila taip semula tanpa jarak</label>
            <div class="from-group">
                <div class="input-group">
                    <input name="kodsulit" id="kodsulit" type="text" class="form-control" required minlength="6" maxlength="6">
                    <div class="input-group-append">
                    <button type="submit" class="btn btn-outline-primary">Hantar</button>
                    </div>
                </div>
            </div>
        </div>
    </div><!--row-->
</form>
