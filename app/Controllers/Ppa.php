<?php namespace App\Controllers;

use App\Models\AduanModel;
use App\Models\PegawaiModel;

class Ppa extends BaseController
{
    private function mula()
    {
        $session = session();
        if (!$session->idpegawai) {
            return false;
        } else {
            return true;
        }
    }

    private function namapegawai()
    {
        $session = session();
        $idpegawai = $session->idpegawai;
        $model_pegawai = new PegawaiModel();
        $model_pegawai->join('jawatan', 'pegawai.jawatan = jawatan.idjawatan');
        $model_pegawai->where(['idpegawai' => $idpegawai]);
        $row_pegawai = $model_pegawai->get()->getRowObject();
        return $row_pegawai->namapegawai . ', ' . $row_pegawai->namajawatan;
    }

    public function index()
    {
        if (!$this->mula()) return redirect()->to(base_url());

        $model = new AduanModel();
        $model->join('pegawai', 'aduan.pegawai = pegawai.idpegawai', 'left');
        $model->join('jawatan', 'pegawai.jawatan = jawatan.idjawatan', 'left');
        $model->orderBy('tarikhaduan', 'DESC');
        $data = [
            'result' => $model->get()->getResultObject(),
        ];

        $bawah = ['namapegawai' => $this->namapegawai()];
        helper('tarikh_helper');

        echo view('ppa/atas');
        echo view('ppa/senarai', $data);
        echo view('ppa/bawah', $bawah);
        return 0;
    }

    public function maklumataduan($idaduan)
    {
        if (!$this->mula()) return redirect()->to(base_url());

        $model = new AduanModel();
        $model->join('pengadu', 'aduan.pengadu = pengadu.idpengadu');
        $syarat = ['idaduan' => $idaduan];
        $model->where($syarat);
        if ($model->countAllResults(false)) {
            $row = $model->get()->getRowObject();
            $data = ['row' => $row];
            $bawah = ['namapegawai' => $this->namapegawai()];

            echo view('ppa/atas');
            echo view('depan/detailaduan', $data);
            if ($row->status == 'Baru') {
                $tindakan = ['idaduan' => $idaduan];
                echo view('ppa/butangtindakan', $tindakan);
            }
            echo view('ppa/bawah', $bawah);
            return 0;
        } else {
            return redirect()->to(base_url('ppa'));
        }
    }

    public function tindakansiapa($idaduan)
    {
        if (!$this->mula()) return redirect()->to(base_url());

        $model = new PegawaiModel();
        $model->join('jawatan', 'pegawai.jawatan = jawatan.idjawatan');
        $model->join('jabatan', 'pegawai.jabatan = jabatan.idjabatan');
        $jawatan = ['Ketua Jabatan', 'Ketua Unit'];
        $model->whereIn('namajawatan', $jawatan);
        $model->orderBy('namapegawai');

        $data = [
            'idaduan' => $idaduan,
            'result' => $model->get()->getResultObject(),
        ];
        $bawah = ['namapegawai' => $this->namapegawai()];

        echo view('ppa/atas');
        echo view('ppa/tindakansiapa', $data);
        echo view('ppa/bawah', $bawah);
        return 0;
    }

    public function simpantindakan()
    {
        if (!$this->mula()) return redirect()->to(base_url());

        $idaduan = $this->request->getVar('idaduan');
        $data = [
            'status' => 'Dalam Tindakan',
            'noruj' => $this->request->getVar('noruj'),
            'pegawai' => $this->request->getVar('pegawai'),
            'jenis' => $this->request->getVar('jenis'),
            'tarikhterima' => date('Y-m-d'),
        ];

        $model = new AduanModel();
        $model->set($data);
        $model->where(['idaduan' => $idaduan]);
        $model->update();

        # TODO: hantar emel kepada KJ/KU

        return redirect()->to(base_url('ppa'));
    }

    public function borangjawapan($idaduan)
    {
        if (!$this->mula()) return redirect()->to(base_url());

        $model = new AduanModel();
        $model->join('pengadu', 'aduan.pengadu = pengadu.idpengadu');
        $model->join('pegawai', 'aduan.pegawai = pegawai.idpegawai');
        $model->join('jawatan', 'pegawai.jawatan = jawatan.idjawatan');
        $model->join('jabatan', 'pegawai.jabatan = jabatan.idjabatan');
        $syarat = ['idaduan' => $idaduan];
        $model->where($syarat);
        if ($model->countAllResults(false)) {
            $data = ['row' => $model->get()->getRowObject()];
            $bawah = ['namapegawai' => $this->namapegawai()];

            helper('tarikh_helper');
            echo view('ppa/atas');
            echo view('ppa/borangjawapan', $data);
            echo view('ppa/bawah', $bawah);
            return 0;
        } else {
            return redirect()->to(base_url('ppa'));
        }
    }

    public function editjawapan($idaduan)
    {
        if (!$this->mula()) return redirect()->to(base_url());

        $model = new AduanModel();
        $syarat = ['idaduan' => $idaduan];
        $model->where($syarat);
        if ($model->countAllResults(false)) {
            $data = ['row' => $model->get()->getRowObject()];
            $bawah = ['namapegawai' => $this->namapegawai()];

            helper('tarikh_helper');
            echo view('ppa/atas');
            echo view('ppa/editjawapan', $data);
            echo view('ppa/bawah', $bawah);
            return 0;
        } else {
            return redirect()->to(base_url('ppa'));
        }
    }

    public function simpaneditjawapan()
    {
        if (!$this->mula()) return redirect()->to(base_url());

        $idaduan = $this->request->getVar('idaduan');
        $data = [
            'jawapanrasmi' => $this->request->getVar('jawapanrasmi'),
            'namappa' => $this->request->getVar('namappa'),
        ];

        $model = new AduanModel();
        $model->set($data);
        $model->where(['idaduan' => $idaduan]);
        $model->update();

        return redirect()->to(base_url('ppa'));
    }

    public function sahkanjawapan($idaduan)
    {
        if (!$this->mula()) return redirect()->to(base_url());

        $data = [
            'status' => 'Selesai',
            'tarikhjawapanrasmi' => date('Y-m-d'),
        ];

        $model = new AduanModel();
        $model->set($data);
        $model->where(['idaduan' => $idaduan]);
        $model->update();

        return redirect()->to(base_url('ppa'));
    }

    public function kjku()
    {
        if (!$this->mula()) return redirect()->to(base_url());

        $model = new PegawaiModel();
        $model->join('jawatan', 'pegawai.jawatan = jawatan.idjawatan');
        $model->join('jabatan', 'pegawai.jabatan = jabatan.idjabatan');
        $jawatan = ['Ketua Jabatan', 'Ketua Unit'];
        $model->whereIn('namajawatan', $jawatan);
        $model->orderBy('namapegawai');
        $data = [
            'result' => $model->get()->getResultObject(),
        ];

        $bawah = ['namapegawai' => $this->namapegawai()];

        echo view('ppa/atas');
        echo view('ppa/kjku', $data);
        echo view('ppa/bawah', $bawah);
        return 0;
    }

    public function graf()
    {
        if (!$this->mula()) return redirect()->to(base_url());

        $bawah = ['namapegawai' => $this->namapegawai()];

        echo view('ppa/atas');
        echo view('ppa/graf');
        echo view('ppa/bawah', $bawah);
        return 0;
    }

    public function cetakgraf()
    {
        $session = session();
        if ($session->userlevel) {
            $data = ['userlevel' => $session->userlevel];
            echo view('ppa/cetakgraf', $data);
        }
    }

    public function datastatistik()
    {
        $session = session();
        $model = new AduanModel();
        $tahun1 = date('Y');
        $tahun0 = $tahun1 - 1;

        # bilangan aduan yang diterima
        $syarat = ['YEAR(tarikhterima)' => $tahun0,];
        $model->where($syarat);
        $t0['semua'] = $model->countAllResults();

        $syarat = ['YEAR(tarikhterima)' => $tahun1,];
        $model->where($syarat);
        $t1['semua'] = $model->countAllResults();

        # bilangan aduan yang diselesaikan dalam tempoh 14 hari bekerja
        $syarat = [
            'YEAR(tarikhterima)' => $tahun0,
            'status' => 'Selesai',
            'DATEDIFF(tarikhjawapanrasmi, tarikhterima) <' => 18,
        ];
        $model->where($syarat);
        $t0['siapawai'] = $model->countAllResults();

        $syarat = [
            'YEAR(tarikhterima)' => $tahun1,
            'status' => 'Selesai',
            'DATEDIFF(tarikhjawapanrasmi, tarikhterima) <' => 18,
        ];
        $model->where($syarat);
        $t1['siapawai'] = $model->countAllResults();

        # bilangan aduan dalam tindakan
        $syarat = [
            'YEAR(tarikhterima)' => $tahun0,
            'status !=' => 'Selesai',
        ];
        $model->where($syarat);
        $t0['takselesai'] = $model->countAllResults();

        $syarat = [
            'YEAR(tarikhterima)' => $tahun1,
            'status !=' => 'Selesai',
        ];
        $model->where($syarat);
        $t1['takselesai'] = $model->countAllResults();

        # jenis-jeins aduan
        foreach (JENIS as $jenis) {
            $syarat = [
                'YEAR(tarikhterima)' => $tahun0,
                'jenis' => $jenis,
            ];
            $model->where($syarat);
            $jenisjenis[0][$jenis] = $model->countAllResults();

            $syarat = [
                'YEAR(tarikhterima)' => $tahun1,
                'jenis' => $jenis,
            ];
            $model->where($syarat);
            $jenisjenis[1][$jenis] = $model->countAllResults();
        }

        $data = [
            'tahun0' => $tahun0,
            'tahun1' => $tahun1,
            't0' => $t0,
            't1' => $t1,
            'jenisjenis' => $jenisjenis,
            'userlevel' => $session->userlevel,
        ];

        return $data;
    }

    public function statistik()
    {
        if (!$this->mula()) return redirect()->to(base_url());

        $data = $this->datastatistik();
        $bawah = ['namapegawai' => $this->namapegawai()];

        echo view('ppa/atas');
        echo view('ppa/statistik', $data);
        echo view('ppa/bawah', $bawah);
        return 0;
    }

    public function cetakstatistik()
    {
        if (!$this->mula()) return redirect()->to(base_url());

        $data = $this->datastatistik();
        echo view('ppa/cetakstatistik', $data);
        return 0;
    }
}
