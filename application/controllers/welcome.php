<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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

	public function check_login()
	{
		if(!UID)
			redirect("login");
	} 

	public function index()
	{
		$this->check_login();

		$today_stats = $this->report_m->today_stats();
		$customer_pay_list = $this->report_m->get_customer_freq_list();
		$customer_most_paid = $this->report_m->get_customer_most_paid();
		$next_week_freq = $this->report_m->get_next_week_freq();
		
		$data = array('title' => 'DB Hotel Management System', 'page' => 'dashboard');
		$this->load->view('header', $data);

		$viewdata = array(
			'today_stats' => $today_stats,
			'customer_pay_list' => $customer_pay_list,
			'customer_most_paid' => $customer_most_paid,
			'next_week_freq' => $next_week_freq
		);
		$this->load->view('welcome_message', $viewdata);
		$this->load->view('footer', array("next_week_freq"=>$next_week_freq));
		$this->session->set_userdata('show_guide',true);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */