<div class="row">
    <div class="col-sm-10">
        <h2>Borang Jawapan Aduan Rasmi Dari KJ/KU</h2>
    </div>
    <?php
    if ($row->status == 'Hampir Selesai' and $user == 'ppa') {
        ?>
        <div class="col-sm-2 text-right">
            <div class="btn-group">
                <a href="<?php echo base_url('ppa/editjawapan/' . $row->idaduan); ?>" class="btn btn-primary">Edit</a>
                <a href="<?php echo base_url('ppa/sahkanjawapan/' . $row->idaduan); ?>"
                   class="btn btn-primary">Sahkan</a>
            </div>
        </div>
        <?php
    }
    ?>
</div>

<p class="font-weight-bold">Butir-butir Aduan</p>
<table>
    <tr>
        <td>Tarikh aduan dibuat</td>
        <td>:</td>
        <td><?php echo tarikh($row->tarikhaduan); ?></td>
    </tr>
    <tr>
        <td>Tarikh terima aduan</td>
        <td>:</td>
        <td><?php echo tarikh($row->tarikhterima); ?></td>
    </tr>
    <tr>
        <td>Tarikh jawapan KJ/KU</td>
        <td>:</td>
        <td><?php echo tarikh($row->tarikhjawapankjku); ?></td>
    </tr>
    <tr>
        <td>No. rujukan aduan</td>
        <td>:</td>
        <td><?php echo $row->noruj; ?></td>
    </tr>
</table>
<br>

<p class="font-weight-bold">Ringkasan Aduan</p>
<p><?php echo $row->ringkasan; ?></p>

<p class="font-weight-bold">Jawapan Terhadap Aduan Dikemukakan</p>
<p><?php echo $row->jawapanrasmi; ?></p>

<p>Sekian, terima kasih.</p>
<p>Saya yang menjalankan amanah,</p>
<p>
    <?php
    echo $row->namapegawai, '<br>';
    echo $row->namajawatan, ' ', $row->namajabatan, '<br>';
    ?>
    Politeknik Tuanku Syed Sirajuddin,<br>Perlis.
</p>

