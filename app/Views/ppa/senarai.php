<h2>Senarai Aduan Diterima Bersama Status Aduan</h2>

<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th>Bil</th>
            <th>Ringkasan Aduan</th>
            <th>Tarikh Aduan Dibuat</th>
            <th>Pegawai & Jawatan</th>
            <th>Status Aduan</th>
            <th>Papar</th>
        </tr>
        </thead>

        <tbody>
        <?php
        $bil = 1;
        foreach ($result as $row) {
            ?>
            <tr>
                <td><?php echo $bil++; ?></td>
                <td><?php echo $row->ringkasan; ?></td>
                <td><?php echo tarikh($row->tarikhaduan); ?></td>
                <td><?php echo $row->namapegawai, '<br>', $row->namajawatan; ?></td>
                <td><?php echo $row->status; ?></td>
                <td>
                    <?php
                    if ($row->status != 'Hampir Selesai' and $row->status != 'Selesai') {
                        ?>
                        <a href="<?php echo base_url('ppa/maklumataduan/' . $row->idaduan); ?>" class="btn btn-outline-primary form-control">Maklumat</a>
                        <?php
                    } else {
                        ?>
                        <a href="<?php echo base_url('ppa/borangjawapan/' . $row->idaduan); ?>" class="btn btn-outline-primary form-control">Jawapan</a>
                        <?php
                    }
                    ?>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
