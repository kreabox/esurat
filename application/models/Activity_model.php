<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
use Illuminate\Database\Eloquent\Model as Eloquent;
class Activity_model extends Eloquent{
	protected $table = 'log_activity';
    public $timestamps = false;
	protected $fillable = ['datetime', 'activity', 'controller', 'model'];
}

/* End of file Users_model.php */
