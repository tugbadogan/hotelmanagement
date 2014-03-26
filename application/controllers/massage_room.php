<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Massage_room extends CI_Controller {

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

	public function add()
	{
		
		if($this->input->post("massageroomOpenTime"))
		{
			$massageroomOpenTime = $this->input->post("massageroomOpenTime");
			$massageroomCloseTime = $this->input->post("massageroomCloseTime");
			$massageroomDetails = $this->input->post("massageroomDetails");
			
			$this->massage_room_m->addMassageroom($massageroomOpenTime, $massageroomCloseTime, $massageroomDetails);
			redirect("/massage_room");
		}

		$data = array('title' => 'Add Massage Room - DB Hotel Management System', 'page' => 'massage_room');
		$this->load->view('header', $data);
		$this->load->view('massage_room/add');
		$this->load->view('footer');
	}

	function delete($massageroom_id)
	{
		$this->massage_room_m->deleteMassageroom($massageroom_id);
		redirect("/massage_room");
	}

	public function edit($massageroom_id)
	{
		if($this->input->post("massageroomOpenTime"))
		{
			$massageroom_open_time = $this->input->post("massageroomOpenTime");
			$massageroom_close_time = $this->input->post("massageroomCloseTime");
			$massageroom_details = $this->input->post("massageroomDetails");
			
			$this->massage_room_m->editMassageroom($massageroom_id, $massageroom_open_time, $massageroom_close_time, $massageroom_details);
			redirect("/massage_room");
		}
		$data = array('title' => 'Edit Massage Room - DB Hotel Management System', 'page' => 'massage_room');
		$this->load->view('header', $data);
		$Massagerooms = $this->massage_room_m->get_massageroom($massageroom_id);
		$viewdata = array('massage_room'  => $Massagerooms[0]);
		$this->load->view('massage_room/edit',$viewdata);

		$this->load->view('footer'); 
	}

	public function index()
	{
		$massageRooms = $this->massage_room_m->get_massageRooms();
		$customers = $this->customer_m->get_active_customers();

		$viewdata = array('massageRooms' => $massageRooms, 'customers' => $customers);

		$data = array('title' => 'Massage Room - DB Hotel Management System', 'page' => 'massage_room');
		$this->load->view('header', $data);
		$this->load->view('massage_room/list',$viewdata);
		$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */