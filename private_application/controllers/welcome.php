<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('coming_soon');
	}
}

/* End of file welcome.php */
/* Location: ./private_application/controllers/welcome.php */