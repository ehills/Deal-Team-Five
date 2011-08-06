<?php if(!defined('BASEPATH'))
	exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index() {
		$data['error'] = 'noError';
		$this -> load -> view('coming_soon', $data);
	}

	function badEmail() {
		$data['error'] = 'email';
		$this -> load -> view('coming_soon', $data);
	}
	
	function duplicateEmail() {
		$data['error'] = 'duplicate_email';
		$this -> load -> view('coming_soon', $data);
	}
	
	function subscribeNoAjaxComplete() {
		$data['error'] = 'no_ajax_complete';
		$this -> load -> view('coming_soon', $data);
	}

	function subscribe() {
		$this -> load -> database();
		$this -> load -> helper('email');

		$email = htmlentities($this -> input -> post('email'));
		$is_ajax = $this -> input -> post('ajax');

		if(!valid_email($email)) {
			$this -> badEmail();
		} else {
			$sql = "SELECT email FROM subscribed_users
					WHERE email = ?";

			$this -> db -> query($sql, array($email));

			if(mysql_affected_rows() == 1) {
					$this -> duplicateEmail();
			} else {
				$sql = "INSERT INTO subscribed_users(email)
					VALUES(?)";

				$this -> db -> query($sql, $email);

				if(mysql_affected_rows() == 1) {
					if($is_ajax) {
						echo $this -> load -> view('includes/subscribe_complete');
					} else {
						$this -> subscribeNoAjaxComplete();
					}
				}
			}
		}
	}

}

/* End of file welcome.php */
/* Location: ./private_application/controllers/welcome.php */
