<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Medical_service extends CI_Controller {

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
		
		if($this->input->post("medicalserviceOpenTime"))
		{
			$medicalserviceOpenTime = $this->input->post("medicalserviceOpenTime");
			$medicalserviceCloseTime = $this->input->post("medicalserviceCloseTime");
			$medicalserviceDetails = $this->input->post("medicalserviceDetails");
			
			$this->medical_service_m->addMedicalservice($medicalserviceOpenTime, $medicalserviceCloseTime, $medicalserviceDetails);
			redirect("/medical_service");
		}

		$data = array('title' => 'Add Medical Service - DB Hotel Management System', 'page' => 'medical_service');
		$this->load->view('header', $data);
		$this->load->view('medical_service/add');
		$this->load->view('footer');
	}

	function delete($medicalservice_id)
	{
		$this->medical_service_m->deleteMedicalservice($medicalservice_id);
		redirect("/medical_service");
	}

	public function edit($medicalservice_id)
	{
		if($this->input->post("medicalserviceOpenTime"))
		{
			$medicalservice_open_time = $this->input->post("medicalserviceOpenTime");
			$medicalservice_close_time = $this->input->post("medicalserviceCloseTime");
			$medicalservice_details = $this->input->post("medicalserviceDetails");
			
			$this->medical_service_m->editMedicalservice($medicalservice_id, $medicalservice_open_time, $medicalservice_close_time, $medicalservice_details);
			redirect("/medical_service");
		}
		$data = array('title' => 'Edit Medical Service - DB Hotel Management System', 'page' => 'medical_service');
		$this->load->view('header', $data);
		$medicalService = $this->medical_service_m->get_medicalservice($medicalservice_id);
		$viewdata = array('medical_service'  => $medicalService[0]);
		$this->load->view('medical_service/edit',$viewdata);

		$this->load->view('footer'); 
	}

	public function index()
	{
		$medicalServices = $this->medical_service_m->get_medicalServices();
		$customers = $this->customer_m->get_active_customers();


		$viewdata = array('medicalServices' => $medicalServices, 'customers' => $customers);

		$data = array('title' => 'Medical Service - DB Hotel Management System', 'page' => 'medical_service');
		$this->load->view('header', $data);
		$this->load->view('medical_service/list',$viewdata);
		$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */