<h2>Semak Aduan</h2>

<div class="row">
    <div class="col-sm-4">
        <form action="<?php echo base_url('depan/semakaduan'); ?>" method="post">
            <div class="form-group">
                <label for="nokp">Sila masukkan nombor kad pengenalan anda</label>
                <div class="input-group">
                    <input type="text" name="nokp" id="nokp" minlength="12" maxlength="12" required
                           class="form-control">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-outline-primary">Hantar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php
    if ($tiada) {
        ?>
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body text-danger">
                    Harap maaf, nombor kad pengenalan anda tidak dapat
                    dikenalpasti. Sila pastikan anda telah memasukkan
                    nombor kad pengenalan anda dengan betul.
                </div>
            </div>
        </div>
        <?php
    }
    ?>

</div><!--row-->

<?php
if (count($listaduan)) {
    ?>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Bil</th>
                <th>Ringkasan Aduan</th> <!-- 2G) Tajuk aduan mai dari mana? -->
                <th>Tarikh Aduan</th>
                <th>Status Aduan</th>
                <th>Tindakan</th>
            </tr>
            </thead>

            <tbody>
            <?php
            $bil = 1;
            foreach ($listaduan as $row) {
                ?>
                <tr>
                    <td><?php echo $bil++; ?></td>
                    <td><?php echo $row->ringkasan; ?></td>
                    <td><?php echo tarikh($row->tarikhaduan); ?></td>
                    <td><?php echo $row->status; ?></td>
                    <td>
                        <a href="<?php
                        if ($row->status != 'Selesai') {
                            echo base_url('depan/detailaduan/' . $row->idaduan);
                        } else {
                            echo base_url('depan/jawapan/' . $row->idaduan);
                        }
                        ?>" class="btn btn-outline-primary">Papar</a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
    <?php
}
