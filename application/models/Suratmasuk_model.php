<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;
class Suratmasuk_model extends Eloquent{
	protected $table = 'surat_masuk';
    public $timestamps = false;
	protected $fillable = ['nomor','tanggal','pengirim','perihal', 'file','keterangan','status','userId'];
}

/* End of file Users_model.php */
