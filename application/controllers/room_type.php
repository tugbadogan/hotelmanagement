<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Room_type extends CI_Controller {

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
		
		$viewdata = array();

		if($this->input->post("type") && $this->input->post("price") /*&& $this->input->post("quantity")*/)
		{

			$type = $this->input->post("type");
			$price = $this->input->post("price");
			$details = $this->input->post("details");
			$quantity = $this->input->post("quantity");

			if(count($this->room_m->getRoomType($type))==0) {
				$this->room_m->addRoomType($type, $price, $details, $quantity);
				redirect("/room-type");
			}
			else {
				$viewdata['error'] = "Room type alread exists";
			}
		}

		$data = array('title' => 'Add Room Type - DB Hotel Management System', 'page' => 'room_type');
		$this->load->view('header', $data);
		$this->load->view('room-type/add', $viewdata);
		$this->load->view('footer');
	}

	function delete($room_type)
	{
		$this->room_m->deleteRoomType($room_type);
		redirect("/room-type");
	}

	public function edit($room_type)
	{
		if($this->input->post("type") && $this->input->post("price") /*&& $this->input->post("quantity")*/)
		{

			$type = $this->input->post("type");
			$price = $this->input->post("price");
			$details = $this->input->post("details");
			$quantity = $this->input->post("quantity");

			$this->room_m->editRoomType($type, $price, $details, $quantity);
			redirect("/room-type");
		}
		
		$data = array('title' => 'Edit Room Type - DB Hotel Management System', 'page' => 'room_type');
		$this->load->view('header', $data);

		$room_type = $this->room_m->getRoomType($room_type);
		
		$viewdata = array('room_type'  => $room_type[0]);
		$this->load->view('room-type/edit',$viewdata);

		$this->load->view('footer');
	}

	public function index()
	{
		$room_types = $this->room_m->get_room_types();

		$viewdata = array('room_types' => $room_types);

		$data = array('title' => 'Rooms - DB Hotel Management System', 'page' => 'room_type');
		$this->load->view('header', $data);
		$this->load->view('room-type/list',$viewdata);
		$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */