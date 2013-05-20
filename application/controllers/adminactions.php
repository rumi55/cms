<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class adminactions extends CI_Controller{
	function newpage(){
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')){
			if($this->session->userdata('logged_in')){

				$data = array(
					'title'=>$_POST['page-title'],
					'content'=>$_POST['page-content'],
					'tags'=>$_POST['page-tags'],
					'type'=>$_POST['page-type'],
					'created'=>date('m/d/Y'),
					'createdby'=>$this->session->userdata('name'),
					'url'=>$_POST['page-url']
				);

				if($this->db->insert('pages', $data)){
					echo json_encode(array('response'=>true, 'message'=>'Successfully created the page.'));
				}else{
					echo json_encode(array('response'=>false, 'message'=>'There were some issues.'));
				}

			}else{
				echo json_encode(array('response'=>'Need to be logged in!'));
			}
		}else{
			echo json_encode(array('response'=>'Can\'t do that.'));
		}
	}
}