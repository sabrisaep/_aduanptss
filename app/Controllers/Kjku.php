<?php namespace App\Controllers;

use App\Models\AduanModel;
use App\Models\PegawaiModel;

class Kjku extends BaseController
{
    private $idpegawai;
    private $pegawai;
    private $bawah;

    private function mula()
    {
        $session = session();
        if (!$session->idpegawai) {
            return false;
        } else {
            $this->idpegawai = $session->idpegawai;

            $model = new PegawaiModel();
            $model->join('jawatan', 'pegawai.jawatan = jawatan.idjawatan');
            $model->join('jabatan', 'pegawai.jabatan = jabatan.idjabatan');
            $model->where(['idpegawai' => $this->idpegawai]);
            $this->pegawai = $model->get()->getRowObject();

            $this->bawah = [
                'namapegawai' => $this->pegawai->namapegawai . ', '
                    . $this->pegawai->namajawatan . ', '
                    . $this->pegawai->namajabatan,
            ];

            return true;
        }
    }

    public function index()
    {
        if (!$this->mula()) return redirect()->to(base_url());

        $model = new AduanModel();
        $model->join('pegawai', 'aduan.pegawai = pegawai.idpegawai', 'left');
        $model->join('jawatan', 'pegawai.jawatan = jawatan.idjawatan', 'left');
        $model->orderBy('tarikhaduan', 'DESC');
        $model->where(['pegawai' => $this->idpegawai]);

        $data = [
            'result' => $model->get()->getResultObject(),
        ];
        helper('tarikh_helper');

        echo view('kjku/atas');
        echo view('kjku/senarai', $data);
        echo view('kjku/bawah', $this->bawah);
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

            echo view('kjku/atas');
            echo view('depan/detailaduan', $data);
            if ($row->status != 'Hampir Selesai' and $row->status != 'Selesai') {
                $tindakan = ['idaduan' => $idaduan];
                echo view('kjku/butangtindakan', $tindakan);
            }
            echo view('kjku/bawah', $this->bawah);
            return 0;
        } else {
            return redirect()->to(base_url('ppa'));
        }
    }

    private function parapegawai()
    {
        $model = new PegawaiModel();
        $model->where(['jabatan' => $this->pegawai->jabatan]);
        return $model->get()->getResultObject();
    }

    public function borang($idaduan)
    {
        if (!$this->mula()) return redirect()->to(base_url());

        $model = new AduanModel();
        $model->join('pengadu', 'aduan.pengadu = pengadu.idpengadu');
        $session = session();
        $syarat = [
            'idaduan' => $idaduan,
            'pegawai' => $this->idpegawai,
        ];
        $model->where($syarat);
        if ($model->countAllResults(false)) {
            $data = [
                'row' => $model->get()->getRowObject(),
                'parapegawai' => $this->parapegawai(),
            ];
            helper('tarikh_helper');

            echo view('kjku/atas');
            echo view('kjku/borang', $data);
            echo view('kjku/bawah', $this->bawah);
            return 0;
        } else {
            return redirect()->to(base_url('kjku'));
        }
    }

    public function borang_simpan()
    {
        #echo '<pre>', print_r($_POST); exit;
        if (!$this->mula()) return redirect()->to(base_url());

        $idaduan = $this->request->getVar('idaduan');
        $tarikh = date('Y-m-d');
        $data = [
            'punca' => $this->request->getVar('punca'),
            'pembetulan' => $this->request->getVar('pembetulan'),
            'pegawaipelaksana' => $this->request->getVar('pegawaipelaksana'),
            'tarikhpelaksana' => $tarikh,
            'disahkanoleh' => $this->request->getVar('disahkanoleh'),
            'tarikhdisahkan' => $tarikh,
            'pemantauan' => $this->request->getVar('pemantauan'),
            'statustindakan' => $this->request->getVar('statustindakan'),
            'tarikhjawapankjku' => $tarikh,
            'status' => 'Hampir Selesai',
        ];
        #echo '<pre>', print_r($data); exit;

        $model = new AduanModel();
        $model->where(['idaduan' => $idaduan]);
        $model->set($data);
        $model->update();
        #echo $model->getCompiledUpdate(); exit;

        # TODO: hantar emel kepada PPA

        return redirect()->to(base_url('kjku/borangisi/' . $idaduan));
    }

    private function onepegawai($idpegawai)
    {
        $model = new PegawaiModel();
        $model->where(['idpegawai' => $idpegawai]);
        $row = $model->get()->getRowObject();
        return $row->namapegawai;
    }

    public function borangisi($idaduan)
    {
        if (!$this->mula()) return redirect()->to(base_url());

        $model = new AduanModel();
        $model->join('pengadu', 'aduan.pengadu = pengadu.idpengadu');
        $session = session();
        $syarat = [
            'idaduan' => $idaduan,
            'pegawai' => $this->idpegawai,
        ];
        $model->where($syarat);
        $row = $model->get()->getRowObject();
        if ($model->countAllResults(false)) {
            $data = [
                'row' => $row,
                'pegawaipelaksana' => $this->onepegawai($row->pegawaipelaksana),
                'disahkanoleh' => $this->onepegawai($row->disahkanoleh),
                'pegawaisiasatan' => $this->pegawai->namapegawai,
            ];
            helper('tarikh_helper');

            echo view('kjku/atas');
            echo view('kjku/borangisi', $data);
            echo view('kjku/bawah', $this->bawah);
            return 0;
        } else {
            return redirect()->to(base_url('kjku'));
        }
    }

    public function cetakborang($idaduan)
    {

    }
}
