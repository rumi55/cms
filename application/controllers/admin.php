<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if($this->session->userdata('logged_in')){
			$data['title'] = "Admin Control Panel";
			$data['name'] = $this->session->userdata('name');
			$data['page'] = 'home';
			$this->load->views('admin', $data, false, 'admin/');
		}else{
			redirect(base_url().'admin/login');
		}
	}

	public function login(){
		$data['title'] = 'Admin Login';
		if(!$this->session->userdata('logged_in')){
			$this->load->views('admin/login', $data);
		}else{
			redirect(base_url().'admin');
		}
	}

	public function login_try(){
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')){
			header('Content-Type: application/json');
			if($this->simpleloginsecure->login($_POST['email'], $_POST['pass'])){
				echo json_encode(array('success'=>true));
				//redirect(base_url().'admin');
			}else{
				echo json_encode(array('success'=>false));
			}
		}else{
			show_404();
		}
	}

	public function logout(){
		$this->simpleloginsecure->logout();
		redirect(base_url().'admin/login');
	}

	public function pages(){
		$this->load->model('AdminModel');
		$data['title'] = 'Edit Pages';
		$data['name'] = $this->session->userdata('name');
		$data['page'] = 'pages';
		$data['pages'] = $this->AdminModel->GetPages();
		$this->load->views('admin/pages', $data, false, 'admin/');
	}

	public function settings(){
		echo "nothing here";
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */