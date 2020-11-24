<h2>Semak Aduan</h2>

<div class="row">
    <div class="col-sm-4">
        <form action="<?php echo base_url('depan/semakaduancari'); ?>" method="post">
            <div class="form-group">
                <label for="nokp">Sila masukkan nombor kad pengenalan anda</label>
                <div class="input-group">
                    <input type="text" name="nokp" id="nokp" minlength="12" maxlength="12" required class="form-control">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-outline-primary">Hantar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="col-sm-8">
        <div class="card">
            <div class="card-body text-danger">
                Harap maaf, nombor kad pengenalan anda tidak dapat
                dikenalpasti. Sila pastikan anda telah memasukkan
                nombor kad pengenalan anda dengan betul.
            </div>
        </div>

        <div class="table-responsive">
            <p>Senarai aduan pengadu bersama status</p>
            <table class="table">
                <thead>
                <tr>
                    <th>Bil</th>
                    <th>Tajuk Aduan</th> <!-- 2G) Tajuk aduan mai dari mana? -->
                    <th>Tarikh</th>
                    <th>Status</th>
                    <th>Tindakan</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>


</div><!--row-->
