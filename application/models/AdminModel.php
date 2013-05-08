<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AdminModel extends CI_Model{
	function GetPages(){
		$q = $this->db->get('pages');
		return $q;
	}
}