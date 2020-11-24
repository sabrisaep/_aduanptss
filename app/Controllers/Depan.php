<?php namespace App\Controllers;

class Depan extends BaseController
{
    public function index()
    {
        echo view('depan/atas');
        echo view('depan/utama');
        echo view('depan/bawah');
    }

    public function aduanbaru()
    {
        echo view('depan/atas');
        echo view('depan/aduanbaru');
        echo view('depan/bawah');
    }

    public function mycaptcha()
    {
        helper('mycaptcha_helper');
        echo view(kodsulit());
    }

    public function aduanbaru_simpan()
    {
        echo 'simpan aduan baru';
    }

    public function aduanbaru_terima()
    {
        echo view('depan/atas');
        echo view('depan/aduanbaru_terima');
        echo view('depan/bawah');
    }

    public function semakaduan()
    {
        echo view('depan/atas');
        echo view('depan/semakaduan');
        echo view('depan/bawah');
    }

    public function login()
    {
        echo 'semak login';
    }
}
