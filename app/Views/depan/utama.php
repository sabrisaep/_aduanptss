<div class="row">
    <div class="col-sm-9">
        <h2>Info Tentang Sistem Ini</h2>
        <p>
            Selamat datang ke Sistem Aduan Awam Pelanggan,
            Politeknik Tuanku Syed Sirajuddin, Perlis (PTSS).
            Sistem ini berfungsi untuk menguruskan aduan yang
            melibatkan perkhidmatan yang disediakan di PTSS.
        </p>
        <p>
            Pastikan maklumat lengkap diisi bagi tujuan siasatan
            dan penyampaian maklumat kepada anda. Terima kasih
            kerana mengakses sistem ini. Maklumbalas anda amat
            penting untuk meningkatkan mutu perkhidmatan di PTSS.
        </p>
    </div>
    <div class="col-sm-3">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="m-0">Log Masuk</h4>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url('depan/login'); ?>" method="post">
                    <div class="form-group">
                        <label for="idp">ID Pengguna</label>
                        <input type="text" class="form-control" required name="idp" id="idp">
                    </div>
                    <div class="form-group">
                        <label for="kata">Kata Laluan</label>
                        <input type="password" class="form-control" required name="kata" id="kata">
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Masuk</button>
                </form>
            </div>
        </div>
    </div>
</div><!--row-->
