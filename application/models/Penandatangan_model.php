<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;
class Penandatangan_model extends Eloquent{
	protected $table = 'penandatangan';
    public $timestamps = false;
	protected $fillable = [ 'nama', 'jabatan', 'pangkat_golongan', 'nip'];
}

/* End of file Users_model.php */
