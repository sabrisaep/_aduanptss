<?php

namespace App\Controllers;

use App\Models\AduanModel;
use App\Models\PegawaiModel;

class Pengarah extends BaseController
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
                    . $this->pegawai->namajawatan,
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

        $data = [
            'result' => $model->get()->getResultObject(),
        ];
        helper('tarikh_helper');

        echo view('pengarah/atas');
        echo view('pengarah/senarai', $data);
        echo view('pengarah/bawah', $this->bawah);
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

            echo view('pengarah/atas');
            echo view('depan/detailaduan', $data);
            echo view('pengarah/bawah', $this->bawah);
            return 0;
        } else {
            return redirect()->to(base_url('pengarah'));
        }
    }

    public function borangjawapan($idaduan)
    {
        if (!$this->mula()) {
            return redirect()->to(base_url());
        }

        $model = new AduanModel();
        $model->join('pengadu', 'aduan.pengadu = pengadu.idpengadu');
        $model->join('pegawai', 'aduan.pegawai = pegawai.idpegawai');
        $model->join('jawatan', 'pegawai.jawatan = jawatan.idjawatan');
        $model->join('jabatan', 'pegawai.jabatan = jabatan.idjabatan');
        $syarat = ['idaduan' => $idaduan];
        $model->where($syarat);
        if ($model->countAllResults(false)) {
            $data = ['row' => $model->get()->getRowObject()];
            $data['user'] = 'pengarah';

            helper('tarikh_helper');
            echo view('pengarah/atas');
            echo view('ppa/borangjawapan', $data);
            echo view('pengarah/bawah', $this->bawah);
            return 0;
        } else {
            return redirect()->to(base_url('ppa'));
        }
    }

    public function graf()
    {
        if (!$this->mula()) return redirect()->to(base_url());

        echo view('pengarah/atas');
        echo view('ppa/graf');
        echo view('pengarah/bawah', $this->bawah);
        return 0;
    }

    public function statistik()
    {
        if (!$this->mula()) return redirect()->to(base_url());

        $ppa = new Ppa();
        $data = $ppa->datastatistik();

        echo view('pengarah/atas');
        echo view('ppa/statistik', $data);
        echo view('pengarah/bawah', $this->bawah);
        return 0;
    }
}
