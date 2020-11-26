<?php namespace App\Controllers;

use App\Models\AduanModel;
use App\Models\JabatanModel;
use App\Models\PegawaiModel;
use App\Models\PengaduModel;

class Depan extends BaseController
{
    public function index()
    {
        echo view('depan/atas');
        echo view('depan/utama');
        echo view('depan/bawah');

        $session = session();
        if ($session->mesej) {
            $data = ['mesej' => $session->mesej];
            echo view('depan/mesej', $data);
        }
    }

    public function login()
    {
        $ppa = [
            'Pegawai Perhubungan Awam',
            'Pegawai Khidmat Pelangan',
        ];
        $kjku = [
            'Ketua Jabatan',
            'Ketua Unit',
        ];
        $pengarah = [
            'Pengarah',
            'TPA',
            'TPSA',
        ];

        $idp = $this->request->getVar('idp');
        $kata = $this->request->getVar('kata');

        $model = new PegawaiModel();
        $model->join('jawatan', 'pegawai.jawatan = jawatan.idjawatan');
        $model->where(['nokppegawai' => $idp]);
        if ($model->countAllResults(false)) {
            $row = $model->get()->getRowObject();
            if (password_verify($kata, $row->kata)) {
                if (in_array($row->namajawatan, $ppa)) {
                    return redirect()->to(base_url('ppa'));
                } elseif (in_array($row->namajawatan, $kjku)) {
                    return redirect()->to(base_url('kjku'));
                } elseif (in_array($row->namajawatan, $pengarah)) {
                    return redirect()->to(base_url('pengarah'));
                } else {
                    $session = session();
                    $session->set(['mesej' => 'Maaf, anda gagal log masuk.']);
                    $session->markAsFlashdata('mesej');
                    return redirect()->to(base_url());
                }
            } else {
                $session = session();
                $session->set(['mesej' => 'Maaf, anda gagal log masuk.']);
                $session->markAsFlashdata('mesej');
                return redirect()->to(base_url());
            }
        } else {
            $session = session();
            $session->set(['mesej' => 'Maaf, anda gagal log masuk.']);
            $session->markAsFlashdata('mesej');
            return redirect()->to(base_url());
        }
    }

    public function mycaptcha()
    {
        helper('mycaptcha_helper');
        echo view(kodsulit());
    }

    public function aduanbaru()
    {
        $model = new JabatanModel();
        $model->orderBy('namajabatan');
        $data = [
            'listjabatan' => $model->get()->getResultObject(),
        ];

        echo view('depan/atas');
        echo view('depan/aduanbaru', $data);
        echo view('depan/bawah');

        $session = session();
        if ($session->mesej) {
            $data = ['mesej' => $session->mesej];
            echo view('depan/mesej', $data);
        }
    }

    public function aduanbaru_simpan()
    {
        $modelPengadu = new PengaduModel();
        $modelAduan = new AduanModel();

        $session = session();
        $kodsulit = $session->kodsulit;
        $koduser = $this->request->getVar('kodsulit');

        if ($kodsulit != strtoupper($koduser)) {
            $session->set(['mesej' => 'Maaf, kod sulit anda salah.']);
            $session->markAsFlashdata('mesej');
            return redirect()->to(base_url('depan/aduanbaru'));
        } else {
            $pengadu = [
                'namapengadu' => $this->request->getVar('namapengadu'),
                'nokppengadu' => $this->request->getVar('nokppengadu'),
                'alamatpengadu' => $this->request->getVar('alamatpengadu'),
                'telefonpengadu' => $this->request->getVar('telefonpengadu'),
                'emailpengadu' => $this->request->getVar('emailpengadu'),
            ];
            $modelPengadu->insert($pengadu);
            $idpengadu = $modelPengadu->getInsertID();

            $dariform = $this->request->getFile('lampiran');
            $lampiran = $this->lampiran_aduan($dariform);

            $aduan = [
                'pengadu' => $idpengadu,
                'ringkasan' => $this->request->getVar('ringkasan'),
                'jabatan' => $this->request->getVar('jabatan'),
                'lampiran' => $lampiran,
                'tarikhaduan' => date('Y-m-d'),
                'status' => 'Baru',
            ];
            $modelAduan->insert($aduan);

            return redirect()->to(base_url('depan/aduanbaru_terima'));
        }
    }

    private function lampiran_aduan($lampiran)
    {
        if ($lampiran == '') {
            return '';
        } else {
            if (!$lampiran->isValid()) {
                return '';
            } else {
                $nama = date('YmdHis') . $lampiran->getClientName();
                $lampiran->move(WRITEPATH . 'uploads', $nama);
                return $nama;
            }
        }
    }

    public function aduanbaru_terima()
    {
        echo view('depan/atas');
        echo view('depan/aduanbaru_terima');
        echo view('depan/bawah');
    }

    public function semakaduan()
    {
        helper('tarikh_helper');
        $tiada = false;
        $listaduan = [];

        $model = new AduanModel();
        $model->join('pengadu', 'aduan.pengadu = pengadu.idpengadu');
        $model->orderBy('aduan.tarikhaduan', 'DESC');

        if ($this->request->getVar('nokp')) {
            $nokp = $this->request->getVar('nokp');
            $model->where(['pengadu.nokppengadu' => $nokp]);
            if ($model->countAllResults(false)) {
                $listaduan = $model->get()->getResultObject();
            } else {
                $tiada = true;
            }
        }

        $data = [
            'tiada' => $tiada,
            'listaduan' => $listaduan,
        ];

        echo view('depan/atas');
        echo view('depan/semakaduan', $data);
        echo view('depan/bawah');
    }

}
