<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;
class Template_model extends Eloquent{
	protected $table = 'template';
    public $timestamps = false;
	protected $fillable = [ 'nama_template', 'file_template', 'keterangan', 'userId' ];

}

/* End of file Users_model.php */
