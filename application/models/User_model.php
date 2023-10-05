<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;
class User_model extends Eloquent{
	protected $table = 'users';
    public $timestamps = false;
	protected $fillable = [ 'username', 'email', 'password', 'nama_lengkap', 'role', 'jabatan' ];
}

/* End of file Users_model.php */
