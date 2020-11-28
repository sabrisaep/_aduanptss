<h2>Maklumat Aduan Bersama Status Aduan</h2>

<div class="table-responsive">
    <table class="table">
        <tr>
            <th>Status aduan</th>
            <td><?php echo $row->status; ?></td>
        </tr>
        <tr>
            <th>Nama</th>
            <td><?php echo $row->namapengadu; ?></td>
        </tr>
        <tr>
            <th>No.K/P</th>
            <td><?php echo $row->nokppengadu; ?></td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td><?php echo nl2br($row->alamatpengadu); ?></td>
        </tr>
        <tr>
            <th>No. telefon</th>
            <td><?php echo $row->telefonpengadu; ?></td>
        </tr>
        <tr>
            <th>E-mel</th>
            <td><?php echo $row->emailpengadu; ?></td>
        </tr>
        <tr>
            <th>Ringkasan aduan</th>
            <td><?php echo nl2br($row->ringkasan); ?></td>
        </tr>
        <tr>
            <th>Lampiran</th>
            <td>
                <?php
                if ($row->lampiran != '') {
                    ?>
                    <a href="<?php echo base_url('depan/paparlampiran/' . $row->idaduan); ?>">
                        <?php echo substr($row->lampiran, 14); ?>
                    </a>
                    <?php
                }
                ?>
            </td>
        </tr>
    </table>
</div>
