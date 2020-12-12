<?php namespace App\Models;

use CodeIgniter\Model;

class AduanModel extends Model
{
    protected $table = 'aduan';
    protected $primaryKey = 'idaduan';
    protected $allowedFields = [
        'pengadu',
        'ringkasan',
        'jabatan',
        'lampiran',
        'tarikhaduan',
        'status',
        'noruj',
        'pegawai',
        'jenis',
        'tarikhterima',
        'punca',
        'pembetulan',
        'pegawaipelaksana',
        'tarikhpelaksana',
        'disahkanoleh',
        'tarikhdisahkan',
        'pemantauan',
        'statustindakan',
        'tarikhjawapankjku',
        'tajuksuratjawapan',
        'jawapanrasmi',
        'tarikhjawapanrasmi',
        'namappa',
    ];
}
