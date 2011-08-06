<?php if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index() {
		$this -> load -> view('coming_soon');
	}

	function subscribe() {
		$this->load->database();
		$this -> load -> helper('email');
		
		$email = htmlentities($this -> input -> post('email'));
		$is_ajax = $this -> input -> post('ajax');
		
		if (!valid_email($email)) {
			
		} else {
			$sql = "SELECT email FROM subscribed_users
					WHERE email = ?";

			$this -> db -> query($sql, array($email));

			if(mysql_affected_rows() == 1) {
				if($is_ajax) {

				} else {

				}

			} else {
				$sql = "INSERT INTO subscribed_users(email)
					VALUES(?)";

				$this -> db -> query($sql, array($email));

				if(mysql_affected_rows() == 1) {
					//include ("private_application/views/includes/subscribe_email.php");
					if($is_ajax) {

					} else {

					}
				}
			}
		}
	}

}

/* End of file welcome.php */
/* Location: ./private_application/controllers/welcome.php */