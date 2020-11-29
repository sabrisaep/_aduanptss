<h2>Senarai Nama Dan Emel Ketua Jabatan Dan Ketua Unit</h2>

<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th>Jawatan</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Emel</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($result as $row) {
            ?>
            <tr>
                <td><?php echo $row->namajawatan; ?></td>
                <td><?php echo $row->namapegawai; ?></td>
                <td><?php echo $row->namajabatan; ?></td>
                <td><?php echo $row->emelpegawai; ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
