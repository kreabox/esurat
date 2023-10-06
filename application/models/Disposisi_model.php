<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;
class Disposisi_model extends Eloquent{
	protected $table = 'disposisi';
    public $timestamps = false;
	protected $fillable = [ 'suratmasukId', 'userId_kepada', 'userId_dari', 'memo', 'tanggal', 'createAt'];
}

/* End of file Users_model.php */
