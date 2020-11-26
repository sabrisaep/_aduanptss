<?php namespace App\Models;

use CodeIgniter\Model;

class PengaduModel extends Model
{
    protected $table = 'pengadu';
    protected $primaryKey = 'idpengadu';
    protected $allowedFields = [
        'namapengadu',
        'nokppengadu',
        'alamatpengadu',
        'telefonpengadu',
        'emailpengadu',
    ];
}
