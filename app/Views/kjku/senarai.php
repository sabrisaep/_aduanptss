<h2>Senarai Aduan Diterima Bersama Status Aduan</h2>

<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th>Bil</th>
            <th>Ringkasan Aduan</th>
            <th>Tarikh Aduan Dibuat</th>
            <th>Status Aduan</th>
            <th></th>
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
                <td><?php echo $row->status; ?></td>
                <td>
                        <a href="<?php echo base_url('kjku/maklumataduan/' . $row->idaduan); ?>" class="btn btn-outline-primary form-control">Papar</a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
