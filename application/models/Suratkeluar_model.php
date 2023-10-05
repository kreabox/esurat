<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;
class Suratkeluar_model extends Eloquent{
	protected $table = 'surat_keluar';
    public $timestamps = false;
	protected $fillable = [ 'nomor', 'kepada', 'penandatanganId', 'cq', 'alamat','sifat', 'perihal', 'tanggal', 'keterangan', 'userId', 'templateId' ];
}

/* End of file Users_model.php */
